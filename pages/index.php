<?php
include '../components/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../assets/css/styles.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<Title>Welcome to Voluntech</Title>
</head>
<body>
    <div class="main-content">
        <div class="content-section">
            <div class="text-and-image">
                <img src="../assets/images/banner3.webp" alt="Volunteering Banner" class="content-image">
                <div class="content-text">
                    <h2>VOLUNTECH</h2>
                    <h1>Empowering Change 
                    <br> Through <span style="color:#DD4040;">Volunteering </span></h1>
                    <p>We aim to empower students, faculty, and staff of Lyceum of the Philippines University - Manila to seamlessly connect and contribute to meaningful volunteering opportunities within the LPU community and the wider Philippine society.</p>
                </div>
            </div>
        </div>
        <hr class="full-width-hr">
        <div class="content-section right-image">
            <div class="content-text">
                <h1 style="color:#0887B2; text-align: start; margin-right: 20px;">
                    <span>SUSTAINABLE DEVELOPMENT 
                    <br>GOALS 17 </h1>
                <p style ="text-align: start; margin-right: 40px  ; " >Discover and engage in meaningful volunteering opportunities that align with SDG 17, promoting collaboration for sustainable development. Join a community dedicated to fostering partnerships that drive global progress and create lasting, positive impacts within local communities.</p>
            </div>
            <img src="../assets/images/sdg17_2.webp" alt="Sustainable Development Goals" class="content-image">
        </div>
    </div>
    <div class="buttons">
        <a href="../pages/register-select.php" class="gradient-button">Register</a>
        <a href="../pages/login.php" class="gradient-button">Login</a>
    </div>
    <br>
    <?php require_once '../components/footer.php'; ?>
</body>
</html>

