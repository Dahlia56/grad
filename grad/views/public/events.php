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
        
        .custom-section {
    padding: 20px;
    background-color: #fff6f0;
}

.container {
    display: flex;
    justify-content: space-between;
}

/* Style for the content row */
.content-row {
    display: flex;
    width: 100%;
}

/* Style for the left sidebar */
.left-sidebar {
    width: 250px;
    background-color:#fff6f0;
    border-right: 1px solid #e0e0e0;
    padding: 10px;
    border-radius:30px;
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

/* Style for the middle card */
.middle-card {
    flex: 1;
    padding: 10px;
}

.card {
    background-color: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 15px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.card hr {
    margin: 15px 0;
}
    </style>
    </head>

    <body>
    <?php include '../includes/nav.php'; ?>

    <section class="custom-section">
    <div class="container">
      
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
                
                <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="card event-card">';
                echo '  <img src="' . htmlspecialchars($row["banner"]) . '" class="card-img-top" alt="Event Banner">';
                echo '  <div class="card-body">';
                echo '    <h5 class="card-title">' . htmlspecialchars($row["title"]) . '</h5>';
                echo '    <p class="card-text">' . htmlspecialchars($row["content"]) . '</p>';
                echo '    <p class="card-text"><small class="text-muted">Scheduled for: ' . htmlspecialchars(date("F j, Y, g:i a", strtotime($row["schedule"]))) . '</small></p>';
                echo '  </div>';
                echo '</div>';
            }
        } else {
            echo '<p>No events found.</p>';
        }

        // Close the database connection
        $conn->close();
        ?>

             
              
                </div>
                <hr>
                <div class="card">
                

           
         <!-- the feeds -->
             
             
      

    
                </div>
<br>
             
              
<div class="container">
        <h1 class="my-4">Upcoming Events</h1>
        
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
            $conn->close();
            ?>
        </ul>
    </div>
    
    </div>
            
        </div>
    </div>

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

