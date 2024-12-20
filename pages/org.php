<?php
include '../components/navbar3.php';
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

    <?php
    $sections = [
        "Your Upcoming Events" => [
            "link" => "oops2.php",
            "items" => [
                [
                    "image" => "../assets/images/event1.jpg",
                    "link" => "../pages/org-event.php",
                    "description" => "Event Volunteers Needed for Feline Frolic Event"
                ],
                [
                    "image" => "../assets/images/event2.jpg",
                    "link" => "../pages/org-event.php",
                    "description" => "Luntiang Marikina: Marikina River Clean Up Activity for November 2024"
                ],
                [
                    "image" => "../assets/images/event3.png",
                    "link" => "../pages/org-donate.php",
                    "description" => "Sacks of Rice for Karinderia ni Mang Urot"
                ],
            ]
        ],
        "Your Ongoing Volunteering Projects" => [
            "link" => "oops2.php",
            "items" => [
                [
                    "image" => "../assets/images/event4.jpeg",
                    "link" => "../pages/org-event.php",
                    "description" => "Teaching Financial Literacy to Kids"
                ],
                [
                    "image" => "../assets/images/event5.jpeg",
                    "link" => "../pages/org-event.php",
                    "description" => "Brighten a Foster Child's Day"
                ],
                [
                    "image" => "../assets/images/event6.jpeg",
                    "link" => "../pages/org-event.php",
                    "description" => "Feeding Program"
                ],
            ]
        ],
        "Your Ongoing Donation Events" => [
            "link" => "oops2.php",
            "items" => [
                [
                    "image" => "../assets/images/events/books.png",
                    "link" => "../pages/org-donate.php",
                    "description" => "Operation Tulong Lycean: Donation for Bagyon Kristine Victims"
                ],
                [
                    "image" => "../assets/images/donate2.jpg",
                    "link" => "../pages/org-donate.php",
                    "description" => "Dugong Lycean Para sa Bayan: A Blood Donation Drive"
                ],
                [
                    "image" => "../assets/images/donate3.jpg",
                    "link" => "../pages/org-donate.php",
                    "description" => "Underwear Donation for Typhoon Survivors"
                ],
            ]
        ],
    ];

    foreach ($sections as $title => $data) {
        echo "<a class='featured' href='{$data['link']}'><h1>$title</h1></a>";
        echo "<div class='gallery'>";
        foreach ($data['items'] as $item) {
            echo "<div class='gallery-item'>";
            echo "<a href='{$item['link']}'>";
            echo "<img src='{$item['image']}' alt='event'>";
            echo "</a>";
            echo "<div class='desc'>{$item['description']}</div>";
            echo "</div>";
        }
        echo "</div><br>";
    }
    ?>
</div>
<?php require_once '../components/footer3.php'; ?>
</body>
</html>
