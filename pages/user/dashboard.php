<?php
include '../components/navbar2.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
</head>
<body>
    <div class="container">
    <div class="sidebar">
            <ul class="menu">
                <li class="menu-item active"><a href="../user/pages/dashboard.php">User Dashboard</a></li>
                <li class="menu-item "><a href="../pages/user/profile.php">Profile</a></li>
                <li class="menu-item"><a href="../pages/user/history.php">My History</a></li>                
                <li class="menu-item"><hr></li>
                <li class="menu-item"><a href="../pages/index.php">Logout</a></li>
            </ul>
        </div>
        <div class="content">
            <h1 class="greeting">Hi, Juan!</h1>
            <hr class="divider">
            <h2 class="dashboard-title">Dashboard</h2>
            <div class="cards">
                <div class="card">
                    <h3 class="card-value">9</h3>
                    <p class="card-description">
                        Total Volunteer of Hours
                    </p>
                </div>
                <div class="card">
                    <h3 class="card-value">₱ 2250</h3>
                    <p class="card-description">
                    Total Donations (PHP)
                    </p>
                </div>
                <div class="card">
                    <h3 class="card-value">3</h3>
                    <p class="card-description">
                        Total Events Joined
                    </p>
                </div>
                <div class="card">
                    <h3 class="card-value">₱ 750</h3>
                    <p class="card-description">
                       Average Contributions (PH
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once '../components/footer2.php'; ?>
</body>
</html>

<!-- should be able to fetch in the database the total number of volunteer hours, total donations, total events joined, and average contributions -->
