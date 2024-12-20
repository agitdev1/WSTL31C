<?php
include '../../components/navbar2.php';
session_start();

// Configuration
$config = [
    'pdfPath' => '../../assets/documents/sample.pdf',  // Update with your PDF path
    'fileName' => 'document.pdf'
];
// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentation</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
    <link rel="stylesheet" href="../../assets/css/documentation.css">

</head>
<body>
    <div class="main-content">
<h1>Documentation</h1>
<div class="pdf-container">
        <div class="pdf-header">
            <button class="control-button" id="openTabBtn">
                <i class="fas fa-external-link-alt"></i> Open in New Tab
            </button>
        </div>
        <div class="pdf-frame">
            <iframe id="pdfViewer" src="..\..\assets\pdf\WSTL31C-DOCUMENTATION.pdf" type="application/pdf"></iframe>
        </div>
    </div>
</div>
<?php require_once '../../components/footer2.php'; ?>
<script src="../../assets/js/documentation.js"></script>
</body>
</html>

