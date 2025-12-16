<?php
header('Content-Type: application/json');
require_once 'database.php';

try {
    $sql = "SELECT 
                id, 
                title, 
                description, 
                event_date, 
                event_time, 
                location 
            FROM 
                events 
            WHERE 
                event_date >= CURDATE()
            ORDER BY 
                event_date ASC";

    $stmt = $pdo->query($sql);
    $events_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Always return consistent JSON structure
    echo json_encode([
        "success" => true,
        "message" => count($events_data) > 0 ? "Events found" : "No upcoming events found",
        "events" => $events_data
    ]);

} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "Database error occurred",
        "events" => []
    ]);
    error_log("Events fetch error: " . $e->getMessage());
}
?>