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

$pageTitle = "Admin Panel";
include 'includes/header.php';
include 'config.php'; // Using your existing config.php for database connection

// Process form submissions (add or delete items)

// Add new business or temple
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_business'])) {
        $title   = $_POST['title'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $email   = $_POST['email'];
        $details = $_POST['details'];
        $image   = $_POST['image']; // For real use, handle file uploads
        $region  = $_POST['region'] ?? '';

        $sql = "INSERT INTO businesses (title, contact, address, email, details, image, region) 
                VALUES ('$title', '$contact', '$address', '$email', '$details', '$image', '$region')";
        if ($conn->query($sql) === TRUE) {
           // echo "New business added successfully!<br>";
        } else {
            echo "Error: " . $conn->error . "<br>";
        }
    } elseif (isset($_POST['add_temple'])) {
        $title   = $_POST['title'];
        $address = $_POST['address'];
        $details = $_POST['details'];
        $image   = $_POST['image']; // For real use, handle file uploads
        $region  = $_POST['region'] ?? '';

        $sql = "INSERT INTO temples (title, address, details, image, region) 
                VALUES ('$title', '$address', '$details', '$image', '$region')";
        if ($conn->query($sql) === TRUE) {
          //  echo "New temple added successfully!<br>";
        } else {
            echo "Error: " . $conn->error . "<br>";
        }
    }
}

// Delete business or temple
if (isset($_GET['delete_business'])) {
    $id = $_GET['delete_business'];
    $sql = "DELETE FROM businesses WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
       // echo "Business deleted successfully!<br>";
    } else {
        echo "Error: " . $conn->error . "<br>";
    }
}
if (isset($_GET['delete_temple'])) {
    $id = $_GET['delete_temple'];
    $sql = "DELETE FROM temples WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
       // echo "Temple deleted successfully!<br>";
    } else {
        echo "Error: " . $conn->error . "<br>";
    }
}

// Retrieve existing businesses and temples for display
$business_result = $conn->query("SELECT * FROM businesses");
$temple_result   = $conn->query("SELECT * FROM temples");

$conn->close();
?>

<!-- Internal CSS for admin.php -->
<style>
/* General Reset & Typography */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  background-color: #7CF5FF;
  line-height: 1.6;
  color: #333;
}

/* Container for Admin Content */
.container {
  width: 90%;
  max-width: 1200px;
  margin: 20px auto;
}

/* Admin Panel Form Container */
.form-container {
  background-color: #DDF2FD;
  padding: 20px;
  margin-bottom: 30px;
  border-radius: 8px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.form-container h2 {
  margin-bottom: 15px;
  color: #333;
  font-size: 1.5em;
}

/* Form Inputs */
.form-container input[type="text"],
.form-container input[type="email"],
.form-container textarea {
  width: 100%;
  padding: 10px;
  margin: 10px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 1em;
}

.form-container textarea {
  resize: vertical;
  min-height: 100px;
}

/* Form Button */
.form-container button {
  background-color: #ff4500;
  color: #fff;
  border: none;
  padding: 12px 20px;
  border-radius: 4px;
  cursor: pointer;
  font-size: 1em;
  transition: background-color 0.3s ease;
}

.form-container button:hover {
  background-color: #e04300;
}

/* Table Container */
.table-container {
  background-color: #45FFCA;
  padding: 20px;
  border-radius: 8px;
  overflow-x: auto;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  margin-bottom: 30px;
  color:#252B48;
}

.table-container h2 {
  margin-bottom: 15px;
  color: #B931FC;
  font-size: 1.5em;
}

/* Tables */
.table-container table {
  width: 100%;
  border-collapse: collapse;
}

.table-container th,
.table-container td {
  padding: 12px;
  text-align: left;
  border: 1px solid #EDE4FF;
  font-size: 0.9em;
}

.table-container th {
  background-color: #f4f4f4;
  font-weight: bold;
}

.table-container td a {
  color: #ff4500;
  text-decoration: none;
  font-size: 0.9em;
}

.table-container td a:hover {
  text-decoration: underline;
}

/* Responsive Design for Admin Panel */
@media (max-width: 768px) {
  .container {
    width: 95%;
  }
  .form-container, .table-container {
    padding: 15px;
  }
  .table-container th,
  .table-container td {
    padding: 8px;
  }
}
</style>

<div class="container">
  <!-- Add New Business Form -->
  <div class="form-container">
    <h2>Add New Business</h2>
    <form method="POST">
      <input type="text" name="title" placeholder="Business Title" required>
      <input type="text" name="contact" placeholder="Contact" required>
      <input type="text" name="address" placeholder="Address" required>
      <input type="email" name="email" placeholder="Email" required>
      <textarea name="details" placeholder="Business Details" required></textarea>
      <input type="text" name="image" placeholder="Image URL" required>
      <input type="text" name="region" placeholder="city (optional)">
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
          <th>Contact</th>
          <th>Address</th>
          <th>Email</th>
          <th>Details</th>
          <th>Region</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $business_result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['contact']) ?></td>
            <td><?= htmlspecialchars($row['address']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['details']) ?></td>
            <td><?= htmlspecialchars($row['region']) ?></td>
            <td>
              <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
              <a href="?delete_business=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this business?')">Delete</a>
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
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $temple_result->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['address']) ?></td>
            <td><?= htmlspecialchars($row['details']) ?></td>
            <td><?= htmlspecialchars($row['region']) ?></td>
            <td>
              <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
              <a href="?delete_temple=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this temple?')">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
