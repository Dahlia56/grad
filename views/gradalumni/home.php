<?php
// Enhance session security ... with help of chatgpt
ini_set('session.cookie_secure', 1);       
ini_set('session.cookie_httponly', 1);     
ini_set('session.use_strict_mode', 1);     

session_start();

if (!isset($_SESSION['initiated'])) {
    session_regenerate_id(true);
    $_SESSION['initiated'] = true;
}

$timeout_duration = 300; // 5 minutes

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    session_unset();
    session_destroy();
    header("Location: logout.php");
    exit();
}

$_SESSION['last_activity'] = time();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gradalumni_db";

$connection = new mysqli($servername, $username, $password, $dbname);

// Handle connection errors 
if ($connection->connect_error) {
    error_log("Connection failed: " . $connection->connect_error);
    header("Location: error.php");
    exit();
}

$queries = [
    "news" => "SELECT COUNT(*) as count FROM news",
    "alumni" => "SELECT COUNT(*) as count FROM users",
    "gallery" => "SELECT COUNT(*) as count FROM gallery",
    "jobs" => "SELECT COUNT(*) as count FROM careers",
    "events" => "SELECT COUNT(*) as count FROM events",
    "posts" => "SELECT COUNT(*) as count FROM posts",
    "rsvp" => "SELECT COUNT(*) as count FROM rsvps",

];

$stats = [];
foreach ($queries as $key => $query) {
    $result = $connection->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        $stats[$key] = $row['count'];
    } else {
        $stats[$key] = 0; 
    }
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | GradConnect</title>
    <link rel="stylesheet" href="../gradalumni/css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <ul>
                <img src="https://www.ump.ac.za/images/logo.png" alt="GradConnect Logo" width="80%" height="70%">
                <li><a href="home.php">Home</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="alumnilist.php">Alumni List</a></li>
                <li><a href="jobs.php">Jobs</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="news.php">News</a></li>
                <li><a href="rsvplist.php">RSVP List</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <header class="header">
                <h1>UMP GradConnect System</h1>
            </header>
            <section class="content">
                <div class="container">
                    <h2>Welcome to GradConnect Dashboard</h2>
                    <hr>
                    <div class="row">
                        <?php
                        $cards = [
                            ["title" => "Shared News", "count" => $stats['news'], "link" => "news.php"],
                            ["title" => "Registered Alumni", "count" => $stats['alumni'], "link" => "alumnilist.php"],
                            ["title" => "Gallery Shared", "count" => $stats['gallery'], "link" => "gallery.php"],
                            ["title" => "Jobs Posted", "count" => $stats['jobs'], "link" => "jobs.php"],
                            ["title" => "Events", "count" => $stats['events'], "link" => "events.php"],
                            ["title" => "RSVP", "count" => $stats['rsvp'], "link" => "rsvplist.php"],
                            ["title" => "Posts Shared", "count" => $stats['posts'], "link" => "#"]

                        ];
                        foreach ($cards as $card) {
                            echo '<div class="col-lg-4 col-md-6 mb-4">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h4 class="card-title">' . htmlentities($card["title"]) . '</h4>
                                            <h1 class="card-text">' . htmlentities($card["count"]) . '</h1>
                                        </div>
                                        <div class="card-footer">
                                            <a href="' . htmlentities($card["link"]) . '" class="btn btn-primary">View Details</a>
                                        </div>
                                    </div>
                                  </div>';
                        }
                        ?>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <script src="../gradalumni/script/script.js"></script>
    <script src="../gradalumni/script/sec.js"></script>
</body>
</html>
