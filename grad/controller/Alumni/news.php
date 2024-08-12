<?php
 include '../model/conn.php';  // Include your database connection file

 $sql = "SELECT * FROM news";
 $result = $conn->query($sql);
 
 if ($result->num_rows > 0) {
     // Start with the container
     echo '<div class="container">';
     echo '<div class="row gy-4">';
 
     // Display the first news item as the "Latest News" in the left column
     $first_row = $result->fetch_assoc();
     echo '<div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">';
     echo '<div class="News-box">';
     echo '<h3>' . $first_row['title'] . '</h3>';
     echo '<p>' . $first_row['content'] . '</p>';
     echo '<div class="text-center">';
     echo '<a href="news-details.php?id=' . $first_row['id'] . '" class="more-btn"><span>Learn More</span> <i class="bi bi-chevron-right"></i></a>';
     echo '</div>';
     echo '</div>';
     echo '</div>';
 
     // Display the remaining news items in the right column
     echo '<div class="col-lg-8 d-flex align-items-stretch">';
     echo '<div class="row gy-4" data-aos="fade-up" data-aos-delay="200">';
 
     $delay = 200; // Start with a delay of 200ms for the first item
     while ($row = $result->fetch_assoc()) {
         $delay += 100; // Increase delay for each item
         echo '<div class="col-xl-4" data-aos="fade-up" data-aos-delay="' . $delay . '">';
         echo '<div class="icon-box d-flex flex-column justify-content-center align-items-center">';
         echo '<i class="bi bi-newspaper"></i>'; // Replace with appropriate icon if needed
         echo '<h4>' . $row['title'] . '</h4>';
         echo '<p>' . $row['content'] . '</p>';
         echo '</div>';
         echo '</div>';
     }
 
     echo '</div>'; // Close row in right column
     echo '</div>'; // Close right column
 
     echo '</div>'; // Close main row
     echo '</div>'; // Close container
 } else {
     echo "No news found.";
 }
 
 $conn->close();
 ?>