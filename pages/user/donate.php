<?php
include '../../components/navbar2.php';

function renderEvent($event) {
    $html = '<div class="gallery-item">';
    $html .= '<a href="../../pages/user/vol-donate.php" rel="noopener noreferrer">';
    $html .= '<img src="' . htmlspecialchars($event['image']) . '" alt="' . htmlspecialchars($event['alt']) . '">';
    $html .= '</a>';
    $html .= '<div class="desc">' . htmlspecialchars($event['desc']) . '</div>';
    $html .= '<p class="card-location"><i class="fa fa-location-arrow" aria-hidden="true"></i><small>' . htmlspecialchars($event['location']) . '</small></p>';
    $html .= '<p><i class="fa fa-calendar" aria-hidden="true"></i><small>' . htmlspecialchars($event['start_date']) . ' - ' . htmlspecialchars($event['end_date']) . '</small></p>';
    $html .= '<p class="card-organization"><i class="fa fa-users" aria-hidden="true"></i><small>' . htmlspecialchars($event['organization']) . '</small></p>';
    $html .= '<form action="../../process_donation.php" method="POST">';
    foreach (['desc', 'location', 'start_date', 'end_date', 'organization'] as $field) {
        $html .= '<input type="hidden" name="' . $field . '" value="' . htmlspecialchars($event[$field]) . '">';
    }
    $html .= '<button type="submit" class="donate-button">DONATE</button>';
    $html .= '</form>';
    $html .= '</div>';
    return $html;
}

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
    // Other events...
];
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
        foreach ($events as $event) {
            echo renderEvent($event);
        }
        ?>
    </div>
</div>

<!-- Modal -->
<div id="donationModal" class="modal">
    <div class="modal-content">
        <span id="closeModalButton" class="close">&times;</span>
        <h2>Enter Amount in Peso</h2>
        <form id="donationForm" method="POST" action="../../process_donation.php">
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

<script src="../../assets/js/modal-donate.js"></script>
<?php require_once '../../components/footer2.php'; ?>
</body>
</html>
