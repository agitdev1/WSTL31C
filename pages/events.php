<?php
include '../components/navbar2.php';
// events list
$events = [
    [
        'image' => '../assets/images/event1.jpg',
        'title' => 'Event Volunteers Needed for Feline Frolic Event',
        'location' => 'White Sand Beach, Coastal City, 56789',
        'date' => 'Dec 20, 2024',
        'time' => '07:00 AM - 11:00 AM',
        'organization' => 'Ocean Protectors'
    ],
    [
        'image' => '../assets/images/event2.jpg',
        'title' => 'Luntiang Marikina: Marikina River Clean Up Activity for November 2024',
        'location' => '123 Charity Street, Green City, 12345',
        'date' => 'Jan 10, 2025',
        'time' => '09:00 AM - 01:00 PM',
        'organization' => 'Green Earth Volunteers'
    ],
    [
        'image' => '../assets/images/event3.png',
        'title' => 'Sacks of Rice for Karinderia ni Mang Urot',
        'location' => '453 Giving Street, Global City, 12345',
        'date' => 'Jan 12, 2025',
        'time' => '07:00 AM - 05:00 PM',
        'organization' => 'The Givers'
    ],
    [
        "image" => "../assets/images/events/event1.png",
        "title" => "Project Baon, A Day of Volunteer Service",
        "location" => "789 Charity Lane, Hope Town, 54321",
        "date" => "Mar 15, 2025",
        "time" => "10:00 AM - 02:00 PM",
        "organization" => "Helping Hands",
        "event_name" => "Project Baon, A Day of Volunteer Service"
    ],
    [
        "image" => "../assets/images/events/event2.png",
        "title" => "Feed the Hungry",
        "location" => "321 Green Park, Nature City, 98765",
        "date" => "Apr 22, 2025",
        "time" => "07:00 AM - 11:00 AM",
        "organization" => "Eco Warriors",
        "event_name" => "Tree Planting Volunteer Day"
    ],
    [
        "image" => "../assets/images/events/event3.png",
        "title" => "Blood Donation Volunteer Support",
        "location" => "654 Health Blvd, Wellness City, 11223",
        "date" => "May 5, 2025",
        "time" => "09:00 AM - 03:00 PM",
        "organization" => "Life Savers",
        "event_name" => "Blood Donation Volunteer Support"
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Volunteering Events</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/events.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="main-content">
    <h1>Upcoming Events</h1>
    <div class="gallery">
        <?php foreach ($events as $event): ?>
            <div class="gallery-item">
            <a target="_blank" href="../pages/oops.php" rel="noopener noreferrer">
                    <img src="<?php echo htmlspecialchars($event['image']); ?>" alt="<?php echo htmlspecialchars($event['title']); ?>">
                </a>
                <div class="desc"><?php echo htmlspecialchars($event['title']); ?></div>
                <p class="card-location">
                    <i class="fa fa-location-arrow" aria-hidden="true"></i>
                    <small><?php echo htmlspecialchars($event['location']); ?></small>
                </p>
                <p>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <small><?php echo htmlspecialchars($event['date']); ?></small>
                </p>
                <p>
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <small><?php echo htmlspecialchars($event['time']); ?></small>
                </p>
                <p class="card-organization">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <small><?php echo htmlspecialchars($event['organization']); ?></small>
                </p>
                <form action="" method="POST">
                    <?php if (!empty($_SESSION['csrf_token'])): ?>
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                    <?php endif; ?>
                    <input type="hidden" name="event_name" value="<?php echo htmlspecialchars($event['title']); ?>">
                    <input type="hidden" name="location" value="<?php echo htmlspecialchars($event['location']); ?>">
                    <input type="hidden" name="date" value="<?php echo htmlspecialchars($event['date']); ?>">
                    <input type="hidden" name="time" value="<?php echo htmlspecialchars($event['time']); ?>">
                    <input type="hidden" name="organization" value="<?php echo htmlspecialchars($event['organization']); ?>">
                    <button type="submit" class="donate-button">Register Now</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require_once '../components/footer2.php'; ?>
<script src="../assets/js/events.js"></script>
</body>
</html>