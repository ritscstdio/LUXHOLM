<?php include 'includes/protected_session.inc.php'; ?>

<?php
try {
    require_once "includes/dbh.inc.php";

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Assuming $_SESSION['user_id'] contains the user's ID after they log in
    $user_id = $_SESSION['user_id'];

    // Fetch orders associated with the user's user_id
    $stmt = $pdo->prepare("SELECT * FROM shop_order WHERE user_id = ?");
    $stmt->execute([$user_id]);

    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="images/images/favicons.png">
    <title>Order History</title>
    <link rel="stylesheet" href="checkout.css">
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <main class="checkout-page">
        <section class="checkout-left">
            <h1>Order History</h1>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order Date</th>
                        <th>Shipping Address</th>
                        <th>Payment Method</th>
                        <th>Order Total</th>
                        <th>Order Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                    <tr>
     
                        <td><?php echo $order['cart_id']; ?></td>
                        <td><?php echo $order['order_date']; ?></td>
                        <td><?php echo $order['shipping_address']; ?></td>
                        <td><?php echo $order['payment_method']; ?></td>
                        <td>₱<?php echo number_format($order['order_total'], 2, '.', ''); ?></td>
                        <td><?php echo $order['order_status']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
