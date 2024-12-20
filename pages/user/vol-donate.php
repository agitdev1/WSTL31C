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
        <link rel="stylesheet" href="../../assets/css/modal-donate.css"> 
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
            <p><strong>Goal:</strong> <span>₱</span></p>
            <p><strong>Total Donations:</strong> <span>₱</span></p>
            <p><strong>Days Left:</strong></p>            
            <p><strong> Status: </strong> <span id="event-status" class="status-ongoing">Ongoing</span></p>
            <!-- Event Details section -->
            <div class="event-details-container">
        <h3>Event Details</h3>
        <ul>
            <li>
                <i class="fa fa-location-arrow" aria-hidden="true"></i>
                <small>Sample, Example City </small>
            </li>
            <li>
                <i class="fa fa-users" aria-hidden="true"></i>
                <small><a href="../../pages/user/oops2.php">Organizer</a></small>
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
        <p>Description of the Event</p>
    </div>
    <div class="button-container">
        <button type="submit" class="donate-button">DONATE</button>
        </div>
        
 <!-- Modal -->
 <div id="donationModal" class="modal">
    <div class="modal-content">
        <span id="closeModalButton" class="close">&times;</span>
        <h2>Enter Amount in Peso</h2>
        <form id="donationForm" method="POST" action="process_donation.php">
            <input type="hidden" name="event_name" value="">
            <input type="hidden" name="location" value="">
            <input type="hidden" name="start_date" value="">
            <input type="hidden" name="end_date" value="">
            <input type="hidden" name="organization" value="">
            <input type="number" name="donations" placeholder="Enter Amount in Peso" min="1" required>
            <button class="cancel" id="cancelButton">Cancel</button>
            <button type="submit">Submit</button>

        </form>
    </div>
</div>
    </div>
    </div>
    </div>
    <?php require_once '../../components/footer2.php'; ?>
    <script src="../../assets/js/vol-donate.js?v=<?php echo time(); ?>"></script>
    </body>
</html>

