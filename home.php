    <?php include 'includes/session.inc.php'; ?>

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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <title>LUXHOLM®</title>
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
                        echo "<a href='account.php' class='navbar'>$first_name $last_name </a>";
                    }
                    ?>

                    <div class="user-icon-container">
                    <a><i class="fa-solid fa-user"></i></a>
                    <div class="user-dropdown">  
                        <ul>
                            <?php
              
                            if (isset($_SESSION['user_id'])) {
                              
                                echo "<a href='account.php' class='nav-email'>$user_email</a>";
                                echo '<li><a href="account" class="return-b">Account Details</a></li>';
                                echo '<li><a href="book" class="return-b">Book Addresses</a></li>';
                                echo '<li><a href="includes/logout.php" class="logout">Log out</a></li>';
                            } else {
                                echo '<li><a href="login" class="login">Log in</a></li>';
                                echo '<li><a href="signup" class="login">Create Account</a></li>';
                            }
                            
                            ?>
                        </ul> 
                    </div>
                </div>
                    <!-- <a href="search.php"><i class="fa-solid fa-magnifying-glass"></i></a> -->
                    
                    <a href='cart'><i class='fa-solid fa-cart-shopping'></i></a>
                    
            
                    <div><i class='bx bx-menu' id="menu-icon"></i></div>
                </div>            
            </div>
        </header>

        <!-- MALL BRANCHES -->
        <div class="mall-branches">
            <h1>Our Mall Branches</h1>
            <table>
            <tr>
                <th><img src="images/estancialogo.png" class="estancia-png"></th>
                <th><img src="images/smlogo.png" class="sm-png"></th>
                <th><img src="images/uptownlogo.png" class="ayala-png"></th>
                <th><img src="images/ayalalogo.png" class="uptown-png"></th>
            </tr>
            <tr>
                <td class="estancia">
                <h4>Estancia Mall</h4>
                <p>GROUND FLOOR<br>Beside CPNDAYSN<br>and WEST B.LM</p>
                <p>Estancia Mall Main Wing,<br>Ground Floor,<br>Meralco Ave,<br>Ortigas Center, Pasig,<br>1605 Metro Manila</p>
                </td>
                <td class="sm-north">
                <h4>SM North</h4>
                <p>SM THE BLOCK<br>(NORTEHEDRAL)<br>4TH FLOOR in front<br>of Vilanga</p>
                <p>North Avenue corner EDSA,<br>Quezon City,<br>1100 Metro Manila</p>
                </td>
                <td class="uptown">
                <h4>Uptown Mall</h4>
                <p>2ND FLOOR<br>Beside Sunnies Studios,</p>
                <p>Uptown Mall,<br>Bonifacio Global City,<br>9th Ave,<br>Taguig, Metro Manila</p>
                </td>
                <td class="ayala">
                <h4>ONE AYALA Mall</h4>
                <p>Unit 320 3rd Floor<br>Beside Hurley</p>
                <p>One Ayala Mall,<br>Ayala ave<br>Cor. Edsa Brgy San Lorenzo,<br>Makati City</p>
                </td>
            </tr>
            </table>
        </div>

        <section class="marquee-container">
        <marquee class="marquee-text" behavior="scroll" direction="left" scrollamount="14.375">
        EXPERIENCE THE BEST IN FASHION WITH LUXHOLM® - HIGH-QUALITY CLOTHES AND EXCEPTIONAL SERVICE! ELEVATE YOUR WARDROBE AND ADD TO CART TODAY.</marquee>
        </section>

        <section class="main-home">
            <div class="main-text">
                <h5>LUXHOLM®</h5>
                <h1>Retail Therapy<br>Collection</h1>
                <p>Embrace your emotions and emerge stronger-<br>step into the transformative world of LUXHOLMS'<br> Retail Therapy Collection, where fashion meets<br> emotional resilience.</p>
                
                <a href="shop" class="shop-now">Shop now</a>
            </div>
            <div class="down-arrow">
                <a href="#trending" class="down"><i class="fa-solid fa-arrow-down"></i></a>
            </div>
        </section>

        <section class="main-banner">
            <div class="banner"></div>
        </section>

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
                    <div class="product-image   ">
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
            </div>
        </section>
        <section>

            
        </section>
        
        <hr>
        <section class="contact">
            <div class="contact-info">
                <div class="first-info">
                    <a href="home.php" class="logo"><img src="images/images/Logo.png">
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