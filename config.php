<?php
// Load UCDAS Enterprise WAF & Security Shield
if (file_exists(__DIR__ . '/../codecrave_portfolio/security/UCDAS_WAF.php')) {
    require_once __DIR__ . '/../codecrave_portfolio/security/UCDAS_WAF.php';
} elseif (file_exists(__DIR__ . '/../../codecrave_portfolio/security/UCDAS_WAF.php')) {
    require_once __DIR__ . '/../../codecrave_portfolio/security/UCDAS_WAF.php';
}
?>
<?php
$host = 'localhost'; // Your Hosting Raja database host
$username = 'root'; // Your database username
$password = ""; // Your database password
$database = "jaintemp&b"; // Your database name

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set character set to utf8 for proper encoding
mysqli_set_charset($conn, "utf8");
