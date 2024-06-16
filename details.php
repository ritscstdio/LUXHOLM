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
                        <li><a href="about-us.html">ABOUT US</a></li>
                    </ul>
                </nav>
            </div>
            <div class="nav-icons">
                <div class="user-icon-container">
                    <a><i class="fas fa-user"></i></a>
                    <div class="user-dropdown">
                        <ul>
                            <li><a href="login" class="login">Log in</a></li>
                            <li><a href="signup" class="Signin">Create Account</a></li>
                        </ul>
                    </div>
                </div>
                <a href="#"><i class="fas fa-search"></i></a>
                
                <a href='cart.php'><i class='fa-solid fa-cart-shopping'></i></a>
                    
                <div><i class='bx bx-menu' id="menu-icon"></i></div>
            </div>
        </div>
    </header>
    <section>
        <div class="small-container single-product">
            <div class="row">
                <div class="col-2">
                    <img src="images/Product1.jpg" width="50%">
                </div>
                <div class="col-2"></div>
                <h1>Grey T-shirt</h1>
                <h4>1,000php</h4>
                <p>Size:</p>
                <select>
                    <option>S</option>
                    <option>M</option>
                    <option>L</option>
                    <option>XL</option>
                    <option>XXL</option>
                </select>
                <a href="" class="btn">Add to Cart</a>

                <h3>Product Details</h3>
                <p>blah blah blah</p>
            </div>

        </div>


    <div class="small-container">
    <div class="row">
        <div class="col-1">
            <img src="images/Product1.jpg">
            <h4>Grey Polo</h4>
            <p>20php</p>
        </div>
        <div class="col-1">
            <img src="images/Product1.jpg">
            <h4>Grey Polo</h4>
            <p>20php</p>
        </div><div class="col-1">
            <img src="images/Product1.jpg">
            <h4>Grey Polo</h4>
            <p>20php</p>
        </div><div class="col-1">
            <img src="images/Product1.jpg">
            <h4>Grey Polo</h4>
            <p>20php</p>
    </div>
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
