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

include 'config.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM slideshow WHERE id = $id");
$row = mysqli_fetch_assoc($result);
?>

<form action="update_slide.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <label>Slide Image URL:</label>
    <input type="text" name="image_url" value="<?php echo $row['image_url']; ?>" required>

    <label>Title:</label>
    <input type="text" name="title" value="<?php echo $row['title']; ?>" required>

    <label>Slide Position:</label>
    <input type="number" name="position" value="<?php echo $row['position']; ?>">

    <button type="submit">Update Slide</button>
</form>