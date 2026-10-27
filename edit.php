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

// Connect to the database
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "website_db";
$conn = new mysqli($host, $user, $pass, $dbname);

// Check if connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if an ID is passed to edit
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Check if it's a business or a temple by querying both tables
    $business_result = $conn->query("SELECT * FROM businesses WHERE id = $id");
    $temple_result = $conn->query("SELECT * FROM temples WHERE id = $id");

    if ($business_result->num_rows > 0) {
        $row = $business_result->fetch_assoc();
        $is_business = true;
    } elseif ($temple_result->num_rows > 0) {
        $row = $temple_result->fetch_assoc();
        $is_business = false;
    } else {
        echo "No record found!";
        exit;
    }
}

// Handle the form submission (Edit action)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $contact = isset($_POST['contact']) ? $_POST['contact'] : null;
    $address = $_POST['address'];
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $details = $_POST['details'];
    $image = $_POST['image'];

    if ($is_business) {
        $sql = "UPDATE businesses SET title = '$title', contact = '$contact', address = '$address', email = '$email', details = '$details', image = '$image' WHERE id = $id";
    } else {
        $sql = "UPDATE temples SET title = '$title', address = '$address', details = '$details', image = '$image' WHERE id = $id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully!<br>";
    } else {
        echo "Error: " . $conn->error . "<br>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #ff4500;
            color: white;
            text-align: center;
            padding: 15px 0;
        }

        .container {
            margin: 20px;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            color: #333;
        }

        .form-container input,
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .form-container button {
            background-color: #ff4500;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
        }

        .form-container button:hover {
            background-color: #e04300;
        }
    </style>
</head>

<body>
    <header>
        <h1>Edit Record</h1>
    </header>

    <div class="container">
        <!-- Edit Business or Temple Form -->
        <div class="form-container">
            <h2>Edit <?php echo $is_business ? 'Business' : 'Temple'; ?></h2>
            <form method="POST">
                <input type="text" name="title" value="<?= $row['title'] ?>" placeholder="Title" required>
                <?php if ($is_business): ?>
                    <input type="text" name="contact" value="<?= $row['contact'] ?>" placeholder="Contact" required>
                    <input type="email" name="email" value="<?= $row['email'] ?>" placeholder="Email" required>
                <?php endif; ?>
                <input type="text" name="address" value="<?= $row['address'] ?>" placeholder="Address" required>
                <textarea name="details" placeholder="Details" required><?= $row['details'] ?></textarea>
                <input type="text" name="image" value="<?= $row['image'] ?>" placeholder="Image URL" required>
                <button type="submit">Update Record</button>
            </form>
        </div>
    </div>
</body>

</html>