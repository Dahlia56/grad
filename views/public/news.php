<?php include '../includes/nav.php'; ?>

<?php
// Connect to database
$db = mysqli_connect("localhost", "root", "", "gradalumni_db");

// Check if connection was successful
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to fetch news from news table, excluding date_created
$sql = "SELECT id, title, content, media FROM news ORDER BY date_created DESC";
$result = mysqli_query($db, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    echo '<div class="container">';
    echo '<div class="news-grid">';

    // Loop through each row
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $title = $row['title'];
        $content = $row['content'];
        $media = $row['media'];
        $mediaPath = "../gradalumni/assets/uploads/news/" . $media;

        echo '<div class="news-item">';
        if ($media) {
            echo '<img src="' . $mediaPath . '" alt="' . $title . '" class="news-image">';
        }
        echo '<h2>' . $title . '</h2>';
        echo '<p>' . $content . '</p>';
        echo '</div>';
    }

    echo '</div>';
    echo '</div>';
} else {
    echo "<p>No news articles found.</p>";
}

mysqli_close($db); // Close database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/49d89f7fa2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/home2.css">


    <style>
        /* Add specific CSS for the news page */
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin: 20px;
        }

        .news-item {
            border: 1px solid #ddd;
            padding: 20px;
            box-shadow: 2px 2px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
            background-color: #f9f9f9;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .news-item:hover {
            transform: scale(1.02);
            box-shadow: 4px 4px 12px rgba(0,0,0,0.2);
        }

        .news-image {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .news-item h2 {
            font-size: 1.5em;
            margin: 10px 0;
        }

        .news-item p {
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
</body>
<?php include '../includes/footer.php'; ?>
</html>
