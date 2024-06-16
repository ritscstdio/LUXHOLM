<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['address_id'])) {
    try {
        // Create a new PDO instance
        require_once('dbh.inc.php');

        // Set PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL statement
        $stmt = $pdo->prepare("DELETE FROM user_address WHERE address_id = :address_id AND user_id = :user_id");
        
        // Bind parameters
        $stmt->bindParam(':address_id', $_GET['address_id']);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        
        // Execute statement
        $stmt->execute();

        // Check for errors
        var_dump($pdo->errorInfo());
        
        // Redirect back to the address book page
        header("Location: ../book");
        exit();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // Redirect to an error page or handle the error accordingly
    header("Location: error.php");
    exit();
}
?>
