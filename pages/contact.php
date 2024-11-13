<?php
include '../components/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <div class="main-content">
        <h1>Contact Us</h1>
        
        <!-- Under Construction Message -->
        <img src="..\assets\images\contruction.png" alt="Construction" width="200" height="200">
        <p style="font-size: 14px; line-height: 1.5;">
            Thank you for visiting. Our website is currently under construction, and we’re working hard to create an experience that’s worth the wait. 
            Please check back soon for updates, or sign up to be notified when we launch. 
            We can’t wait to share what’s coming!
        </p>

        <!-- Contact Form -->
        <h2>Get In Touch</h2>
        <form action="submit_contact.php" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Your Name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Your Email" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Your Message" required></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

    <?php include '../components/footer.php'; ?>
</body>
</html>
