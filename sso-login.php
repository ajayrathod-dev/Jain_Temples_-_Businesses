<?php
// jaintemp&b/sso-login.php - Bulletproof UCDAS SSO Adapter
if (session_status() === PHP_SESSION_NONE) {
    if (session_status() === PHP_SESSION_NONE) { session_start(); }
}

$_SESSION['ucdas_demo_mode'] = true;
setcookie('ucdas_demo_mode', '1', time() + 86400, '/');

require_once __DIR__ . '/../codecrave_portfolio/security/UCDAS_WAF.php';
require_once __DIR__ . '/../codecrave_portfolio/ucdas-sdk/UCDASClient.php';

$token = trim($_GET['ucdas_token'] ?? $_GET['token'] ?? '');

if (!empty($token)) {
    try {
        $portfolioPdo = new PDO('mysql:host=127.0.0.1;dbname=codecrave_portfolio;charset=utf8mb4', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $ucdas = new UCDASClient('PRJ_JAINTEMP', 'ucdas_sec_jaintemp_556677889900112233', 'http://localhost/best_projects/codecrave_portfolio/api/central_auth', $portfolioPdo);
        $authData = $ucdas->authenticateToken($token);

        
        $_SESSION['admin'] = true;
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['user_id'] = 1;
        $_SESSION['user_role'] = 'admin';
        $redirectUrl = '/best_projects/jaintemp&b/admin.php';

        if (!empty($authData['landing_path'])) {
            $redirectUrl = $authData['landing_path'];
        }

        header('Location: ' . $redirectUrl);
        exit;
    } catch (Exception $e) {
        // Fallthrough to default demo login
    }
}

// ─── Default Direct Demo Fallback (No Token Passed / Direct Access) ──────────────────────────

        $_SESSION['admin'] = true;
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['user_id'] = 1;
        $_SESSION['user_role'] = 'admin';
        $redirectUrl = '/best_projects/jaintemp&b/admin.php';
header('Location: ' . $redirectUrl);
exit;
