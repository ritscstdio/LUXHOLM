<?php
include 'includes/protected_session.inc.php';
include 'includes/fetchaddress.inc.php';
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="stylesheet" href="home.css">
    <link rel="icon" type="image/jpg" href="images/images/favicons.png">
    <link rel="stylesheet" type="text/css" href="scrollbar.css">
    <script src="https://kit.fontawesome.com/c708df1d15.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="book.css">
    <title>LUXHOLM® Account</title>
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
                    echo "<a href='account' class='navbar'>$first_name $last_name </a>";
                }
                ?>
                <div class="user-icon-container">
                    <a><i class="fa-solid fa-user"></i></a>
                    <div class="user-dropdown">  
                        <ul>
                            <?php
              
                            if (isset($_SESSION['user_id'])) {
                              
                                echo "<a href='account' class='nav-email'>$user_email </a>";
                                echo '<li><a href="account" class="return-b">Account Details</a></li>';
                                echo '<li><a href="book" class="return-b">Book Addresses </a></li>';
                                echo '<li><a href="includes/logout.php" class="logout">Log out</a></li>';
                            } else {
                                echo '<li><a href="login" class="login">Log in</a></li>';
                                echo '<li><a href="signup" class="signup">Create Account</a></li>';
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
            <a href="account">Account</a> >
            <a href="#">Address</a>
        </nav>
        <a href="account" class="return-link">Return To Account Details</a>
        <h1>Shipping location</h1>


        <!-- DETAILS -->
        <?php if (!empty($addresses)): ?>
            <?php foreach ($addresses as $address): ?>
                <div class="address">
                    <p><strong>Name:</strong> <?= $address['first_name'] ?> <?= $address['last_name'] ?></p>
                    <p><strong>Address 1:</strong> <?= $address['address_1'] ?></p>
                    <p><strong>Address 2:</strong> <?= $address['address_2'] ?></p>
                    <p><strong>Street:</strong> <?= $address['street'] ?></p>
                    <p><strong>City:</strong> <?= $address['city'] ?></p>
                    <p><strong>Province:</strong> <?= $address['province'] ?></p>
                    <p><strong>Postal / ZIP code:</strong> <?= $address['postal_zip_code'] ?></p>
                    <p><strong>Phone:</strong> <?= $address['phone'] ?></p>
                    <div class="buttons">
                        
                    <!-- REMOVE ADDRESS FUNCTION -->
                    <a href="#" onclick="removeAddress('<?= $address['address_id'] ?>')" class="edit-address">Remove Address</a>
                        
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No address found. Submit a shipping address to order now!</p>
            
            <!-- SPACE LMAO -->
                <h1></h1>

                    <!-- Add new address link -->
        <a class="add-new-address" href="create_address.php">Add New Address</a>
        <?php endif; ?>


        
        
    </div>

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

        
    </section>
    <footer>
        <hr>
        <br>
        <br>
        <p>© Copyright, LUXHOLM Kommunity, 2024 Powered by AINS</p>
        <br>
        <br>
    </footer>

    <script src="java.js"></script>
    <script>
        function removeAddress(addressId) {
            console.log("Removing address with ID: " + addressId);
            window.location.href = "includes/removeaddress.inc.php?address_id=" + addressId;
        }


        function addAddress() {
            console.log("Adding a new address");
            window.location.href = "add_address.php";
        }
    </script>
</body>
</html>
