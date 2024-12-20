<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/sidebar.css">
    <link rel="stylesheet" href="../../assets/css/history.css">
</head>
<body>
<?php include '../../components/navbar2.php'; ?>

<div class="container">
    <div class="sidebar">
    <ul class="menu">
                <li class="menu-item"><a href="../../pages/user/dashboard.php">User Dashboard</a></li>
                <li class="menu-item "><a href="../../pages/profile.php">Profile</a></li>
                <li class="menu-item active"><a href="../../pages/user/history.php">My History</a></li>                
                <li class="menu-item"><hr></li>
                <li class="menu-item"><a href="../../pages/index.php">Logout</a></li>
            </ul>
    </div>
    <div class="main-content">
        <h1>My History</h1>
        
        <div class="tab-buttons">
            <button class="tab-button active" onclick="showTab('donations')">Donations</button>
            <button class="tab-button" onclick="showTab('volunteering')">Volunteering</button>
        </div>

        <!-- Donations History -->
        <div id="donations" class="history-section">
            <h2>Donation History</h2>
            <table class="history-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Campaign</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jan 15, 2024</td>
                        <td>₱1000.00</td>
                        <td>Save the Children</td>
                        <td>Completed</td>
                    </tr>
                    <tr>
                        <td>Dec 25, 2023</td>
                        <td>₱500.00</td>
                        <td>Holiday Food Drive</td>
                        <td>Completed</td>
                    </tr>
                    <tr>
                        <td>Nov 30, 2023</td>
                        <td>₱750.00</td>
                        <td>Education Fund</td>
                        <td>Completed</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Volunteering History -->
        <div id="volunteering" class="history-section" style="display: none;">
            <h2>Volunteering History</h2>
            <table class="history-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Event</th>
                        <th>Hours</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jan 20, 2024</td>
                        <td>Community Clean-up</td>
                        <td>4</td>
                        <td>Completed</td>
                    </tr>
                    <tr>
                        <td>Dec 15, 2023</td>
                        <td>Food Bank Helper</td>
                        <td>3</td>
                        <td>Completed</td>
                    </tr>
                    <tr>
                        <td>Nov 28, 2023</td>
                        <td>Senior Center Visit</td>
                        <td>2</td>
                        <td>Completed</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function showTab(tabName) {
    // Hide all sections
    document.getElementById('donations').style.display = 'none';
    document.getElementById('volunteering').style.display = 'none';
    
    // Show selected section
    document.getElementById(tabName).style.display = 'block';
    
    // Update button states
    const buttons = document.getElementsByClassName('tab-button');
    for(let button of buttons) {
        button.classList.remove('active');
    }
    event.target.classList.add('active');
}
</script>

<?php require_once '../../components/footer2.php'; ?>
</body>
</html>