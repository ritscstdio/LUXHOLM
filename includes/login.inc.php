<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['pwd'])) {

        try {
            require_once "dbh.inc.php";

            $email = $_POST['email'];
            $pwd = $_POST['pwd'];

            // Prepare the SQL statement
            $query = "SELECT * FROM site_user WHERE email_address = :email LIMIT 1";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);

            // Execute the query
            $stmt->execute();

            // Fetch result
            $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user_data) {

                // Verify the password
                if (password_verify($pwd, $user_data['password'])) {
                    // Password is correct, start a session
                    $_SESSION['user_id'] = $user_data['id'];
                    $_SESSION['user_email'] = $user_data['email_address'];
                    $_SESSION['first_name'] = $user_data['fname']; // Assuming these fields exist in the table
                    $_SESSION['last_name'] = $user_data['lname'];   // Assuming these fields exist in the table

                    // Redirect to a protected page
                    header('Location: ../home');
                    exit();
                } else {
                    // Incorrect password
                    $_SESSION['login_error'] = 'Invalid email or password.';
                    header('Location: ../login');
                }
            } else {
                // No user found with the given email
                $_SESSION['login_error'] = 'Invalid email or password.';
                header('Location: ../login');
            }
        
        } catch (PDOException $e) {
            echo 'Database error: ' . $e->getMessage();
        }
    }
}
?>
