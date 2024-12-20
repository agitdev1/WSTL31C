<?php
include '../components/navbar.php';
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
            <form action="login-handler.php" method="post" class="form">
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


