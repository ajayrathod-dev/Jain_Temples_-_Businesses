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

return [
    'pageTitle' => 'जैन मंदिर और व्यवसाय',
    'welcomeMessage' => "महाराष्ट्र के चमत्कारों में आपका स्वागत है",
    'searchPlaceholder' => "मंदिर खोजें..."
];
