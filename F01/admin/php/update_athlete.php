<?php
require_once '../../php/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $short_description = mysqli_real_escape_string($conn, $_POST['short_description']);
    $achievement = mysqli_real_escape_string($conn, $_POST['achievement']);
    $sport = mysqli_real_escape_string($conn, $_POST['sport']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $medal = mysqli_real_escape_string($conn, $_POST['medal']);
    $olympics = mysqli_real_escape_string($conn, $_POST['olympics']);
    $records = mysqli_real_escape_string($conn, $_POST['records']);

    $image_update = "";
    if (isset($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../../assets/images/" . $image);
        $image_update = ", image = '$image'";
    }

    $query = "UPDATE athletes SET 
              name = '$name',
              short_description = '$short_description',
              achievement = '$achievement',
              sport = '$sport',
              category = '$category',
              medal = '$medal',
              olympics = '$olympics',
              records = '$records'
              $image_update
              WHERE id = $id";

    if (executeQuery($query)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}
