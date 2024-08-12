<?php
// Include the configuration file
include '../config/config.php';
require '../../model/conn.php';

// Check if the user is logged in

if (!isset($_SESSION['user_id'])) {
    echo "You need to log in to view your posts.";
    exit;
}

// Prepare SQL statement with error handling
$query = "
    SELECT 
    p.id, 
    p.user_id, 
    p.content, 
    p.created_at, 
    u.name AS user_name
FROM 
    posts p
JOIN 
    users u 
ON 
    p.user_id = u.id 
ORDER BY 
    p.created_at DESC;
";

$stmt = $conn->prepare($query);

if ($stmt === false) {
    // Prepare failed
    die('Prepare failed: ' . htmlspecialchars($conn->error));
}

// Execute SQL statement with error handling
if (!$stmt->execute()) {
    // Execute failed
    die('Execute failed: ' . htmlspecialchars($stmt->error));
}

$result = $stmt->get_result();

if ($result === false) {
    // Get result failed
    die('Get result failed: ' . htmlspecialchars($conn->error));
}
?>


<!doctype html>
<html lang="en">
<head>
    <title>Alumni Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/49d89f7fa2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/home2.css">
    <style>
        .custom-section {
            background-color: #fff;
            padding: 20px;
        }
        .h7 {
            font-size: 0.8rem;
        }
        .gedf-wrapper {
            margin-top: 0.97rem;
        }
        @media (min-width: 992px) {
            .gedf-main {
                padding-left: 4rem;
                padding-right: 4rem;
            }
            .gedf-card {
                margin-bottom: 2.77rem;
            }
        }
    </style>
</head>

<body>
    <?php include '../includes/nav.php'; ?>

    <section class="custom-section">
        <div class="container-fluid gedf-wrapper">
            <div class="row">
                <!-- User Profile Section -->
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <!-- User profile image -->
                            <div class="text-center mb-3">
                                <?php if (file_exists($photo_path)): ?>
                                    <img src="<?php echo htmlspecialchars($photo_path); ?>" alt="User Photo" width="150">
                                <?php else: ?>
                                    <img src="path/to/default/image.jpg" width="150">
                                <?php endif; ?>
                            </div>
                            <h5 class="text-center mb-1"><?php echo htmlspecialchars($user_name) . " " . htmlspecialchars($user_surname); ?>!</h5>
                            <p class="text-center text-secondary mb-4"><?php echo htmlspecialchars($user_job); ?></p>
                            <ul class="list-group list-group-flush mb-0">
                                <li class="list-group-item">
                                    <h6 class="mb-1">
                                        <span class="bii bi-mortarboard-fill me-2"></span>
                                        Education
                                    </h6>
                                    <span><?php echo htmlspecialchars($user_education); ?></span>
                                </li>
                                <li class="list-group-item">
                                    <h6 class="mb-1">
                                        <span class="bii bi-building-fill-gear me-2"></span>
                                        Company
                                    </h6>
                                    <span><?php echo htmlspecialchars($user_company); ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Posts Section -->
                <div class="col-md-6 gedf-main">
                    <div class="card gedf-card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="posts-tab" data-bs-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Make a Post</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                    <div class="form-group">
                                        <label class="sr-only" for="message">Post</label>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#postModal" class="modal-trigger">What is on your mind?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-toolbar justify-content-between">
                                <div class="btn-group">
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
                    </div>
                    <hr>
                    <p>Posts</p>
                    <!-- Post Listings -->
                    <div class="container mt-5">
                        <?php if ($result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <div class="card gedf-card mb-3">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="mr-2">
                                                    <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                                                </div>
                                                <div class="ml-2">
                                                    <div class="h5 m-0"><?php echo " ". htmlspecialchars($row['user_name']); ?></div>
                                                    <div class="h7 text-muted"><?php echo htmlspecialchars($row['created_at']); ?></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-h"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item" href="#">Save</a></li>
                                                        <li><a class="dropdown-item" href="#">Hide</a></li>
                                                        <li><a class="dropdown-item" href="#">Report</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            <?php echo nl2br(htmlspecialchars($row['content'])); ?>
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
                                        <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p>No posts found.</p>
                        <?php endif; ?>
                        <?php
                        // Close the statement and connection
                        $stmt->close();
                        $conn->close();
                        ?>
                    </div>
                </div>
                
                <!-- Additional Cards Section -->
                <div class="col-md-3">
                <?php
                    // Make sure to include database connection file
                    include '../../model/conn.php'; // Adjust the path as needed

                    // Ensure the connection is open before using it
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Your HTML and PHP code
                    ?>
                    <div class="card gedf-card">
                        <div class="card" style="width: 22rem;">
                            <div class="card-header">
                               <a href="jobs.php"><h3> Latest job posts </h3></a>
                            </div>
                            <ul class="list-group list-group-flush">
                                <?php
                                // Query to fetch recent jobs
                                $query = "SELECT * FROM careers ORDER BY date_created DESC LIMIT 5";
                                $result = $conn->query($query);

                                if ($result === false) {
                                    echo '<li class="list-group-item">Error executing query: ' . htmlspecialchars($conn->error) . '</li>';
                                } elseif ($result->num_rows > 0) {
                                    // Output jobs
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<li class="list-group-item"><strong>' . htmlspecialchars($row['company']) . '</strong>  ' . htmlspecialchars($row['job_title']) . '</li>';
                                    }
                                } else {
                                    // No jobs available
                                    echo '<li class="list-group-item">No jobs available</li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <?php
                    // Optionally close the connection if done with it
                    // $conn->close();
                    ?>

                    <div class="card gedf-card">
                        <div class="card-body">
                            <h5 class="card-title">Recently joined users</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Check for friends</h6>
                            <ul class="list-group list-group-flush mb-0">
                            <?php
                                // Query to fetch recent jobs
                                $query = "SELECT * FROM users ORDER BY id DESC LIMIT 5";
                                $result = $conn->query($query);

                                if ($result === false) {
                                    echo '<li class="list-group-item">Error executing query: ' . htmlspecialchars($conn->error) . '</li>';
                                } elseif ($result->num_rows > 0) {
                                    // Output jobs
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<li class="list-group-item"><strong>' . htmlspecialchars($row['name']) . '</strong>  ' . '<strong>' . htmlspecialchars($row['surname']) . '</strong>'. '</li>';
                                    }
                                } else {
                                    // 
                                    echo '<li class="list-group-item">No new users...</li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include '../includes/footer.php'; ?>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
