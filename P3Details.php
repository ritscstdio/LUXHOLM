<?php include 'includes/session.inc.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXHOLM®</title>
    <link rel="stylesheet" href="Home.css">
    <link rel="stylesheet" href="shop.css"> 
    <link rel="stylesheet" href="Details.css">
    <link rel="icon" type="image/jpg" href="images/images/favicons.png">
    <link rel="stylesheet" type="text/css" href="scrollbar.css">

    <script src="https://kit.fontawesome.com/c708df1d15.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
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
                <!-- <a href="search.php"><i class="fa-solid fa-magnifying-glass"></i></a> -->
                
                <a href='cart.php'><i class='fa-solid fa-cart-shopping'></i></a>
                
                
                <div><i class='bx bx-menu' id="menu-icon"></i></div>
            </div>
        </div>


    </header>

    
    <section>
    <div class="container">
        <nav>
            <a href="home">Home</a> >
            <a href="shop">Products</a> >
            <a href="#">Men's</a> 
        </nav>
    <div>
    
        <div class="small-container single-product">
            <div class="row">
                <div class="col-2">

                    <img src="images/Product3.webp" width="50%" id="ProductImg">
                    <div class="small-img-row">
                    <div class="small-img-col">
                            <img src="images/Product3.webp" width="50%" class="small-img">
                        </div>
                        <div class="small-img-col">
                            <img src="images/Product3(2).webp" width="50%" class="small-img">
                        </div>
                        <div class="small-img-col">
                            <img src="images/Product3(3).jpg" width="50%" class="small-img">
                        </div>
                        <div class="small-img-col">
                            <img src="images/Product3(4).webp" width="50%" class="small-img">
                    </div>
                </div>
                </div>
                <div class="col-2">
                    <form action="includes/addcart.inc.php" method="POST">
                        <h1>LUXHOLM® Greed Gang Shirt</h1>
                        <h4>₱1,299.00</h4>
                        <p>Size:</p>
                        <select name="size">
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                            <option>XXL</option>
                        </select>
                        <input type="number" value="1" name="quantity">
                        <button type="submit" class="btn">Add to Cart</button>
                        <!-- Hidden input fields -->
                        <input type="hidden" name="name" value="LUXHOLM® Greed Gang Shirt">
                        <input type="hidden" name="price" value="1299.00">
                        <input type="hidden" name="img_src" value="images/Product3.webp">
                    </form>

                    <h3 style="margin-top: 20px;">Product Details:</h3>
                    <p><b>Description:</b><br>The Greed Gang Shirt is a carefully
                         crafted piece using a custom cotton-polyester<br> blend, 
                         constructed using 36/2 CVC Single Construction method that 
                         ensures<br> durability and comfort. Features iconic Skoop elements 
                         including a Daruma-inspired<br> design; symbols of perseverance and
                        good luck.</p>

                    <p><b>Fabric Composition:</b><br>Crafted from a combination of 60% polyester and 40% cotton </p>
                    <p style="margin: 5px 0;"><b>Material:</b><br> Constructed using 36/2 CVC (Chief Value Cotton) </p>
                    <p style="margin: 5px 0;"><b>Printing Technique:</b><br>Silk-screen printing technique</p>
                    <p></p>
                    <p><b>Please note:</b><br>We try to make sure that the photos of our items accurately reflect the<br>
                        actual color of the item. However, due to varying monitor/device settings (brightness,<br>
                        contrast, saturation, etc...)  This piece may look slightly different in person from what<br>
                        you see on your screen </p>
                </div>
            </div>
            
        </div>

<!-- Js for product gallery -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ProductImg = document.getElementById("ProductImg");
        var SmallImg = document.getElementsByClassName("small-img");
    
        SmallImg[0].onclick = function() {
            ProductImg.src = SmallImg[0].src;
        }
        SmallImg[1].onclick = function() {
            ProductImg.src = SmallImg[1].src;
        }
        SmallImg[2].onclick = function() {
            ProductImg.src = SmallImg[2].src;
        }
        SmallImg[3].onclick = function() {
            ProductImg.src = SmallImg[3].src;
        }
    });
    </script>

    <div class="small-container">
    <div class="row">
        <a href="P1Details" class="col-1">
            <img src="images/Product1.webp">
            <h4 style="font-size: 15px;">LUXHOLM® Daruma Creed Shirt</h4>
            <p>₱1,299.00</p>
        </a>
        <a href="P2Details" class="col-1">
            <img src="images/Product2.webp">
            <h4 style="font-size: 15px;">LUXHOLM ® Checkered Jersey</h4>
            <p>₱1,595.00</p>
        </a>
        <a href="P4Details" class="col-1">
            <img src="images/Product4.webp">
            <h4 style="font-size: 15px;">LUXHOLM® FILA Own It Shirt</h4>
            <p>₱2,099.00</p>
        </a>
        <a href="P5Details" class="col-1">
            <img src="images/Product5.webp">
            <h4 style="font-size: 15px;">LUXHOLM® Ryuu Shirt</h4>
            <p>₱1,800.00</p>
        </a>
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
    </section>
    <script src="java.js"></script>

    </section>
    <section>
    <footer>
        <hr>
        <br>
        <br>
        <p>© Copyright, LUXHOLM Kommunity, 2024 Powered by AINS</p>
        <br>
        <br>
    </footer>
    </section>
</body>
</html>
