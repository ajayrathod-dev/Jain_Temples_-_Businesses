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

// config.php - Database Configuration

// Database credentials
$host = 'localhost'; // Use this for database host
$db_username = 'amarnat2_balaji'; // Replace with your database username
$db_password = 'RshRsh@#2407'; // Replace with your database password
$db_database = 'amarnat2_dairy'; // Replace with your database name

// Establish database connection
$conn = mysqli_connect($host, $db_username, $db_password, $db_database);

// Check connection
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
