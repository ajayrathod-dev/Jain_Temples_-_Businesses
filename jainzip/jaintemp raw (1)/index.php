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

$pageTitle = "Jain Temples & Businesses";
include 'includes/header.php';
include 'config.php'; // This file should contain your DB connection (if you need it for other queries)
?>

<!-- Language Selector -->
<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
// Detect language from GET or session
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
$lang = $_SESSION['lang'] ?? 'en'; // Default to English
$translations = include "lang_{$lang}.php";
?>
<html>
<head>
    <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
    }
</script>


</head>
<script>
    document.getElementById("languageDropdown").addEventListener("change", function () {
        var lang = this.value; // Get selected language
        var selectField = document.querySelector(".goog-te-combo"); // Find Google Translate dropdown
        if (selectField) {
            selectField.value = lang; // Set selected language
            selectField.dispatchEvent(new Event('change')); // Trigger translation
        }
    });
</script>

<body>
    <!-- Language Selector -->
    <div class="language-selector">
   <select id="languageDropdown">
    <option value="en">English</option>
    <option value="hi">Hindi</option>
    <option value="mr">Marathi</option>
    <option value="gu">Gujarati</option>
</select>
</div>
<!-- Navigation Menu for Regions -->
<nav>
  <ul>
    <!-- Marathwada -->
    <li>
      <a href="#">Marathwada</a>
      <ul>
        <li><a href="city.php?region=Chatrapati%20Sambhaji%20Nagar">Chatrapati Sambhaji Nagar</a></li>
        <li><a href="city.php?region=Dharashiv">Dharashiv</a></li>
        <li><a href="city.php?region=Jalna">Jalna</a></li>
        <li><a href="city.php?region=Latur">Latur</a></li>
        <li><a href="city.php?region=Nanded">Nanded</a></li>
        <li><a href="city.php?region=Beed">Beed</a></li>
        <li><a href="city.php?region=Parbhani">Parbhani</a></li>
        <li><a href="city.php?region=Hingoli">Hingoli</a></li>
      </ul>
    </li>
    <!-- Konkan -->
    <li>
      <a href="#">Konkan</a>
      <ul>
        <li><a href="city.php?region=Mumbai%20City">Mumbai City</a></li>
        <li><a href="city.php?region=Mumbai%20Suburban">Mumbai Suburban</a></li>
        <li><a href="city.php?region=Raigad">Raigad</a></li>
        <li><a href="city.php?region=Ratnagiri">Ratnagiri</a></li>
        <li><a href="city.php?region=Sindhudurg">Sindhudurg</a></li>
        <li><a href="city.php?region=Palghar">Palghar</a></li>
        <li><a href="city.php?region=Thane">Thane</a></li>
      </ul>
    </li>
    <!-- Western Maharashtra -->
    <li>
      <a href="#">Western Maharashtra</a>
      <ul>
        <li><a href="city.php?region=Pune">Pune</a></li>
        <li><a href="city.php?region=Satara">Satara</a></li>
        <li><a href="city.php?region=Sangli">Sangli</a></li>
        <li><a href="city.php?region=Kolhapur">Kolhapur</a></li>
        <li><a href="city.php?region=Solapur">Solapur</a></li>
      </ul>
    </li>
    <!-- Vidarbha -->
    <li>
      <a href="#">Vidarbha</a>
      <ul>
        <li><a href="city.php?region=Amravati">Amravati</a></li>
        <li><a href="city.php?region=Akola">Akola</a></li>
        <li><a href="city.php?region=Buldhana">Buldhana</a></li>
        <li><a href="city.php?region=Chandrapur">Chandrapur</a></li>
        <li><a href="city.php?region=Gadchiroli">Gadchiroli</a></li>
        <li><a href="city.php?region=Gondia">Gondia</a></li>
        <li><a href="city.php?region=Nagpur">Nagpur</a></li>
        <li><a href="city.php?region=Wardha">Wardha</a></li>
        <li><a href="city.php?region=Yavatmal">Yavatmal</a></li>
      </ul>
    </li>
    <!-- North Maharashtra -->
    <li>
      <a href="#">North Maharashtra</a>
      <ul>
        <li><a href="city.php?region=Dhule">Dhule</a></li>
        <li><a href="city.php?region=Jalgaon">Jalgaon</a></li>
        <li><a href="city.php?region=Nandurbar">Nandurbar</a></li>
      </ul>
    </li>
    <!-- Khandesh -->
    <li>
      <a href="#">Khandesh</a>
      <ul>
        <li><a href="city.php?region=Jalgaon">Jalgaon</a></li>
        <li><a href="city.php?region=Dhule">Dhule</a></li>
        <li><a href="city.php?region=Nandurbar">Nandurbar</a></li>
      </ul>
    </li>
  </ul>
  <!-- Existing Search Container (now wrapped in a form) -->
  <form action="index.php" method="get">
    <div class="search-container">
      <input type="text" name="search" placeholder="Search..." class="search-bar">
      <button class="search-button" type="submit">Search</button>
    </div>
  </form>
