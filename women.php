<?php include 'includes/session.inc.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXHOLM® - Women</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="shop.css">
    <link rel="icon" type="image/jpg" href="images/images/favicons.png">
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
            flex: 0 0 calc(25% - 20px);
            max-width: calc(25% - 20px);
            width: calc(25% - 20px);
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
            <a href="home" class="logo"><img src="images/images/Logo.png" alt="LUXHOLM Logo"></a>
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
            </div>
        </div>
    </header>
    <div class="container">
        <nav>
            <a href="home">Home</a> >
            <a href="shop.php">Products</a>  >
            <a href="#">Women's</a> 
            
        </nav>
    </div>
    <section>
        <div class="small-container">
            <h2>Women's Products</h2>
            <div class="row-1">
                <p>Sort by:</p>
                <select id="women-sort-select">
                    <option value="Trending">Trending</option>
                    <option value="Alphabetically, A-Z">Alphabetically, A-Z</option>
                    <option value="Alphabetically, Z-A">Alphabetically, Z-A</option>
                    <option value="Price, low to high">Price, low to high</option>
                    <option value="Price, high to low">Price, high to low</option>
                </select>
            </div>
            <div id="women-product-list" class="product-grid">
                <!-- Women's products will be inserted here by JavaScript -->
            </div>
        </div>
    </section>

    <hr>
    <section class="contact">
        <div class="contact-info">
            <div class="first-info">
                <a href="home" class="logo"><img src="images/images/Logo.png" alt="LUXHOLM Logo"></a>
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
    <script src="java.js"></script>
    <footer>
        <hr>
        <br>
        <p>© Copyright, LUXHOLM Kommunity, 2024 Powered by AINS</p>
        <br>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const womenProductList = document.getElementById('women-product-list');
            const womenSortSelect = document.getElementById('women-sort-select');

            const womenProducts = [
                { id: "P7", name: "Nero Team Skoop Sweater Onyx", price: 2499, trending: false, image: "images/Product7.webp", detailsLink: "P7Details" },
                { id: "P8", name: "Nero Crew Neck Shirt Onyx", price: 1799, trending: false, image: "images/Product8.webp", detailsLink: "P8Details" },
                { id: "P9", name: "Daruma Creed Shirt Milk White", price: 1299, trending: true, image: "images/Product9.webp", detailsLink: "P9Details" },
                { id: "P10", name: "SKOOP® Evergreen Shirt Milk White", price: 1299, trending: true, image: "images/Product10.webp", detailsLink: "P10Details" }
            ];

            function displayProducts(productList, products) {
                productList.innerHTML = '';
                products.forEach(product => {
                    const productElement = document.createElement('a');
                    productElement.className = 'col-1';
                    productElement.href = product.detailsLink;
                    productElement.id = product.id;
                    productElement.dataset.name = product.name;
                    productElement.dataset.price = product.price;
                    productElement.dataset.trending = product.trending;

                    productElement.innerHTML = `
                        <img src="${product.image}" alt="${product.name}">
                        <h4>LUXHOLM®${product.name}</h4>
                        <p>₱${product.price.toLocaleString()}</p>
                    `;
                    productList.appendChild(productElement);
                });
            }

            function sortProducts(sortValue, products) {
                let sortedProducts;
                switch (sortValue) {
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
                    case 'Trending':
                    default:
                        sortedProducts = products.filter(product => product.trending).concat(products.filter(product => !product.trending));
                        break;
                }
                return sortedProducts;
            }

            womenSortSelect.addEventListener('change', (e) => {
                const sortedWomenProducts = sortProducts(e.target.value, womenProducts);
                displayProducts(womenProductList, sortedWomenProducts);
            });

            displayProducts(womenProductList, womenProducts);
        });
    </script>
</body>
</html>
