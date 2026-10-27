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

include 'config.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $image_url = $_POST['image_url'];
    $title = $_POST['title'];
    $position = $_POST['position'];

    $sql = "INSERT INTO slideshow (image_url, title, position) VALUES ('$image_url', '$title', '$position')";

    if (mysqli_query($conn, $sql)) {
        echo "Slide added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
