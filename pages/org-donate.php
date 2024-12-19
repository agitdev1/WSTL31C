<?php 
require_once '../components/navbar3.php';
?>

<!Doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Organizer Event</title>
        <link rel="stylesheet" href="../assets/css/styles.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="../assets/css/org-event.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    <div class="container">
    <div class="header">
    <div class="image-container">
    <img src="https://via.placeholder.com/1080x1350" alt="Feline Frolic Poster">  
    </div>
</div>
<div class="event-details">
    <h3>Project Status</h3>
    <button class="edit-button" onclick="editProjectStatus()">Edit</button>
    <button class="complete-button" onclick="completeEvent()">Mark as Completed</button>
    <button class="cancel-button" onclick="cancelEvent()">Cancel Event</button>
    <p><strong> Cause Area:</strong> </p>
    <p><strong>Goal:</strong> <span>₱</span></p>
    <p><strong>Total Donations:</strong> <span>₱</span></p>
    <p><strong> Days Left:</strong></p>
    <p><strong> Status: </strong> <span id="event-status" class="status-ongoing">Ongoing</span></p>
</div>
<div class="event-details">
    <h3>Project Details</h3>
    <button class="edit-button" onclick="editProjectDetails()">Edit Project Details</button>
    <ul>
        <li>
            <i class="fa fa-location-arrow" aria-hidden="true"></i>
            <small>Sample, Example City </small>
        </li>
        <li>
            <i class="fa fa-users" aria-hidden="true"></i>
            <small><a href="../pages/oops2.php">Organizer</a></small>
        </li>
        <li>
            <i class="fa fa-phone" aria-hidden="true"></i>
            <small>09123456789</small>
        </li>
        <li>
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <small>foundation@example.com</small>
        </li>
    </ul>
</div>
        <div class="content">
        <h3>About The Project</h3>
            <p>
Description of the Project</p>
</div>
        </div>
    </div>
    <?php require_once '../components/footer3.php'; ?>
    <script src="../assets/js/org-event.js?v=<?php echo time(); ?>"></script>
    </body>
</html>

