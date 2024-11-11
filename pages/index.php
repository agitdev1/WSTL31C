<?php
include '../components/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Voluntech</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <div class="main-content">
        <h1>Empowering Change 
        <br> Through <span style="color:#DD4040;">Volunteering</span></h1>
        <div class="content-section">
            <img src="../assets/images/banner2.svg" alt="Volunteering Banner" class="content-image">
            <p>We aim to empower students, faculty, and staff of Lyceum of the Philippines University - Manila to seamlessly connect and contribute to meaningful volunteering opportunities within the LPU community and the wider Philippine society.</p>
        </div>
        <hr class="full-width-hr">
        <div class="content-section">
        <p>Discover and engage in volunteering opportunities that support SDG 17, fostering partnerships for global progress and community impact.</p>
            <img src="../assets/images/sdg17.png" alt="Sustainable Development Goals" class="content-image">
        </div>
    </div>
    <div class="buttons">
        <a href="../pages/register.php" class="gradient-button">Register</a>
        <a href="../pages/login.php" class="gradient-button">Login</a>
    </div>
    <br>
    <?php include '../components/footer.php'; ?>
</body>
</html>

