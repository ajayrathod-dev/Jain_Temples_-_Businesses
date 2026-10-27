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

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM slideshow WHERE id = $id");
header("Location: admin_panel.php"); // Redirect back to admin panel
