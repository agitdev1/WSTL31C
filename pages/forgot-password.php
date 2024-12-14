<?php
include '../components/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../assets/css/styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/forgot-password.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="page-container">
        <div class="content-wrap">
            <div class="form-container">
                <form id="forgot-password-form" action="login.php" method="post" class="form">
                    <h1 class="form-h1">Forgot your password?</h1>
                    <input type="text" id="email" name="email" placeholder="Enter your email" required>
                    <button type="submit">Send Link</button>
                    <div id="error-message" class="error-message"></div>
                    <div id="success-message" class="success-message"></div>
                </form>
                <p>Founded in 2024, we have grown significantly over the years, thanks to our commitment to continuous improvement and customer satisfaction. We believe in building strong relationships with our clients and always strive to exceed their expectations.</p>
            </div>
        </div>
        <?php require_once '../components/footer.php'; ?>
    </div>
    <script src="../assets/js/forgot-password.js"></script>
</body>
</html>

