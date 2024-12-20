<?php
require_once '../components/navbar2.php';
require_once '../vendor/autoload.php';

// Add this line after the requires
use MongoDB\BSON\ObjectId;

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Connect to MongoDB
try {
    $uri = "mongodb+srv://somedudein:g8qSNOKbcS7Uh39d@voluntech.waoix.mongodb.net/?retryWrites=true&w=majority&appName=VolunTech";
    $mongoClient = new MongoDB\Client("mongodb+srv://somedudein:g8qSNOKbcS7Uh39d@voluntech.waoix.mongodb.net/?retryWrites=true&w=majority&appName=VolunTech");
    $collection = $mongoClient->yourDatabaseName->volunteers;
} catch (Exception $e) {
    die("Failed to connect to database: " . $e->getMessage());
}

// Initialize error and success messages arrays
$errors = [];
$success = [];
// Fetch user data
try {
    $userId = $_SESSION['user_id'];
    $user = $collection->findOne(['_id' => new ObjectId($userId)]);
    if (!$user) {
        throw new Exception("User not found");
    }
} catch (Exception $e) {
    $errors[] = "Error retrieving user data: " . $e->getMessage();
}


// Input validation function
function validateInput($data) {
    $errors = [];
    
    // Validate required fields
    $requiredFields = ['first_name', 'last_name', 'mobile_number', 'city', 'region'];
    foreach ($requiredFields as $field) {
        if (!isset($data[$field]) || trim($data[$field]) === '') {
            $errors[] = ucfirst(str_replace('_', ' ', $field)) . " is required";
        }
    }

    // Validate mobile number format
    if (isset($data['mobile_number']) && !preg_match('/^09\d{9}$/', $data['mobile_number'])) {
        $errors[] = "Mobile number must be in 11-digit format starting with 09";
    }

    // Validate date if all date fields are present
    if (isset($data['month']) && isset($data['day']) && isset($data['year'])) {
        if (!checkdate((int)$data['month'], (int)$data['day'], (int)$data['year'])) {
            $errors[] = "Invalid date selected";
        }
    }

    return $errors;
}

// Sanitize input function
function sanitizeInput($data) {
    $sanitized = [];
    foreach ($data as $key => $value) {
        if (is_string($value)) {
            $sanitized[$key] = htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
        } else {
            $sanitized[$key] = $value;
        }
    }
    return $sanitized;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sanitizedData = array_map('trim', $_POST);
    
    // Validate input
    $validationErrors = [];
    
    // Basic validation
    if (empty($sanitizedData['first_name'])) $validationErrors[] = "First name is required";
    if (empty($sanitizedData['last_name'])) $validationErrors[] = "Last name is required";
    if (empty($sanitizedData['mobile_number'])) $validationErrors[] = "Mobile number is required";
    if (!preg_match('/^09\d{9}$/', $sanitizedData['mobile_number'])) {
        $validationErrors[] = "Mobile number must be in 11-digit format starting with 09";
    }

    if (empty($validationErrors)) {
        try {
            $collection = $mongoClient->yourDatabaseName->volunteers;
            $userId = $_SESSION['user_id'];

            $updateData = [
                'first_name' => $sanitizedData['first_name'],
                'last_name' => $sanitizedData['last_name'],
                'birthday' => $sanitizedData['birthday'],
                'gender' => $sanitizedData['gender'] ?? '',
                'marital_status' => $sanitizedData['marital_status'] ?? '',
                'mobile_number' => $sanitizedData['mobile_number'],
                'city' => $sanitizedData['city'],
                'region' => $sanitizedData['region'],
                'nationality' => $sanitizedData['nationality'] ?? '',
                'skills' => $sanitizedData['skills'],
                'cause' => $sanitizedData['cause']
            ];

            if ($updateData['birthday'] === null) {
                unset($updateData['birthday']);
            }

            $result = $collection->updateOne(
                ['_id' => new ObjectId($userId)],
                ['$set' => $updateData]
            );

            if ($result->getModifiedCount() > 0) {
                $_SESSION['success'] = "Profile updated successfully";
                header('Location: profile.php');
                exit;
            } else {
                $_SESSION['error'] = "No changes were made";
            }
        } catch (Exception $e) {
            $_SESSION['error'] = "Error updating profile: " . $e->getMessage();
        }
    } else {
        $_SESSION['error'] = implode('<br>', $validationErrors);
    }
}


// Add client-side validation
$clientValidation = <<<JS
<script>
document.querySelector('.profile-form').addEventListener('submit', function(e) {
    let errors = [];
    const mobileNumber = document.getElementById('mobile_number').value;
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;

    if (!firstName) errors.push('First name is required');
    if (!lastName) errors.push('Last name is required');
    if (!mobileNumber.match(/^09\d{9}$/)) {
        errors.push('Mobile number must be in 11-digit format starting with 09');
    }

    if (errors.length > 0) {
        e.preventDefault();
        alert(errors.join('\\n'));
    }
});
</script>
JS;

// Display error and success messages
if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <div class="alert alert-success">
        <?php foreach ($success as $message): ?>
            <p><?php echo $message; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/profile2.css">
</head>
<body>
<?php include '../components/navbar2.php'; ?>

