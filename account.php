<?php include 'includes/protected_session.inc.php'; ?>
<?php include 'includes/fetchaddress.inc.php'; ?>

<?php
try {
    //CREATE NEW PDO OBJECT
    $pdo2 = new PDO($dsn, $dbusername, $dbpassword);

    $pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Assuming $_SESSION['user_id'] contains the user's ID after they log in
    $user_id = $_SESSION['user_id'];

    // Fetch orders associated with the user's user_id
    $stmt = $pdo2->prepare("SELECT * FROM shop_order WHERE user_id = ?");
    $stmt->execute([$user_id]);

    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html>
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXHOLM®</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="account1.css">
    <link rel="icon" type="image/jpg" href="images/images/favicons.png">
    <link rel="stylesheet" type="text/css" href="scrollbar.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://kit.fontawesome.com/c708df1d15.js" crossorigin="anonymous"></script>
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
                        <li><a href="Women">WOMEN</a></li>
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
                    echo "<a href='account' class='navbar'>$first_name $last_name </a>";
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
            <a href="#">Account</a> 
            
        </nav>
    <main>
        
    <section class="welcome">
        <h2>Welcome to Your Account</h2>
            <h3>Order History</h3>

            <!-- Display Order History -->
            <?php if (!empty($orders)): ?>
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
            <?php else: ?>
                <p>No orders found.</p>
            <?php endif; ?>
        
    </section>

    <section class="account-details">    
    <!-- ACCOUNT DETAILS -->
        <h1>Account Details</h1>
        <div class="account-info">
        <h3><?php echo isset($first_name) ? $first_name : 'First Name'; ?> <?php echo isset($last_name) ? $last_name : 'Last Name'; ?></h3>
        <p><?php echo isset($user_email) ? $user_email : 'Email'; ?></p>
            
            <?php if (!empty($addresses)): ?>

                <ul>
                    <?php foreach ($addresses as $address): ?>
                        <li>
                            <p>
                                <?php echo $address['address_1'];?>
                                <?php if (!empty($address['address_2'])) echo ', ' . $address['address_2']; ?>
                                <?php echo ', ' . $address['city'] . ', ' . $address['province'] . ', ' . $address['postal_zip_code']; ?>
                            </p>
                            <p><?php echo $address['phone'];?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No addresses found.</p>
            <?php endif; ?>
   
        <a href="book" class="button">View Address</a>
        </div>
    </section>
        </main>
    </div>
        
    
    <!--Best Sellers-->
    <section class="product" id="trending"> 
        <h2 class="product-category">Best Sellers</h2>
        <button class="pre-btn"><img src="images/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="images/arrow.png" alt=""></button>
        <div class="product-container">
            <div class="product-card">
                <div class="product-image">
                    <img src="images/Product1.webp" class="product-thumb" alt="">
                    <a href="P1Details" class="card-btn">Shop now</a>
                </div>
                <div class="product-info">
                    <p class="product-short-description">LUXHOLM® Daruma Creed Shirt</p>
                    <span class="price">₱1,299.00</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="images/Product2.webp" class="product-thumb" alt="">
                    <a href="P2Details" class="card-btn">Shop now</a>
                </div>
                <div class="product-info">
                    <p class="product-short-description">LUXHOLM ® Checkered Jersey</p>
                    <span class="price">₱1,595.00</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="images/Product3.webp" class="product-thumb" alt="">
                    <a href="P3Details" class="card-btn">Shop now</a>
                </div>
                <div class="product-info">
                    <p class="product-short-description">LUXHOLM® FILA Own It Shirt</p>
                    <span class="price">₱2,099.00</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="images/Product4.webp" class="product-thumb" alt="">
                    <a href="P4Details" class="card-btn">Shop now</a>
                </div>
                <div class="product-info">
                    <p class="product-short-description">LUXHOLM® FILA Own It Shirt</p>
                    <span class="price">₱2,099.00</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="images/Product5.webp" class="product-thumb" alt="">
                    <a href="P5Details" class="card-btn">Shop now</a>
                </div>
                <div class="product-info">
                    <p class="product-short-description">LUXHOLM® Ryuu Shirt</p>
                    <span class="price">₱1,800.00</span>
                </div>
            </div>
        </div>
    </section>
    <section>
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
                <a href="signup.php" class="Signup">Sign Up Now!</a>
                <p class="by-sub">By subscribing you agree to the Terms of Use and Privacy Policy.</p>
                <div class="social-icon">
                    <a href="https://www.facebook.com/luxholm.philippines" target="_blank" ><i class="fa-brands fa-facebook"></i></a>
                        <a href="https://www.instagram.com/luxholm.ph/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <script src="java.js"></script>
    </section>
    <footer>
        <hr>
        <br>
        <br>
        <p>© Copyright, LUXHOLM Kommunity, 2024 Powered by AINS</p>
        <br>    
        <br>
    </footer>
</body>
</html>
