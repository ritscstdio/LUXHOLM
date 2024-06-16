<?php
session_start();

if (empty($_SESSION['user_id'])) {
    header("Location: ../login.php"); // Redirect to the login page or another page
    exit(); // Stop further execution of the script
}

// Check if form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data with checks for undefined keys
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $price = isset($_POST['price']) ? floatval($_POST['price']) : 0.0;
    $size = isset($_POST['size']) ? htmlspecialchars($_POST['size']) : '';
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;
    $img_src = isset($_POST['img_src']) ? htmlspecialchars($_POST['img_src']) : '';


    // Validate data (basic validation, you can add more)
    if (!empty($name) && $price > 0 && !empty($size) && $quantity > 0 && !empty($img_src)) {
        // Insert into database
        try {
            require_once "dbh.inc.php";

            $user_id = $_SESSION['user_id'];

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("INSERT INTO shopping_cart_item (user_id, name, price, size, qty, img_src) VALUES ($user_id, ?, ?, ?, ?, ?)");
            $stmt->execute([$name, $price, $size, $quantity, $img_src]);            

            header("Location: ../cart");
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Invalid input data.";
    }
} else {
    echo "Invalid request method.";
}
?>
