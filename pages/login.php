<?php
require '../vendor/autoload.php'; // Include Composer's autoloader
include '../components/navbar.php';

$client = new MongoDB\Client("mongodb+srv://somedudein:g8qSNOKbcS7Uh39d@voluntech.waoix.mongodb.net/?retryWrites=true&w=majority&appName=VolunTech"); // Connect to MongoDB
$collection = $client->yourDatabaseName->volunteers; // Select the database and collection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Find the user by email
    $user = $collection->findOne(['email' => $email]);

    if ($user && password_verify($password, $user['password'])) {
        // Password is correct, start a session and redirect to a protected page
        session_start();
        $_SESSION['user_id'] = (string)$user['_id'];
        header('Location: ../pages/home.php');
        exit;
    } else {
        // Invalid email or password
        echo "<script>alert('Invalid email or password. Please try again.');</script>";
    }
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


