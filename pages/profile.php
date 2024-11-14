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
        <h1 class="main-title">User Profile (Draft)</h1>
        <div class="profile-container">
            <a href="../pages/edit-profile.php" class="edit-button gradient-button">Edit Profile</a>
            <div class="profile-header">
                <img src="../assets/images/profile-placeholder.jpg" alt="Profile Picture" class="profile-picture">
                <div class="profile-info">
                    <h2 class="profile-name">Car Meowzy</h2>
                    <p class="profile-email">Email: catmeowzy@example.com</p>
                    <p class="profile-joined">Joined: November 1, 2024</p>
                </div>  
            </div>
            <hr>
            <div class="profile-details">
                <h3 class="details-title">About Me</h3>
                <p class="details-description">Meow me meow mew mew mew mew mew meow me meow me meow me me me meow meow </p>
                <hr>
                <h3 class="details-title">Skills</h3>
                <ul class="skills-list">
                    <li>Communication Skills</li>
                    <li>Project Management</li>
                    <li>Data Analysis</li>
                </ul>
                <hr>
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

