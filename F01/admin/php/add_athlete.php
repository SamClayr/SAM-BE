<?php
require_once '../../php/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $short_description = mysqli_real_escape_string($conn, $_POST['short_description']);
    $achievement = mysqli_real_escape_string($conn, $_POST['achievement']);
    $sport = mysqli_real_escape_string($conn, $_POST['sport']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $medal = mysqli_real_escape_string($conn, $_POST['medal']);
    $olympics = mysqli_real_escape_string($conn, $_POST['olympics']);
    $records = mysqli_real_escape_string($conn, $_POST['records']);

    $image = '';
    if (isset($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../../assets/images/" . $image);
    }

    $query = "INSERT INTO athletes (image, name, short_description, achievement, sport, category, medal, olympics, records) 
              VALUES ('$image', '$name', '$short_description', '$achievement', '$sport', '$category', '$medal', '$olympics', '$records')";

    if (executeQuery($query)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}
