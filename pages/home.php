<?php
include '../components/navbar2.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/home.css">

</head>
<body>
    <div class="main-content">
    <a class="featured" href="events.php"> <h1>Upcoming Events</h1></a>
        <div class="gallery">
            <div class="gallery-item">
                <a target="_blank" href="../assets/images/volunteer1.webp">
                    <img src="../assets/images/event1.jpg" alt="event 1">
                </a>
                <div class="desc">Event Volunteers Needed for Feline Frolic Event</div>
            </div>
            <div class="gallery-item">
                <a target="_blank" href="../assets/images/volunteer2.jpg">
                    <img src="../assets/images/event2.jpg" alt="event 2">
                </a>
                <div class="desc"> Luntiang Marikina: Marikina River Clean Up Activity for November 2024</div>
            </div>
            <div class="gallery-item">
                <a target="_blank" href="../assets/images/volunteer3.webp">
                    <img src="../assets/images/event3.png" alt="event 3">
                </a>
                <div class="desc">Upcoming Donation Event: Sacks of Rice for Karinderia ni Mang Urot </div>
            </div>
        </div>
        <br>
        <a class="featured" href="volunteer.php"> <h1>Featured Volunteer Events</h1></a>
        <div class="gallery">
            <div class="gallery-item">
                <a target="_blank" href="../assets/images/volunteer1.webp">
                    <img src="../assets/images/event4.jpeg" alt="volunteer 1">
                </a>
                <div class="desc">Featured Volunteer Event: Teaching Financial Literacy to Kids</div>
            </div>
            <div class="gallery-item">
                <a target="_blank" href="../assets/images/volunteer2.jpg">
                    <img src="../assets/images/event5.jpeg" alt="volunteer 2">
                </a>
                <div class="desc">Featured Volunteer Event: Brighten a Foster Child's Day</div>
                </div>
            <div class="gallery-item">
                <a target="_blank" href="../assets/images/volunteer3.webp">
                    <img src="../assets/images/event6.jpeg" alt="volunteer 3">
                </a>
                <div class="desc">Featured Volunteer Event: Feeding Program </div>
            </div>
        </div>
        <br>
        <a class="featured" href="donate.php"> <h1>Featured Donation Events</h1></a>
        <div class="gallery">
            <div class="gallery-item">
                <a target="_blank" href="../assets/images/volunteer1.webp">
                    <img src="../assets/images/donate1.jpeg" alt="donate 1">
                </a>
                <div class="desc">Operatikon Tulong Lycean: Donation for Bagyon Kristine Victims</div>
            </div>
            <div class="gallery-item">
                <a target="_blank" href="../assets/images/volunteer2.jpg">
                    <img src="../assets/images/donate2.jpg" alt="donate 2">
                </a>
                <div class="desc">Dugong Lycean Para sa Bayan: A Blood Donation Drive </div>
            </div>
            <div class="gallery-item">
                <a target="_blank" href="../assets/images/volunteer3.webp">
                    <img src="../assets/images/donate3.jpg" alt="donate 3">
                </a>
                <div class="desc">Underwewar Donation for Typhoon Survivors</div>
            </div>
        </div>
    </div>
    <?php include '../components/footer.php'; ?>
</body>
</html>