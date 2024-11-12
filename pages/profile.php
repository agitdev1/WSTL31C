<?php
include '../components/navbar2.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Voluntech</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
</head>
<body>
    <div class="main-content">
        <h1>User Profile (Draft)</h1>
        <div class="profile-container">
        <a href="../pages/edit-profile.php" class="edit-button">Edit Profile</a>
            <div class="profile-header">
                <img src="../assets/images/profile-placeholder.jpg" alt="Profile Picture" class="profile-picture">
                <div class="profile-info">
                    <h2>Car Meowzy</h2>
                    <p>Email: catmeowzy@example.com</p>
                    <p>Joined: January 1, 2021</p>
                </div>
            </div>
            <div class="profile-details">
                <h3>About Me</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum.</p>
                <h3>Skills</h3>
                <ul>
                    <li>Communication Skills</li>
                    <li>Project Management</li>
                    <li>Data Analysis</li>
                </ul>
                <h3>Causes I'm Interested In</h3>
                <ul>
                    <li>No Poverty</li>
                    <li>Quality Education</li>
                    <li>Climate Action</li>
                    <li>Gender Equality</li>
                </ul>
            </div>
        </div>
    </div>
    <?php include '../components/footer.php'; ?>
</body>
</html>

