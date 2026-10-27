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


require_once __DIR__ . '/../Helpers/functions.php';

class DemoModeMiddleware {
    public static function enforce() {
        if (isDemoMode()) {
            $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
            if (in_array(strtoupper($method), ['POST', 'PUT', 'DELETE', 'PATCH'])) {
                // Check if this is an auth attempt (login/logout) to allow login testing
                $uri = $_SERVER['REQUEST_URI'] ?? '';
                if (strpos($uri, 'login') !== false || strpos($uri, 'logout') !== false) {
                    return true;
                }
                
                // Block mutations in demo mode
                if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                    header('Content-Type: application/json', true, 403);
                    echo json_encode([
                        'success' => false,
                        'message' => 'DEMO MODE: Data modifications are disabled in live preview.'
                    ]);
                    exit;
                } else {
                    http_response_code(403);
                    echo "<div style='font-family:sans-serif; padding:20px; background:#fff3cd; border:1px solid #ffeeba; color:#856404; border-radius:5px; margin:20px;'>";
                    echo "<h3>Demo Mode Active</h3>";
                    echo "<p>Data modifications (POST/PUT/DELETE) are disabled in live preview mode.</p>";
                    echo "<a href='javascript:history.back()'>&laquo; Go Back</a>";
                    echo "</div>";
                    exit;
                }
            }
        }
    }
}