<?php
include '../../components/navbar2.php';
// events list
$events = [
    [
        'image' => '../../assets/images/event1.jpg',
        'title' => 'Event Volunteers Needed for Feline Frolic Event',
        'location' => 'White Sand Beach, Coastal City',
        'date' => 'Dec 20, 2024',
        'time' => '07:00 AM - 11:00 AM',
        'organization' => 'Animal Protectors',
        'redirect' => '../vol-event.php'
    ],
    [
        'image' => '../../assets/images/event2.jpg',
        'title' => 'Luntiang Marikina: Marikina River Clean Up Activity for November 2024',
        'location' => '123 Charity Street, Green City',
        'date' => 'Jan 10, 2025',
        'time' => '09:00 AM - 01:00 PM',
        'organization' => 'Green Earth Volunteers',
        'redirect' => 'vol-event.php'
    ],
    [
        'image' => '../../assets/images/event3.png',
        'title' => 'Sacks of Rice for Karinderia ni Mang Urot',
        'location' => '453 Giving Street, Global City',
        'date' => 'Jan 12, 2025',
        'time' => 'N/A',
        'organization' => 'The Givers',
        'redirect' => 'vol-donate.php'
    ],
    [
        "image" => "../../assets/images/events/event1.png",
        "title" => "Project Baon, A Day of Volunteer Service",
        "location" => "789 Charity Lane, Hope Town",
        "date" => "Mar 15, 2025",
        "time" => "10:00 AM - 02:00 PM",
        "organization" => "Helping Hands",
        "redirect" => 'vol-event.php'
    ],
    [
        "image" => "../../assets/images/events/event2.png",
        "title" => "Feed the Hungry",
        "location" => "321 Green Park, Nature City",
        "date" => "Apr 22, 2025",
        "time" => "07:00 AM - 11:00 AM",
        "organization" => "Eco Warriors",
        "redirect" => 'vol-event.php'
    ],
    [
        "image" => "../../assets/images/events/event3.png",
        "title" => "Blood Donation Volunteer Support",
        "location" => "654 Health Blvd, Wellness City",
        "date" => "May 5, 2025",
        "time" => "09:00 AM - 03:00 PM",
        "organization" => "Life Savers",
        "redirect" => 'vol-donate.php'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Volunteering Events</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/home.css">
    <link rel="stylesheet" href="../../assets/css/events.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="main-content">
    <h1>Upcoming Events</h1>
    <div class="gallery">
        <?php foreach ($events as $event): ?>
            <div class="gallery-item" data-redirect="<?php echo htmlspecialchars($event['redirect']); ?>">
                <img src="<?php echo htmlspecialchars($event['image']); ?>" alt="<?php echo htmlspecialchars($event['title']); ?>">
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
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require_once '../../components/footer2.php'; ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const galleryItems = document.querySelectorAll('.gallery-item');
        galleryItems.forEach(item => {
            item.addEventListener('click', function() {
                const redirectUrl = this.getAttribute('data-redirect');
                if (redirectUrl) {
                    window.location.href = redirectUrl;
                }
            });
        });
    });
    </script>
</body>
</html>
