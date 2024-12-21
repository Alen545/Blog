<?php
session_start();

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id']; 
            $_SESSION['username'] = $user['username']; 

            echo "<script>alert('Login successful!'); window.location.href = 'userHome.php';</script>";
        } else {
            echo "<script>alert('Invalid username or password!');</script>";
        }
    } else {
        echo "<script>alert('No user found with that username!');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
