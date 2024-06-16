<?php

try {
    // Create a new PDO instance
    require_once('includes/dbh.inc.php');
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL statement
    $stmt = $pdo->prepare("SELECT * FROM user_address WHERE user_id = :user_id");
    
    // Bind parameter
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    
    // Execute statement
    $stmt->execute();

    // Fetch all rows
    $addresses = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close connection
$pdo = null;
?>