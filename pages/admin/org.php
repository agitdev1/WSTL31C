<?php
session_start();
require '../../vendor/autoload.php'; // MongoDB PHP library (if using Composer)

// MongoDB connection string
$connectionString = "mongodb+srv://somedudein:g8qSNOKbcS7Uh39d@voluntech.waoix.mongodb.net/?retryWrites=true&w=majority&appName=VolunTech";

// Check if user is logged in and is an organization
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'organization') {
    header('Location: ../../pages/login.php');
    exit;
}

include '../../components/navbar3.php';

try {
    // Connect to MongoDB
    $client = new MongoDB\Client($connectionString);
    $db = $client->yourDatabaseName; // Replace with your database name
    $opportunitiesCollection = $db->opportunities; // Volunteering opportunities
    $donationsCollection = $db->donations;         // Donations
} catch (Exception $e) {
    die("Failed to connect to MongoDB: " . $e->getMessage());
}

// Get logged-in user ID
$userId = $_SESSION['user_id'];

// Current date and time for comparison
$combinedEvents = [];

// Set the default time zone
date_default_timezone_set('Asia/Manila');

// Current date and time for comparison
$currentDateTime = new DateTime();

try {
    // Process volunteering opportunities
    $opportunitiesCursor = $opportunitiesCollection->find(['organization_id' => new MongoDB\BSON\ObjectId($userId)]);
    foreach ($opportunitiesCursor as $event) {
        if (isset($event['date'], $event['start_time'], $event['end_time'])) {
            // Create DateTime objects with the specified time zone
            $startDateTime = new DateTime($event['date'] . ' ' . $event['start_time'], new DateTimeZone('Asia/Manila'));
            $endDateTime = new DateTime($event['date'] . ' ' . $event['end_time'], new DateTimeZone('Asia/Manila'));

            if ($startDateTime > $currentDateTime) {
                $status = 'Upcoming';
            } elseif ($currentDateTime >= $startDateTime && $currentDateTime <= $endDateTime) {
                $status = 'Ongoing';
            } else {
                $status = 'Completed';
            }
            
            $combinedEvents[] = [
                'type' => 'Volunteering Event',
                'title' => $event['title'] ?? 'No title available',
                'description' => $event['description'] ?? '',
                'image' => $event['image_path'] ?? 'default-image.jpg',
                'start' => $startDateTime,
                'end' => $endDateTime,
                'status' => $status
            ];
        }
    }



    // Process donation events
    $donationsCursor = $donationsCollection->find(['organization_id' => new MongoDB\BSON\ObjectId($userId)]);
    foreach ($donationsCursor as $donation) {
        if (isset($donation['start_date'], $donation['end_date'])) {
            $startDate = new DateTime($donation['start_date']);
            $endDate = new DateTime($donation['end_date']);

            $status = ($startDate > $currentDateTime) ? 'Upcoming' :
                (($endDate >= $currentDateTime) ? 'Ongoing' : 'Completed');

            $combinedEvents[] = [
                'type' => 'Donation Drive',
                'title' => $donation['title'] ?? 'No title available',
                'description' => $donation['description'] ?? '',
                'image' => $donation['image_path'] ?? 'default-image.jpg',
                'start' => $startDate,
                'end' => $endDate,
                'status' => $status
            ];
        }
    }

    // Sort events by start date
    usort($combinedEvents, function ($a, $b) {
        return $a['start'] <=> $b['start'];
    });
} catch (Exception $e) {
    echo "<script>console.error('Error processing events: " . $e->getMessage() . "');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/home.css">
</head>
<body>
<div class="main-content">
    <?php if (empty($combinedEvents)): ?>
        <h1>Create a project or donation drive.</h1>
    <?php else: ?>
        <?php
        $hasVolunteeringEvents = array_filter($combinedEvents, fn($e) => $e['type'] === 'Volunteering Event');
        $hasDonationDrives = array_filter($combinedEvents, fn($e) => $e['type'] === 'Donation Drive');
        ?>

        <?php if ($hasVolunteeringEvents): ?>
            <h1>Volunteering Events</h1>
            <div class="gallery">
                <?php foreach ($combinedEvents as $event): ?>
                    <?php if ($event['type'] === 'Volunteering Event'): ?>
                        <div class="gallery-item">
                            <img src="<?= $event['image'] ?>" alt="<?= htmlspecialchars($event['title']) ?>">
                            <div class="desc"><?= htmlspecialchars($event['title']) ?></div>
                            <p><strong>Status:</strong> <?= $event['status'] ?></p>
                            <p><strong>Start:</strong> <?= $event['start']->format('Y-m-d g:i A') ?></p>
                            <p><strong>End:</strong> <?= $event['end']->format('Y-m-d g:i A') ?></p>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($hasDonationDrives): ?>
            <h1>Donation Drives</h1>
            <div class="gallery">
                <?php foreach ($combinedEvents as $event): ?>
                    <?php if ($event['type'] === 'Donation Drive'): ?>
                        <div class="gallery-item">
                            <img src="<?= $event['image'] ?>" alt="<?= htmlspecialchars($event['title']) ?>">
                            <div class="desc"><?= htmlspecialchars($event['title']) ?></div>
                            <p><strong>Status:</strong> <?= $event['status'] ?></p>
                            <p><strong>Start:</strong> <?= $event['start']->format('Y-m-d') ?></p>
                            <p><strong>End:</strong> <?= $event['end']->format('Y-m-d') ?></p>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>
<?php include '../../components/footer3.php'; ?>
</body>
</html>
