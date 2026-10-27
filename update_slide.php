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

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $image_url = $_POST['image_url'];
    $title = $_POST['title'];
    $position = $_POST['position'];

    $sql = "UPDATE slideshow SET image_url='$image_url', title='$title', position='$position' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Slide updated successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
