<?php
session_start();
// Database configuration
include '../../model/conn.php';

// Function to sanitize user inputs
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $email = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']);

    // Prepare and bind statements to check user credentials
    $stmt = $conn->prepare("SELECT id, password_hash, role_id FROM Users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();


    $row = $result->fetch_assoc();
        if ($row && password_verify($password, $row['password_hash'])) {
            session_start();
            $_SESSION['id'] = $row['id'];
            header("Location: ../../../views/Staff_dash.php");
        }
     return false;
   /* $stmt->store_result();

    $row=$stmt->fetch();
    if ($row){
        if ($row['role_id']==1){
            if (password_verify($password, $passwordHash)) {
                // Set session variables
                $_SESSION['user_id'] = $userId;
                $_SESSION['role_id'] = $roleId;
    
                // Redirect based on role
                if ($roleId == 1) { // Alumni
                    header("Location: /views/Alumni_dash.php");
                } elseif ($roleId == 2) { // Staff
                    header("Location: ../../../views/Staff_dash.php");
                }
                exit();
            } else {
                $error = "Invalid password.";
            }

        }
    }*/

   

    // Close statement
    $stmt->close();
}



// Close connection
$conn->close();
?>