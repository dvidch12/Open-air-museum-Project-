<?php
// Start output buffering
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "museum";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data and sanitize
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $organization = htmlspecialchars($_POST['organization']);
    $entryType = htmlspecialchars($_POST['entryType']);
    $numberOfPersons = intval($_POST['numberOfPersons']);
    $date = htmlspecialchars($_POST['date']); // Sanitize date input

    // Validate and format date
    if (DateTime::createFromFormat('Y-m-d', $date) !== false) {
        $formattedDate = $date;
    } else {
        die("Invalid date format. Please use YYYY-MM-DD.");
    }

    // Determine entry fee
    $entryFee = 0;
    switch ($entryType) {
        case "educationalTour":
            $entryFee = 70;
            break;
        case "guidedTour":
            $entryFee = 120;
            break;
        case "normalEntry":
            $entryFee = 100;
            break;
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO bookings (name, email, phone, organization, entryType, numberOfPersons, date, entryFee) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssiis", $name, $email, $phone, $organization, $entryType, $numberOfPersons, $formattedDate, $entryFee);

    // Execute and check for errors
    if ($stmt->execute()) {
        // Redirect to the thank you page
        header("Location: thankyou.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connection
    $stmt->close();
    $conn->close();
}

// Flush the output buffer
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book your Tickets</title>
    <link rel="stylesheet" href="website.css">
    <script>
        function toggleMenu() {
            var menu = document.querySelector('.menu');
            menu.classList.toggle('show');
        }
    </script>
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.html" target="_blank">
                <img src="LOGO.png" alt="MORIS LOGO">
            </a>
        </div>
        <nav class="menu">
            <ul>
                <li class="dropdown">
                    <a href="index.html">Discover</a>
                    <ul class="dropdown-content">
                        <li><a href="practicalinfo.html">Practical Info</a></li>
                        <li><a href="History.html">History</a></li>
                        <li><a href="Missionvision.html">Mission and Vision</a></li>
                        <li><a href="Educate.html">Educate</a></li>
                        <li><a href="FAQ.html">FAQ</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#">Museum</a>
                    <ul class="dropdown-content">
                        <li><a href="map.html">Map</a></li>
                        <li><a href="explorethemuseum.html">Explore the Museum</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#">Contact</a>
                    <ul class="dropdown-content">
                        <li><a href="contactdetails.html">Contact Details</a></li>
                        <li><a href="payment.php">Book Your Tickets</a></li>
                        <li><a href="workwithtus.php">Work with Us</a></li>
                    </ul>
                </li>
                <li><a href="blog.html">Blog</a></li>
            </ul>
        </nav>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
        </div>
        <div class="menu-toggle" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </header>

    <!-- Banner Section -->
    <div class="banner">
        <img src="banner2.png" alt="Banner">
        <div class="banner-text">
            <h1>Book Your Tickets</h1>
        </div>
    </div>

    <!-- Breadcrumb Section -->
    <div class="sub">
        <ol class="sublist list-inline">
            <li class="app-breadcrumbs__list__item list-inline-item">
                <a href="index.html">Home</a>
                <img src="wer.png" alt="" class="arrow">
            </li>
            <li class="app-breadcrumbs__list__item list-inline-item">
                <p>Book Your Tickets</p>
            </li>
        </ol>
    </div>

    <!-- Contact Form -->
    <div class="contact-form">
        <h2>Book Your Tickets</h2>
        <form action="payment2.php" method="post">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required>
            
            <label for="organization">Organization (optional):</label>
            <input type="text" id="organization" name="organization">
            
            <label for="entryType">Select Entry Type:</label>
            <select id="entryType" name="entryType" required>
                <option value="educationalTour">Educational Tour (Guide + Transport) - Rs 70</option>
                <option value="guidedTour">Guided Tour (Guide + Transport) - Rs 120</option>
                <option value="normalEntry">Normal Entry (Without Guide) - Rs 100</option>
            </select>

            <label for="numberOfPersons">Number of Persons:</label>
            <input type="number" id="numberOfPersons" name="numberOfPersons" required min="1">

            <label for="date">Date of Visit:</label>
            <input type="date" id="date" name="date" required>
            
            <button type="submit">Submit</button>
        </form>
    </div>

    <!-- Newsletter Section -->
    <div class="newsletter">
        <h2>Register to our newsletter</h2>
        <form>
            <input type="email" placeholder="Enter your email" required>
            <input type="submit" value="Submit">
        </form>
    </div>
    
    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Design Project. Jessy David Charles.</p>
    </footer>
</body>
</html>
