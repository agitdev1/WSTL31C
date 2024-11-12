<?php
include '../components/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/register.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container"> 
        <h1>Join Our Volunteer Community</h1>
        <h2>Embark on a meaningful journey to <span style="color:#DD4040; font-weight:bold;">MAKE A DIFFERENCE </span> </h2>
        <br>
        <form action="register.php" method="post" class="form">
            <div> 
                <input type="text" id="first_name" name="first_name" required placeholder="First Name">
            </div>
            <div>
                <input type="text" id="last_name" name="last_name" required placeholder="Last Name">
            </div>
            <div>
                <select id="age" name="age" required>
                    <option value="" disabled selected>Select your age range</option>
                    <option value="under_18">Under 18 years old</option>
                    <option value="18_to_24">18 to 24</option>
                    <option value="25_to_34">25 to 34</option>
                    <option value="35_to_44">35 to 44</option>
                    <option value="45_to_54">45 to 54</option>
                    <option value="55_to_64">55 to 64</option>
                    <option value="65_plus">65+ years old</option>
                </select>
            </div>
            <div>
                <select id="gender" name="gender" required>
                    <option value="" disabled selected>Select your Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                    <option value="none">Prefer not to answer</option>
                </select>
            </div>
            <div>
                <input type="email" id="email" name="email" required placeholder="Email">
            </div>
            <div>
                <input type="password" autocomplete="off" id="password" name="password" required placeholder="Password">
                <input type="checkbox" id="peek" onclick="Showpass()">Show Password
            </div>
            <br>
            <div>
                <input type="text" id="city" name="city" required placeholder="City">
            </div>
            <div>
                <input type="text" autocomplete="off" id="skills" name="skills" placeholder="Skill areas you would be volunteering..." required readonly>
            </div>
            <div>
                <input type="text" autocomplete="off" id="cause" name="cause" placeholder="Cause areas you're interested in..." required readonly>
            </div>
            <br>
                <a href="login.php">Already have an account?</a>
            <button type="submit">Submit</button>
            </form>
    </div>
    <!-- SKILLS MODAL-->
    <div id="skillModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Select Skills (Maximum of 5)</h2>
            <table id="skillOptions">
                <tr>
                    <td><label><input type="checkbox" value="Communication Skills"> Communication Skills</label></td>
                    <td><label><input type="checkbox" value="Negotiation and Conflict Resolution"> Negotiation and Conflict Resolution</label></td>
                    <td><label><input type="checkbox" value="Networking"> Networking</label></td>
                    <td><label><input type="checkbox" value="Project Management"> Project Management</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox" value="Policy Analysis"> Policy Analysis</label></td>
                    <td><label><input type="checkbox" value="Advocacy"> Advocacy</label></td>
                    <td><label><input type="checkbox" value="Data Literacy"> Data Literacy</label></td>
                    <td><label><input type="checkbox" value="Cross-Cultural Competence"> Cross-Cultural Competence</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox" value="Strategic Thinking"> Strategic Thinking</label></td>
                    <td><label><input type="checkbox" value="Financial Management"> Financial Management</label></td>
                    <td><label><input type="checkbox" value="Technological Proficiency"> Technological Proficiency</label></td>
                    <td><label><input type="checkbox" value="Leadership"> Leadership</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox" value="Monitoring and Evaluation"> Monitoring and Evaluation</label></td>
                    <td><label><input type="checkbox" value="Adaptability and Resilience"> Adaptability and Resilience</label></td>
                    <td><label><input type="checkbox" value="Ethical Decision-Making"> Ethical Decision-Making</label></td>
                    <td><label><input type="checkbox" value="Public Speaking and Presentation"> Public Speaking and Presentation</label></td>
                </tr>
            </table>                
            <button id="saveSkills">Save</button>
        </div>
    </div> 
    <!-- CAUSE MODAL-->
    <div id="causesModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Choose Causes (Maximum of 5)</h2>
            <table id="causeOptions">
                <tr>
                    <td><label><input type="checkbox" value="No Poverty"> No Poverty</label></td>
                    <td><label><input type="checkbox" value="Zero Hunger"> Zero Hunger</label></td>
                    <td><label><input type="checkbox" value="Good Health and Well-Being"> Good Health and Well-Being</label></td>
                    <td><label><input type="checkbox" value="Quality Education"> Quality Education</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox" value="Gender Equality"> Gender Equality</label></td>
                    <td><label><input type="checkbox" value="Clean Water and Sanitation"> Clean Water and Sanitation</label></td>
                    <td><label><input type="checkbox" value="Affordable and Clean Energy"> Affordable and Clean Energy</label></td>
                    <td><label><input type="checkbox" value="Decent Work and Economic Growth"> Decent Work and Economic Growth</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox" value="Industry, Innovation, and Infrastructure"> Industry, Innovation, and Infrastructure</label></td>
                    <td><label><input type="checkbox" value="Reduced Inequality"> Reduced Inequality</label></td>
                    <td><label><input type="checkbox" value="Sustainable Cities and Communities"> Sustainable Cities and Communities</label></td>
                    <td><label><input type="checkbox" value="Responsible Consumption and Production"> Responsible Consumption and Production</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox" value="Climate Action"> Climate Action</label></td>
                    <td><label><input type="checkbox" value="Life Below Water"> Life Below Water</label></td>
                    <td><label><input type="checkbox" value="Life on Land"> Life on Land</label></td>
                    <td><label><input type="checkbox" value="Peace, Justice, and Strong Institutions"> Peace, Justice, and Strong Institutions</label></td>
                </tr>
            </table>
            <button id="saveCauses">Save</button>
        </div>
    </div>
    <script src="../assets/js/register.js"></script>
    <?php include '../components/footer.php'; ?>

=======
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



