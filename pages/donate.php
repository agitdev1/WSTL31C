<?php
include '../components/navbar2.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Events</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/modal-donate.css"> <!-- Move modal styles to a separate CSS file -->
</head>
<body>
<div class="main-content">
    <h1>Donation Events</h1>
    <div class="gallery">
        <?php
        $events = [
            [
                'image' => '../assets/images/donation/tulong.jpg',
                'alt' => 'Operation Tulong Lycean',
                'desc' => 'Operation Tulong Lycean: Donation for Bagyong Kristine Victims',
                'location' => '123 Intramuros, Manila City',
                'start_date' => 'Dec 16, 2024',
                'end_date' => 'Dec 20, 2024',
                'time' => '08:00 AM - 12:00 PM',
                'organization' => 'LPU Manila'
            ],
            [
                'image' => '../assets/images/donation/story.png',
                'alt' => 'Storybooks for The Storytelling Project',
                'desc' => 'Storybooks for The Storytelling Project',
                'location' => '123 Tayuman, Manila City',
                'start_date' => 'Jan 10, 2025',
                'end_date' => 'Jan 12, 2025',
                'time' => '09:00 AM - 01:00 PM',
                'organization' => 'ABC Foundation'
            ],
            [
                'image' => '../assets/images/donation/undies.jpg',
                'alt' => 'Funds for Underwear Donation for Typhoon Survivors',
                'desc' => 'Funds for Underwear Donation for Typhoon Survivors',
                'location' => 'Sta. Mesa Heights, Quezon City',
                'start_date' => 'Feb 20, 2025',
                'end_date' => 'Feb 22, 2025',
                'time' => '06:00 AM - 10:00 AM',
                'organization' => 'Angat Buhay'
            ],
            [
                'image' => '../assets/images/donation/food2.jpg',
                'alt' => 'Fund Raising for Food Donation Drive for XYZ Foster Home',
                'desc' => 'Fund Raising for Food Donation Drive for XYZ Foster Home',
                'location' => '789 Charity Lane, Hope Town, 54321',
                'start_date' => 'Mar 15, 2025',
                'end_date' => 'Mar 17, 2025',
                'time' => '10:00 AM - 02:00 PM',
                'organization' => 'Helping Hands'
            ],
            [
                'image' => '../assets/images/donation/fund.jpg',
                'alt' => 'Fundraising for Typhoon Survivors',
                'desc' => 'Fundraising for Typhoon Survivors',
                'location' => '321 Green Park, Nature City, 98765',
                'start_date' => 'Apr 22, 2025',
                'end_date' => 'Apr 24, 2025',
                'time' => '07:00 AM - 11:00 AM',
                'organization' => 'ABC Foundation'
            ],
            [
                'image' => '../assets/images/donation/clothes.jpg',
                'alt' => 'Funds for Clothes Donation Drive for Typhoon ABC Survivors',
                'desc' => 'Funds for Clothes Donation Drive for Typhoon ABC Survivors',
                'location' => '654 Health Blvd, Wellness City, 11223',
                'start_date' => 'May 5, 2025',
                'end_date' => 'May 7, 2025',
                'time' => '09:00 AM - 03:00 PM',
                'organization' => 'Life Savers'
            ]
        ];

        foreach ($events as $event) {
            echo '<div class="gallery-item">';
            echo '<a target="_blank" href="https://via.placeholder.com/300x200">';
            echo '<img src="' . htmlspecialchars($event['image']) . '" alt="' . htmlspecialchars($event['alt']) . '">';
            echo '</a>';
            echo '<div class="desc">' . htmlspecialchars($event['desc']) . '</div>';
            echo '<p class="card-location"><i class="fa fa-location-arrow" aria-hidden="true"></i><small>' . htmlspecialchars($event['location']) . '</small></p>';
            echo '<p><i class="fa fa-calendar" aria-hidden="true"></i><small>' . htmlspecialchars($event['start_date']) . ' - ' . htmlspecialchars($event['end_date']) . '</small></p>';
            echo '<p><i class="fa fa-clock-o" aria-hidden="true"></i><small>' . htmlspecialchars($event['time']) . '</small></p>';
            echo '<p class="card-organization"><i class="fa fa-users" aria-hidden="true"></i><small>' . htmlspecialchars($event['organization']) . '</small></p>';
            echo '<form action="process_donation.php" method="POST">';
            echo '<input type="hidden" name="event_name" value="' . htmlspecialchars($event['desc']) . '">';
            echo '<input type="hidden" name="location" value="' . htmlspecialchars($event['location']) . '">';
            echo '<input type="hidden" name="start_date" value="' . htmlspecialchars($event['start_date']) . '">';
            echo '<input type="hidden" name="end_date" value="' . htmlspecialchars($event['end_date']) . '">';
            echo '<input type="hidden" name="time" value="' . htmlspecialchars($event['time']) . '">';
            echo '<input type="hidden" name="organization" value="' . htmlspecialchars($event['organization']) . '">';
            echo '<button type="submit" class="donate-button">DONATE</button>';
            echo '</form>';
            echo '</div>';
        }
        ?>
    </div>
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
            <input type="hidden" name="time" value="">
            <input type="hidden" name="organization" value="">
            <input type="number" name="donations" placeholder="Enter Amount in Peso" min="1" required>
            <button class="cancel" id="cancelButton">Cancel</button>
            <button type="submit">Submit</button>

        </form>
    </div>
</div>

<script src="../assets/js/modal-donate.js"></script>

<?php require_once '../components/footer2.php'; ?>
</body>
</html>