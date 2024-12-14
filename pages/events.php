<?php
include '../components/navbar2.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Volunteering Events</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="main-content">
    <h1>Upcoming Events</h1>
    <div class="gallery">
        <!-- Event 1 -->
        <div class="gallery-item">
            <a target="_blank" href="https://via.placeholder.com/300x200">
                <img src="https://via.placeholder.com/300x200" alt="event 1">
            </a>
            <div class="desc">Event Volunteers Needed for Feline Frolic Event</div>
            <p class="card-location">
                <i class="fa fa-location-arrow" aria-hidden="true"></i>
                <small>White Sand Beach, Coastal City, 56789</small>
            </p>
            <p>
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <small>Dec 20, 2024</small>
            </p>
            <p>
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                <small>07:00 AM - 11:00 AM</small>
            </p>
            <p class="card-organization">
                <i class="fa fa-users" aria-hidden="true"></i>
                <small>Ocean Protectors</small>
            </p>
            <form action="process_registration.php" method="POST">
                <input type="hidden" name="event_name" value="Beach Cleanup Initiative">
                <input type="hidden" name="location" value="White Sand Beach, Coastal City, 56789">
                <input type="hidden" name="date" value="Dec 20, 2024">
                <input type="hidden" name="time" value="07:00 AM - 11:00 AM">
                <input type="hidden" name="organization" value="Ocean Protectors">
                <button type="submit" class="donate-button">Register Now</button>
            </form>
        </div>
        
    <!-- Event 2 -->
    <div class="gallery-item">
        <a target="_blank" href="https://via.placeholder.com/300x200">
            <img src="https://via.placeholder.com/300x200" alt="event 2">
        </a>
        <div class="desc">Luntiang Marikina: Marikina River Clean Up Activity for November 2024</div>
        <p class="card-location">
            <i class="fa fa-location-arrow" aria-hidden="true"></i>
            <small>123 Charity Street, Green City, 12345</small>
        </p>
        <p>
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <small>Jan 10, 2025</small>
        </p>
        <p>
            <i class="fa fa-clock-o" aria-hidden="true"></i>
            <small>09:00 AM - 01:00 PM</small>
        </p>
        <p class="card-organization">
            <i class="fa fa-users" aria-hidden="true"></i>
            <small>Green Earth Volunteers</small>
        </p>
        <form action="process_registration.php" method="POST">
            <input type="hidden" name="event_name" value="Luntiang Marikina: Marikina River Clean Up Activity for November 2024">
            <input type="hidden" name="location" value="123 Charity Street, Green City, 12345">
            <input type="hidden" name="date" value="Jan 10, 2025">
            <input type="hidden" name="time" value="09:00 AM - 01:00 PM">
            <input type="hidden" name="organization" value="Green Earth Volunteers">
            <button type="submit" class="donate-button">Register Now</button>
        </form>
    </div>
        
        <!-- Event 3 -->
        <div class="gallery-item">
            <a target="_blank" href="https://via.placeholder.com/300x200">
                <img src="https://via.placeholder.com/300x200" alt="event 3">
            </a>
            <div class="desc">Upcoming Donation Event: Sacks of Rice for Karinderia ni Mang Urot</div>
            <p class="card-location">
                <i class="fa fa-location-arrow" aria-hidden="true"></i>
                <small>456 Runway Ave, Fitness City, 67890</small>
            </p>
            <p>
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <small>Feb 20, 2025</small>
            </p>
            <p>
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                <small>06:00 AM - 10:00 AM</small>
            </p>
            <p class="card-organization">
                <i class="fa fa-users" aria-hidden="true"></i>
                <small>Healthy Living Org</small>
            </p>
            <form action="process_registration.php" method="POST">
                <input type="hidden" name="event_name" value="Upcoming Donation Event: Sacks of Rice for Karinderia ni Mang Urot">
                <input type="hidden" name="location" value="456 Runway Ave, Fitness City, 67890">
                <input type="hidden" name="date" value="Feb 20, 2025">
                <input type="hidden" name="time" value="06:00 AM - 10:00 AM">
                <input type="hidden" name="organization" value="Healthy Living Org">
                <button type="submit" class="donate-button">Register Now</button>
            </form>
        </div>

        <!-- Event 4 -->
        <div class="gallery-item">
            <a target="_blank" href="https://via.placeholder.com/300x200">
                <img src="https://via.placeholder.com/300x200" alt="event 4">
            </a>
            <div class="desc">Project Baon, A Day of Volunteer Service</div>
            <p class="card-location">
                <i class="fa fa-location-arrow" aria-hidden="true"></i>
                <small>789 Charity Lane, Hope Town, 54321</small>
            </p>
            <p>
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <small>Mar 15, 2025</small>
            </p>
            <p>
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                <small>10:00 AM - 02:00 PM</small>
            </p>
            <p class="card-organization">
                <i class="fa fa-users" aria-hidden="true"></i>
                <small>Helping Hands</small>
            </p>
            <form action="process_registration.php" method="POST">
                <input type="hidden" name="event_name" value="Project Baon, A Day of Volunteer Service">
                <input type="hidden" name="location" value="789 Charity Lane, Hope Town, 54321">
                <input type="hidden" name="date" value="Mar 15, 2025">
                <input type="hidden" name="time" value="10:00 AM - 02:00 PM">
                <input type="hidden" name="organization" value="Helping Hands">
                <button type="submit" class="donate-button">Register Now</button>
            </form>
        </div>

        <!-- Event 5 -->
        <div class="gallery-item">
            <a target="_blank" href="https://via.placeholder.com/300x200">
                <img src="https://via.placeholder.com/300x200" alt="event 5">
            </a>
            <div class="desc">Feed the Hungry</div>
            <p class="card-location">
                <i class="fa fa-location-arrow" aria-hidden="true"></i>
                <small>321 Green Park, Nature City, 98765</small>
            </p>
            <p>
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <small>Apr 22, 2025</small>
            </p>
            <p>
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                <small>07:00 AM - 11:00 AM</small>
            </p>
            <p class="card-organization">
                <i class="fa fa-users" aria-hidden="true"></i>
                <small>Eco Warriors</small>
            </p>
            <form action="process_registration.php" method="POST">
                <input type="hidden" name="event_name" value="Tree Planting Volunteer Day">
                <input type="hidden" name="location" value="321 Green Park, Nature City, 98765">
                <input type="hidden" name="date" value="Apr 22, 2025">
                <input type="hidden" name="time" value="07:00 AM - 11:00 AM">
                <input type="hidden" name="organization" value="Eco Warriors">
                <button type="submit" class="donate-button">Register Now</button>
            </form>
        </div>

        <!-- Event 6 -->
        <div class="gallery-item">
            <a target="_blank" href="https://via.placeholder.com/300x200">
                <img src="https://via.placeholder.com/300x200" alt="event 6">
            </a>
            <div class="desc">Blood Donation Volunteer Support</div>
            <p class="card-location">
                <i class="fa fa-location-arrow" aria-hidden="true"></i>
                <small>654 Health Blvd, Wellness City, 11223</small>
            </p>
            <p>
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <small>May 5, 2025</small>
            </p>
            <p>
                <i class="fa fa-clock-o" aria-hidden="true"></i>
                <small>09:00 AM - 03:00 PM</small>
            </p>
            <p class="card-organization">
                <i class="fa fa-users" aria-hidden="true"></i>
                <small>Life Savers</small>
            </p>
            <form action="process_registration.php" method="POST">
                <input type="hidden" name="event_name" value="Blood Donation Volunteer Support">
                <input type="hidden" name="location" value="654 Health Blvd, Wellness City, 11223">
                <input type="hidden" name="date" value="May 5, 2025">
                <input type="hidden" name="time" value="09:00 AM - 03:00 PM">
                <input type="hidden" name="organization" value="Life Savers">
                <button type="submit" class="donate-button">Register Now</button>
            </form>
        </div>
    </div>
</div>
<?php require_once '../components/footer2.php'; ?>
</body>
</html>