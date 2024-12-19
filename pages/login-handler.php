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
        // Output JavaScript to show an alert for invalid email
        echo "<script>alert('Invalid email address. Please try again.'); window.history.back();</script>";
        exit();
    }
}
?>