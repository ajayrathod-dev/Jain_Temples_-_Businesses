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


class AuthMiddleware {
    public static function initSession() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start([
                'cookie_httponly' => true,
                'cookie_samesite' => 'Lax',
                'use_strict_mode' => true,
            ]);
        }
    }

    public static function requireAdmin() {
        self::initSession();
        if (empty($_SESSION['auth']['user_id']) || ($_SESSION['auth']['role'] ?? '') !== 'admin') {
            if (empty($_SESSION['admin_logged_in']) && empty($_SESSION['admin_id'])) {
                header('Location: /admin/login.php');
                exit;
            }
        }
    }
}