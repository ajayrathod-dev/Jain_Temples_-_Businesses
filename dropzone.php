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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload with Dropzone</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.css" rel="stylesheet" />
    <style>
        .dropzone {
            border-radius: 10px;
            border: 2px dashed #ff4500;
            padding: 20px;
            background-color: #f4f4f4;
            width: 100%;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .dropzone .dz-preview {
            border-radius: 10px;
        }

        .submit-btn {
            background-color: #ff4500;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #e04300;
        }
    </style>
</head>

<body>

    <div class="dropzone" id="myDropzone">
        <p>Drag & Drop your files here</p>
    </div>

    <!-- Submit Button -->
    <button class="submit-btn" id="submit-all">Upload Files</button>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.js"></script>
    <script>
        // Initialize Dropzone
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#myDropzone", {
            url: "upload.php", // The URL for your upload script
            maxFiles: 1, // Allow only 1 file at a time (optional)
            maxFilesize: 2, // Max file size in MB
            acceptedFiles: "image/*", // Accept only image files
            addRemoveLinks: true,
        });

        // Handle the submit button click
        document.getElementById("submit-all").addEventListener("click", function() {
            myDropzone.processQueue(); // Trigger the file upload
        });

        // Show message when files are uploaded successfully
        myDropzone.on("success", function(file, response) {
            alert("File uploaded successfully!");
        });

        // Show error if the upload fails
        myDropzone.on("error", function(file, errorMessage) {
            alert("Error uploading file: " + errorMessage);
        });
    </script>

</body>

</html>