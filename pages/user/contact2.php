<?php
include '../../components/navbar2.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/contact.css">
</head>
<body>
    <div class="main-content">
        <h1>Contact Us</h1>
        <!-- Contact Form -->
        <h2>Get In Touch</h2>
        <form action="submit_contact.php" method="POST">
            <div class="form-group">
                <input type="text" id="name" name="name" placeholder="Your Name" required>
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="Your Email" required>
            </div>
            <div class="form-group">                <textarea id="message" name="message" placeholder="Your Message" required></textarea>
            </div>
            <button type="submit" class="gradient-button">Submit</button>
        </form>
    </div>

    <?php require_once '../../components/footer2.php'; ?>
</body>
</html>
