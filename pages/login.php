<?php
// Start session at the very beginning
session_start();

require '../vendor/autoload.php'; // Include Composer's autoloader
include '../components/navbar.php';

// Connect to MongoDB
$client = new MongoDB\Client("mongodb+srv://somedudein:g8qSNOKbcS7Uh39d@voluntech.waoix.mongodb.net/?retryWrites=true&w=majority&appName=VolunTech");

// Make sure you use the correct database name
$volunteersCollection = $client->yourDatabaseName->volunteers; 
$organizationsCollection = $client->yourDatabaseName->organizations;

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form inputs and sanitize them
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Check the volunteers collection
    $volunteer = $volunteersCollection->findOne(['email' => $email]);
    if ($volunteer && password_verify($password, $volunteer['password'])) {
        // Volunteer login successful
        $_SESSION['user_id'] = (string) $volunteer['_id'];
        $_SESSION['user_type'] = 'volunteer';
        $_SESSION['email'] = $email;
        header('Location: ../pages/home.php'); 
        exit; // Always call exit() after header()
    }

    // Check the organizations collection
    $organization = $organizationsCollection->findOne(['email' => $email]);
    if ($organization && password_verify($password, $organization['password'])) {
        // Organization login successful
        $_SESSION['user_id'] = (string) $organization['_id'];
        $_SESSION['user_type'] = 'organization';
        $_SESSION['email'] = $email;
        header('Location: ../pages/org.php'); 
        exit; // Always call exit() after header()
    }

    // If both queries fail, show an error
    echo "<script>alert('Invalid email or password. Please try again.');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/login.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="page-container">
        <div class="content-wrap">
            <div class="form-container">
                <form action="login.php" method="post" class="form">
                    <h1 class="form-h1">Already have an account? </h1>
                    <h2 class="form-h2">Log in to your account</h2>
                    <input type="text" id="email" name="email" placeholder="Email" required>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <a href="forgot-password.php">Forgot Password?</a>
                    <button type="submit">Login</button>
                </form>
                <p>Founded in 2024, we have grown significantly over the years, thanks to our commitment to continuous improvement and customer satisfaction. We believe in building strong relationships with our clients and always strive to exceed their expectations.</p>
            </div>
        </div>
        <?php require_once '../components/footer.php'; ?>
    </div>
</body>
</html>


