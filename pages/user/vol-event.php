<?php 
require_once '../../components/navbar2.php';
?>

<!Doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Event Details</title>
        <link rel="stylesheet" href="../../assets/css/styles.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="../../assets/css/vol-donate.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="../../assets/css/modal-volunteer.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
    <div class="container">
    <div class="header">
        <div class="image-container">
            <img src="https://via.placeholder.com/1080x1350" alt="Feline Frolic Poster">  
        </div>
        <div class="event-details">
            <h1>Event Title</h1>
            <h3>Event Status</h3>
            <p><strong>Cause Area:</strong></p>
            <p> <strong>Skills Needed:</strong></p>
            <p><strong>Volunteers Needed:</strong> <span>N</span></p>
            <p><strong>Volunteers Registered:</strong> <span>N</span></p>
            <p><strong>Days Left:</strong>N</p>            
            <p><strong> Status: </strong> <span id="event-status" class="status-ongoing">Ongoing</span></p>
            <!-- Event Details section -->
            <div class="event-details-container">
    <h3>Event Details</h3>
    <ul>
        <li>
            <i class="fa fa-location-arrow" aria-hidden="true"></i>
            <small>Location </small>
        </li>
        <li>
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <small>MM/DD/YY</small>
        </li>
        <li>
            <i class="fa fa-clock-o" aria-hidden="true"></i>
            <small>Start Time - End Time</small>
        </li>
        <li>
            <i class="fa fa-users" aria-hidden="true"></i>
            <small><a href="../../pages/user/oops2.php ">Organizer Name</a></small>
        </li>
        <li>
            <i class="fa fa-phone" aria-hidden="true"></i>
            <small>09123456789</small>
        </li>
        <li>
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <small>organizer@example.com</small>
        </li>
    </ul>
</div>
    <div class="content">
        <h3>About The Project</h3>
        <p>Description of the Event</p>
    </div>
        <div class="button-container">
        <button type="button" class="volunteer-button">Volunteer</button>
         <button type="button" class="unjoin-button" data-bs-toggle="modal" data-bs-target="#unjoinModal" style="display:none;">Unjoin</button>
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
</div>
</div>
    <?php require_once '../../components/footer2.php'; ?>
    <script src="../../assets/js/org-event.js?v=<?php echo time(); ?>"></script>
    <script src="../../assets/js/modal-volunteer.js"></script>
    </body>
</html>

