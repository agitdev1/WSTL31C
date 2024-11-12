<?php
include '../components/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< Updated upstream
    <title>Welcome to Voluntech</title>
    <link rel="stylesheet" href="../assets/css/styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/form.css?v=<?php echo time(); ?>">
</head>
<body>
<<<<<<< HEAD
    <div class="main-content">
<h1>Login Form</h1>
<p>This will be the page where we will put the login form for our website</p>
<p>Founded in 2024, we have grown significantly over the years, thanks to our commitment to continuous improvement and customer satisfaction. We believe in building strong relationships with our clients and always strive to exceed their expectations.</p>
</div>
    <?php include '../components/footer.php'; ?>
=======
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/login.css?v=<?php echo time(); ?>">
</head>
<body>
=======
>>>>>>> 6f80363debb16d1d0c84894edb660a86a13edbf2
    <div class="page-container">
        <div class="content-wrap">
            <div class="form-container">
                <form action="login.php" method="post" class="form">
<<<<<<< HEAD
                    <h1 class="form-h1">Already have an account? </h1>
                    <h2 class="form-h2">Log in to your account</h2>
                    <input type="text" id="email" name="email" placeholder="Email" required>
=======
                    <h1 class="form-h1">Start Volunteering</h1>
                    <input type="text" id="username" name="username" placeholder="Username" required>
>>>>>>> 6f80363debb16d1d0c84894edb660a86a13edbf2
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <a href="forgot-password.php">Forgot Password?</a>
                    <button type="submit">Login</button>
                </form>
                <p>Founded in 2024, we have grown significantly over the years, thanks to our commitment to continuous improvement and customer satisfaction. We believe in building strong relationships with our clients and always strive to exceed their expectations.</p>
            </div>
        </div>
        <?php include '../components/footer.php'; ?>
    </div>
<<<<<<< HEAD
>>>>>>> Stashed changes
=======
>>>>>>> 6f80363debb16d1d0c84894edb660a86a13edbf2
</body>
</html>

