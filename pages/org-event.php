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
        <img src="../assets/images/events/feline.jpg" alt="Feline Frolic Poster">
    </div>
</div>
<div class="event-details">
    <h3>Event Status</h3>
    <button class="edit-button" onclick="editProjectStatus()">Edit</button>
    <button class="complete-button" onclick="completeEvent()">Mark as Completed</button>
    <button class="cancel-button" onclick="cancelEvent()">Cancel Event</button>
    <p><strong> Cause Area:</strong> Life on Land</p>
    <p><strong> Skills Needed:</strong>  Communication Skills, Advocacy, Ethical Decision-Making</p>
    <p><strong>Volunteers Needed:</strong> 5</p>
    <p><strong> Volunteers Registered:</strong> 3</p>
    <p><strong> Days Left:</strong> 1</p>
    <p><strong> Status: </strong> <span id="event-status" class="status-ongoing">Ongoing</span></p>
</div>
<div class="event-details">
    <h3>Project Details</h3>
    <button class="edit-button" onclick="editProjectDetails()">Edit Project Details</button>
    <ul>
        <li>
            <i class="fa fa-location-arrow" aria-hidden="true"></i>
            <small>Comuna, Makati City </small>
        </li>
        <li>
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <small>Dec 20, 2024</small>
        </li>
        <li>
            <i class="fa fa-clock-o" aria-hidden="true"></i>
            <small>07:00 AM - 11:00 AM</small>
        </li>
        <li>
            <i class="fa fa-users" aria-hidden="true"></i>
            <small><a href="../pages/oops2.php">Animal Protectors</a></small>
        </li>
        <li>
            <i class="fa fa-phone" aria-hidden="true"></i>
            <small>09123456789</small>
        </li>
        <li>
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <small>animal.protectors@example.com</small>
        </li>
    </ul>
</div>
        <div class="content">
            <h3>About Feline Frolic</h3>
            <p>Feline Frolic is more than just an event; it’s a gathering of a passionate community committed to helping stray cats find loving homes. This event brings together rescuers, animal lovers, advocates, and compassionate businesses to share knowledge, raise awareness, and promote the welfare of our furry friends. At Feline Frolic, you’ll find adoption booths, insightful talks, local pet-friendly brands, and opportunities to connect with like-minded individuals.</p>

            <h3>Featuring Rescue Organizations</h3>
            <div class="features">
                <ul>
                    <li>The Crazy Cat Dude</li>
                    <li>Kapwa Furrents</li>
                    <li>Pawprints</li>
                    <li>Baby Cat Brigade</li>
                    <li>The Cat Cafe</li>
                    <li>PawsOff</li>
                </ul>
            </div>

            <h3>Volunteer Role</h3>
            <div class="volunteer-role">
                <p>As an event volunteer, you will play a crucial role in making this event a success! Your tasks may include:</p>
                <ul>
                    <li>Assisting at the adoption booth: Helping facilitate the adoption process and sharing information about the available rescues.</li>
                    <li>Supporting fundraising booths: Engaging attendees and encouraging them to support the cause to raise funds that advocate for animal welfare.</li>
                    <li>Event logistics: Setting up, organizing, and packing down event materials (tables, chairs, tents, etc.).</li>
                    <li>Answering attendee inquiries: Welcoming attendees, answering questions, and sharing event details.</li>
                </ul>
            </div>
            <h3>Why Volunteer with us?</h3>
            <div class="volunteer-role">
               <ul>
                    <li>Gain hands-on experience with event management and animal advocacy.</li>
                    <li>Meet animal advocates, rescuers, and fellow volunteers who share your passion..</li>
                    <li>Contribute to a meaningful cause, helping cats find loving, forever homes.</li>
                    <li>Be part of a vibrant community and connect with brands and organizations making a difference.</li>
                </ul>
</div>
        </div>
    </div>
    <?php require_once '../components/footer3.php'; ?>
    <script src="../assets/js/org-event.js?v=<?php echo time(); ?>"></script>
    </body>
</html>

