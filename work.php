<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work with Us</title>
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
            <h1>Work With Us</h1>
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
                <p>Work with us</p>
            </li>
        </ol>
    </div>
<div class="work">
    <h1>Work With Us</h1>
    <p>Join our team at MORIS, our first open-air museum where history comes alive! We are currently looking for passionate and dedicated individuals to fill the following positions. If you are interested in being part of a dynamic team in a unique outdoor setting, we would love to hear from you.</p>
</div>

    <!-- Job Listings -->
    <div class="job-listing1">
        <h2>1. Open-Air Museum Guide</h2>
        <br>
        <p><strong>Job Type:</strong> Full-Time</p>
        <p><strong>Description:</strong> We are seeking enthusiastic Museum Guides to engage visitors with stories and exhibits that bring history to life. As a Museum Guide, you will conduct tours, lead educational programs, and provide exceptional customer service to ensure an unforgettable experience for all visitors.</p>
        <p><strong>Responsibilities:</strong></p>
        <ul>
            <li>Lead guided tours and interactive programs for visitors of all ages.</li>
            <li>Deliver engaging presentations on historical topics.</li>
            <li>Provide information and answer questions about museum exhibits and history.</li>
        </ul>
    </div>

    <div class="job-listing">
        <h2>2. Driver</h2>
        <br>
        <p><strong>Job Type:</strong> Full-Time</p>
        <p><strong>Description:</strong> We are seeking a professional Driver to transport staff and visitors within the museum tracks. The ideal candidate will have a clean driving record, excellent navigation skills, and a commitment to safety.</p>
        <p><strong>Responsibilities:</strong></p>
        <ul>
            <li>Drive museum staff and visitors safely to designated locations.</li>
            <li>Maintain the cleanliness and functionality of the vehicle.</li>
        </ul>
    </div>

    <!-- Application Form -->
    <div class="form-container">
        <h2>Apply Now</h2>
        <p>If you are interested in any of these positions, please fill out the form below and attach your CV. We look forward to hearing from you!</p>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required>
            
            <label for="position">Position Applying For:</label>
            <select id="position" name="position" required>
                <option value="Museum Guide">Museum Guide</option>
                <option value="Driver">Driver</option>
            </select>
            
            <label for="cover_letter">Cover Letter (Optional):</label>
            <textarea id="cover_letter" name="cover_letter"></textarea>
            
            <label for="cv">Resume/CV:</label>
            <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx" required>
            
            <input type="submit" name="submit" value="Submit Application">
        </form>
    </div>

    <div class="newsletter">
        <h2>Register to our newsletter</h2>
        <form>
            <input type="email" placeholder="Enter your email" required>
            <input type="submit" value="Submit">
        </form>
    </div>
    <footer>
        <p>&copy; 2024 Design Project. Jessy David Charles.</p>
    </footer>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $position = htmlspecialchars($_POST['position']);
        $cover_letter = htmlspecialchars($_POST['cover_letter']);
        
        // File upload handling
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["cv"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Check if file is a actual PDF or DOC/DOCX
        $allowedFileTypes = ["pdf", "doc", "docx"];
        if (!in_array($fileType, $allowedFileTypes)) {
            echo "<p>Sorry, only PDF, DOC, and DOCX files are allowed.</p>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<p>Sorry, your file was not uploaded.</p>";
        } else {
            if (move_uploaded_file($_FILES["cv"]["tmp_name"], $target_file)) {
                echo "<p>The file ". htmlspecialchars(basename($_FILES["cv"]["name"])). " has been uploaded.</p>";
                
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

                // Insert data into the database
                $stmt = $conn->prepare("INSERT INTO job_applications (name, email, phone, position, cover_letter, cv) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $name, $email, $phone, $position, $cover_letter, $target_file);
                $stmt->execute();

                // Check if the data is inserted successfully
                if ($stmt->affected_rows > 0) {
                    // Prepare email
                    $to = "davidcharles507@gmail.com"; // Change this to your email address
                    $subject = "New Job Application: " . $position;
                    $message = "
                    <html>
                    <head>
                        <title>New Job Application</title>
                    </head>
                    <body>
                        <p><strong>Name:</strong> $name</p>
                        <p><strong>Email:</strong> $email</p>
                        <p><strong>Phone:</strong> $phone</p>
                        <p><strong>Position Applying For:</strong> $position</p>
                        <p><strong>Cover Letter:</strong> $cover_letter</p>
                        <p><strong>Resume/CV:</strong> <a href='" . $target_file . "'>Download CV</a></p>
                    </body>
                    </html>";

                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
                    $headers .= "From: no-reply@museumsmoris.com" . "\r\n";

                    // Send email
                    if (mail($to, $subject, $message, $headers)) {
                        echo "<p>Your application has been submitted successfully. We will review your application and get back to you soon.</p>";
                    } else {
                        echo "<p>Sorry, there was an issue with submitting your application. Please try again later.</p>";
                    }
                } else {
                    echo "<p>Sorry, there was an issue with inserting your data into the database.</p>";
                }

                // Close the statement and connection
                $stmt->close();
                $conn->close();
            } else {
                echo "<p>Sorry, there was an error uploading your file.</p>";
            }
        }
    }
    ?>
</body>
</html>
