<?php
require_once 'database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
              strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    
    try {
        $response = ['success' => false, 'message' => ''];
        
        // Monetary Donation
        if (isset($_POST['donor-name'])) {
            $stmt = $pdo->prepare("
                INSERT INTO donations 
                (donor_name, donor_email, donor_phone, donation_amount, payment_method, 
                 donation_message, is_anonymous, donation_date)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)
            ");
            
            $is_anonymous = isset($_POST['anonymous']) ? 1 : 0;
            
            $stmt->execute([
                $_POST['donor-name'],
                $_POST['donor-email'],
                $_POST['donor-phone'] ?? '',
                $_POST['donation-amount'],
                $_POST['payment-method'],
                $_POST['donation-message'] ?? '',
                $is_anonymous,
                date('Y-m-d')
            ]);
            
            $response['success'] = true;
            $response['message'] = "Thank you for your monetary donation! We've received your information.";
            $_SESSION['success'] = $response['message'];
        }
        
        // In-Kind Donation
        if (isset($_POST['inkind-name'])) {
            $stmt = $pdo->prepare("
                INSERT INTO inkind_donations 
                (donor_name, donor_email, donor_phone, donation_items, dropoff_location, dropoff_date, special_instructions)
                VALUES (?, ?, ?, ?, ?, ?, ?)
            ");
            
            $stmt->execute([
                $_POST['inkind-name'],
                $_POST['inkind-email'],
                $_POST['inkind-phone'] ?? '',
                $_POST['donation-items'],
                $_POST['dropoff-location'],
                $_POST['dropoff-date'],
                $_POST['special-instructions'] ?? ''
            ]);
            
            $response['success'] = true;
            $response['message'] = "Thank you for your in-kind donation! We'll contact you soon.";
            $_SESSION['success'] = $response['message'];
        }
        
        // Return JSON for AJAX requests
        if ($isAjax) {
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        } else {
            // Redirect for regular form submission
            header('Location: ../donate.php');
            exit;
        }
        
    } catch(PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        
        $errorMessage = "There was an error processing your donation. Please try again.";
        
        if ($isAjax) {
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false,
                'message' => $errorMessage
            ]);
            exit;
        } else {
            $_SESSION['error'] = $errorMessage;
            header('Location: ../donate.php');
            exit;
        }
    }
} else {
    // Not a POST request
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false,
            'message' => 'Invalid request method'
        ]);
    } else {
        header('Location: ../donate.php');
    }
    exit;
}
?>