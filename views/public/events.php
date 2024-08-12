<?php include '../includes/nav.php'; ?>

<?php
// Connect to database
$db = mysqli_connect("localhost", "root", "", "gradalumni_db");

// Check if connection was successful
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to fetch events from the events table
$sql = "SELECT id, title, content, schedule, banner FROM events ORDER BY schedule DESC";
$result = mysqli_query($db, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    echo '<div class="container">';
    echo '<div class="grid-container">';

    // Loop through each row
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $title = $row['title'];
        $content = $row['content'];
        $schedule = $row['schedule'];
        $banner = $row['banner'];
        $bannerPath = "../gradalumni/assets/uploads/events/" . $banner;

        echo '<div class="grid-item">';
        echo '<img src="' . $bannerPath . '" alt="' . $title . '" class="event-banner"> ';
        echo '<h3>' . $title . '</h3>';
        echo '<p>' . $content . '</p>';
        echo '<p><strong>Date & Time:</strong> ' . $schedule . '</p>';
        echo '<button class="rsvp-button">RSVP</button>';
        echo '</div>';
    }

    echo '</div>';
    echo '</div>';
} else {
    echo "<p>No upcoming events found.</p>";
}

mysqli_close($db); // Close database connection
?>

<!-- Add some CSS for grid layout -->
<style>
.container {
    padding: 20px;
}

.grid-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.grid-item {
    border: 1px solid #ddd;
    padding: 15px;
    box-shadow: 2px 2px 8px rgba(0,0,0,0.1);
    border-radius: 8px;
    background-color: #f9f9f9;
    text-align: center;
}

.event-banner {
    width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 10px;
}

.grid-item h3 {
    margin-bottom: 10px;
    font-size: 1.5em;
    color: #333;
}

.rsvp-button {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.rsvp-button:hover {
    background-color: #0056b3;
}

/* Modal styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 60px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
    border-radius: 8px;
    text-align: left;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="number"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/49d89f7fa2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/home2.css">


</head>
<body>



<!-- RSVP Modal -->
<div id="rsvpModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>RSVP for Event</h2>
        <form id="rsvpForm" method="POST" action="submit-rsvp.php">
            <input type="hidden" id="event_id" name="event_id">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="guests">Number of Guests:</label>
            <input type="number" id="guests" name="guests" min="0" required>
            
            <label for="requirements">Special Requirements:</label>
            <textarea id="requirements" name="requirements"></textarea>
            
            <button type="submit" class="rsvp-button">Submit RSVP</button>
        </form>
    </div>
</div>

<script>
// Get modal element
var modal = document.getElementById("rsvpModal");

// Get close button element
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
document.querySelectorAll(".rsvp-button").forEach(button => {
    button.addEventListener("click", function() {
        var event_id = this.parentElement.querySelector("h3").textContent;
        document.getElementById("event_id").value = event_id;
        modal.style.display = "block";
    });
});

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
<?php include '../includes/footer.php'; ?>

</html>
