<?php include 'includes/session.inc.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXHOLM®</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="about_us.css">
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
                                echo '<li><a href="signup.php" class="login">Create Account</a></li>';
                            }
                            
                            ?>
                        </ul> 
                    </div>
                </div>
                <!-- <a href="search.php"><i class="fa-solid fa-magnifying-glass"></i></a> -->
                 
                <a href='cart.php'><i class='fa-solid fa-cart-shopping'></i></a>
                <div><i class='bx bx-menu' id="menu-icon"></i></div>
        
    </header>


    <section class="story">
        <h1>Team Luxholm's Story</h1>
        <p>Self expression is a basic human need and desire. All of us 
            want to be recognized in our own way. We show it through how we
             talk, how we look, and what we create. This was the truth recognized
              by AINS when they created FEF clothing. 
              Fresh out of college with bright ideas, these two and a team of
               others brought to life their dream of starting their own fashion
                line. They possessed a passion for music festivals and apparel, 
                which is what anyone who wanted to start a rave clothing brand 
                needed. However, they learned the hard way that it wasn’t 
                ALL they needed. They had the followers and the support of their
                 friends and family but upon launch, there was an immediate 
                 struggle in pushing sales and making quota. Eventually, their 
                 other partners left the business and FEF, just like the musical
                  festival scene in the country, died out. With that failure, AINS 
                  gave up on their dream forever.</p>
        <p>That’s what happened in an alternate universe. In this universe, however, 
            they mourned their first endeavour but their grit would not let the dream
             lay to rest.</p>
        <p>They both knew that setbacks were part of the process but only if you 
            learned from them. Starting from scratch is always a heavy blow to anyone 
            and they were no exception. It would be a lie to say that they didn’t 
            consider following the corporate road but that would mean killing what
             they knew they were at heart - entrepreneurs. From their first venture
              they learned a multitude of lessons that we are more than willing to
               share with you.</p>

        <div class="lessons">
            <div class="lesson">
                <h2>Lesson number one: Be an active dreamer.</h2>
                <p>To do this, you gotta get people to believe in 
                    your goal as much as you do. That means being 
                    your own biggest hype man. The first real test of
                     any entrepreneur is acquiring capital and investors 
                     can tell how confident you are with THEIR money.</p>
            </div>

            <div class="lesson">
                <h2>Lesson number two: Put others first.</h2>
                <p>Everyone thinks that owning a company is 
                    all about taking vacations and barking 
                    orders. For the second lesson you need 
                    to know that when you run a business it’s
                     the needs of your investors, your employees, 
                     and your customers that come first. When your 
                     job is to steer everyone in the right direction, 
                     every mistake becomes your fault. So know your 
                     objective and don’t half-a** the process because 
                     everyone is riding on you.</p>
            </div>

            <div class="lesson">
                <h2>Lesson number three: Don’t chase money.</h2>
                <p>The third lesson you should know is that if you want
                     to start a clothing line, do NOT do it with money 
                     as the goal. Not to say that you ain’t gonna get 
                     that bread in this industry but making clothes just
                      for the cash is a young man’s game. Like reselling
                       shoes, you won’t be making an impact or finding 
                       any fulfilment. If all you want to do is get rich,
                        there are easier ways to earn that require much 
                        less capital and struggle.</p>
            </div>

            <div class="lesson">
                <h2>Lesson number four: Find your edge.</h2>
                <p>The biggest struggle of a clothing line, or any business
                    for that matter, is finding an edge. The local fashion
                    industry is indeed growing but we are still miles behind
                    the rest of the world. We need to do more than play copycat
                    with the established names but all local clothing lines 
                    know that we are limited by the supply of fabrics. Yu knew
                    this and he found an opportunity for innovation. By contacting
                    and partnering with a knitting mill, they created a fabric blend
                    exclusive to Skoop. But that’s not enough to stand out among the
                    hundreds of competitors. Every brand needs to stand for something.</p>
            </div>
        </div>

        <p>Luxholm was founded on the idea of creating the Kommunity and telling stories 
        through design. The protagonist of each story is you, the wearer. You’re more than
         who you are today but you need to Skoop out the part of you that’s meant for 
         greatness and work on it. Murayama and Yu are who they are now because they failed
          and they learned. Skoop has taken many steps back and even more steps forward. 
          But it’s not yet where it needs to be and that goes the same for each and every 
          one of our patrons. Remember, no matter how much you struggle, failure is only 
          the end when you decide to give up.</p>

        <p class="team-signature">-Team Luxholm</p>
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
                    <a href="signup." class="Signup">Sign Up Now!</a>
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
