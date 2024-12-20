<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/home.css">
    <link rel="stylesheet" href="../../assets/css/sidebar.css">
    <link rel="stylesheet" href="../../assets/css/profile.css">

</head>
<body>
<?php include '../../components/navbar3.php'; ?>

<div class="container">
    <div class="sidebar">
    <ul class="menu">
                <li class="menu-item"><a href="../../pages/admin/dashboard2.php">Organization Dashboard</a></li>
                <li class="menu-item active"><a href="../../pages/admin/profile2.php">Profile</a></li>
                <li class="menu-item"><a href="../../pages/admin/history2.php"> History</a></li>                
                <li class="menu-item"><hr></li>
                <li class="menu-item"><a href="../../pages/index.php">Logout</a></li>
            </ul>
    </div>
    
    <div class="main-content">
        <div class="profile-section">
            <div class="profile-header">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMoTPoPRCnhpuRa5YGeq5gvfcekmLTklpReA&s" alt="Profile Picture" class="profile-picture">
                <div>
                    <h1 class="profile-name">XYZ Foundation</h1>
                    <p class="profile-role">VolunTech Member since 2022</p>
                </div>
            </div>

            <div class="profile-stats">
                <div class="stat-card">
                    <div class="stat-number">₱ 35000</div>
                    <div class="stat-label">Total Funds Raised</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">23</div>
                    <div class="stat-label">Total Project Created</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">10</div>
                    <div class="stat-label">Ongoing Projects</div>
                </div>
            </div>

            <form class="profile-form">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" value="xyz.foundation@example.org" required>
    </div>
    <div class="form-group">
        <label for="city">City</label>
        <input type="city" id="city" value="Manila" required>
    </div>
    <div class="form-group">
        <label for="org-type">Organization Type </label>
        <input type="text" id="org-type" value="Non-Profit">
    </div>

    <div class="form-group">
        <label for="priorities">Priorities</label>
        <input type="text" id="priorities" value="Human Resources, Executive Leadership, Technology">
    </div>

    <div class="form-group">
        <label for="causes">Causes</label>
        <input type="text" id="causes" value="Quality Education, Climate Action, No Poverty">
    </div>

    <div class="form-group">
        <label for="est">Year Established</label>
        <input type="text" id="est" value="2015">
    </div>
</form>

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

<?php require_once '../../components/footer3.php'; ?>
</body>
</html>