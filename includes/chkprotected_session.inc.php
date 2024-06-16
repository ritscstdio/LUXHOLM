<?php
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if the user is not logged in
    header('Location: login.php');
    exit();
}

try {
    require_once "includes/dbh.inc.php";

    // Fetch user's address
    $stmt = $pdo->prepare("SELECT COUNT(*) AS address_count FROM user_address WHERE user_id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $address_count = $stmt->fetchColumn();

    // Check if the user has an address
    if ($address_count == 0) {
        // Redirect to another page if the user doesn't have an address
        header('Location: book.php'); // Change 'add_address.php' to the page where users can add their address
        exit();
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>
