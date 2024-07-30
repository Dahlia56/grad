<?php
session_start();

// Include database connection
include '../../model/conn.php'; // Adjust this path according to your folder structure

// Function to sanitize user inputs
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = sanitize_input($_POST['name'] ?? '');
    $surname = sanitize_input($_POST['surname'] ?? '');
    $email = sanitize_input($_POST['email'] ?? '');
    $password = sanitize_input($_POST['password'] ?? '');
    $confirmPassword = sanitize_input($_POST['confirmPassword'] ?? '');
    $category = sanitize_input($_POST['category'] ?? '');
    $termsAccepted = isset($_POST['terms']) ? 1 : 0;

    // File upload handling
    $photo = "";
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = 'uploads/' . basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
    }

    // Validate passwords
    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }

    // Hash the password
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // Prepare and bind statements
    $stmt = $conn->prepare("INSERT INTO Users (photo, name, surname, email, password_hash, role_id, terms_accepted) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $roleId = ($category == '1') ? 1 : 2; // 1 for Alumni, 2 for Staff
    $stmt->bind_param("ssssssi", $photo, $name, $surname, $email, $passwordHash, $roleId, $termsAccepted);

    if ($stmt->execute()) {
        $userId = $stmt->insert_id;

        // Insert into specific table based on role
        if ($category == '1') { // Alumni
            $graduationYear = sanitize_input($_POST['graduationYear'] ?? '');
            $studentNumber = sanitize_input($_POST['studentNumber'] ?? '');

            $stmt = $conn->prepare("INSERT INTO Alumni (user_id, graduation_year, student_number) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $userId, $graduationYear, $studentNumber);
        } elseif ($category == '2') { // Staff
            $staffNumber = sanitize_input($_POST['staffNumber'] ?? '');

            $stmt = $conn->prepare("INSERT INTO Staff (user_id, staff_number) VALUES (?, ?)");
            $stmt->bind_param("is", $userId, $staffNumber);
        }

        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statements and connection
    $stmt->close();
    $conn->close();
}
?>
