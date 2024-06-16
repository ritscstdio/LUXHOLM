<?php include 'includes/protected_session.inc.php'; ?>
<?php
try {
    require_once "includes/dbh.inc.php";

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Assuming $_SESSION['user_id'] contains the user's ID after they log in
    $user_id = $_SESSION['user_id'];

    // Fetch shopping cart items associated with the user's user_id
    $stmt = $pdo->prepare("SELECT * FROM shopping_cart_item WHERE user_id = ?");
    $stmt->execute([$user_id]);
    
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
$totalSubtotal = 0; // Initialize total subtotal

foreach ($products as $product) {
    // Calculate subtotal for each product
    $subtotal = $product['price'] * $product['qty'];
    $totalSubtotal += $subtotal; // Add subtotal to total

}


    
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXHOLM®</title>
    <link rel="stylesheet" href="Home.css">
    <link rel="stylesheet" href="shop.css"> 
    <link rel="stylesheet" href="cart.css">
    <link rel="icon" type="image/jpg" href="images/images/favicons.png">
    <link rel="stylesheet" type="text/css" href="scrollbar.css">

    <script src="https://kit.fontawesome.com/c708df1d15.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <style>
    /* Hide the default number input buttons */
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }


</style>

</head>
<body>
    <header>
        <div class="header-container">  
            <a href="home" class="logo"><img src="images/images/Logo.png"></a>
            <div class="navbar-container">
                <nav>
                    <ul class="navbar">
                        <li><a href="home">HOME</a></li>
                        <li><a href="shop">SHOP</a></li>
                        <li><a href="men">MEN</a></li>
                        <li><a href="women">WOMEN</a></li>
                        <li><a href="about_us">ABOUT US</a></li>
                    </ul>
                </nav>
            </div>
            
            <div class="nav-icons">             
                <?php
                if (isset($_SESSION['user_id'])) {
                    $first_name = $_SESSION['first_name'];
                    $last_name = $_SESSION['last_name'];
                    $user_email = $_SESSION['user_email'];
                    echo "<a href='account.php' class='navbar'>$first_name $last_name </a>";
                }
                ?>

<div class="user-icon-container">
                    <a><i class="fa-solid fa-user"></i></a>
                    <div class="user-dropdown">  
                        <ul>
                            <?php
              
                            if (isset($_SESSION['user_id'])) {
                              
                                echo "<a href='account.php' class='nav-email'>$user_email </a>";
                                echo '<li><a href="account" class="return-b">Account Details</a></li>';
                                echo '<li><a href="book" class="return-b">Book Addresses </a></li>';
                                echo '<li><a href="includes/logout.php" class="logout">Log out</a></li>';
                            } else {
                                echo '<li><a href="login.php" class="login">Log in</a></li>';
                                echo '<li><a href="signup.php" class="signup">Create Account</a></li>';
                            }
                            
                            ?>
                        </ul> 
                    </div>
                </div>


               
                <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                <div><i class='bx bx-menu' id="menu-icon"></i></div>
            </div>
        </div>
    </header>

    <div class="container">
        <nav>
            <a href="home">Home</a> >
            <a href="shop">Products</a> >
            <a href="#">Cart</a> 
        </nav>
    </div>
    
    <section class="cart-section">
    <div class="cart-container">
        <div class="cart-header">
            <h1>Shopping Cart</h1>
            <a href="shop">Continue Shopping</a>
        </div>
        
        <!-- IF THERE IS NO PRODUCTS THEN... -->
        <?php if (empty($products)): ?>
            <p>Your shopping cart is empty.</p>
            
            <!-- IF THERE IS PRODUCTS THEN... -->
            <?php else: ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>

              <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <!-- PRODUCT IMG AND DETAILS -->
                        <td class="product-details">
                            <img src="<?php echo $product['img_src']; ?>" alt="<?php echo $product['name']; ?>">
                            <div>
                                <p><?php echo $product['name']; ?></p>
                                <p>Size: <?php echo $product['size']; ?></p>
                            </div>
                        </td>
                        <!-- PRICE -->

                        <td><?php 
                        echo "₱" . number_format($product['price'], 2, '.', ''); ?></td>
                        <!-- QUANTITY -->
                        <td>
                            <div class="quantity-control">
                                <button class="decrement">-</button>
                                <span class="quantity" data-id="<?= $product['id']; ?>"><?= $product['qty']; ?></span>
                                <button class="increment">+</button>
                            </div>
                        </td>
                        <!-- SUBTOTAL -->
                        <td><?php echo "₱" . $product['price'] * $product['qty']; ?></td>
                        
                        <!-- REMOVE PRODUCT BUTTON -->
                        <td><a href="includes/removecart.inc.php?remove_product=<?php echo $product['id']; ?>" class="remove">Remove</a></td>
                    </tr>
                    <?php endforeach; ?>
                   
                </tbody>

            </table>
            <!-- SUMMARY       -->
                        <div class="cart-summary">
                        <p>Total: ₱<span id="totalSubtotal"><?php echo number_format($totalSubtotal, 2, '.', ''); ?></span></p>
                        <p>Tax included. Shipping calculated at checkout.</p>
                            <div class="checkout-buttons">
                                <a class="checkout-btn" href="checkout">Go To Checkout</a>
                            </div>
                        </div>
            <?php endif; ?>
            
        </div>
    </section>
    
    <hr>
    <section class="contact">
        <div class="contact-info">
             <div class="first-info">
                <a href="home" class="logo"><img src="images/images/Logo.png"></a>
                <h4>Born and Raised Filipino</h4>
            </div>
            <div class="second-info">
                <h4></h4>
            </div>
            <div class="third-info">
                <h4></h4>
            </div>
            <div class="fourth-info">
                <h4></h4>
            </div>
            <div class="six">
                <p class="kommunity">JOIN THE KOMMUNITY!</p>
                <a href="signup" class="Signup">Sign Up Now!</a>
                <p class="by-sub">By subscribing you agree to the Terms of Use and Privacy Policy.</p>
                <div class="social-icon">
                <a href="https://www.facebook.com/luxholm.philippines" target="_blank" ><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com/luxholm.ph/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <hr>
        <br>
        <br>
        <p>© Copyright, LUXHOLM Kommunity, 2024 Powered by AINS</p>
        <br>
        <br>
    </footer>

