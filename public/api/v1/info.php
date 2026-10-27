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

header('Content-Type: application/json');

echo json_encode([
    'id' => strtolower('jaintemp&b'),
    'name' => 'CodeCrave - jaintemp&b',
    'version' => '1.0.0',
    'status' => 'Active',
    'demo_mode' => true,
    'demo_url' => "http://localhost/best_projects/jaintemp&b/public",
    'credential_storage' => 'NONE (Portfolio credential-free compliance)',
    'architecture' => 'CodeCrave Standard MVC'
], JSON_PRETTY_PRINT);