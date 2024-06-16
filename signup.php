<?php
include_once 'includes/dbh.inc.php';
include 'includes/session.inc.php';

if (isset($_SESSION['user_id'])) {
    // Redirect to home.php if the session is set
    header("Location: home");
    exit; // Make sure to exit after the redirection
}

$error = ""; // Initialize error variable

// Check if there's a signup error message
if (isset($_SESSION['signup_error'])) {
    $error = $_SESSION['signup_error'];
    // Clear the error message from session to avoid displaying it again
    unset($_SESSION['signup_error']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    // Check if email address is already in use and doesn't end with gmail.com
    $sql = "SELECT * FROM users WHERE user_email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if ($user) {
        // Email already exists
        $error = "Email address already in use.";
    } elseif (!preg_match('/@gmail\.com$/', $email)) {
        // Email doesn't end with gmail.com
        $error = "Invalid email address format. Please use a Gmail account.";
    } else {
        // Proceed with user registration
        // Your registration logic here
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="stylesheet" href="Home.css">
    <link rel="stylesheet" href="Signup.css">
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

            <div class="nav-icons">
            </div>
        </div>
        </dev>
    </header>
        <div class="login-form-container"> 
        <div class="Center">
            <h1>Create Account</h1>
            <h4>Welcome to the Kommunity!</h4>
            
           

            <!--SIGNUP FORM-->
            <form action="includes/formhandler.inc.php" method="POST">
                <div class="txt_field">
                    <input type="text" name = "fname" required>
                    <label>First Name</label>
                </div>
                <div class="txt_field">
                    <input type="text" name = "lname" required>
                    <label>Last Name</label>
                </div>
                <div class="txt_field">
                    <input type="text" name = "email" required>
                    <label>E-mail</label>
                </div>
                <div class="txt_field">
                    <input type="password" name = "pwd" required>
                    <label>Password</label>
                </div>

                <input type="submit" value="Create Account">
                <?php if (!empty($error)): ?>
                    <div class="Create-acc"><?php echo $error; ?></div>
                <?php endif; ?>
                            
                <div class="Create-acc">
                    Already have an account? <a href="login">Log in</a>
                </div>
                    
            </form>
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