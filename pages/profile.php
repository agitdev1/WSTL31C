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
    $client = new MongoDB\Client("mongodb+srv://somedudein:g8qSNOKbcS7Uh39d@voluntech.waoix.mongodb.net/?retryWrites=true&w=majority&appName=VolunTech");
    $collection = $client->yourDatabaseName->volunteers;
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
        if (empty($data[$field])) {
            $errors[] = ucfirst(str_replace('_', ' ', $field)) . " is required";
        }
    }

    // Validate mobile number format
    if (!empty($data['mobile_number']) && !preg_match('/^09\d{9}$/', $data['mobile_number'])) {
        $errors[] = "Mobile number must be in 11-digit format starting with 09";
    }

    // Validate date
    if (!checkdate($data['month'], $data['day'], $data['year'])) {
        $errors[] = "Invalid date selected";
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
    // Sanitize input
    $sanitizedData = sanitizeInput($_POST);
    
    // Validate input
    $validationErrors = validateInput($sanitizedData);
    
    if (empty($validationErrors)) {
        try {
            $updateData = [
                'first_name' => $sanitizedData['first_name'],
                'last_name' => $sanitizedData['last_name'],
                'birthday' => [
                    'month' => (int)$sanitizedData['month'],
                    'day' => (int)$sanitizedData['day'],
                    'year' => (int)$sanitizedData['year']
                ],
                'gender' => $sanitizedData['gender'],
                'marital_status' => $sanitizedData['marital_status'],
                'mobile_number' => $sanitizedData['mobile_number'],
                'city' => $sanitizedData['city'],
                'region' => $sanitizedData['region'],
                'nationality' => $sanitizedData['nationality'],
                'skills' => $sanitizedData['skills'] ?? [],
                'cause' => $sanitizedData['cause'] ?? []
            ];

            $result = $collection->updateOne(
                ['_id' => $userId],
                ['$set' => $updateData]
            );

            if ($result->getModifiedCount() > 0) {
                $success[] = "Profile updated successfully!";
                // Refresh user data
                $user = $collection->findOne(['_id' => $userId]);
            } else {
                $errors[] = "No changes were made to the profile.";
            }
        } catch (Exception $e) {
            $errors[] = "Error updating profile: " . $e->getMessage();
        }
    } else {
        $errors = array_merge($errors, $validationErrors);
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
    <title>User Profile</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
</head>
<body>
<div class="container">
    <div class="sidebar">
            <ul class="menu">
                <li class="menu-item "><a href="../pages/dashboard.php">User Dashboard</a></li>
                <li class="menu-item"><a href="../pages/history.php">My History</a></li>                
                <li class="menu-item active"><a href="../pages/profile.php">Profile</a></li>
                <li class="menu-item "><a href="../pages/account.php">Account</a></li>                <li class="menu-item"><hr></li>
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
                                <?php
                                $months = [
                                  1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
                                  5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
                                  9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
                                ];
                                ?>
                                <select class="form-control" id="month" name="month">
                                  <?php foreach ($months as $value => $name): ?>
                                    <option value="<?= $value ?>"><?= $name ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <select class="form-control" id="day" name="day">
                                    <?php for ($i = 1; $i <= 31; $i++): ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" id="year" name="year">
                                    <?php for ($i = 1940; $i <= 2024; $i++): ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <br>
            <div class="form-group">
                <label>Gender</label>
                <div>
                    <label class="radio-inline">
                        <input name="gender" type="radio" value="male"> Male
                    </label>
                    <label class="radio-inline">
                        <input name="gender" type="radio" value="female"> Female
                    </label>
                    <label class="radio-inline">
                        <input name="gender" type="radio" value="other"> Other
                    </label>
                    <label class="radio-inline">
                        <input name="gender" type="radio" value="no_ans"> Prefer not to answer
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="maritalStatus">Marital Status</label>
                <select class="form-control" id="marital_status" name="marital_status">
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="separated">Separated</option>
                    <option value="widowed">Widowed</option>
                </select>
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
            <div class="form-group">
                <label for="skills">Skills</label>
                <div class="dropdown">
                    <div class="selected-items" id="selectedItems">Select Skills</div>
                    <div class="dropdown-content">
                        <label><input type="checkbox" value="Communication Skills"> Communication Skills</label>
                        <label><input type="checkbox" value="Negotiation and Conflict Resolution"> Negotiation and Conflict Resolution</label>
                        <label><input type="checkbox" value="Networking"> Networking</label>
                        <label><input type="checkbox" value="Project Management"> Project Management</label>
                        <label><input type="checkbox" value="Policy Analysis"> Policy Analysis</label>
                        <label><input type="checkbox" value="Advocacy"> Advocacy</label>
                        <label><input type="checkbox" value="Data Literacy"> Data Literacy</label>
                        <label><input type="checkbox" value="Cross-Cultural Competence"> Cross-Cultural Competence</label>
                        <label><input type="checkbox" value="Strategic Thinking"> Strategic Thinking</label>
                        <label><input type="checkbox" value="Financial Management"> Financial Management</label>
                        <label><input type="checkbox" value="Technological Proficiency"> Technological Proficiency</label>
                        <label><input type="checkbox" value="Leadership"> Leadership</label>
                        <label><input type="checkbox" value="Monitoring and Evaluation"> Monitoring and Evaluation</label>
                        <label><input type="checkbox" value="Adaptability and Resilience"> Adaptability and Resilience</label>
                        <label><input type="checkbox" value="Ethical Decision-Making"> Ethical Decision-Making</label>
                        <label><input type="checkbox" value="Public Speaking and Presentation"> Public Speaking and Presentation</label>
                    </div>
                </div>

            </div>
                <br>
<div class="form-group">
    <label for="cause">Causes</label>
    <div class="dropdown">
        <div class="selected-items" id="selectedCauses">Select Causes</div>
        <div class="dropdown-content">
            <label><input type="checkbox" value="No Poverty"> No Poverty</label>
            <label><input type="checkbox" value="Zero Hunger"> Zero Hunger</label>
            <label><input type="checkbox" value="Good Health and Well-Being"> Good Health and Well-Being</label>
            <label><input type="checkbox" value="Quality Education"> Quality Education</label>
            <label><input type="checkbox" value="Gender Equality"> Gender Equality</label>
            <label><input type="checkbox" value="Clean Water and Sanitation"> Clean Water and Sanitation</label>
            <label><input type="checkbox" value="Affordable and Clean Energy"> Affordable and Clean Energy</label>
            <label><input type="checkbox" value="Decent Work and Economic Growth"> Decent Work and Economic Growth</label>
            <label><input type="checkbox" value="Industry, Innovation, and Infrastructure"> Industry, Innovation, and Infrastructure</label>
            <label><input type="checkbox" value="Reduced Inequality"> Reduced Inequality</label>
            <label><input type="checkbox" value="Sustainable Cities and Communities"> Sustainable Cities and Communities</label>
            <label><input type="checkbox" value="Responsible Consumption and Production"> Responsible Consumption and Production</label>
            <label><input type="checkbox" value="Climate Action"> Climate Action</label>
            <label><input type="checkbox" value="Life Below Water"> Life Below Water</label>
            <label><input type="checkbox" value="Life on Land"> Life on Land</label>
            <label><input type="checkbox" value="Peace, Justice, and Strong Institutions"> Peace, Justice, and Strong Institutions</label>
        </div>
    </div>

</div>
    </div>
    <button class="update" type="submit">Update</button>
                </div>
            </div>

        </div>
    </div>
    <?php require_once '../components/footer2.php'; ?>
    <script src="../assets/js/profile.js"></script>
</body>
</html>     