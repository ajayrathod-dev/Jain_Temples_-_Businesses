<?php
if (!defined('UCDAS_WAF_LOADED')) {
    $wafFile = __DIR__ . '/../codecrave_portfolio/security/UCDAS_WAF.php';
    if (!file_exists($wafFile)) {
        $wafFile = 'c:/xampp/htdocs/best_projects/codecrave_portfolio/security/UCDAS_WAF.php';
    }
    if (file_exists($wafFile)) {
        @include_once $wafFile;
    }
}
?>



<?php
// Set the directory where files will be uploaded
$uploadDir = 'uploads/';

// Create the upload directory if it doesn't exist
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Check if a file has been uploaded
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $fileName = basename($file['name']);
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    // Define the allowed file types (images)
    $allowedTypes = array('image/jpeg', 'image/png', 'image/gif');

    // Check if the file type is allowed
    if (in_array($fileType, $allowedTypes)) {
        // Check if there was an error during file upload
        if ($fileError === 0) {
            // Generate a unique name for the uploaded file
            $newFileName = uniqid('', true) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);

            // Define the destination path for the uploaded file
            $fileDestination = $uploadDir . $newFileName;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($fileTmpName, $fileDestination)) {
                // Return the file path to Dropzone for further processing
                echo json_encode(['status' => 'success', 'filePath' => $fileDestination]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to move uploaded file.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error during file upload.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid file type. Only images are allowed.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No file uploaded.']);
}
