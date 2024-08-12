<?php
session_start();

include('connection.php'); 

$timeout_duration = 3000; // 5 minutes

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    session_unset();     
    session_destroy();   
    header("Location: logout.php"); 
    exit();
}

$_SESSION['last_activity'] = time(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs | GradConnect</title>
    <link rel="stylesheet" href="../gradalumni/css/admin.css">
    <link rel="stylesheet" href="../gradalumni/css/table.css">
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
                    <h1>Jobs | Careers</h1>
                    <div id="content">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label">Company</label>
                                <input type="text" class="form-control" name="company" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Location</label>
                                <input type="text" class="form-control" name="location" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Job Title</label>
                                <input type="text" class="form-control" name="job_title" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Category</label>
                                <select id="category" name="category">
                                    <option value="technology">Technology</option>
                                    <option value="agriculture">Agriculture</option>
                                    <option value="education">Education</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Description</label>
                                <textarea class="form-control" name="description" required></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <?php
                    if (isset($_POST['upload'])) {
                        // Connect to database
                        $db = mysqli_connect("localhost", "root", "", "gradalumni_db");
                    
                        if (!$db) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                    
                        $stmt = $db->prepare("INSERT INTO careers (company, location, job_title, description ,category, date_created) VALUES (?, ?, ? ,? ,?, ?)");
                        $stmt->bind_param("ssssss", $company, $location, $job_title, $description,$category, $date_created);
                        
                        $company = $_POST['company'];
                        $location = $_POST['location'];
                        $job_title = $_POST['job_title'];
                        $description = $_POST['description'];
                        $category = $_POST['category'];
                        $date_created = date('Y-m-d H:i:s');

                        if ($stmt->execute()) {
                            echo "<h3>Job uploaded successfully!</h3>";
                        } else {
                            echo "<h3>Error: " . $stmt->error . "</h3>";
                        }

                        $stmt->close();
                        $db->close();
                    }
                    ?>
                    <hr>
                    <div>
                        <?php
                        // Connect to database
                        $db = mysqli_connect("localhost", "root", "", "gradalumni_db");

                        if (!$db) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT id, company, location, job_title, description , category , date_created FROM careers ORDER BY id ASC";
                        $result = mysqli_query($db, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-striped">';
                            echo '<thead><tr><th>ID</th><th>Company</th><th>Location</th><th>Job Title</th><th>Description<th>Category</th></th><th>Date Created</th><th>Actions</th></tr></thead>';
                            echo '<tbody>';

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . $row['id'] . '</td>';
                                echo '<td>' . $row['company'] . '</td>';
                                echo '<td>' . $row['location'] . '</td>';
                                echo '<td>' . $row['job_title'] . '</td>';
                                echo '<td>' . $row['description'] . '</td>';
                                echo '<td>' . $row['category'] . '</td>';
                                echo '<td>' . $row['date_created'] . '</td>';
                                echo '<td>';
                                echo '<a href="edit-jobs.php?id=' . $row['id'] . '">Edit</a> | ';
                                echo '<a href="delete-jobs.php?id=' . $row['id'] . '">Delete</a>';
                                echo '</td>';
                                echo '</tr>';
                            }

                            echo '</tbody></table>';
                        } else {
                            echo "<p>No jobs found.</p>";
                        }

                        mysqli_close($db);
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