</nav>

<!-- Cities Navigation Menu -->


<?php
// Make sure config.php is already included at the top of index.php (it provides $conn)
if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $searchTerm = trim($_GET['search']);
    
    // Escape the search term using your MySQLi connection to prevent SQL injection.
    $searchTermEscaped = $conn->real_escape_string($searchTerm);
    
    // Query for temples using the existing table structure
    $sqlTemples = "SELECT * FROM temples WHERE title LIKE '%$searchTermEscaped%' OR details LIKE '%$searchTermEscaped%'";
    $resultTemples = $conn->query($sqlTemples);
    
    // Query for businesses using the existing table structure
    $sqlBusinesses = "SELECT * FROM businesses WHERE title LIKE '%$searchTermEscaped%' OR details LIKE '%$searchTermEscaped%'";
    $resultBusinesses = $conn->query($sqlBusinesses);
    
    echo '<div style="max-width: 800px; margin: 20px auto;">';
    echo '<h2>Search Results for "' . htmlspecialchars($searchTerm) . '"</h2>';
    
    // Display temple results if any are found.
    if ($resultTemples && $resultTemples->num_rows > 0) {
        echo '<h3>Temples</h3>';
        echo '<ul style="list-style: none; padding: 0;">';
        while ($row = $resultTemples->fetch_assoc()) {
            echo '<li style="margin-bottom: 15px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">';
            echo '<strong>' . htmlspecialchars($row['title']) . '</strong><br>';
            echo htmlspecialchars($row['details']);
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No temple results found for "' . htmlspecialchars($searchTerm) . '".</p>';
    }
    
    // Display business results if any are found.
    if ($resultBusinesses && $resultBusinesses->num_rows > 0) {
        echo '<h3>Businesses</h3>';
        echo '<ul style="list-style: none; padding: 0;">';
        while ($row = $resultBusinesses->fetch_assoc()) {
            echo '<li style="margin-bottom: 15px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">';
            echo '<strong>' . htmlspecialchars($row['title']) . '</strong><br>';
            echo htmlspecialchars($row['details']);
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No business results found for "' . htmlspecialchars($searchTerm) . '".</p>';
    }
    
    echo '</div>';
}
?>

<!-- Slideshow Section -->
<div class="slideshow-container">
  <div class="slideshow-wrapper">
    <div class="slide">
      <img src="https://th.bing.com/th/id/OIP.aWurQJG6zTle2lq-SrmhTAHaE7?rs=1&pid=ImgDetMain" alt="Jain Temple, Mumbai">
      <div class="text">Jain Temple, Mumbai</div>
    </div>
    <div class="slide">
      <img src="https://www.gastrotravelogue.com/wp-content/uploads/2017/04/Ranukpur-columns-1920x1280.jpg" alt="Jain Temple, Nashik">
      <div class="text">Jain Temple, Nashik</div>
    </div>
    <div class="slide">
      <img src="https://images.creativemarket.com/0.1.0/ps/4258710/910/607/m2/fpnw/wm1/cqdsswv6l2wrhmz356rm6nmwefvkztwpnmhtwv9axaudwrk6krgdtkw2cu2kwybh-.jpg?1523230168&s=52e30183ad83e80d6d2968be4390a6b7" alt="Ranakpur Jain Temple">
      <div class="text">Ranakpur Jain Temple</div>
    </div>
  </div>
</div>

<div class="dots">
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
</div>

<style>
/* 
  Provided by ChatGPT:

  To prevent photo quality loss and layout issues:
  - Use images with a consistent aspect ratio (ideally 16:9).
  - For full-width desktop slides, consider using images sized around 1920x1080 px 
    (or 1280x720 px if performance is a concern).
  - Constrain the displayed height via CSS (using max-height and object-fit) so that 
    even if the source images are tall, the slideshow remains visually balanced.
*/

.slideshow-container {
  position: relative;
  width: 100%;
  overflow: hidden;
  border: 5px solid #ddd;    /* Adjust border thickness and color */
  border-radius: 8px;        /* Rounded corners for a softer look */
  box-shadow: 4px 8px rgba(0, 0, 0, 0.1); /* Optional subtle shadow */
  margin: 20px auto;         /* Optional spacing around the container */
}

.slideshow-wrapper {
  display: flex;
  animation: scrollLeft 5s linear infinite;
}

.slide {
  position: relative;
  min-width: 100%;
}

.slide img {
  width: 100%;
  max-height: 500px;  /* Adjust based on your design requirements */
  display: block;
  object-fit: cover;
}

@keyframes scrollLeft {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-100%);
  }
}

