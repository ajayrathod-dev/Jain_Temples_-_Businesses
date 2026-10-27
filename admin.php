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

if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (!isset($_SESSION['admin']) && !isset($_SESSION['admin_logged_in'])) {
    header("Location: login.html");
    exit;
}

$pageTitle = "Admin Panel";
include 'includes/header.php';
include 'config.php'; // Database connection

// Process form submissions (add or delete items)

// Add new business
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_business'])) {
    $title   = $_POST['title'];
    $address = $_POST['address'];
    $details = $_POST['details'];
    $image   = $_POST['image'];
    $region  = $_POST['region'] ?? '';


    $sql = "INSERT INTO businesses (title, business_name, address, details, image, region) 
            VALUES ('$title', '$title', '$address', '$details', '$image', '$region')";

    if ($conn->query($sql) === TRUE) {
        // echo "New business added successfully!<br>";
    } else {
        echo "Error: " . $conn->error . "<br>";
    }
}

// Add new temple
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_temple'])) {
    $title   = $_POST['title'];
    $address = $_POST['address'];
    $details = $_POST['details'];
    $image   = $_POST['image'];
    $region  = $_POST['region'] ?? '';

    $facility = $_POST['facility']; // Facility to Stay (YES/NO)

    $sql = "INSERT INTO temples (title, temple_name, address, location, details, description, image, image_url, region, city, facility) 
            VALUES ('$title', '$title', '$address', '$address', '$details', '$details', '$image', '$image', '$region', '$region', '$facility')";

    if ($conn->query($sql) === TRUE) {
        // echo "New temple added successfully!<br>";
    } else {
        echo "Error: " . $conn->error . "<br>";
    }
}

// Delete business
if (isset($_GET['delete_business'])) {
    $id = intval($_GET['delete_business']);
    $sql = "DELETE FROM businesses WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        // echo "Business deleted successfully!<br>";
    } else {
        echo "Error: " . $conn->error . "<br>";
    }
}

// Delete temple
if (isset($_GET['delete_temple'])) {
    $id = intval($_GET['delete_temple']);
    $sql = "DELETE FROM temples WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        // echo "Temple deleted successfully!<br>";
    } else {
        echo "Error: " . $conn->error . "<br>";
    }
}

// Retrieve existing businesses and temples
$business_result = $conn->query("SELECT * FROM businesses ORDER BY id DESC");
$temple_result = $conn->query("SELECT * FROM temples ORDER BY id DESC");

$conn->close();
?>

