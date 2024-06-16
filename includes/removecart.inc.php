<?php
// Start session to access session variables
session_start();

// Check if a product removal request is received
if (isset($_GET['remove_product'])) {
    // Retrieve product ID to remove from the query parameter
    $product_id = $_GET['remove_product'];
    

    // Remove product from the database
    try {
        require_once "dbh.inc.php";

        $user_id = $_SESSION['user_id'];

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("DELETE FROM shopping_cart_item WHERE id = ?");
        $stmt->execute([$product_id]);

        // Redirect back to the cart page after removal
        header("Location: ../cart");
        exit(); // Terminate script execution after redirection
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
