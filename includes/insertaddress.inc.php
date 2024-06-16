<?php
include 'protected_session.inc.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $address_1 = $_POST['address-1'];
    $address_2 = $_POST['address-2'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $postal_code = $_POST['postal-code'];
    $phone = $_POST['phone'];

    try {
        require_once "dbh.inc.php";

        // Set PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL statement
        $stmt = $pdo->prepare("INSERT INTO user_address (user_id, first_name, last_name, address_1, address_2, street, city, province, postal_zip_code, phone) VALUES (:user_id, :first_name, :last_name, :address_1, :address_2, :street, :city, :province, :postal_code, :phone)");
        
        // Bind parameters
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':address_1', $address_1);
        $stmt->bindParam(':address_2', $address_2);
        $stmt->bindParam(':street', $street);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':province', $province);
        $stmt->bindParam(':postal_code', $postal_code);
        $stmt->bindParam(':phone', $phone);
        
        // Execute statement
        $stmt->execute();

        header("Location: ../book");
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close connection
    $pdo = null;
}
?>
