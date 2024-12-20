<?php
include '../../components/navbar2.php';

// Database connection
$servername = "localhost";
$username = "admin";
$password = "";
$dbname = "voluntech";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch donation details
$donation_id = isset($_GET['donation_id']) ? $_GET['donation_id'] : null;

if ($donation_id !== null) {
    $sql = "SELECT id, event_name, location, start_date, end_date, time, organization, created_at, donations FROM donations WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $donation_id);
} else {
    $sql = "SELECT id, event_name, location, start_date, end_date, time, organization, created_at, donations FROM donations ORDER BY created_at DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
}

$stmt->execute();
$stmt->bind_result($id, $event_name, $location, $start_date, $end_date, $time, $organization, $created_at, $donations);
$stmt->fetch();
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You!</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/thank-you.css">
</head>
<body>
<div class="thank-you-message">
    <h1>Thank You for Your Donation!</h1>
    <p>Your donation is greatly appreciated and will make a significant impact.</p>
    
    <!-- Donation Summary -->
    <div class="donation-summary">
        <h2>Donation Summary</h2>
        <p>Event: <?php echo htmlspecialchars($event_name); ?></p>
        <p>Location: <?php echo htmlspecialchars($location); ?></p>
        <p>Start Date: <?php echo htmlspecialchars($start_date); ?></p>
        <p>End Date: <?php echo htmlspecialchars($end_date); ?></p>
        <p>Time: <?php echo htmlspecialchars($time); ?></p>
        <p>Organization: <?php echo htmlspecialchars($organization); ?></p>
        <p>Created At: <?php echo htmlspecialchars($created_at); ?></p>
        <p>Total Donations: ₱<?php echo htmlspecialchars($donations); ?></p>
    </div>
    
    <!-- Next Steps -->
    <div class="next-steps">
        <h2>What Happens Next?</h2>
        <p>Your donation will be used to provide essential supplies to those in need. We will keep you updated on the progress of the event in our social media.</p>
    </div>

    
    <!-- Contact Information -->
    <div class="contact-info">
        <h2>Contact Us</h2>
        <p>If you have any questions, feel free to <a href="../../pages/user/contact2.php">contact us</a>.</p>
    </div>
</div>

<?php require_once '../../components/footer.php'; ?>
</body>
</html>