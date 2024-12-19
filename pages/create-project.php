<?php 
session_start();
include '../components/navbar3.php';
require '../vendor/autoload.php'; // MongoDB PHP library (if using Composer)

// MongoDB connection string
$connectionString = "mongodb+srv://somedudein:g8qSNOKbcS7Uh39d@voluntech.waoix.mongodb.net/?retryWrites=true&w=majority&appName=VolunTech";

// 1️⃣ Initialize variables to avoid "undefined variable" errors
$organization = null;
$email = $_SESSION['email'] ?? null; // Assuming email is stored in session
if (!$email) {
    die('Email is not set. Please log in again.');
}

// 2️⃣ Move the MongoDB connection **above** usage of $organizationsCollection
try {
    // Connect to MongoDB
    $client = new MongoDB\Client($connectionString);
    $db = $client->yourDatabaseName; // Replace with your database name
    $opportunitiesCollection = $db->opportunities; // Opportunities collection
    $organizationsCollection = $db->organizations; // Organizations collection
} catch (Exception $e) {
    die("Failed to connect to MongoDB: " . $e->getMessage());
}

// 3️⃣ Use the collection after it is initialized
$organization = $organizationsCollection->findOne(['email' => $email]);

/*if ($organization) {
    $_SESSION['organization_id'] = (string) $organization['_id']; // Set organization id
    header('Location: dashboard2.php'); // Redirect to dashboard
    exit();
} else {
    echo "Invalid login.";
}*/

// Check if the user is logged in
if (!isset($_SESSION['organization_id'])) {
    die("You must be logged in as an organization to create a project.");
}

