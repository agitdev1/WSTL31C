<?php
include '../components/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Voluntech</title>
    <link rel="stylesheet" href="../assets/css/styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/login.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="page-container">
        <div class="content-wrap">
            <div class="form-container">
                <form action="login.php" method="post" class="form">
                    <h1 class="form-h1">Start Volunteering</h1>
                    <input type="text" id="username" name="username" placeholder="Username" required>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <a href="forgot-password.php">Forgot Password?</a>
                    <button type="submit">Login</button>
                </form>
                <p>Founded in 2024, we have grown significantly over the years, thanks to our commitment to continuous improvement and customer satisfaction. We believe in building strong relationships with our clients and always strive to exceed their expectations.</p>
            </div>
        </div>
        <?php include '../components/footer.php'; ?>
    </div>
</body>
</html>

