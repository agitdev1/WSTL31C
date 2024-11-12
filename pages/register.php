<?php
include '../components/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Voluntech</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/form.css">
</head>
<body>
    <div class="page-container">
        <div class="content-wrap">
            <div class="form-container">
                <form action="login.php" method="post" class="form">
                <h1 class="form-h1">Start Your Volunteering Journey!</h1>
                <input type="text" id="first-name" name="first-name" placeholder="First Name" required>
                <input type="text" id="last-name" name="last-name" placeholder="Last Name" required>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="tel" pattern="0\d{10}" id="contact-number" name="contact-number" placeholder="Contact Number" required maxlength="11">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
                <a href="login.php">Already have an account?</a>
                <button type="submit">Register</button>
            </form>
            <p>Founded in 2024, we have grown significantly over the years, thanks to our commitment to continuous improvement and customer satisfaction. We believe in building strong relationships with our clients and always strive to exceed their expectations.</p>
        </div>
    </div>
    <?php include '../components/footer.php'; ?>
    <script>
        const emailInput = document.getElementById('email');
        
        emailInput.addEventListener('input', () => {
          const emailValue = emailInput.value;
          const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
          if (!emailRegex.test(emailValue)) {
            emailInput.setCustomValidity('Invalid email address');
          } else {
            emailInput.setCustomValidity('');
          }
        });
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirm-password');
        
        confirmPasswordInput.addEventListener('input', () => {
          const passwordValue = passwordInput.value;
          const confirmPasswordValue = confirmPasswordInput.value;
          if (passwordValue !== confirmPasswordValue) {
            confirmPasswordInput.setCustomValidity('Passwords do not match');
          } else {
            confirmPasswordInput.setCustomValidity('');
          }
        });
    </script>
>>>>>>> 6f80363debb16d1d0c84894edb660a86a13edbf2
</body>
</html>