.text {
  background-color: rgba(250, 10, 78, 0.7); /* Orange background for the text */
  color: #ffffff;                           /* White text */
  padding: 10px 20px;                       /* Padding around the text */
  position: absolute;                       /* Positioned absolutely within the slide */
  bottom: 15px;                             /* 15px from the bottom of the slide */
  width: 100%;                              /* Span the full width of the slide */
  text-align: center;                       /* Center the text horizontally */
  left: 50%;                                /* Position left at 50% */
  transform: translate(-50%, 0);            /* Adjust horizontal centering */
  border-radius: 5px;                       /* Rounded edges */
  font-size: 18px;                          /* Set font size */
}
</style>

<!-- Welcome Section -->
<section class="welcome-section">
  <div class="welcome-container">
    <h2>Welcome to Maharashtra's Wonders</h2>
    <p>
      Explore the diverse regions of Maharashtra, from its scenic beauty and historical landmarks to the best accommodations, local businesses, and serene temples.
    </p>
    <div class="welcome-highlights">
      <div class="highlight">
        <img src="https://jyotirlingasofindia.wordpress.com/wp-content/uploads/2017/02/jain-temples-in-india.jpg?w=917&h=611" alt="Tourist Attractions">
        <h3>Tourist Attractions</h3>
        <p>Discover iconic destinations and hidden gems.</p>
      </div>
      <div class="highlight">
        <img src="https://media.edinburgh.org/wp-content/uploads/2023/04/23154056/The-Balmoral-Executive-View-Room-e1682260891619.jpg" alt="Accommodation">
        <h3>Accommodation</h3>
        <p>Find comfortable places to stay during your journey.</p>
      </div>
      <div class="highlight">
        <img src="https://localiq.com/wp-content/uploads/2022/07/how-to-support-local-businesses-feature.jpg" alt="Local Businesses">
        <h3>Local Businesses</h3>
        <p>Support and explore the vibrant local economy.</p>
      </div>
      <div class="highlight">
        <img src="https://tripxl.com/blog/wp-content/uploads/2024/10/Parasnath-Jain-Temple-Solapur.jpg" alt="Temples">
        <h3>Temples</h3>
        <p>Visit serene and spiritually enriching temples.</p>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