<div class="container">
    <div class="sidebar">
    <ul class="menu">
                <li class="menu-item"><a href="../pages/dashboard.php">User Dashboard</a></li>
                <li class="menu-item active"><a href="../pages/profile.php">Profile</a></li>
                <li class="menu-item"><a href="../pages/history.php">My History</a></li>                
                <li class="menu-item"><hr></li>
                <li class="menu-item"><a href="../pages/index.php">Logout</a></li>
            </ul>
        </div>
    <div class="profile-container">
        <h1 class="profile-title">Profile</h1>
        <form method="POST" action="#" class="profile-form">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input id="firstName" placeholder="First Name" class="form-control" name="first_name" type="text">
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input id="lastName" placeholder="Last Name" class="form-control" name="last_name" type="text">
            </div>
            <div>
            <label for="birthday">Birthday</label>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="date" name="birthday" id="birthday" class="form-control">
                            </div>
                        </div>
                        <br>
            <div class="form-group">
                <label>Gender</label>
                <div>
                    <h1 class="profile-name">Juan Dela Cruz</h1>
                    <p class="profile-role">VolunTech Member since 2023</p>
                </div>
            </div>

            <div class="profile-stats">
                <div class="stat-card">
                    <div class="stat-number">₱ 2250</div>
                    <div class="stat-label">Total Donations</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">9</div>
                    <div class="stat-label">Volunteer Hours</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">5</div>
                    <div class="stat-label">Events Attended</div>
                </div>
            </div>
            <div class="form-group">
                <label for="mobile_number">Mobile Number</label>
                <input class="form-control" id="mobile_number" placeholder="09103130907" name="mobile_number" type="tel">                <div class="small">11 digit format. e.g. 09103130907</div>
            </div>
            <div class="form-group">
                <label for="city">City Or Province</label>
                <input class="form-control" id="city" name="city" type="text">
            </div>
            <div class="form-group">
                <label for="region">Region</label>
                <input class="form-control" id="region" name="region" type="text">
            </div>
            <div class="form-group">
            <label for="nationality">Nationality</label>
            <?php
            $nationalities = [
                "afghan", "albanian", "algerian", "american", "andorran", "angolan", "antiguans", "argentinean", 
                "armenian", "australian", "austrian", "azerbaijani", "bahamian", "bahraini", "bangladeshi", "barbadian", 
                "barbudans", "batswana", "belarusian", "belgian", "belizean", "beninese", "bhutanese", "bolivian", 
                "bosnian", "brazilian", "british", "bruneian", "bulgarian", "burkinabe", "burmese", "burundian", 
                "cambodian", "cameroonian", "canadian", "cape verdean", "central african", "chadian", "chilean", 
                "chinese", "colombian", "comoran", "congolese", "costa rican", "croatian", "cuban", "cypriot", 
                "czech", "danish", "djibouti", "dominican", "dutch", "east timorese", "ecuadorean", "egyptian", 
                "emirian", "equatorial guinean", "eritrean", "estonian", "ethiopian", "fijian", "filipino", "finnish", 
                "french", "gabonese", "gambian", "georgian", "german", "ghanaian", "greek", "grenadian", "guatemalan", 
                "guinea-bissauan", "guinean", "guyanese", "haitian", "herzegovinian", "honduran", "hungarian", 
                "icelander", "indian", "indonesian", "iranian", "iraqi", "irish", "israeli", "italian", "ivorian", 
                "jamaican", "japanese", "jordanian", "kazakhstani", "kenyan", "kittian and nevisian", "kuwaiti", 
                "kyrgyz", "laotian", "latvian", "lebanese", "liberian", "libyan", "liechtensteiner", "lithuanian", 
                "luxembourger", "macedonian", "malagasy", "malawian", "malaysian", "maldivan", "malian", "maltese", 
                "marshallese", "mauritanian", "mauritian", "mexican", "micronesian", "moldovan", "monacan", 
                "mongolian", "moroccan", "mosotho", "motswana", "mozambican", "namibian", "nauruan", "nepalese", 
                "new zealander", "ni-vanuatu", "nicaraguan", "nigerien", "north korean", "northern irish", "norwegian", 
                "omani", "pakistani", "palauan", "panamanian", "papua new guinean", "paraguayan", "peruvian", 
                "polish", "portuguese", "qatari", "romanian", "russian", "rwandan", "saint lucian", "salvadoran", 
                "samoan", "san marinese", "sao tomean", "saudi", "scottish", "senegalese", "serbian", "seychellois", 
                "sierra leonean", "singaporean", "slovakian", "slovenian", "solomon islander", "somali", "south african", 
                "south korean", "spanish", "sri lankan", "sudanese", "surinamer", "swazi", "swedish", "swiss", "syrian", 
                "taiwanese", "tajik", "tanzanian", "thai", "togolese", "tongan", "trinidadian or tobagonian", "tunisian", 
                "turkish", "tuvaluan", "ugandan", "ukrainian", "uruguayan", "uzbekistani", "venezuelan", "vietnamese", 
                "welsh", "yemenite", "zambian", "zimbabwean"
            ];
            ?>
            <select name="nationality" id="country" class="form-control">
                <?php foreach ($nationalities as $nationality): ?>
                    <option value="<?= $nationality ?>"><?= ucfirst($nationality) ?></option>
                <?php endforeach; ?>
            </select>
            </div>
    <div class="container2">
            <div>
                <input type="text" autocomplete="off" id="skills" name="skills" placeholder="Skill areas you would be volunteering..." required readonly>
            </div>
            <div>
                <input type="text" autocomplete="off" id="cause" name="cause" placeholder="Cause areas you're interested in..." required readonly>
            </div>
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
            <button id="saveSkills" type="button">Save</button>
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
            <button id="saveCauses" type="button">Save</button>
        </div>
    </div>
    </div>
    <button class="update" type="submit">Update</button>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once '../components/footer2.php'; ?>
</body>
</html>