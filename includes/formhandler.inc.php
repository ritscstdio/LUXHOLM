<?php
session_start(); // Start the session if not already started

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $pwd = password_hash($_POST["pwd"], PASSWORD_DEFAULT); // Hash the password

    // Check if email address is already in use and doesn't end with gmail.com
    try {
        require_once "dbh.inc.php";

        // Check if email already exists
        $query = "SELECT * FROM site_user WHERE email_address = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            // Email already exists
            $_SESSION['signup_error'] = "Email address already in use.";
            header("Location: ../signup");
            exit;
        } elseif (!preg_match('/@gmail\.com$/', $email)) {
            // Email doesn't end with gmail.com
            $_SESSION['signup_error'] = "Invalid email address format. Please use a Gmail account.";
            header("Location: ../signup");
            exit;
        }

        // Proceed with user registration
        $query = "INSERT INTO site_user (fname, lname, email_address, password) VALUES (?,?,?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$fname, $lname, $email, $pwd]);

        // Clear any previous signup errors
        unset($_SESSION['signup_error']);

        $pdo = null;
        $stmt = null;

        header("Location: ../login");
        exit;
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../signup");
    exit;
}
?>
