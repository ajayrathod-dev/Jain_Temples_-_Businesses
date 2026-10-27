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

// Sample data for businesses
$businesses = [
    [
        'title' => 'Business 1',
        'contact' => '+1234567890',
        'address' => '123 Business St., City',
        'email' => 'business1@example.com',
        'details' => 'Retail store selling various products.',
        'image' => 'https://via.placeholder.com/200'
    ],
    [
        'title' => 'Business 2',
        'contact' => '+0987654321',
        'address' => '456 Market Rd., City',
        'email' => 'business2@example.com',
        'details' => 'Restaurant offering Indian cuisine.',
        'image' => 'https://via.placeholder.com/200'
    ]
];

// Sample data for temples
$temples = [
    [
        'title' => 'Temple 1',
        'address' => '456 Temple Rd., City',
        'details' => 'Ancient Jain temple with beautiful architecture.',
        'image' => 'https://via.placeholder.com/200'
    ],
    [
        'title' => 'Temple 2',
        'address' => '789 Temple Ln., City',
        'details' => 'Temple dedicated to Lord Mahavir, peaceful ambiance.',
        'image' => 'https://via.placeholder.com/200'
    ]
];

// Insert business data into the database
foreach ($businesses as $business) {
    $sql = "INSERT INTO businesses (title, contact, address, email, details, image)
            VALUES ('{$business['title']}', '{$business['contact']}', '{$business['address']}', '{$business['email']}', '{$business['details']}', '{$business['image']}')";
    if ($conn->query($sql) === TRUE) {
        echo "Business '{$business['title']}' inserted successfully!<br>";
    } else {
        echo "Error inserting business: " . $conn->error . "<br>";
    }
}

// Insert temple data into the database
foreach ($temples as $temple) {
    $sql = "INSERT INTO temples (title, address, details, image)
            VALUES ('{$temple['title']}', '{$temple['address']}', '{$temple['details']}', '{$temple['image']}')";
    if ($conn->query($sql) === TRUE) {
        echo "Temple '{$temple['title']}' inserted successfully!<br>";
    } else {
        echo "Error inserting temple: " . $conn->error . "<br>";
    }
}

// Close the database connection
$conn->close();
