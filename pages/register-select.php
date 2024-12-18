<?php
include '../components/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Selection</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/register-select.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>

    </style>
</head>
<body>
  <!-- Main content -->
  <div class="container">
    <h1 class="title">Choose Your Account Type</h1>
    <div class="sections">
      <div class="section volunteer-section" data-register-type="volunteer">
        <i class="fas fa-hand-holding-heart"></i>
        <p>Become a Volunteer</p>
        <div class="subtitle-container">
          <p class="subtitle">Join us to make a difference in your community.</p>
        </div>
      </div>
      <div class="section organization-section" data-register-type="organization">
        <i class="fa-solid fa-globe"></i>
        <p>Register as Organization</p>
        <div class="subtitle-container">
          <p class="subtitle">Partner with us to expand your impact.</p>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php
  include '../components/footer.php';
  ?>
  <script src="../assets/js/register-select.js"></script>
</body>
</html>