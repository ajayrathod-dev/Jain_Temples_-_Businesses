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

$pageTitle = "City Details";
include 'includes/header.php';
include 'config.php'; // Use your existing config.php

$region = isset($_GET['region']) ? $conn->real_escape_string($_GET['region']) : '';
if ($region == '') {
    echo "<p>No region specified.</p>";
    include 'includes/footer.php';
    exit;
}

// Query for businesses in the specified region
$businessQuery = "SELECT * FROM businesses WHERE region = '$region'";
$businessResult = $conn->query($businessQuery);

// Query for temples in the specified region
$templeQuery = "SELECT * FROM temples WHERE region = '$region'";
$templeResult = $conn->query($templeQuery);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($region); ?> - City Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fafafa;
            transition: background-color 0.3s ease;
        }
        header {
            background-color: #ff0048;
            color: white;
            text-align: center;
            padding: 15px 0;
        }
        .container {
            display: flex;
            flex-direction: row;
            margin: 20px;
            gap: 20px;
        }
        .left, .right {
            flex: 1;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .left:hover, .right:hover {
            transform: scale(1.05);
        }
        .business, .temple {
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }
        .business img, .temple img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
            transition: transform 0.3s ease;
        }
        .business:hover img, .temple:hover img {
            transform: scale(1.05);
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin: 5px 0;
        }
        .follow-pointer {
            position: fixed;
            pointer-events: none;
            transition: transform 0.1s ease;
            width: 20px;
            height: 20px;
            background-color: #0ad6ff;
            border-radius: 50%;
        }
        footer {
           margin-top: 50px;
        }
    </style>
</head>
<body>
    <header>
        <h1><?php echo htmlspecialchars($region); ?></h1>
    </header>

    <div class="container">
        <div class="left">
            <h2><u>Local Businesses in <?php echo htmlspecialchars($region); ?></u></h2>
            <?php if ($businessResult && $businessResult->num_rows > 0): ?>
                <?php while ($business = $businessResult->fetch_assoc()): ?>
                    <div class="business">
                        <h3><?php echo htmlspecialchars($business['title']); ?></h3>
                        <?php if ($business['image']) { ?>
                            <img src="<?php echo htmlspecialchars($business['image']); ?>" alt="Business Image">
                        <?php } ?>
                        <ul>
                            <li><strong>Contact:</strong> <?php echo htmlspecialchars($business['contact']); ?></li>
                            <li><strong>Address:</strong> <?php echo htmlspecialchars($business['address']); ?></li>
                            <li><strong>Email:</strong> <?php echo htmlspecialchars($business['email']); ?></li>
                            <li><strong>Details:</strong> <?php echo htmlspecialchars($business['details']); ?></li>
                        </ul>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No businesses found in <?php echo htmlspecialchars($region); ?>.</p>
            <?php endif; ?>
        </div>

        <div class="right">
            <h2><u>Jain Temples in <?php echo htmlspecialchars($region); ?></u></h2>
            <?php if ($templeResult && $templeResult->num_rows > 0): ?>
                <?php while ($temple = $templeResult->fetch_assoc()): ?>
                    <div class="temple">
                        <h3><?php echo htmlspecialchars($temple['title']); ?></h3>
                        <?php if ($temple['image']) { ?>
                            <img src="<?php echo htmlspecialchars($temple['image']); ?>" alt="Temple Image">
                        <?php } ?>
                        <ul>
                            <li><strong>Address:</strong> <?php echo htmlspecialchars($temple['address']); ?></li>
                            <li><strong>Details:</strong> <?php echo htmlspecialchars($temple['details']); ?></li>
                        </ul>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No temples found in <?php echo htmlspecialchars($region); ?>.</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="follow-pointer"></div>

    <footer>
      <?php include 'includes/footer.php'; ?>

    </footer>

    <script>
        document.addEventListener("mousemove", function (e) {
            const pointerElement = document.querySelector(".follow-pointer");
            pointerElement.style.left = e.pageX + "px";
            pointerElement.style.top = e.pageY + "px";
        });
    </script>
</body>
</html>