<div class="container">
    <!-- Add New Business Form -->
    <div class="form-container">
        <h2>Add New Business</h2>
        <form method="POST">
            <input type="text" name="title" placeholder="Business Title" required>
            <input type="text" name="address" placeholder="Address" required>
            <textarea name="details" placeholder="Business Details" required></textarea>
            <input type="text" name="image" placeholder="Image URL" required>
            <input type="text" name="region" placeholder="Region (optional)">
            <button type="submit" name="add_business">Add Business</button>
        </form>
    </div>

    <!-- Add New Temple Form -->
    <div class="form-container">
        <h2>Add New Temple</h2>
        <form method="POST">
            <input type="text" name="title" placeholder="Temple Title" required>
            <input type="text" name="address" placeholder="Address" required>
            <textarea name="details" placeholder="Temple Details" required></textarea>
            <input type="text" name="image" placeholder="Image URL" required>
            <input type="text" name="region" placeholder="Region (optional)">

            <!-- Facility to Stay Dropdown -->
            <label for="facility">Facility to Stay:</label>
            <select name="facility" id="facility" required>
                <option value="YES">YES</option>
                <option value="NO">NO</option>
            </select>

            <button type="submit" name="add_temple">Add Temple</button>
        </form>
    </div>

    <!-- Existing Businesses Table -->
    <div class="table-container">
        <h2>Existing Businesses</h2>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Address</th>
                    <th>Details</th>
                    <th>Region</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $business_result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['title'] ?? $row['business_name'] ?? '') ?></td>
                        <td><?= htmlspecialchars($row['address'] ?? '') ?></td>
                        <td><?= htmlspecialchars($row['details'] ?? $row['category'] ?? '') ?></td>
                        <td><?= htmlspecialchars($row['region'] ?? $row['city'] ?? '') ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                            <a href="?delete_business=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Existing Temples Table -->
    <div class="table-container">
        <h2>Existing Temples</h2>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Address</th>
                    <th>Details</th>
                    <th>Region</th>
                    <th>Facility to Stay</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $temple_result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['title'] ?? $row['temple_name'] ?? '') ?></td>
                        <td><?= htmlspecialchars($row['address'] ?? $row['location'] ?? '') ?></td>
                        <td><?= htmlspecialchars($row['details'] ?? $row['description'] ?? '') ?></td>
                        <td><?= htmlspecialchars($row['region'] ?? $row['city'] ?? '') ?></td>
                        <td><?= htmlspecialchars($row['facility'] ?? 'YES') ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                            <a href="?delete_temple=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<style>
    /* General Reset & Typography */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: rgb(248, 245, 245);
        line-height: 1.6;
        color: #333;
    }

    /* Main Container */
    .container {
        width: 90%;
        max-width: 1200px;
        margin: 20px auto;
    }

    /* Form Containers */
    .form-container {
        background: linear-gradient(135deg, rgb(4, 244, 224), #B931FC);
        padding: 20px;
        margin-bottom: 30px;
        border-radius: 10px;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.2s;
    }

    .form-container:hover {
        transform: scale(1.02);
    }

    .form-container h2 {
        margin-bottom: 15px;
        color: rgb(253, 72, 6);
        font-size: 1.6em;
    }

    /* Form Inputs */
    .form-container input[type="text"],
    .form-container input[type="email"],
    .form-container textarea,
    .form-container select {
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 1em;
        transition: 0.3s;
    }

    .form-container input:focus,
    .form-container textarea:focus {
        border-color: #ff4500;
        outline: none;
    }

    /* Buttons */
    .form-container button {
        background-color: #ff4500;
        color: #fff;
        border: none;
        padding: 12px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 1em;
        transition: 0.3s;
    }

    .form-container button:hover {
        background-color: #e04300;
    }

    /* Table Styling */
    .table-container {
        background: linear-gradient(135deg, #45FFCA, #7CF5FF);
        padding: 20px;
        border-radius: 10px;
        overflow-x: auto;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
        margin-bottom: 30px;
    }

    .table-container h2 {
        margin-bottom: 15px;
        color: #252B48;
        font-size: 1.6em;
    }

    /* Tables */
    /* Table Container */
    .table-container {
        background: linear-gradient(135deg, #45FFCA, #7CF5FF);
        padding: 20px;
        border-radius: 10px;
        overflow-x: auto;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
        margin-bottom: 30px;
        transition: transform 0.2s;
    }

    .table-container:hover {
        transform: scale(1.02);
    }

    .table-container h2 {
        margin-bottom: 15px;
        color: #252B48;
        font-size: 1.6em;
    }

    /* Table Styling */
    .table-container table {
        width: 100%;
        border-collapse: collapse;
        background: linear-gradient(135deg, #DDF2FD, #7CF5FF);
        border-radius: 8px;
        overflow: hidden;
    }

    .table-container th,
    .table-container td {
        padding: 14px;
        text-align: left;
        border-bottom: 1px solid #EDE4FF;
        font-size: 1em;
    }

    .table-container th {
        background: linear-gradient(135deg, #B931FC, #7A0BC0);
        color: #fff;
        font-weight: bold;
        text-transform: uppercase;
    }

    .table-container tr:hover {
        background: rgba(255, 255, 255, 0.2);
        transition: 0.3s;
    }

    /* Table Buttons */
    .table-container .edit-btn,
    .table-container .delete-btn {
        padding: 8px 14px;
        border: none;
        cursor: pointer;
        border-radius: 6px;
        font-size: 0.9em;
        transition: 0.3s;
    }

    .table-container .edit-btn {
        background: linear-gradient(135deg, #0FC2C0, #11999E);
        color: #fff;
    }

    .table-container .edit-btn:hover {
        background: linear-gradient(135deg, #11999E, #0FC2C0);
    }

    .table-container .delete-btn {
        background: linear-gradient(135deg, #E63946, #D00000);
        color: #fff;
    }

    .table-container .delete-btn:hover {
        background: linear-gradient(135deg, #D00000, #E63946);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .table-container {
            padding: 15px;
        }

        .table-container th,
        .table-container td {
            padding: 10px;
            font-size: 0.9em;
        }
    }
</style>

<?php include 'includes/footer.php'; ?>