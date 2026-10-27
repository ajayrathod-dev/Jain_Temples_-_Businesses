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
<!DOCTYPE html>
<html>

<head>
  <title>Jain Temples & Businesses</title>
  <link rel="stylesheet" href="style.css">

</head>

<style>
  /* General Styling */
  /* Set box-sizing to include padding and border in element width and height calculations */
  * {
    box-sizing: border-box;
  }

  /* Define general body styling */
  body {
    font-family: Arial, Helvetica, sans-serif;
    /* Set font for the entire page */
    margin: 0;
    /* Remove default margins */
    padding: 0;
    /* Remove default padding */
  }

  /* Header Styling */
  /* Style the header section of the page */
  /* Header container */
  .header {
    background-color: #fffffe;
    /* Light yellow background */
    padding: 20px;
    /* Add padding around header content */
    overflow: hidden;
    /* Prevent content overflow */
    display: flex;
    /* Use flexbox for layout */
    align-items: center;
    /* Vertically center content */
    justify-content: space-between;
    /* Space between left and right sections */
    padding-top: 0;
  }


  /* Style individual header links */
  .header a {
    color: rgb(244, 232, 236);
    /* Text color */
    padding: 12px;
    /* Add padding around text */
    text-decoration: none;
    /* Remove underline from links */
    font-size: 20px;
    /* Set font size */
    border-radius: 4px;
    /* Add slight rounding to link borders */
  }

  /* Style the logo text */
  .header a.logo {
    font-size: 25px;
    /* Larger font size for the logo */
    font-weight: bold;
    /* Make the logo bold */
    text-decoration: none;
    /* Remove underline */
    color: rgb(248, 9, 85);
    /* Logo text color */
    display: flex;
    /* Flex container for logo and image */
    align-items: center;
    /* Align items vertically */
  }

  /* Style the logo image */
  .header img {
    height: 15%;
    /* Adjust the height as needed */
    width: 17%;
    /* Maintain aspect ratio */
    vertical-align: middle;
    /* Align it with the text */
    margin-left: 15px;
    /* Add space between the logo text and the image */
    padding-left: 2cm;
  }

  /* Hover effect for links */
  .header a:hover {
    background-color: #f9f7f4;
    /* Red background on hover */
    color: black;
    /* Change text color on hover */
  }

  /* Style the right-aligned section of the header */
  .header .header-right {
    display: flex;
    /* Use flexbox for alignment */
    align-items: center;
    /* Vertically center links */
    gap: 10px;
    /* Add spacing between links */
  }

  /* Responsive Design: Adjust header layout for small screens */
  @media (max-width: 500px) {
    .header {
      flex-direction: column;
      /* Stack items vertically */
      align-items: flex-start;
      /* Align content to the left */
    }

    .header a,
    .header .header-right {
      display: block;
      /* Stack links */
      text-align: left;
      /* Align links to the left */
    }
  }

  /* Navigation Styling */
  /* Style the main navigation bar */
  nav {
    background-color: #e8225d;
    /* Set background to a dark pink shade */
    padding: 10px;
    /* Add padding to the navigation bar */
    border-bottom: 1px solid #21c9ea;
    /* Add a blue bottom border */
    border-radius: 2px;
  }

  /* Remove default list styling for navigation menu */
  nav ul {
    list-style: none;
    /* Remove bullets */
    padding: 0;
    /* Remove padding */
    margin: 0;
    /* Remove margin */
  }

  /* Style individual menu items */
  nav li {
    display: inline-block;
    /* Display items in a horizontal line */
    margin-right: 20px;
    /* Add spacing between items */
    position: relative;
    /* Allow absolute positioning for dropdown menus */
  }

  /* Style links within the navigation bar */
  nav a {
    text-decoration: none;
    /* Remove underline from links */
    color: rgb(247, 245, 245);
    /* Set link text to white */
    padding: 5px 10px;
    /* Add padding inside links */
    display: block;
    /* Make links occupy their container */
    border-radius: 5px;
    font-size: 22px;
  }

  /* hover for regions*/
  nav a:hover {
    background-color: #fd7208;
  }

  /* Style dropdown menus within the navigation bar */
  nav li ul {
    display: none;
    /* Hide dropdown menus by default */
    position: absolute;
    /* Position dropdowns relative to their parent */
    background-color: #ee0d0d;
    /* Set a white background for dropdowns */
    padding: 10px;
    /* Add padding inside the dropdown */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    /* Add a shadow for depth */
    z-index: 9999;
    /* Ensure dropdown is on top */
    border-radius: 5px;



  }

  /* Show dropdown menu on hover */
  nav li:hover ul {
    display: block;
    /* Make dropdown visible */
  }

  /* Style dropdown menu items */
  nav li ul li {
    padding: 5px 10px;
    /* Add padding to individual dropdown items */
    border-bottom: 1px solid #a7174c;
    /* Add a light gray border between items */
  }

  /* Change background and text color on hover for dropdown items */
  nav li ul li a:hover {
    /* Set background to pink on hover */
    color: rgb(250, 249, 249);
    /* Change text color to white */
  }


  /* Slideshow Styling */
  /* Style the container for the slideshow */
  .slideshow-container {

    max-width: 1520px;
    /* Limit the slideshow width */
    margin: auto;
    /* Center the slideshow */
    position: relative;
    /* Allow absolute positioning for slides */
    height: 30%;
  }

  /* Style individual slides */
  .slide {
    display: none;
    /* Hide all slides initially */
    overflow: hidden;
    position: inherit;
  }


  /* Style images inside the slides */
  .slide img {
    width: 100%;
    /* Make images fill the slide container */
    height: 50%;
    position: inherit;

  }


  /* Style the caption text in the slideshow */
  .text {
    background-color: rgba(250, 10, 78, 0.7);
    /* Orange background for the text */
    color: #ffffff;
    /* White text */
    padding: 10px 20px;
    /* Add padding around the text */
    position: absolute;
    /* Position the caption text at the bottom */
    bottom: 15px;
    /* Align text to the bottom of the slide */
    width: 100%;
    /* Make text span the width of the slide */
    text-align: center;
    /* Center-align the text */
    left: 50%;
    transform: translate(-50%);
    border-radius: 5px;
    /* Round the edges */
    font-size: 18px;
    /* Adjust font size */
    text-align: center;
    /* Center-align the text */

  }

  /* Style the dots (indicators) below the slideshow */
  .dots {
    text-align: center;
    /* Center the dots */
    margin-top: 10px;
    /* Add space above the dots */
  }

  /* Style individual dots */
  .dot {
    height: 15px;
    /* Set height for dots */
    width: 15px;
    /* Set width for dots */
    background-color: #e0aaaa;
    /* Light gray background for dots */
    border-radius: 50%;
    /* Make dots circular */
    display: inline-block;
    /* Display dots inline */
    margin: 0 5px;
    /* Add spacing between dots */
    transition: background-color 0.6s ease;
    /* Add smooth color transition */
  }

  /* Style the active dot */
  .active {
    background-color: #f70a0a;
    /* Darker gray for the active dot */
  }

  /* Dropdown and Region Styling */
  nav ul li>a:after {
    content: '\00bb';
    /* Add an arrow after the menu item */
    font-size: 16px;
    margin-left: 5px;
  }

  nav li ul {
    background-color: #f1f1f1;
    /* Set light background color */
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    /* Add shadow for dropdown */
  }

  nav li ul li a {
    color: #333;
    /* Change color of links */
  }

  nav li:hover>a:after {
    transform: rotate(90deg);
    /* Rotate the arrow on hover */
  }

  nav li ul li a:hover {
    background-color: #f30568;
    /* Set hover background color */
    color: white;
    /* Change text color to white */
  }

  /* Adjust arrow visibility */
  nav li>a:after {
    display: inline-block;
    margin-left: 5px;
  }

  nav li ul li a {
    font-size: 14px;
    /* Adjust font size for dropdown items */
  }

  /* Ensure dropdown doesn't open behind slideshow */
  nav {
    z-index: 1000;
    /* Increase z-index of nav */
  }

  .arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    font-size: 2em;
    color: rgb(205, 22, 22);
    background-color: rgba(0, 0, 0, 0.5);
    border: none;
    cursor: pointer;
    padding: 10px;
  }

  /* Hamburger Menu Styles */
  .hamburger-menu {
    display: flex;
    cursor: pointer;
    flex-direction: column;
    gap: 5px;
  }

  .hamburger-menu .bar {
    width: 25px;
    height: 3px;
    background-color: #333;
  }

  .sidebar {
    display: none;
    width: 250px;
    background-color: #333;
    color: white;
    position: fixed;
    left: 0;
    top: 0;
    height: 100%;
    padding-top: 20px;
  }

  .sidebar.active {
    display: block;
  }

  .sidebar ul {
    list-style-type: none;
    padding: 0;
  }

  .sidebar ul li {
    padding: 15px;
    font-size: 18px;
  }

  .header-right a {
    margin-right: 20px;
  }

  /* Translate Dropdown Styles */
  .translate-dropdown select {
    background-color: #fff;
    color: #ea1010;
    padding: 5px;
    font-size: 16px;
  }

  /* Styles for Slideshow */
  .slide {
    display: none;
  }

  /* Adjust hamburger menu for mobile */
  @media (max-width: 768px) {
    .hamburger-menu {
      display: flex;
    }

    .header-right {
      display: none;
    }

    .sidebar.active {
      display: block;
    }
  }

  @keyframes slidy {
    0% {
      left: 0%;
    }

    20% {
      left: 0%;
    }

    25% {
      left: -100%;
    }

    45% {
      left: -100%;
    }

    50% {
      left: -200%;
    }

    70% {
      left: -200%;
    }

    75% {
      left: -300%;
    }

    95% {
      left: -300%;
    }

    100% {
      left: -400%;
    }
  }

  body {
    margin: 0;
  }



  div#slide figure img div#slide figure {

    position: relative;
    width: 500%;
    margin: 0;
    left: 0;
    text-align: left;
    font-size: 0;
    animation: 30s slidy infinite;
  }

  /* Search Bar */
  .search-container {

    display: flex;
    justify-content: flex-end;
    align-items: flex-end;
    gap: 10px;
    position: right;
    width: 100%;
    margin-top: 0;
  }

  .search-bar {
    padding: 8px;
    margin-left: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    position: right;
  }

  .search-button {
    padding: 8px 12px;
    margin-left: 20px;
    background-color: #056bf9;
    color: white;
    border: none;
    position: right;
    border-radius: 4px;
    cursor: pointer;
  }

  .search-button:hover {
    background-color: #87d646;
  }

  /* Language Selector */
  .language-selector {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 10px;
    font-size: 14px;
    background-color: #05d4f9;
    border-radius: 2px;
  }

  .language-dropdown {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .header {
      flex-wrap: wrap;
      justify-content: center;
      text-align: center;
    }

    .navigation {
      flex-wrap: wrap;
      justify-content: center;
      gap: 10px;
    }

    .search-container,
    .language-selector {
      margin-top: 10px;
      justify-content: center;
    }
  }

  /* Welcome Section */
  .welcome-section {
    background-color: #f8f8f8;
    padding: 40px 20px;
    text-align: center;
  }

  .welcome-container h2 {
    font-size: 2rem;
    color: #b83058;
    margin-bottom: 20px;
  }

  .welcome-container p {
    font-size: 1.2rem;
    color: #333;
    margin-bottom: 30px;
    line-height: 1.6;
  }

  .welcome-highlights {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 20px;
  }

  .highlight {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
    transition: transform 0.3s;
  }

  .highlight:hover {
    transform: translateY(-5px);
  }

  .highlight img {
    width: 80px;
    margin-bottom: 15px;
  }

  .highlight h3 {
    font-size: 1.2rem;
    color: #056bf9;
    margin-bottom: 10px;
  }

  .highlight p {
    font-size: 1rem;
    color: #555;
  }

  footer a:hover {
    background-color: #1d128e;
    border-radius: 2px;
  }

  .hamburger-menu.format {
    border-radius: 5px;
    color: #09a66c;
  }
