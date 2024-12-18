<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    if ($email === 'org@example.com') {
        header('Location: org.php');
        exit();
    } elseif ($email === 'volunteer@example.com') {
        header('Location: home.php');
        exit();
    } else {
        // Handle invalid email or redirect to a default page
        header('Location: error.php'); // You can create an error page or redirect to a default page
        exit();
    }
}
?>