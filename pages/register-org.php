<?php
include '../components/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organization Registration</title>
    
    <link rel="stylesheet" href="../assets/css/styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/register.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container"> 
        <h1>Organization Registration</h1>
        <h2>Embark on a meaningful journey to <span style="color:#DD4040; font-weight:bold;">MAKE A DIFFERENCE </span> </h2>
        <form id="organizationForm" method="post">
            <div>
                <input type="text" id="name" name="name" required placeholder="Organization Name">
            </div>
            <div>
                <input type="email" id="email" name="email" required placeholder="Email">
            </div>
            <div>
                <input type="password" autocomplete="off" id="password" name="password" required placeholder="Password">
                <input id="peek" type="checkbox">Show Password
            </div>
            <br>
            <div>
                <input type="text" id="city" name="city" required placeholder="City">
            </div>
            <div>
                <input type="text" id="skills" name="priorities" required readonly placeholder="Priorities">
            </div>
            <div>
                <input type="text" id="cause" name="cause" required placeholder="Causes" readonly>
            </div>
            <div class="dropdown">
                <select id="organizationtype" name="orgtype" required>
                    <option value="" disabled selected>Organization Type</option>
                    <option value="Nonprofit">Nonprofit</option>
                    <option value="Social Enterprise">Social Enterprise</option>
                    <option value="Not yet formed">Not yet formed</option>
                </select>
            </div>
            <br>
            <a href="login.php">Already have an account?</a>
            <button type="submit">Submit</button>
        </form>
    </div>

    <!-- SKILLS MODAL -->
    <div id="skillsModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Your priorities</h2>
            <p>Choose up to 3 areas where your organization needs operational support</p>
            <table id="skillOptions">
                <tr>
                    <td><label><input type="checkbox" value="Executive Leadership"> Executive Leadership</label></td>
                    <td><label><input type="checkbox" value="Finance & operations"> Finance & operations</label></td>
                    <td><label><input type="checkbox" value="Fundraising"> Fundraising</label></td>
                </tr>
                <tr> 
                    <td><label><input type="checkbox" value="Human Resources">Human Resources</label></td>
                    <td><label><input type="checkbox" value="Marketing & communications">Marketing & communications</label></td>
                    <td><label><input type="checkbox" value="Professional development">Professional development</label></td>
                </tr>
                <tr>
                    <td><label><input type="checkbox" value="Program management">Program management</label></td>
                    <td><label><input type="checkbox" value="Technology"> Technology</label></td>
                    <td><label><input type="checkbox" value="I'm not sure yet"> I'm not sure yet</label></td>
                </tr>
            </table>
            <button id="saveSkills">Save</button>
        </div>
    </div>

    <!-- CAUSE MODAL -->
    <div id="causesModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Choose Causes</h2>
            <p>Select Your Organization's Top 3 Focus Areas</p>
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

    <!-- Footer -->
    <?php
    include '../components/footer.php';
    ?>

    <script src="../assets/js/register-org.js"></script>
</body>
</html>