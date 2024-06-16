<?php
session_start();
require_once "dbh.inc.php";

header('Content-Type: application/json');

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $data = json_decode(file_get_contents('php://input'), true);

    if (empty($data) || !isset($data['id']) || !isset($data['qty'])) {
        error_log('Invalid data received');
        echo json_encode(['status' => 'error', 'message' => 'Invalid data received']);
        exit;
    }

    $stmt = $pdo->prepare("UPDATE shopping_cart_item SET qty = ? WHERE id = ? AND user_id = ?");
    $result = $stmt->execute([$data['qty'], $data['id'], $_SESSION['user_id']]);
    
    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Quantity updated successfully']);
    } else {
        $errorInfo = $stmt->errorInfo();
        error_log('SQL Error: ' . print_r($errorInfo, true));
        echo json_encode(['status' => 'error', 'message' => 'Database update failed']);
    }
} catch (PDOException $e) {
    error_log('PDO Exception: ' . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>
