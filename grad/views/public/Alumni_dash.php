<!-- views/Alumni_dash.php -->
<?php
// Include the configuration file
include '../config/config.php';

require '../../model/conn.php';

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "You need to log in to view your posts.";
    exit;


}

$user_id = $_SESSION['user_id'];
$posts_sql = "SELECT p.title, p.content, p.created_at, u.name, u.photo 
              FROM posts p
              JOIN Users u ON p.user_id = u.id
              WHERE p.user_id != ?
              ORDER BY p.created_at DESC";
$stmt = $conn->prepare($posts_sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$posts_result = $stmt->get_result();

if ($posts_result === false) {
    die("Error: " . $conn->error);}

// Fetch posts created by the logged-in user
$stmt = $conn->prepare("SELECT id, title, content, category, created_at FROM posts WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch data from the events table
$events_sql = "SELECT * FROM events";
$events_result = $conn->query($events_sql);




?>

<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <script src="https://kit.fontawesome.com/49d89f7fa2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/home2.css">
      <style>
        
         /* Custom styles for profile page */
         .profile-header {
            text-align: center;
            padding: 30px;
            background-color: #f8f9fa;
            background-image:url("../img/image1.jpg");
            background-repeat: no-repeat;
            height: 400px;
            border-radius:30px;
            margin-bottom: 20px;
            background-size: cover;
            
        }


        .profile-content {
            padding: 20px;
        }

        .profile-content h2 {
            margin-bottom: 15px;
        }

        .profile-content p {
            margin-bottom: 10px;
            font-size: 16px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .profile-header {
                padding: 20px;
            }

            .profile-content {
                padding: 15px;
            }

            .profile-img {
                width: 120px;
                height: 120px;
            }
        }
        .custom-section {
            background-color:#fff6f0; /* Light gray background */
            padding: 20px;
            display: flex;
          flex-direction: row;

        }

        /* Content Row */
.content-row {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
        /* Left Sidebar */
.left-sidebar {
    flex: 0 0 250px;
    padding: 20px;
    
    background-color:#fff6f0; /* Light gray background */
    border-radius: 30px;
    margin-right: 20px; /* Spacing between sidebar and main content */
 /* Soft shadow for the sidebar */
    width: 200px;
}

.link-container {
    display: flex;
    flex-direction: column;
   height: 20px;
}

.link-container a {
    display: flex;
    align-items: center;
    padding: 10px 15px;
    margin-bottom: 10px;
    border-radius: 5px;
    text-decoration: none;
    color: #1e5785;
    font-size: 16px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.link-container a:hover {
    background-color: #ee930c;
    color: #1e5785;
}

.link-container i {
    margin-right: 10px;
    font-size: 22px;
}
/* Middle Card */
.middle-card {
    flex: 1;
    padding: 20px;
    background-color:#fff6f0;
    border-radius: 10px;
   
    margin-right: 20px; /* Space between middle and right sidebar */
}

/* Right Sidebar */
.right-sidebar {
    flex: 0 0 200px;
    padding: 20px;
    background-color: #f8f9fa;
    border-radius: 10px;
  width: 100px;
    background-color:#fff6f0;
}
/* Card Styling */
.card {
    padding: 15px;
    width: 105%;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.card-header {
    background-color: #ee930c;; /* Light grey background for header */
    padding: 10px 15px; /* Padding for spacing */
    border-bottom: 1px solid #e0e0e0; /* Border separating header */
}
.card-header2 {
    background-color: #446d8e;; /* Light grey background for header */
    padding: 10px 15px; /* Padding for spacing */
    border-bottom: 1px solid #e0e0e0; /* Border separating header */
    border-radius: 10px;
}


.card-title {
    font-size: 1.25rem; /* Slightly larger title font */
    font-weight: 600; /* Bold font for emphasis */
    color: #343a40; /* Darker color for title */
}

.card-body {
    padding: 15px; /* Padding for content */
}

.card-text {
    font-size: 1rem; /* Standard font size */
    color: #495057; /* Dark grey color for text */
}

.card-footer {
    background-color: #f8f9fa; /* Match footer background with header */
    border-top: 1px solid #e0e0e0; /* Border separating footer */
    padding: 10px 15px; /* Padding for spacing */
}

.badge {
    font-size: 0.875rem; /* Slightly smaller badge font */
    padding: 5px 10px; /* Padding inside badge */
}

.btn-outline-primary {
    font-size: 0.875rem; /* Adjust button size */
    padding: 5px 10px; /* Padding inside button */
    border-radius: 5px; /* Rounded corners for button */
}
    </style>
    </head>

    <body>
    <?php include '../includes/nav.php'; ?>

    <section class="custom-section">
    <div class="container">
        <div class="profile-header">
            
        </div>

        <div class="content-row">
            
            <div class="left-sidebar">
                <div class="link-container">
                    <div class="card">
                    <a href="Alumni_dash.php"><i class="fa-solid fa-house fa-lg" style="color: #4c8fe7; margin-right:6px;"></i>Home</a>

                    <a href="jobs.php"><i class="fa-solid fa-briefcase fa-lg" style="color: #4c8fe7; margin-right:6px;"></i>Jobs</a>
                    <a href="events.php"><i class="fa-regular fa-calendar-days fa-lg" style="color: #4c8fe7; margin-right:6px;"></i> Events</a>
                    <a href="gallery.php"><i class="fa-regular fa-image fa-lg" style="color: #4c8fe7; margin-right:6px;"></i> Gallery</a>
                    <a href="news.php"><i class="fa-solid fa-file fa-lg" style="color: #4c8fe7; margin-right:6px;"></i>News</a>
                </div>
            </div>
            </div>
            <div class="middle-card">
                <div class="card">
                

           
              <!-- Text link styled as a button to trigger the modal -->
              <a href="#" data-bs-toggle="modal" data-bs-target="#postModal" class="modal-trigger">What is on your mind?</a>
             
              
                </div>
                <hr>
       <?php
    if ($posts_result->num_rows > 0) {
        while ($row = $posts_result->fetch_assoc()) { 
            // Calculate the time difference
            $time_diff = time() - strtotime($row['created_at']);
            if ($time_diff < 3600) {
                $time_posted = floor($time_diff / 60) . " minutes ago";
            } elseif ($time_diff < 86400) {
                $time_posted = floor($time_diff / 3600) . " hours ago";
            } else {
                $time_posted = date("F j, Y, g:i a", strtotime($row['created_at']));
            }

            // Default profile image if none is available
            $profile_image = $row['photo'] ?: 'default_profile_image.jpg';
    ?>
            <div class="card">
                <!-- the feeds -->
                <div class="card-header2 d-flex align-items-center">
                    <img src="<?= htmlspecialchars($profile_image); ?>" alt="User Profile" class="rounded-circle me-3" style="width: 50px; height: 50px;">
                    <div>
                        <h5 class="card-title mb-0"><?= htmlspecialchars($row['name']); ?></h5>
                        <small class="text-muted">Time Posted: <?= htmlspecialchars($time_posted); ?></small>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($row['title']); ?></h5>
                    <p class="card-text"><?= htmlspecialchars($row['content']); ?></p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <button class="btn2 btn-outline-primary btn-sm">Read More</button>
                </div>
            </div>
            <br>
    <?php
        }
    } else {
        echo '<p>No posts found.</p>';
    }

    // Close the database connection
   
    ?>
 </div>
            <div class="right-sidebar">
       <div class="card">
       <div class="card-header">
    Recent Jobs
  </div>
  <ul class="list-group list-group-flush">
  <?php
    // Recent Jobs
    $query = "SELECT job_title, company FROM careers ORDER BY date_created DESC LIMIT 4";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<li class="list-group-item"><strong>' . $row['job_title'] . '</strong> at ' . $row['company'] . '</li>';
    }
} else {
    echo '<li class="list-group-item">No jobs available</li>';}
    ?>
</ul>
       </div>
        <br>
               
            <div class="card-header">
    Recently added people
  </div>
  <ul class="list-group">
  
    
    <?php
    // Assuming you have a database connection set up
    $query = "SELECT name, photo FROM users ORDER BY date_created DESC LIMIT 3";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '
            <div class="text-center m-2">
                <img src="' . $row['photo'] . '" class="rounded-circle img-fluid" alt="' . $row['name'] . '" style="width: 100px; height: 100px;">
                <p>' . $row['name'] . '</p>
            </div>';
        }
    } else {
        echo '<p>No recent users found.</p>';
    }
    ?>
        </ul>
                
                <br>

                
                <div class="card-header">
                     Recent Events
                     </div>
                     <ul class="list-group">
            <?php
            if ($events_result->num_rows > 0) {
                while ($row = $events_result->fetch_assoc()) {
                    echo '<li class="list-group-item">';
                    echo htmlspecialchars($row['title']) . ', ' . htmlspecialchars(date("F j, Y, g:i a", strtotime($row['schedule'])));
                    echo '</li>';
                }
            } else {
                echo '<p>No events found.</p>';
            }

            // Close the database connection
          
            ?>
        </ul>
                </div>

            </div>
    <!-- Modal -->
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                  <h5 class="modal-title" id="postModalLabel">Create New Post</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                <form id="postForm" action="../../controller/Alumni/post.php" method="POST">
                    <div class="mb-3">
                        <label for="postTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="postTitle" name="postTitle" placeholder="Enter title" required>
                    </div>
                    <div class="mb-3">
                        <label for="postContent" class="form-label">Content</label>
                        <textarea class="form-control" id="postContent" name="postContent" rows="4" placeholder="Enter content" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="postCategory" class="form-label">Category</label>
                        <select class="form-control" id="postCategory" name="postCategory" required>
                            <option value="" disabled selected>Select category</option>
                            <option value="Tech">Tech</option>
                            <option value="Law">Law</option>
                            <option value="Agriculture">Agriculture</option>
                            <option value="Education">Education</option>
                            <option value="Arts">Arts</option>
                        </select>
                    </div>
                    <!-- Modal Footer inside form -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="create">Post</button>
                    </div>
                </form>
                </div>
               
              </div>
            </div>
          </div>
      </div>
            
        </div>
    </div>
    <?php include '../includes/modal_form.php'; ?>
</section>


    <?php include '../includes/footer.php'; ?>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>

