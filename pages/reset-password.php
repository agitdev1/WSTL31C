<?php
include '../components/navbar.php';
require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

// Connect to MongoDB
try {
    $uri = "mongodb+srv://somedudein:g8qSNOKbcS7Uh39d@voluntech.waoix.mongodb.net/?retryWrites=true&w=majority&appName=VolunTech";
    $client = new MongoDB\Client($uri);
    $collection = $client->yourDatabaseName->volunteers;
} catch (Exception $e) {
    die("Failed to connect to database: " . $e->getMessage());
}

$errors = [];
$success = [];
$currentStep = 'email'; // Default step

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        switch ($action) {
            case 'send_otp':
                $email = $_POST['email'];
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = 'Invalid email address!';
                } else {
                    $user = $collection->findOne(['email' => $email]);
                    if (!$user) {
                        $errors[] = 'Email not found!';
                    } else {
                        // Generate OTP and save it
                        $otp = rand(100000, 999999);
                        $collection->updateOne(
                            ['email' => $email],
                            ['$set' => ['otp' => $otp, 'otp_timestamp' => new MongoDB\BSON\UTCDateTime()]]
                        );
        
                        // Send OTP via email
                        try {
                            $mail = new PHPMailer(true);
        
                            // Server settings
                            $mail->isSMTP();
                            $mail->Host       = 'sandbox.smtp.mailtrap.io';
                            $mail->SMTPAuth   = true;
                            $mail->Username   = getenv('5c4dc514684dd1');
                            $mail->Password   = getenv('204f6aaf4083dc');
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                            $mail->Port       = 2525;
        
                            // Recipients
                            $mail->setFrom('somedudein@gmail.com', 'VolunTech');
                            $mail->addAddress($email);
        
                            // Content
                            $mail->isHTML(true);
                            $mail->Subject = 'Password Reset OTP';
                            $mail->Body    = "Your OTP for password reset is: <b>$otp</b>";
                            $mail->AltBody = "Your OTP for password reset is: $otp";
        
                            $mail->send();
                            $success[] = 'OTP sent successfully!';
                            $currentStep = 'otp';
                            $_SESSION['reset_email'] = $email;
                        } catch (Exception $e) {
                            $errors[] = 'Error sending OTP: ' . $mail->ErrorInfo;
                        }
                    }
                }
                break;
        
            case 'verify-otp':
                $otp = $_POST['otp'];
                $email = $_SESSION['reset_email'] ?? '';
                $user = $collection->findOne(['email' => $email]);
        
                if ($user && isset($user['otp'], $user['otp_timestamp']) && $user['otp'] == $otp) {
                    $otpTimestamp = $user['otp_timestamp']->toDateTime();
                    $currentTime = new DateTime();
                    $diff = $currentTime->getTimestamp() - $otpTimestamp->getTimestamp();
        
                    if ($diff <= 300) { // 5 minutes
                        $success[] = 'OTP verified successfully!';
                        $currentStep = 'reset';
                    } else {
                        $errors[] = 'OTP has expired!';
                    }
                } else {
                    $errors[] = 'Invalid OTP!';
                }
                break;
        
            case 'reset_password':
                $newPassword = $_POST['new_password'];
                $confirmPassword = $_POST['confirm_password'];
                $email = $_SESSION['reset_email'] ?? '';
        
                if (strlen($newPassword) < 8) {
                    $errors[] = 'Password must be at least 8 characters long!';
                } elseif ($newPassword !== $confirmPassword) {
                    $errors[] = 'Passwords do not match!';
                } else {
                    try {
                        $result = $collection->updateOne(
                            ['email' => $email],
                            ['$set' => ['password' => password_hash($newPassword, PASSWORD_BCRYPT)]]
                        );
                        if ($result->getMatchedCount() === 0) {
                            $errors[] = 'Error: Email not found or invalid!';
                        } else {
                            $success[] = 'Password reset successfully!';
                            $currentStep = 'done';
                            unset($_SESSION['reset_email']);
                        }
                    } catch (Exception $e) {
                        $errors[] = 'Error resetting password: ' . $e->getMessage();
                    }
                }
                break;
        }        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/forgot-password.css">
</head>
<body>
    <div class="page-container">
        <div class="content-wrap">
            <div class="form-container">
                <?php if ($currentStep === 'email'): ?>
                    <form action="reset-password.php" method="post" class="form">
                        <h1 class="form-h1">Reset your password</h1>
                        <input type="email" name="email" placeholder="Enter your email" required>
                        <input type="hidden" name="action" value="send_otp">
                        <button type="submit">Send OTP</button>
                    </form>
                <?php elseif ($currentStep === 'otp'): ?>
                    <form action="reset-password.php" method="post" class="form">
                        <h1 class="form-h1">Enter OTP</h1>
                        <input type="text" name="otp" placeholder="Enter OTP" required>
                        <input type="hidden" name="action" value="verify_otp">
                        <button type="submit">Verify OTP</button>
                    </form>
                <?php elseif ($currentStep === 'reset'): ?>
                    <form action="reset-password.php" method="post" class="form">
                        <h1 class="form-h1">Set New Password</h1>
                        <input type="password" name="new_password" placeholder="New Password" required>
                        <input type="password" name="confirm_password" placeholder="Confirm New Password" required>
                        <input type="hidden" name="action" value="reset_password">
                        <button type="submit">Reset Password</button>
                    </form>
                <?php elseif ($currentStep === 'done'): ?>
                    <div class="form">
                        <h1 class="form-h1">Password Reset Complete</h1>
                        <p>Your password has been successfully reset. You can now <a href="login.php">login</a> with your new password.</p>
                    </div>
                <?php endif; ?>

                <?php if (!empty($errors)): ?>
                    <div class="error-message">
                        <?php foreach ($errors as $error): ?>
                            <p><?php echo $error; ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($success)): ?>
                    <div class="success-message">
                        <?php foreach ($success as $message): ?>
                            <p><?php echo $message; ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php require_once '../components/footer.php'; ?>
    </div>
</body>
</html>

