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

/**
 * CodeCrave Standard Front Controller
 * Project: jaintemp&b
 */

require_once __DIR__ . '/../app/Helpers/functions.php';
require_once __DIR__ . '/../app/Middleware/DemoModeMiddleware.php';

// Enforce Demo Mode Read-Only Restrictions on Mutating HTTP Requests
DemoModeMiddleware::enforce();

// Standard Routing Gateway
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (strpos($requestUri, '/api/v1/info') !== false) {
    header('Content-Type: application/json');
    echo file_get_contents(__DIR__ . '/api/v1/info.php');
    exit;
}

// Fallback to legacy index if exists in root
if (file_exists(__DIR__ . '/../index.php')) {
    require_once __DIR__ . '/../index.php';
} else {
    echo "<h1>Welcome to CodeCrave - jaintemp&b</h1>";
    echo "<p>Ecosystem standard front controller initialized successfully.</p>";
}