// Fetch the organization details
try {
    $organizationId = new MongoDB\BSON\ObjectId($_SESSION['organization_id']);
    $organization = $organizationsCollection->findOne(['_id' => $organizationId]);

    if (!$organization) {
        die("Invalid organization. Please log in again.");
    }
} catch (Exception $e) {
    die("Error fetching organization: " . $e->getMessage());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $organizer = $_POST['organizer'];
    $location = $_POST['location'];
    $skills = $_POST['skills'];
    $cause = $_POST['cause'];
    $date = $_POST['date'];
    $startTime = $_POST['start-time'];
    $endTime = $_POST['end-time'];
    $hours = (int)$_POST['hours'];
    $image = $_FILES['image'];

    // Handle file upload
    $uploadDir = '../uploads/';
    $fileName = uniqid() . '-' . basename($image['name']);
    $filePath = $uploadDir . $fileName;

    if (!move_uploaded_file($image['tmp_name'], $filePath)) {
        die("Failed to upload image.");
    }

    // Prepare the data to be inserted
    $project = [
        'title' => $title,
        'organizer' => $organizer,
        'location' => $location,
        'skills' => explode(',', $skills),
        'cause' => explode(',', $cause),
        'date' => $date,
        'start_time' => $startTime,
        'end_time' => $endTime,
        'hours' => $hours,
        'image_path' => $filePath,
        'organization_id' => $organizationId, // Link to organization
        'created_at' => new MongoDB\BSON\UTCDateTime()
    ];

    // Insert the project into the opportunities collection
    try {
        $insertResult = $opportunitiesCollection->insertOne($project);
        if ($insertResult->getInsertedCount() > 0) {
            echo "<script>alert('Project created successfully!');</script>";
            header('Location: org.php'); // Redirect to a success page
            exit;
        } else {
            echo "<script>alert('Failed to create project.');</script>";
        }
    } catch (Exception $e) {
        die("Error inserting project: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/register.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/create-project.css?v=<?php echo time(); ?>">

</head>
<body>
    <div class="container"> 
        <h1>Create a Volunteering Project </h1>
        <br>
        <form action="create-project.php" method="post" class="form" enctype="multipart/form-data">
    <div> 
        <label for="title">Title</label>
        <input type="text" id="title" name="title" required placeholder="Enter project title">
    </div>
    <div>
        <label for="organizer">Organizer</label>
        <input type="text" id="organizer" name="organizer" required placeholder="Organizer Name">
    </div>
    <div> 
        <label for="location">Location</label>
        <input type="text" id="location" name="location" required placeholder="Location">
    </div>
    <div>
        <label for="skills">Skills needed</label>
        <input type="text" autocomplete="off" id="skills" name="skills" placeholder="Select skills needed" required readonly>
    </div>
    <div>
        <label for="cause">Cause Area</label>
        <input type="text" autocomplete="off" id="cause" name="cause" placeholder="Select cause Area" required readonly>
    </div>
    <div>
        <label for="date">Date</label>
        <input type="date" id="date" name="date" required>
    </div>
    <div>
        <label for="time">Start Time</label>
        <input type="time" id="time" name="start-time" required>
    </div>
    <div>
        <label for="time">End Time</label>
        <input type="time" id="time" name="end-time" required>
    </div>
    <div>
        <label for="hours">Amount of Hours</label>
        <input type="number" id="hours" name="hours" min="1" required placeholder="Hours">
    </div>
    <br>
    <div>
        <label for="image">Upload Banner:</label>
        <input type="file" id="image" name="image" accept="image/*" required>
    </div>
    <br>
    <button type="submit">Submit</button>
</form>
    </div>
    <!-- SKILLS MODAL-->
    <div id="skillModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Select Skills (Maximum of 3)</h2>
            <table id="skillOptions">
                <tr>
                    <td><label><input type="checkbox" value="Communication Skills"> Communication Skills</label></td>
                    <td><label><input type="checkbox" value="Negotiation and Conflict Resolution"> Negotiation and Conflict Resolution</label></td>
                    <td><label><input type="checkbox" value="Networking"> Networking</label></td>
                    <td><label><input type="checkbox" value="Project Management"> Project Management</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox" value="Policy Analysis"> Policy Analysis</label></td>
                    <td><label><input type="checkbox" value="Advocacy"> Advocacy</label></td>
                    <td><label><input type="checkbox" value="Data Literacy"> Data Literacy</label></td>
                    <td><label><input type="checkbox" value="Cross-Cultural Competence"> Cross-Cultural Competence</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox" value="Strategic Thinking"> Strategic Thinking</label></td>
                    <td><label><input type="checkbox" value="Financial Management"> Financial Management</label></td>
                    <td><label><input type="checkbox" value="Technological Proficiency"> Technological Proficiency</label></td>
                    <td><label><input type="checkbox" value="Leadership"> Leadership</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox" value="Monitoring and Evaluation"> Monitoring and Evaluation</label></td>
                    <td><label><input type="checkbox" value="Adaptability and Resilience"> Adaptability and Resilience</label></td>
                    <td><label><input type="checkbox" value="Ethical Decision-Making"> Ethical Decision-Making</label></td>
                    <td><label><input type="checkbox" value="Public Speaking and Presentation"> Public Speaking and Presentation</label></td>
                </tr>
            </table>                
            <button id="saveSkills">Save</button>
        </div>
    </div> 
    <!-- CAUSE MODAL-->
    <div id="causesModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Cause Area</h2>
            <table id="causeOptions">
                <tr>
                    <td><label><input type="checkbox" value="No Poverty"> No Poverty</label></td>
                    <td><label><input type="checkbox" value="Zero Hunger"> Zero Hunger</label></td>
                    <td><label><input type="checkbox" value="Good Health and Well-Being"> Good Health and Well-Being</label></td>
                    <td><label><input type="checkbox" value="Quality Education"> Quality Education</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox" value="Gender Equality"> Gender Equality</label></td>
                    <td><label><input type="checkbox" value="Clean Water and Sanitation"> Clean Water and Sanitation</label></td>
                    <td><label><input type="checkbox" value="Affordable and Clean Energy"> Affordable and Clean Energy</label></td>
                    <td><label><input type="checkbox" value="Decent Work and Economic Growth"> Decent Work and Economic Growth</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox" value="Industry, Innovation, and Infrastructure"> Industry, Innovation, and Infrastructure</label></td>
                    <td><label><input type="checkbox" value="Reduced Inequality"> Reduced Inequality</label></td>
                    <td><label><input type="checkbox" value="Sustainable Cities and Communities"> Sustainable Cities and Communities</label></td>
                    <td><label><input type="checkbox" value="Responsible Consumption and Production"> Responsible Consumption and Production</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox" value="Climate Action"> Climate Action</label></td>
                    <td><label><input type="checkbox" value="Life Below Water"> Life Below Water</label></td>
                    <td><label><input type="checkbox" value="Life on Land"> Life on Land</label></td>
                    <td><label><input type="checkbox" value="Peace, Justice, and Strong Institutions"> Peace, Justice, and Strong Institutions</label></td>
                </tr>
            </table>
            <button id="saveCauses">Save</button>
        </div>
    </div>
    <script src="../assets/js/create-project.js"></script>
    <?php require_once '../components/footer3.php'; ?>
</body>
</html>