<!-- SCRIPTS -->
    <script src="java.js"></script>
            <script>
        document.addEventListener("DOMContentLoaded", function() {
            const incrementButtons = document.querySelectorAll(".increment");
            const decrementButtons = document.querySelectorAll(".decrement");

            function updateQuantity(id, qty) {
                fetch('includes/updatecart.inc.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id: id, qty: qty })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        updateSubtotals();
                        updateTotalSubtotal();
                    } else {
                        console.error('Error updating quantity:', data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
            }

            incrementButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const quantitySpan = button.parentElement.querySelector(".quantity");
                    let qty = parseInt(quantitySpan.textContent) + 1;
                    quantitySpan.textContent = qty;
                    const id = quantitySpan.getAttribute("data-id");
                    updateQuantity(id, qty);
                });
            });

            decrementButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const quantitySpan = button.parentElement.querySelector(".quantity");
                    let qty = parseInt(quantitySpan.textContent);
                    if (qty > 1) {
                        qty--;
                        quantitySpan.textContent = qty;
                        const id = quantitySpan.getAttribute("data-id");
                        updateQuantity(id, qty);
                    }
                });
            });

            function updateTotalSubtotal() {
                let totalSubtotal = 0;
                document.querySelectorAll("tbody tr").forEach(row => {
                    const price = parseFloat(row.querySelector("td:nth-child(2)").textContent.replace('₱', ''));
                    const qty = parseInt(row.querySelector(".quantity").textContent);
                    totalSubtotal += price * qty;
                });
                document.getElementById("totalSubtotal").textContent = totalSubtotal.toFixed(2);
            }

            function updateSubtotals() {
                document.querySelectorAll("tbody tr").forEach(row => {
                    const price = parseFloat(row.querySelector("td:nth-child(2)").textContent.replace('₱', ''));
                    const qty = parseInt(row.querySelector(".quantity").textContent);
                    const subtotal = price * qty;
                    row.querySelector("td:nth-child(4)").textContent = "₱" + subtotal.toFixed(2);
                });
            }

            updateSubtotals();
            updateTotalSubtotal();
        });

        </script>
    
</body>
</html>
