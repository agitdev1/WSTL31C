<?php
include '../../components/navbar3.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/home.css">
    <link rel="stylesheet" href="../../assets/css/sidebar.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <ul class="menu">
                <li class="menu-item active"><a href="../../admin/pages/dashboard2.php">Organization Dashboard</a></li>
                <li class="menu-item"><a href="../../pages/admin/profile2.php">Profile</a></li>
                <li class="menu-item"><a href="../../pages/admin/history2.php"> History</a></li>                
                <li class="menu-item"><hr></li>
                <li class="menu-item"><a href="../../pages/index.php">Logout</a></li>
            </ul>
        </div>
        <div class="content">
            <h1 class="greeting">Welcome Back, XYZ Foundation</h1>
            <hr class="divider">
            <h2 class="dashboard-title">Dashboard</h2>
            <div class="cards">
                <div class="card">
                    <h3 class="card-value">6</h3>
                    <p class="card-description">
                        Created Volunteering Events This Month
                    </p>
                </div>
                <div class="card">
                    <h3 class="card-value">4</h3>
                    <p class="card-description">
                    Total Donation Events Created Ths Month
                    </p>
                </div>
                <div class="card">
                    <h3 class="card-value">₱ 35000</h3>
                    <p class="card-description">
                    Total Funds Raised (PHP)
                    </p>
                </div>
                <div class="card">
                    <h3 class="card-value">6</h3>
                    <p class="card-description">
                       Ongoing Projects
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php require_once '../../components/footer3.php'; ?>
</body>
</html>