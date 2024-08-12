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
    background-color: #fff6f0;
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
    background-color: #fff6f0;
}

.card {
    background-color: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 15px;
    
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
                <div class="card2">
     
                <?php
// Display section title
echo '<div class="container section-title" data-aos="fade-up">';
echo '<h2 id="b2">Technology</h2>';
echo '</div><!-- End Section Title -->';

// Fetch all available jobs by category
$category = 'Technology'; // Adjust this to dynamically set based on user input or another criterion
$query = "SELECT company, location, job_title, description, date_created 
          FROM careers 
          WHERE category = '$category' 
          ORDER BY date_created DESC";
$result = $conn->query($query);

echo '<div class="row">';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $company = htmlspecialchars($row['company']);
        $location = htmlspecialchars($row['location']);
        $job_title = htmlspecialchars($row['job_title']);
        $description = htmlspecialchars($row['description']);
        $date_created = htmlspecialchars($row['date_created']);
        
        echo '<div class="col-sm-6 mb-4">';
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title"><strong>' . $job_title . '</strong></h5>';
        echo '<h6 class="card-subtitle mb-2 text-muted"><strong>Company:</strong> ' . $company . '</h6>';
        echo '<p class="card-text"><strong>Location:</strong> ' . $location . '</p>';
        echo '<p class="card-text"><strong>Description:</strong> ' . $description . '</p>';
        echo '<p class="card-text"><strong>Date Created:</strong> ' . $date_created . '</p>';
        echo '<a href="#" class="btn btn-primary">Apply Now</a>'; // You can replace the href with the actual link or functionality
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<div class="col-12"><p>No jobs available for this category.</p></div>';
}

echo '</div>';
?>


<?php

// Display section title
echo '<div class="container section-title" data-aos="fade-up">';
echo '<h2 id="b2">Agriculture</h2>';
echo '</div><!-- End Section Title -->';
// Fetch all available jobs by category
$category = 'Agriculture'; // Adjust this to dynamically set based on user input or another criterion
$query = "SELECT company, location, job_title, description, date_created 
          FROM careers 
          WHERE category = '$category' 
          ORDER BY date_created DESC";
$result = $conn->query($query);

echo '<div class="row">';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $company = htmlspecialchars($row['company']);
        $location = htmlspecialchars($row['location']);
        $job_title = htmlspecialchars($row['job_title']);
        $description = htmlspecialchars($row['description']);
        $date_created = htmlspecialchars($row['date_created']);
        
        echo '<div class="col-sm-6 mb-4">';
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title"><strong>' . $job_title . '</strong></h5>';
        echo '<h6 class="card-subtitle mb-2 text-muted"><strong>Company:</strong> ' . $company . '</h6>';
        echo '<p class="card-text"><strong>Location:</strong> ' . $location . '</p>';
        echo '<p class="card-text"><strong>Description:</strong> ' . $description . '</p>';
        echo '<p class="card-text"><strong>Date Created:</strong> ' . $date_created . '</p>';
        echo '<a href="#" class="btn btn-primary">Apply Now</a>'; // You can replace the href with the actual link or functionality
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<div class="col-12"><p>No jobs available for this category.</p></div>';
}

echo '</div>';
?>
             
          

             <?php
             // Display section title
echo '<div class="container section-title" data-aos="fade-up">';
echo '<h2 id="b2">Education</h2>';
echo '</div><!-- End Section Title -->';
// Fetch all available jobs by category
$category = 'Education'; // Adjust this to dynamically set based on user input or another criterion
$query = "SELECT company, location, job_title, description, date_created 
          FROM careers 
          WHERE category = '$category' 
          ORDER BY date_created DESC";
$result = $conn->query($query);

echo '<div class="row">';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $company = htmlspecialchars($row['company']);
        $location = htmlspecialchars($row['location']);
        $job_title = htmlspecialchars($row['job_title']);
        $description = htmlspecialchars($row['description']);
        $date_created = htmlspecialchars($row['date_created']);
        
        echo '<div class="col-sm-6 mb-4">';
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title"><strong>' . $job_title . '</strong></h5>';
        echo '<h6 class="card-subtitle mb-2 text-muted"><strong>Company:</strong> ' . $company . '</h6>';
        echo '<p class="card-text"><strong>Location:</strong> ' . $location . '</p>';
        echo '<p class="card-text"><strong>Description:</strong> ' . $description . '</p>';
        echo '<p class="card-text"><strong>Date Created:</strong> ' . $date_created . '</p>';
        echo '<a href="#" class="btn btn-primary">Apply Now</a>'; // You can replace the href with the actual link or functionality
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<div class="col-12"><p>No jobs available for this category.</p></div>';
}

echo '</div>';
?>


<?php
// Display section title
echo '<div class="container section-title" data-aos="fade-up">';
echo '<h2 id="b2">Law</h2>';
echo '</div><!-- End Section Title -->';
// Fetch all available jobs by category
$category = 'Law'; // Adjust this to dynamically set based on user input or another criterion
$query = "SELECT company, location, job_title, description, date_created 
          FROM careers 
          WHERE category = '$category' 
          ORDER BY date_created DESC";
$result = $conn->query($query);

echo '<div class="row">';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $company = htmlspecialchars($row['company']);
        $location = htmlspecialchars($row['location']);
        $job_title = htmlspecialchars($row['job_title']);
        $description = htmlspecialchars($row['description']);
        $date_created = htmlspecialchars($row['date_created']);
        
        echo '<div class="col-sm-6 mb-4">';
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title"><strong>' . $job_title . '</strong></h5>';
        echo '<h6 class="card-subtitle mb-2 text-muted"><strong>Company:</strong> ' . $company . '</h6>';
        echo '<p class="card-text"><strong>Location:</strong> ' . $location . '</p>';
        echo '<p class="card-text"><strong>Description:</strong> ' . $description . '</p>';
        echo '<p class="card-text"><strong>Date Created:</strong> ' . $date_created . '</p>';
        echo '<a href="#" class="btn btn-primary">Apply Now</a>'; // You can replace the href with the actual link or functionality
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<div class="col-12"><p>No jobs available for this category.</p></div>';
}

echo '</div>';
?>
                </div>
                <hr>
               
             
              

            
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

