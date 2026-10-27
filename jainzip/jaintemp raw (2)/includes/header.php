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

// header.php
// If you want to set a page-specific title, define $pageTitle before including this file.
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo isset($pageTitle) ? $pageTitle : "Jain Temples and Businesses"; ?></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- Common header content -->
  <header class="header">
    <img src="https://i.postimg.cc/j2SVjgrQ/jain-temples-and-businesses.jpg" alt="Jain Temples and Businesses Logo" id="image">
    <a href="index.php" class="logo"><h1><u>Jain Temples And Businesses</u></h1></a>
    
  </header>
  
 