</style>

<body>
  <!-- Header Section -->
  <header class="header">

    <img src="https://i.postimg.cc/j2SVjgrQ/jain-temples-and-businesses.jpg" alt="jain_religion" class="header-logo"
      id="image">
    <a href="#home" class="logo"><u>
        <h1>Jain Temples And Businesses
      </u></h1></a>
    </div>

    <!-- Navigation Links -->
    <nav class="hamburger-menu" id="format">
      <a href="#home">Home</a>
      <a href="#about">About Us</a>
      <a href="#gallery">Gallery</a>
      <a href="#regions">Regions</a>
      <a href="#faqs">FAQs</a>
    </nav>

  </header>

  <!-- Sidebar Content -->
  <div class="sidebar" id="sidebar">
    <div class="logo">Jain Temples And Businesses</div>
    <ul>
      <li><a href="#home">Home</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><a href="#about">About</a></li>
    </ul>
  </div>
  <div class="language-selector">
    <label for="language">Language:</label>
    <select id="language" class="language-dropdown">
      <option value="en">English</option>
      <option value="hi">हिंदी (Hindi)</option>
      <option value="mr">मराठी (Marathi)</option>
      <option value="gu">ગુજરાતી (Gujarati)</option>
      <option value="bn">বাংলা (Bengali)</option>
      <option value="ta">தமிழ் (Tamil)</option>
      <option value="te">తెలుగు (Telugu)</option>
      <option value="kn">ಕನ್ನಡ (Kannada)</option>
    </select>
  </div>

  <!-- Navigation Menu for Regions -->
  <nav>
    <ul>
      <!-- Marathwada -->
      <li>
        <a href="#">Marathwada</a>
        <ul>
          <li><a href="chatr.html">Chatrapati Sambhaji Nagar</a></li>
          <li><a href="Dharashiv.html">Dharashiv</a></li>
          <li><a href="Jalna.html">Jalna</a></li>
          <li><a href="Latur.html">Latur</a></li>
          <li><a href="Nanded.html">Nanded</a></li>
          <li><a href="Beed.html">Beed</a></li>
          <li><a href="Parbhani.html">Parbhani</a></li>
          <li><a href="Hingoli.html">Hingoli</a></li>
        </ul>
      </li>
      <!-- Konkan -->
      <li>
        <a href="#">Konkan</a>
        <ul>
          <li><a href="mumbai.html">Mumbai City</a></li>
          <li><a href="Mumbai suburban.html">Mumbai Suburban</a></li>
          <li><a href="Raigad.html">Raigad</a></li>
          <li><a href="Ratnagiri.html">Ratnagiri</a></li>
          <li><a href="Sindhudurg.html">Sindhudurg</a></li>
          <li><a href="Palghar.html">Palghar</a></li>
          <li><a href="Thane.html">Thane</a></li>
        </ul>
      </li>
      <!-- Western Maharashtra -->
      <li>
        <a href="#">Western Maharashtra</a>
        <ul>
          <li><a href="Pune.html">Pune</a></li>
          <li><a href="Satara.html">Satara</a></li>
          <li><a href="Sangli.html">Sangli</a></li>
          <li><a href="Kolhapur.html">Kolhapur</a></li>
          <li><a href="Solapur.html">Solapur</a></li>
        </ul>
      </li>
      <!-- Vidarbha -->
      <li>
        <a href="#">Vidarbha</a>
        <ul>
          <li><a href="Amravati.html">Amravati</a></li>
          <li><a href="Akola.html">Akola</a></li>
          <li><a href="Buldhana.html">Buldhana</a></li>
          <li><a href="chandrapur.html">Chandrapur</a></li>
          <li><a href="Gadchiroli.html">Gadchiroli</a></li>
          <li><a href="Gondia.html">Gondia</a></li>
          <li><a href="Nagpur.html">Nagpur</a></li>
          <li><a href="Wardha.html">Wardha</a></li>
          <li><a href="Yavatmal.html">Yavatmal</a></li>
        </ul>
      </li>
      <!-- North Maharashtra -->
      <li>
        <a href="#">North Maharashtra</a>
        <ul>
          <li><a href="Dhaule.html">Dhule</a></li>
          <li><a href="jalgaon.html">Jalgaon</a></li>
          <li><a href="Nandurbar.html">Nandurbar</a></li>
        </ul>
      </li>
      <!-- Khandesh -->
      <li>
        <a href="#">Khandesh</a>
        <ul>
          <li><a href="jalgaon.html">Jalgaon</a></li>
          <li><a href="Dhaule.html">Dhule</a></li>
          <li><a href="Nandurbar1.html">Nandurbar</a></li>
        </ul>
      </li>
    </ul>
    <div class="search-container">
      <input type="text" placeholder="Search..." class="search-bar">
      <button class="search-button" type="submit">Search</button>
    </div>

  </nav>
  <!-- Search Bar -->


  <!-- Slideshow Section -->

  <body>
    <?php
    include 'config.php'; // Database connection

    $result = mysqli_query($conn, "SELECT * FROM slideshow ORDER BY position ASC");
    ?>

    <div class="slideshow-container">
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="slide">
          <img src="<?php echo $row['image_url']; ?>" alt="Slide Image">
          <div class="text"><?php echo $row['title']; ?></div>
        </div>
      <?php } ?>
    </div>


    <div class="dots">
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
    </div>

    <script>
      let slideIndex = 0;
      showSlides();

      function showSlides() {
        let slides = document.getElementsByClassName("slide");
        let dots = document.getElementsByClassName("dot");

        for (let i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }

        slideIndex++;
        if (slideIndex > slides.length) {
          slideIndex = 1;
        }

        for (let i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
        }

        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 2000);
      }

      // Toggle Sidebar Menu for Mobile View
      function toggleMenu() {
        var sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('active');
      }

      // Placeholder for translate function
      function translatePage() {
        var language = document.getElementById('language').value;
        // Add translation logic here
        console.log("Language selected: " + language);
      }
    </script>
    <div id="translator"></div>

    <script type="text/javascript">
      function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
          },
          'translator'
        );
      }
    </script>

    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?
    cb=googleTranslateElementInit">
    </script>

    <!-- Welcome Section -->
    <section class="welcome-section">
      <div class="welcome-container">
        <h2>Welcome to Maharashtra's Wonders</h2>
        <p>
          Explore the diverse regions of Maharashtra, from its scenic beauty and historical landmarks to the
          best
          accommodations, local businesses, and serene temples. Let us be your guide in discovering the heart
          of
          Maharashtra!
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

  </body>
  <footer style="background-color:#eb1455; color: white; text-align: center; padding: 20px; margin-top: 20px;">
    <div>
      <p>&copy; 2025 Jain Temples and Businesses. All Rights Reserved.</p>
      <p>Explore Maharashtra's diverse regions, cultures, and traditions.</p>
      <p>
        <a href="#home" style="color: #00fbff; text-decoration: none;">Home</a>
        <a href="#about" style="color: #00fbff; text-decoration: none;">About Us</a>
        <a href="#gallery" style="color: #00fbff; text-decoration: none;">Gallery</a>
        <a href="#regions" style="color: #00fbff ; #ff4500; text-decoration: none;">Regions</a>
        <a href="#faqs" style="color: #00fbff; #ff4500 ; text-decoration: none;">FAQs</a>
      </p>
    </div>
  </footer>

</html>