<?php
session_start();

include('connection.php');

// Session timeout duration (in seconds)
$timeout_duration = 3000; // 5 minutes

// Check for session timeout
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    session_unset();     
    session_destroy();   
    header("Location: logout.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni-list | GradConnect</title>
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
                    <!-- Update Modal -->
                    <div class="modal fade mt-5" id="updateUserModal" tabindex="-1" aria-labelledby="updateUser" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateUserModal">Update User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="./endpoint/update-user.php" method="POST">
                                        <div class="form-group row">
                                            <div class="col-6">
                                                <input type="text" name="id" id="updateUserID" hidden>
                                                <label for="updateFirstName">First Name:</label>
                                                <input type="text" class="form-control" id="updateFirstName" name="first_name">
                                            </div>
                                            <div class="col-6">
                                                <label for="updateLastName">Last Name:</label>
                                                <input type="text" class="form-control" id="updateLastName" name="last_name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-5">
                                                <label for="updateContactNumber">Contact Number:</label>
                                                <input type="number" class="form-control" id="updateContactNumber" name="contact_number" maxlength="11">
                                            </div>
                                            <div class="col-7">
                                                <label for="updateEmail">Email:</label>
                                                <input type="text" class="form-control" id="updateEmail" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="updateUsername">Username:</label>
                                            <input type="text" class="form-control" id="updateUsername" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="updatePassword">Password:</label>
                                            <input type="text" class="form-control" id="updatePassword" name="password">
                                        </div>
                                        <button type="submit" class="btn btn-dark login-register form-control">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="main">
                        <div class="content">
                            <h2>Alumni List</h2>
                            <hr>
                                <div class="search-box pull-left">
                                    <form action="search.php" method="GET">
                                        <input type="text" name="search" placeholder="Search alumni..." required>
                                        <i class="ti-search"></i>
                                    </form>
                                </div>
                            <hr>
                            <table class="table table-hover table-collapse">
                                <thead>
                                    <tr>
                                    <th scope="col">User ID</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Job</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Education | Degree</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                    
                                        $stmt = $conn->prepare("SELECT * FROM `users`");
                                        $stmt->execute();

                                        $result = $stmt->fetchAll();

                                        foreach ($result as $row) {
                                            $userID = $row['id'];
                                            $firstName = $row['name'];
                                            $lastName = $row['surname'];
                                            $contactNumber = $row['job'];
                                            $email = $row['email'];
                                            $username = $row['education'];

                                        ?>

                                        <tr>
                                            <td id="userID-<?= $userID ?>"><?php echo $userID ?></td>
                                            <td id="firstName-<?= $userID ?>"><?php echo $firstName ?></td>
                                            <td id="lastName-<?= $userID ?>"><?php echo $lastName ?></td>
                                            <td id="contactNumber-<?= $userID ?>"><?php echo $contactNumber ?></td>
                                            <td id="email-<?= $userID ?>"><?php echo $email ?></td>
                                            <td id="username-<?= $userID ?>"><?php echo $username ?></td>
                                            <td>
                                                <button id="deleteBtn" onclick="delete_user(<?php echo $userID ?>)">&#128465;</button>
                                            </td>
                                        </tr>    

                                        <?php
                                        }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <script>
                        // Update user
                        function update_user(id) {
                            $("#updateUserModal").modal("show");

                            let updateUserID = $("#userID-" + id).text();
                            let updateFirstName = $("#firstName-" + id).text();
                            let updateLastName = $("#lastName-" + id).text();
                            let updateContactNumber = $("#contactNumber-" + id).text();
                            let updateEmail = $("#email-" + id).text();
                            let updateUsername = $("#username-" + id).text();
                            let updatePassword = $("#password-" + id).text();

                            console.log(updateFirstName);
                            console.log(updateLastName);

                            $("#updateUserID").val(updateUserID);
                            $("#updateFirstName").val(updateFirstName);
                            $("#updateLastName").val(updateLastName);
                            $("#updateContactNumber").val(updateContactNumber);
                            $("#updateEmail").val(updateEmail);
                            $("#updateUsername").val(updateUsername);
                            $("#updatePassword").val(updatePassword);

                        }

                        // Delete user
                        function delete_user(id) {
                            if (confirm("Do you want to delete this user?")) {
                                window.location = "./endpoint/delete-user.php?user=" + id;
                            }
                        }


                    </script>
                    </div>

                </div>
            </section>
        </main>
    </div>
    <script src="../gradalumni/script/script.js"></script>
    <script src="../gradalumni/script/sec.js"></script>


     <!-- Bootstrap Js -->
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    
</body>
</html>
