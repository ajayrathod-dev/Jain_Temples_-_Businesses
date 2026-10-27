<?php
// Load UCDAS Enterprise WAF & Security Shield
if (file_exists(__DIR__ . '/../codecrave_portfolio/security/UCDAS_WAF.php')) {
    require_once __DIR__ . '/../codecrave_portfolio/security/UCDAS_WAF.php';
} elseif (file_exists(__DIR__ . '/../../codecrave_portfolio/security/UCDAS_WAF.php')) {
    require_once __DIR__ . '/../../codecrave_portfolio/security/UCDAS_WAF.php';
}
?>
<?php

require_once __DIR__ . '/app.php';

function getCodeCravePDO() {
    static $pdo = null;
    if ($pdo === null) {
        $host = env('DB_HOST', '127.0.0.1');
        $port = env('DB_PORT', '3306');
        $db   = env('DB_DATABASE', '');
        $user = env('DB_USERNAME', 'root');
        $pass = env('DB_PASSWORD', '');
        $charset = env('DB_CHARSET', 'utf8mb4');

        $dsn = "mysql:host={$host};port={$port};dbname={$db};charset={$charset}";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            $pdo = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            throw new Exception("Database Connection Error: " . $e->getMessage());
        }
    }
    return $pdo;
}