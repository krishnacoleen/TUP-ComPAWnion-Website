<?php
require_once 'database.php';
session_start();

// Ensure the script only runs on a POST request
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
    exit();
}

// Set header for JSON response
header('Content-Type: application/json');

// 2. Data Validation and Sanitation
if (empty($_POST['full-name']) || empty($_POST['email']) || empty($_POST['motivation'])) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "Required fields (Name, Email, Motivation) are missing."]);
    exit();
}

// Sanitize inputs
$fullName = htmlspecialchars(trim($_POST['full-name']));
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$phone = htmlspecialchars(trim($_POST['phone'] ?? ''));
$studentId = htmlspecialchars(trim($_POST['student-id'] ?? ''));
$experience = htmlspecialchars(trim($_POST['experience'] ?? ''));
$motivation = htmlspecialchars(trim($_POST['motivation']));
$eventIds = $_POST['available-dates'] ?? [];

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "Invalid email format."]);
    exit();
}

// 3. Insert into the 'volunteers' Table - UPDATED for your table structure
$sql_volunteer = "INSERT INTO volunteers (
                    full_name, 
                    email, 
                    phone, 
                    student_id, 
                    previous_experience, 
                    motivation
                    -- status and application_date will use DEFAULT values
                  ) VALUES (?, ?, ?, ?, ?, ?)";

try {
    // Use prepared statements for security with PDO
    $stmt = $pdo->prepare($sql_volunteer);
    
    // Execute with parameters - only 6 parameters now
    $stmt->execute([$fullName, $email, $phone, $studentId, $experience, $motivation]);
    
    // Get the ID of the newly inserted volunteer record
    $volunteer_id = $pdo->lastInsertId();
    
    // 4. Insert into the 'volunteer_availability' Junction Table
    $inserted_count = 0;
    
    if (!empty($eventIds)) {
        // Prepare the SQL for the junction table - matches your table name
        $sql_availability = "INSERT INTO volunteer_availability (volunteer_id, event_id) VALUES (?, ?)";
        $stmt_avail = $pdo->prepare($sql_availability);
        
        foreach ($eventIds as $eventId) {
            // Ensure eventId is treated as an integer and is valid
            $cleanEventId = intval($eventId);
            
            if ($cleanEventId > 0) { // Only insert valid IDs
                try {
                    $stmt_avail->execute([$volunteer_id, $cleanEventId]);
                    $inserted_count++;
                } catch (PDOException $e) {
                    // Log the error but continue to try other event IDs
                    error_log("Failed to insert event ID {$cleanEventId} for volunteer ID {$volunteer_id}: " . $e->getMessage());
                }
            }
        }
    }
    
    // 5. Success Response
    http_response_code(200);
    echo json_encode([
        "success" => true, 
        "message" => "Thank you for your application! We will contact you soon.",
        "volunteer_id" => $volunteer_id,
        "events_signed_up" => $inserted_count
    ]);
    
} catch(PDOException $e) {
    // 6. Simple Error Response without duplicate validation
    http_response_code(500);
    error_log("Database error: " . $e->getMessage());
    echo json_encode(["success" => false, "message" => "Database error during insertion. Please try again."]);
}
?>