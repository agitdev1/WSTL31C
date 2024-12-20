<?php
include '../../components/navbar2.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Events</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/modal-donate.css"> 
</head>
<body>
<div class="main-content">
    <h1>Donation Events</h1>
    <div class="gallery">
        <?php
        $events = [
            [
                'image' => '../../assets/images/donation/tulong.jpg',
                'alt' => 'Operation Tulong Lycean',
                'desc' => 'Operation Tulong Lycean: Donation for Bagyong Kristine Victims',
                'location' => '123 Intramuros, Manila City',
                'start_date' => 'Dec 16, 2024',
                'end_date' => 'Dec 20, 2024',
                'organization' => 'LPU Manila'
            ],
            [
                'image' => '../../assets/images/donation/story.png',
                'alt' => 'Storybooks for The Storytelling Project for XYZ Foundation',
                'desc' => 'Storybooks for The Storytelling Project for XYZ Foundation',
                'location' => '123 Tayuman, Manila City',
                'start_date' => 'Jan 10, 2025',
                'end_date' => 'Jan 12, 2025',
                'organization' => 'ABC Foundation'
            ],
            [
                'image' => '../../assets/images/donation/undies.jpg',
                'alt' => 'Funds for Underwear Donation for Typhoon Survivors ',
                'desc' => 'Funds for Underwear Donation for Typhoon Survivors',
                'location' => 'Sta. Mesa Heights, Quezon City',
                'start_date' => 'Feb 20, 2025',
                'end_date' => 'Feb 22, 2025',
                'organization' => 'Angat Buhay'
            ],
            [
                'image' => '../../assets/images/donation/food2.jpg',
                'alt' => 'Fund Raising for Food Donation Drive for XYZ Foster Home',
                'desc' => 'Fund Raising for Food Donation Drive for XYZ Foster Home',
                'location' => '789 Charity Lane, Hope Town, 54321',
                'start_date' => 'Mar 15, 2025',
                'end_date' => 'Mar 17, 2025',
                'organization' => 'Helping Hands'
            ],
            [
                'image' => '../../assets/images/donation/fund.jpg',
                'alt' => 'Fundraising for Typhoon Survivors in ABC Area',
                'desc' => 'Fundraising for Typhoon Survivors in ABC Area',
                'location' => '321 Green Park, Nature City, 98765',
                'start_date' => 'Apr 22, 2025',
                'end_date' => 'Apr 24, 2025',
                'organization' => 'ABC Foundation'
            ],
            [
                'image' => '../../assets/images/donation/clothes.jpg',
                'alt' => 'Funds for Clothes Donation Drive for Typhoon ABC Survivors',
                'desc' => 'Funds for Clothes Donation Drive for Typhoon ABC Survivors',
                'location' => '654 Health Blvd, Wellness City, 11223',
                'start_date' => 'May 5, 2025',
                'end_date' => 'May 7, 2025',
                'organization' => 'Life Savers'
            ]
        ];

        foreach ($events as $event) {
            echo '<div class="gallery-item" data-url="../../pages/user/vol-donate.php">';
            echo '<img src="' . htmlspecialchars($event['image']) . '" alt="' . htmlspecialchars($event['alt']) . '">';
            echo '<div class="desc">' . htmlspecialchars($event['desc']) . '</div>';
            echo '<p class="card-location"><i class="fa fa-location-arrow" aria-hidden="true"></i><small>' . htmlspecialchars($event['location']) . '</small></p>';
            echo '<p><i class="fa fa-calendar" aria-hidden="true"></i><small>' . htmlspecialchars($event['start_date']) . ' - ' . htmlspecialchars($event['end_date']) . '</small></p>';
            echo '<p class="card-organization"><i class="fa fa-users" aria-hidden="true"></i><small>' . htmlspecialchars($event['organization']) . '</small></p>';
            echo '<form action="process_donation.php" method="POST">';
            echo '<input type="hidden" name="event_name" value="' . htmlspecialchars($event['desc']) . '">';
            echo '<input type="hidden" name="location" value="' . htmlspecialchars($event['location']) . '">';
            echo '<input type="hidden" name="start_date" value="' . htmlspecialchars($event['start_date']) . '">';
            echo '<input type="hidden" name="end_date" value="' . htmlspecialchars($event['end_date']) . '">';
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
            <input type="hidden" name="organization" value="">
            <input type="number" name="donations" placeholder="Enter Amount in Peso" min="1" required>
            <button class="cancel" id="cancelButton">Cancel</button>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const galleryItems = document.querySelectorAll('.gallery-item');
        galleryItems.forEach(item => {
            item.addEventListener('click', function(event) {
                // Check if the click target is not the donate button
                if (!event.target.closest('.donate-button')) {
                    const url = this.getAttribute('data-url');
                    window.location.href = url;
                }
            });
        });

        // Prevent event propagation when the donate button is clicked
        const donateButtons = document.querySelectorAll('.donate-button');
        donateButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.stopPropagation();
            });
        });
    });
</script>

<script src="../../assets/js/modal-donate.js"></script>
<?php require_once '../../components/footer2.php'; ?>
</body>
</html>