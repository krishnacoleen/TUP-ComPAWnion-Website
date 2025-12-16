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
$required_fields = ['full-name', 'age', 'contact-no', 'address', 'residence-type', 'cat-name'];
foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
        http_response_code(400);
        echo json_encode(["success" => false, "message" => "Required field '{$field}' is missing."]);
        exit();
    }
}

// Sanitize inputs
$fullName = htmlspecialchars(trim($_POST['full-name']));
$age = (int) $_POST['age']; // Cast to integer
$contactNo = htmlspecialchars(trim($_POST['contact-no']));
$facebookLink = filter_var(trim($_POST['facebook-profile-link']), FILTER_SANITIZE_URL) ?? '';
$address = htmlspecialchars(trim($_POST['address']));
$residenceType = htmlspecialchars(trim($_POST['residence-type']));
$sourceOfIncome = htmlspecialchars(trim($_POST['source-of-income'] ?? ''));
$incomeRange = htmlspecialchars(trim($_POST['allowance-salary-range'] ?? ''));
$catName = htmlspecialchars(trim($_POST['cat-name']));

// Basic validation checks
if ($age < 18) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "You must be 18 years or older to apply."]);
    exit();
}
if (empty($contactNo) || empty($address) || empty($catName)) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "One or more required fields are invalid."]);
    exit();
}


// 3. Insert into the 'adoption_applications' Table
$sql_application = "INSERT INTO adoption_applications (
                    full_name, 
                    age, 
                    contact_number, 
                    facebook_link, 
                    address, 
                    residence_type, 
                    source_of_income, 
                    income_range, 
                    cat_name
                  ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

try {
    // Use prepared statements for security with PDO
    $stmt = $pdo->prepare($sql_application);
    
    // Execute with parameters
    $stmt->execute([
        $fullName, 
        $age, 
        $contactNo, 
        $facebookLink, 
        $address, 
        $residenceType, 
        $sourceOfIncome, 
        $incomeRange, 
        $catName
    ]);
    
    // 4. Success Response
    http_response_code(200);
    echo json_encode([
        "success" => true, 
        "message" => "Thank you! Your application for <strong>{$catName}</strong> has been submitted. We will contact you soon for the screening process.",
        "cat_name" => $catName
    ]);
    
} catch(PDOException $e) {
    // 5. Simple Error Response
    error_log("Adoption Database error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Database error during application submission. Please try again."]);
}
?>