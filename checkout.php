<?php include 'includes/protected_session.inc.php'; ?>
<?php include 'includes/chkprotected_session.inc.php'; ?>

<?php
try {
    require_once "includes/dbh.inc.php";

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_order'])) {
        // Extract shipping address, order total, and payment method
        $shipping_address = $_POST['shipping_address'];
        $order_total = $_POST['order_total'];
        $payment_method = $_POST['payment_select'];

        // Generate a random cart ID
        $cart_id = substr(bin2hex(random_bytes(5)), 0, 10); // Generates a random hexadecimal string of 10 characters

        // Insert the order into the database
        $stmt = $pdo->prepare("INSERT INTO shop_order (cart_id, user_id, order_date, shipping_address, payment_method, order_total, order_status) VALUES (?, ?, NOW(), ?, ?, ?, 'Processing')");
        $stmt->execute([$cart_id, $_SESSION['user_id'], $shipping_address, $payment_method, $order_total]);

        // Delete items from the shopping_cart_item table based on the session user_id
        $stmt = $pdo->prepare("DELETE FROM shopping_cart_item WHERE user_id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        
        // Redirect to a confirmation page or do further processing
        header("Location: account.php");
        exit();
    }

    // Fetch shopping cart items associated with the user's user_id
    $user_id = $_SESSION['user_id'];
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

    // Now $totalSubtotal contains the total of subtotals for all products

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
    <title>Checkout</title>
    <link rel="stylesheet" href="checkout.css">
    <link rel="stylesheet" href="home.css">
    <style>
        /* Add this style block for the wavy line separator */
        .checkout-page {
            display: flex;
            position: relative;
        }
        
        .checkout-left {
            flex: 1;
            padding-right: 40px; /* Add some space for the sidebar */
        }
        
        .checkout-right {
            width: 400px; /* Adjust the width as needed */
            position: sticky;
            top: 20px; /* Adjust top position as needed */
            align-self: flex-start;
            background: #f9f9f9;
            padding: 30px 20px 20px; /* Increased top padding for the wavy line */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .checkout-right::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 20px; /* Adjust the height to match your wavy line image */
            background-image: url('path/to/your/wavy-line-image.png');
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }
    </style>
</head>
<body>
    <main class="checkout-page">
        <a href="cart" class="back-to-cart">Go back to cart</a>
        
        <section class="checkout-left">
            <h1>Express checkout</h1>
            <form class="checkout-form" method="post">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th><label for="ship-to">Cart product list:</label></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                        <tr>
                            <td class="product-details">
                                <img src="<?php echo $product['img_src']; ?>" alt="<?php echo $product['name']; ?>">
                                <div>
                                    <p><?php echo $product['name']; ?></p>
                                    <p><?php echo "Size: ". $product['size']; ?></p>
                                    <p><?php echo "₱" . number_format($product['price'] * $product['qty'], 2, '.', ''); ?></p>
                                </div>
                            </td>
                            <td>
                                <div class="quantity-control">
                                    <span class="quantity" data-id="<?= $product['id']; ?>"><?= $product['qty'] . "x"; ?></span>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="form-group">
                    <!-- DELIVERY ADDRESS -->
                    <label for="ship-to">Delivery Address</label>
                        <ul>
                            <li>
                                <p>
                                    <?php echo $userAddress['first_name'];?>
                                    <?php echo $userAddress['last_name'] . " | " . $userAddress['phone']. "<br>";?>
                                    <?php echo $userAddress['address_1'];?>
                                    <?php if (!empty($userAddress['address_2'])) echo ', ' . $userAddress['address_2']; ?>
                                    <?php echo ', ' . $userAddress['city'] . ', ' . $userAddress['province'] . ', ' . $userAddress['postal_zip_code']; 
                                    
                                    // FULL ADDRESS
                                    $fullAddress = $userAddress['first_name'] . " " . $userAddress['last_name'] . " | " . $userAddress['phone'] . "<br>" .
                                        $userAddress['address_1'] . (!empty($userAddress['address_2']) ? ', ' . $userAddress['address_2'] : '') . ', ' .
                                        $userAddress['city'] . ', ' . $userAddress['province'] . ', ' . $userAddress['postal_zip_code'];
                                    ?>
                                </p>
                            </li>
                        </ul>
                </div>

                <div class="form-group checkbox-group">
                    <input type="checkbox" id="newsletter">
                    <label for="newsletter">Email me with news and offers</label>
                </div>

                <!-- Payment options -->
                <div class="Payment-method">
                    <label for="payment-select">Payment Method:</label>
                    <select id="payment-select" name="payment_select">
                        <option value="Gcash">GCash</option>
                        <option value="Paypal">PayPal</option>
                        <option value="COD">Cash on Delivery</option>
                    </select>
                </div>

                <!-- Hidden inputs for address and order total -->
                <input type="hidden" name="shipping_address" value="<?php echo $fullAddress; ?>">
                <input type="hidden" name="order_total" value="<?php echo $totalSubtotal + 50; ?>">

                <!-- Confirm order button -->
                <button type="submit" name="confirm_order" class="pay-button">Confirm Order</button>
            </form>
        </section>

        <aside class="checkout-right">
            <div class="order-summary">
                <h2>Order Summary</h2>
                <?php 
                $numProducts = 0;
                foreach ($products as $product): 
                    $numProducts++;
                ?>
                <div class="item">
                    <p name="product_name"><?php echo $product['name']; ?> (<?php echo $product['qty']; ?>)</p>
                    <p class="item-price" name="product_price" data-price="<?php echo $product['price']; ?>">₱<?php echo number_format($product['price'] * $product['qty'], 2, '.', ''); ?></p>
                </div>
                <?php endforeach; ?>
                
                <div class="shipping">
                    <p>Shipping</p>
                    <p class="shipping-price" data-shipping="50">₱50.00</p>
                </div>

                <div class="total">
                    <p>Order Total <?php echo "(".$numProducts."):" ?></p>
                    
                    <!-- TOTAL SUBTOTAL -->
                    <p class="total-price" name="total_price">₱
                        <?php $totalSubtotal= $totalSubtotal+50;
                        echo number_format($totalSubtotal, 2, '.', ''); ?>
                    </p>

                </div>
                <p class="tax-info">Including shipping fee*</p>
            </div>
        </aside>
    </main>
</body>
</html>
