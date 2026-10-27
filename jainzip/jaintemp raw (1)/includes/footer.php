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
?>
  <!-- Common footer content -->
 <html>
     <body>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <footer style="background-color:#ff0048; color: white; text-align: center; padding: 20px; margin-top: 20px;">
    <div>
      <p>&copy; 2025 Jain Temples and Businesses. All Rights Reserved.</p>
      <p>Explore Maharashtra's diverse regions, cultures, and traditions.</p>
      <p>
        <a href="index.php" style="color: #00fbff; text-decoration: none;">Home</a> 
        <a href="#about" style="color: #00fbff; text-decoration: none;">About Us</a> 
        <a href="#gallery" style="color: #00fbff; text-decoration: none;">Gallery</a> 
        <a href="#regions" style="color: #00fbff; text-decoration: none;">Regions</a> 
        <a href="#faqs" style="color: #00fbff; text-decoration: none;">FAQs</a>
      </p>
    </div>
  </footer>
</body>
</html>
