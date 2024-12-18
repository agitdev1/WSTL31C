<?php
include '../components/navbar2.php';
require_once '../vendor/autoload.php';



if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Connect to MongoDB
try {
    $uri = "mongodb+srv://somedudein:g8qSNOKbcS7Uh39d@voluntech.waoix.mongodb.net/?retryWrites=true&w=majority&appName=VolunTech";
    $client = new MongoDB\Client("mongodb+srv://somedudein:g8qSNOKbcS7Uh39d@voluntech.waoix.mongodb.net/?retryWrites=true&w=majority&appName=VolunTech");
    $collection = $client->yourDatabaseName->volunteers;
} catch (Exception $e) {
    die("Failed to connect to database: " . $e->getMessage());
}

// Initialize error and success messages arrays
$errors = [];
$success = [];
// Fetch user data
try {
    $userId = $_SESSION['user_id'];
    $user = $collection->findOne(['_id' => new \MongoDB\BSON\ObjectId($userId)]);
    if (!$user) {
        throw new Exception("User not found");
    }
} catch (Exception $e) {
    $errors[] = "Error retrieving user data: " . $e->getMessage();
}

if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <div class="alert alert-success">
        <?php foreach ($success as $message): ?>
            <p><?php echo $message; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/profile.css">

</head>
<body>
<div class="container">
    <div class="sidebar">
            <ul class="menu">
                <li class="menu-item"><a href="../pages/dashboard.php">User Dashboard</a></li>
                <li class="menu-item"><a href="../pages/history.php">My History</a></li>                
                <li class="menu-item "><a href="../pages/profile.php">Profile</a></li>
                <li class="menu-item active"><a href="../pages/account.php">Account</a></li>
                <li class="menu-item"><hr></li>
                <li class="menu-item"><a href="../pages/index.php">Logout</a></li>
            </ul>
    </div>
    <div class="main-content">
        <div class="profile-info">
            <h2>User Information</h2>
            <p><strong>First Name:</strong> <?php echo htmlspecialchars($user->first_name ?? ''); ?></p>
            <p><strong>Last Name:</strong> <?php echo htmlspecialchars($user->last_name ?? ''); ?></p>
            <p><strong>Mobile Number:</strong> <?php echo htmlspecialchars($user->mobile_number ?? ''); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user->email ?? ''); ?></p>
            <p><strong>Gender:</strong> <?php echo htmlspecialchars($user->gender ?? ''); ?></p>
            <p><strong>City:</strong> <?php echo htmlspecialchars($user->city ?? ''); ?></p>
            <p><strong>Skills:</strong> <?php echo htmlspecialchars($user->skills ?? ''); ?></p>
            <p><strong>Cause:</strong> <?php echo htmlspecialchars($user->cause ?? ''); ?></p>
        </div>
        <button class="update" type"submit">Reset Password</button>
        <script> 
            document.querySelector('.update').addEventListener('click', function(e) {
                e.preventDefault();
                window.location.href = '../pages/reset-password.php';
            })
        </script>
    </div>
</div>
<?php require_once '../components/footer2.php'; ?>
</body>
</html>

