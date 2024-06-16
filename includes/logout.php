<?php
session_start();
session_unset();
session_destroy();
header("Location: ../home"); // Redirect to the login page or homepage after logout
exit();
?>