<?php
session_start();
include '../../components/navbar3.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Selection</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/home.css">
    <link rel="stylesheet" href="../../assets/css/post.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
  <!-- Main content -->
  <div class="container">
    <h1 class="title">What type of project would you like to create?</h1>
    <div class="sections">
      <div id="volunteering-section" class="section-link">
        <div class="section volunteering-section">
          <i class="fas fa-calendar-alt"></i>
          <p>Volunteering Project</p>
          <div class="subtitle-container">
            <p class="subtitle">Create a new volunteering opportunity.</p>
          </div>
        </div>
      </div>
      <div id="fundraising-section" class="section-link">
        <div class="section fundraising-section">
          <i class="fas fa-dollar-sign"></i>
          <p>Fundraising</p>
          <div class="subtitle-container">
            <p class="subtitle">Start a new fundraising campaign.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php
  include '../../components/footer3.php';
  ?>

  <script src="../../assets/js/post.js"></script>
</body>
</html>