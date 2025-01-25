<?php
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $check_query = "SELECT * FROM users WHERE email = '$email'";
    $check_result = executeQuery($check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo 'Email already exists';
    } else {
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if (executeQuery($query)) {
            echo 'success';
        } else {
            echo 'Registration failed';
        }
    }
}
