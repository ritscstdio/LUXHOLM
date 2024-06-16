<?php 
include 'includes/protected_session.inc.php';

try {
    require_once "includes/dbh.inc.php";

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Assuming $_SESSION['user_id'] contains the user's ID after they log in
    $user_id = $_SESSION['user_id'];

    // Fetch shopping cart items associated with the user's user_id
    $stmt = $pdo->prepare("SELECT * FROM shopping_cart_item WHERE user_id = ?");
    $stmt->execute([$user_id]);
    
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Fetch user's address
    $stmt = $pdo->prepare("SELECT * FROM user_address WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $userAddress = $stmt->fetch(PDO::FETCH_ASSOC);

    $totalSubtotal = 0; // Initialize total subtotal

    foreach ($products as $product) {
        // Calculate subtotal for each product
        $subtotal = $product['price'] * $product['qty'];
        $totalSubtotal += $subtotal; // Add subtotal to total
    }

    // Add shipping cost to the total
    $totalSubtotal += 50; // Assuming a flat shipping rate of ₱50

    // Insert order into the shop_order table
    $cart_id = bin2hex(random_bytes(16)); // Generate random cart_id
    $order_date = date("Y-m-d"); // Get current date
    $shipping_address = $userAddress['address_1'] . ', ' . $userAddress['city'] . ', ' . $userAddress['province'] . ', ' . $userAddress['postal_zip_code'];
    
    $stmt = $pdo->prepare("INSERT INTO shop_order (cart_id, user_id, order_date, shipping_address, order_total, order_status) VALUES (?, ?, ?, ?, ?, 'Pending')");
    $stmt->execute([$cart_id, $user_id, $order_date, $shipping_address, $totalSubtotal]);

    // Now $totalSubtotal contains the total of subtotals for all products

    // Return a success response
    echo "success";
} catch (PDOException $e) {
    // Return an error response
    echo "Error: " . $e->getMessage();
}
?>
