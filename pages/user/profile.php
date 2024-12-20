<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/sidebar.css">
    <link rel="stylesheet" href="../../assets/css/profile.css">

</head>
<body>
<?php include '../../components/navbar2.php'; ?>

<div class="container">
    <div class="sidebar">
    <ul class="menu">
                <li class="menu-item"><a href="../../pages/user/dashboard.php">User Dashboard</a></li>
                <li class="menu-item active"><a href="../../pages/user/profile.php">Profile</a></li>
                <li class="menu-item"><a href="../../pages/user/history.php">My History</a></li>                
                <li class="menu-item"><hr></li>
                <li class="menu-item"><a href="../../pages/index.php">Logout</a></li>
            </ul>
    </div>
    
    <div class="main-content">
        <div class="profile-section">
            <div class="profile-header">
                <img src="https://t3.ftcdn.net/jpg/05/48/46/62/360_F_548466222_MDbMS1Aeg9FaSHF42YQMdSUkjTHFV9ym.jpg" alt="Profile Picture" class="profile-picture">
                <div>
                    <h1 class="profile-name">Juan Dela Cruz</h1>
                    <p class="profile-role">VolunTech Member since 2023</p>
                </div>
            </div>

            <div class="profile-stats">
                <div class="stat-card">
                    <div class="stat-number">₱ 2250</div>
                    <div class="stat-label">Total Donations</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">9</div>
                    <div class="stat-label">Volunteer Hours</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">5</div>
                    <div class="stat-label">Events Attended</div>
                </div>
            </div>

            <form class="profile-form">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" value="Juan" required>
                </div>

                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" value="Dela Cruz" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" value="Juan.DLC@example.com" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" value="(0912) 345-6789">
                </div>

                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" id="location" value="New York, Cubao, Manila">
                </div>

                <div class="form-group">
                    <label for="occupation">Occupation</label>
                    <input type="text" id="occupation" value="Software Engineer">
                </div>

                <div class="preferences-section">
                    <h3>Preferences</h3>
                    <div class="preferences-grid">
                        <div class="preference-item">
                            <input type="checkbox" id="emailNotifications" checked>
                            <label for="emailNotifications">Email Notifications</label>
                        </div>
                        <div class="preference-item">
                            <input type="checkbox" id="smsNotifications">
                            <label for="smsNotifications">SMS Notifications</label>
                        </div>
                        <div class="preference-item">
                            <input type="checkbox" id="newsletter" checked>
                            <label for="newsletter">Newsletter Subscription</label>
                        </div>
                        <div class="preference-item">
                            <input type="checkbox" id="eventReminders" checked>
                            <label for="eventReminders">Event Reminders</label>
                        </div>
                    </div>
                </div>

                <div class="button-group">
                    <button type="button" class="btn btn-secondary">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once '../../components/footer2.php'; ?>
</body>
</html>