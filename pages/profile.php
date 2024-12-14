<?php
require_once '../components/navbar2.php';
?>
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
            <label for="country">Country</label>
            <?php
            $countries = [
                "Afghanistan", "Åland Islands", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", 
                "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", 
                "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", 
                "Bolivia", "Bosnia and Herzegovina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", 
                "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", 
                "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", 
                "Colombia", "Comoros", "Congo", "Congo, The Democratic Republic of The", "Cook Islands", "Costa Rica", 
                "Cote D'ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", 
                "Dominican Republic", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", 
                "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", 
                "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", 
                "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-bissau", "Guyana", 
                "Haiti", "Heard Island and Mcdonald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", 
                "Hungary", "Iceland", "India", "Indonesia", "Iran, Islamic Republic of", "Iraq", "Ireland", "Isle of Man", 
                "Israel", "Italy", "Jamaica", "Japan", "Jersey", "Jordan", "Kazakhstan", "Kenya", "Kiribati", 
                "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao People's Democratic Republic", 
                "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", 
                "Macao", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", 
                "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", 
                "Moldova, Republic of", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", 
                "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", 
                "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", 
                "Palau", "Palestinian Territory, Occupied", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", 
                "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", 
                "Rwanda", "Saint Helena", "Saint Kitts and Nevis", "Saint Lucia", "Saint Pierre and Miquelon", 
                "Saint Vincent and The Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", 
                "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", 
                "Somalia", "South Africa", "South Georgia and The South Sandwich Islands", "Spain", "Sri Lanka", "Sudan", 
                "Suriname", "Svalbard and Jan Mayen", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan", 
                "Tajikistan", "Tanzania, United Republic of", "Thailand", "Timor-leste", "Togo", "Tokelau", "Tonga", 
                "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", 
                "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", 
                "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Viet Nam", "Virgin Islands, British", "Virgin Islands, U.S.", 
                "Wallis and Futuna", "Western Sahara", "Yemen", "Zambia", "Zimbabwe"
            ];
            ?>
            <select id="country" name="country" class="form-control">
                <?php foreach ($countries as $country): ?>
                    <option value="<?= $country ?>"><?= $country ?></option>
                <?php endforeach; ?>
            </select>
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
    <label for="causes">Causes</label>
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
                </div>
            </div>
        </div>
    </div>
    <?php require_once '../components/footer2.php'; ?>
    <script src="../assets/js/profile.js"></script>
</body>
</html>     