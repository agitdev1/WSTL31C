<?php
require_once '../../components/navbar2.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteering Events</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/home.css">
    <link rel="stylesheet" href="../../assets/css/modal-volunteer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="main-content">
    <h1>Volunteering Events</h1>
    <div class="gallery">
        <?php
        $events = [
            [
                'image' => '../../assets/images/volunteer/cats.jpg',
                'alt' => 'event 1',
                'desc' => 'Event Volunteers Needed for Feline Frolic Event',
                'location' => 'Communa, Makati City, 56789',
                'date' => 'Dec 20, 2024',
                'time' => '07:00 AM - 11:00 AM',
                'organization' => 'Animal Protectors'
            ],
            [
                'image' => '../../assets/images/volunteer/marikina.png',
                'alt' => 'event 2',
                'desc' => 'Marikina River Clean Up Activity for November 2024',
                'location' => '123 Marikina, Marikina City, 12345',
                'date' => 'Jan 10, 2025',
                'time' => '09:00 AM - 01:00 PM',
                'organization' => 'Green Earth Volunteers'
            ],
            [
                'image' => '../../assets/images/volunteer/forest.png',
                'alt' => 'event 3',
                'desc' => 'Be part of our Forest Restoration Activities ',
                'location' => '456 Forest Ave, Green City, 67890',
                'date' => 'Feb 20, 2025',
                'time' => '06:00 AM - 10:00 AM',
                'organization' => 'Green Living Org'
            ],
            [
                'image' => '../../assets/images/volunteer/reading.jpg',
                'alt' => 'event 4',
                'desc' => 'Library Reading Program',
                'location' => '789 Charity Lane, Hope Town, 54321',
                'date' => 'Mar 15, 2025',
                'time' => '10:00 AM - 02:00 PM',
                'organization' => 'Helping Hands'
            ],
            [
                'image' => '../../assets/images/volunteer/foster.webp',
                'alt' => 'event 5',
                'desc' => 'Brighten a Foster Child\'s Day',
                'location' => '321 Green Park, Nature City, 98765',
                'date' => 'Apr 22, 2025',
                'time' => '07:00 AM - 11:00 AM',
                'organization' => 'Happy Foundation'
            ],
            [
                'image' => '../../assets/images/volunteer/feeding.webp',
                'alt' => 'event 6',
                'desc' => 'Feeding Program',
                'location' => '654 Health Blvd, Wellness City, 11223',
                'date' => 'May 5, 2025',
                'time' => '09:00 AM - 03:00 PM',
                'organization' => 'Life Savers'
            ]
        ];

        foreach ($events as $event) {
            echo '<div class="gallery-item">';
            echo '<a href="../../pages/user/vol-event.php" rel="noopener noreferrer">';
            echo '<img src="' . $event['image'] . '" alt="' . $event['alt'] . '">';
            echo '</a>';
            echo '<div class="desc">' . $event['desc'] . '</div>';
            echo '<p class="card-location"><i class="fa fa-location-arrow""></i><small>' . $event['location'] . '</small></p>';
            echo '<p><i class="fa fa-calendar"> </i><small>' . $event['date'] . '</small></p>';
            echo '<p><i class="fa fa-clock-o"> </i> <small>' . $event['time'] . '</small></p>';
            echo '<p class="card-organization"> <i class="fa fa-users"></i><small>' . $event['organization'] . '</small></p>';
            echo '</a>';            
            echo '<input type="hidden" name="event_name" value="' . $event['desc'] . '">';
            echo '<input type="hidden" name="location" value="' . $event['location'] . '">';
            echo '<input type="hidden" name="start_date" value="' . $event['date'] . '">';
            echo '<input type="hidden" name="end_date" value="' . $event['date'] . '">';
            echo '<input type="hidden" name="time" value="' . $event['time'] . '">';
            echo '<input type="hidden" name="organization" value="' . $event['organization'] . '">';
            echo '<div class="button-container">'; // Start of the container for buttons
            echo '<button type="button" class="volunteer-button">Volunteer</button>';
            echo '<button type="button" class="unjoin-button" data-bs-toggle="modal" data-bs-target="#unjoinModal" style="display:none;">Unjoin</button>'; //This button should decrement the number of volunteers in the database//
            ;
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>
<div id="volunteerModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Hi <strong>Juan</strong>!</p>
        <p>Before you click 'Join' please note that clicking this button means you will be given a slot for this volunteer opportunity. We've prepared this event so you could have a great time volunteering. We are really counting on you to show up!</p>
        <p>In the case that you're unable to attend the event, please go to your dashboard and click the 'Unjoin' button to give other volunteers an opportunity to attend. You can also contact the person in charge to give a heads up. We hope to see you soon!</p>
        <hr>
        <div class="modal-footer">
            <button class="cancel-button" id="cancel-button">Cancel</button>
            <button class="join-button">Join</button>
        </div>
    </div>
</div>

<div id="unjoinModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Are you sure you want to unjoin this volunteer event?</p>
        <hr>
        <div class="modal-footer">
            <button class="cancel-button" id="unjoin-cancel-button">Cancel</button>
            <button class="confirm-unjoin-button">Confirm</button>
        </div>
    </div>
</div>

<?php require_once '../../components/footer.php'; ?>
<script src="../../assets/js/modal-volunteer.js"></script>
</body>
</html>