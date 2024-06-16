<?php include 'includes/session.inc.php'; 
    if(isset($_SESSION['user_id'])) {
    // Redirect to home.php if the session is set
    header("Location: ../home");
    exit; // Make sure to exit after the redirection
    }
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="login.css">
    <link rel="icon" type="image/jpg" href="images/images/favicons.png">
    <link rel="stylesheet" type="text/css" href="scrollbar.css">

    <link rel="stylesheet" type="text/css" href="scrollbar.css">
    <script src="https://kit.fontawesome.com/c708df1d15.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    
    
    <title>LUXHOLM®</title>
</head>
<body>
   
    <header>
        <dev class="header-container">  
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
            
            <!-- I think this part is unnecessary -->
            <div class="nav-icons">
                <!-- <div class="user-icon-container">
                    <a><i class="fa-solid fa-user"></i></a>
                    <div class="user-dropdown">
                        <ul>
                            <li><a href="login" class="login">Log in</a></li>
                            <li><a href="signup" class="Signin">Create Account</a></li>
                        </ul>
                    </div>
                </div>
                <a href="idk pa"><i class="fa-solid fa-magnifying-glass"></i></a>
                <a href="cart"><i class="fa-solid fa-cart-shopping"></i></a>
                <div><i class='bx bx-menu' id="menu-icon"></i></div> -->
            </div>

            
        </div>
        </dev>
    </header>
    
        <div>
        
        <div class="login-form-container"> 
            
        <div class="Center">
            <h1>Login</h1>
            <h4>Welcome back to the Kommunity!</h4>

            <!-- LOGIN FORM -->
            <form action="includes/login.inc.php" method="post">
            
                <div class="txt_field">
                    <input type="text" name="email" required>
                    <label>E-mail</label>
                </div>

                <div class="txt_field">
                    <input type="password" name="pwd" required>
                    <label>Password</label>
                </div>
                <?php 
                    if(isset($_SESSION['login_error'])) {
                        echo '<div class="Create">' . $_SESSION['login_error'] . '</div>';
                        unset($_SESSION['login_error']); // Remove the error message after displaying it
                    }
                ?>
                
                <input type="submit" value="Sign in">
                <div class="Create">
                    New Customer? <a href="signup"> Create Account</a>
                </div>
            </form>
            
        </div>
        </div>
        </div>
        <script src="java.js"></script>   
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