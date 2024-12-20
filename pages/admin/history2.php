<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organization History</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/sidebar.css">
    <link rel="stylesheet" href="../../assets/css/history.css">
</head>
<body>
<?php include '../../components/navbar3.php'; ?>

<div class="container">
    <div class="sidebar">
        <ul class="menu">
            <li class="menu-item"><a href="../../pages/admin/dashboard2.php">Organization Dashboard</a></li>
            <li class="menu-item"><a href="../../pages/admin/profile2.php">Profile</a></li>
            <li class="menu-item active"><a href="../pages/admin/history2.php"> History</a></li>                
            <li class="menu-item"><hr></li>
            <li class="menu-item"><a href="../../pages/index.php">Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <h1>Organization History</h1>
        
        <div class="tab-buttons">
            <button class="tab-button active" onclick="showTab('donations')">Donations</button>
            <button class="tab-button" onclick="showTab('volunteering')">Volunteering</button>
        </div>

        <!-- Donations History -->
        <div id="donations" class="history-section">
            <h2>Fundraising History</h2>
            <table class="history-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th> Target Amount</th>
                        <th>Amount Raised</th>
                        <th>Campaign</th>
                        <th>Cause</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Dec 18, 2024</td>
                        <td>₱20000.00</td>
                        <td>₱12000.00</td>
                        <td>Healthcare Support</td>
                        <td>Good Health and Well-Being</td>
                        <td class="status-ongoing">Ongoing</td>
                    </tr>
                    <tr>
                        <td>Dec 9, 2024</td>
                        <td>₱15000.00</td>
                        <td>₱16456.00</td>
                        <td> Clothing Drive</td>
                        <td>No Poverty</td>
                        <td class="status-completed">Completed</td>
                    </tr>
                    <tr>
                        <td>Dec 2, 2024</td>
                        <td>₱30000.00</td>
                        <td>₱29456.00</td>
                        <td>Disaster Relief Fund</td>
                        <td>Climate Action</td>
                        <td class="status-completed">Completed</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Volunteering History -->
        <div id="volunteering" class="history-section" style="display: none;">
            <h2>Volunteering Projects History</h2>
            <table class="history-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Event</th>
                        <th>Target Volunteer</th>
                        <th>Volunteers</th>
                        <th>Cause</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> Dec 15, 2024</td>
                        <td>Medical Camp Assistance</td>
                        <td>12</td>
                        <td>25</td>
                        <td>Good Health and Well-Being</td>
                        <td class="status-ongoing">Ongoing</td>
                    </tr>
                    <tr>
                        <td>Dec 4, 2024</td>
                        <td>Soup Kitchen Volunteer</td>
                        <td>25</td>
                        <td>25</td>
                        <td>Zero Hunger</td>
                        <td class="status-completed">Completed</td>
                    </tr>
                    <tr>
                        <td>Nov 30, 2023</td>
                        <td>Tree Planting Initiative</td>
                        <td>25</td>
                        <td>0</td>
                        <td>Life on Land</td>
                        <td class="status-cancelled">Cancelled</td>
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

<?php require_once '../../components/footer3.php'; ?>
</body>
</html>