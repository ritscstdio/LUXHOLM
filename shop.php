<?php include 'includes/session.inc.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXHOLM®</title>
    <link rel="stylesheet" href="Home.css">
    <link rel="stylesheet" href="shop.css">
    <link rel="icon" type="image/jpg" href="images/images/favicons.png">
    <link rel="stylesheet" type="text/css" href="scrollbar.css">

    <link rel="stylesheet" type="text/css" href="scrollbar.css">
    <script src="https://kit.fontawesome.com/c708df1d15.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .product-grid a.col-1 {
    flex: 0 0 calc(25% - 20px); /* Maintain flexibility */
    max-width: calc(25% - 20px); /* Maximum width */
    width: calc(25% - 20px); /* Actual width */
    box-sizing: border-box;
    text-align: center;
    text-decoration: none;
    color: black;
}
        .product-grid a.col-1 img {
            width: 100%;
            height: auto;
        }
        .product-grid a.col-1 h4 {
            margin: 10px 0 5px;
        }
        .product-grid a.col-1 p {
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
                                echo '<li><a href="signup" class="login">Create Account</a></li>';
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
            <a href="shop.php">Products</a> 

            
        </nav>
        <div class="small-container">
            <h2>All Products</h2>
            <div class="row-1">
                <p>Sort by:</p>
                <select id="sort-select">
                    <option>Trending</option>
                    <option>Alphabetically, A-Z</option>
                    <option>Alphabetically, Z-A</option>
                    <option>Price, low to high</option>
                    <option>Price, high to low</option>
                </select>
            </div>
            <div id="product-list" class="product-grid">
                <!-- Products will be inserted here by JavaScript -->
            </div>
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
        </div>
    </section>
    <section>
    <script src="java.js"></script>
        <footer>
            <hr>
            <br>
            <br>
            <p>© Copyright, LUXHOLM Kommunity, 2024 Powered by AINS</p>
            <br>
            <br>
        </footer>
    </section>
    <script>
            
        document.addEventListener('DOMContentLoaded', () => {
            const productList = document.getElementById('product-list');
            const sortSelect = document.getElementById('sort-select');

            const products = [
                { id: "P1", name: "Daruma Creed Shirt", price: 1299, trending: true, image: "images/Product1.webp", detailsLink: "P1Details" },
                { id: "P2", name: "Checkered Jersey", price: 1595, trending: false, image: "images/Product2.webp", detailsLink: "P2Details" },
                { id: "P3", name: "Greed Gang Shirt", price: 1299, trending: true, image: "images/Product3.webp", detailsLink: "P3Details" },
                { id: "P4", name: "FILA Own It Shirt Black", price: 2099, trending: false, image: "images/Product4.webp", detailsLink: "P4Details" },
                { id: "P5", name: "Ryuu Shirt Dark Blue", price: 1800, trending: false, image: "images/Product5.webp", detailsLink: "P5Details" },
                { id: "P6", name: "Retail Therapy Hoodie Tan", price: 2695, trending: true, image: "images/Product6.webp", detailsLink: "P6Details" },
                { id: "P7", name: "Nero Team Skoop Sweater Onyx", price: 2499, trending: false, image: "images/Product7.webp", detailsLink: "P7Details" },
                { id: "P8", name: "Nero Crew Neck Shirt Onyx", price: 1799, trending: false, image: "images/Product8.webp", detailsLink: "P8Details" },
                { id: "P9", name: "Daruma Creed Shirt Milk White", price: 1299, trending: true, image: "images/Product9.webp", detailsLink: "P9Details" },
                { id: "P10", name: "SKOOP® Evergreen Shirt Milk White", price: 1299, trending: false, image: "images/Product10.webp", detailsLink: "P10Details" }
            ];

            function displayProducts(sortedProducts) {
                productList.innerHTML = '';
                sortedProducts.forEach(product => {
                    const productElement = document.createElement('a');
                    productElement.className = 'col-1';
                    productElement.href = product.detailsLink;
                    productElement.id = product.id;
                    productElement.dataset.name = product.name;
                    productElement.dataset.price = product.price;
                    productElement.dataset.trending = product.trending;

                    productElement.innerHTML = `
                        <img src="${product.image}">
                        <h4>${product.name}</h4>
                        <p>₱${product.price}.00</p>
                    `;
                    productList.appendChild(productElement);
                });
            }

            function sortProducts(criteria) {
                let sortedProducts;
                switch(criteria) {
                    case 'Trending':
                        sortedProducts = products.filter(product => product.trending);
                        break;
                    case 'Alphabetically, A-Z':
                        sortedProducts = [...products].sort((a, b) => a.name.localeCompare(b.name));
                        break;
                    case 'Alphabetically, Z-A':
                        sortedProducts = [...products].sort((a, b) => b.name.localeCompare(a.name));
                        break;
                    case 'Price, low to high':
                        sortedProducts = [...products].sort((a, b) => a.price - b.price);
                        break;
                    case 'Price, high to low':
                        sortedProducts = [...products].sort((a, b) => b.price - a.price);
                        break;
                    default:
                        sortedProducts = products;
                        break;
                }
                displayProducts(sortedProducts);
            }

            sortSelect.addEventListener('change', (e) => {
                sortProducts(e.target.value);
            });

            displayProducts(products);
        });
    </script>
</body>
</html>
