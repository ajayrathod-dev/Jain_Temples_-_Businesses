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


require_once __DIR__ . '/../../config/app.php';

if (!function_exists('e')) {
    function e($value) {
        return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('isDemoMode')) {
    function isDemoMode() {
        return (bool) (env('DEMO_MODE', 'true') === 'true');
    }
}