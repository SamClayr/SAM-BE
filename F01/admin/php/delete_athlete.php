<?php
require_once '../../php/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = mysqli_real_escape_string($conn, $data['id']);

    $query = "SELECT image FROM athletes WHERE id = $id";
    $result = executeQuery($query);
    $athlete = mysqli_fetch_assoc($result);

    $query = "DELETE FROM athletes WHERE id = $id";

    if (executeQuery($query)) {
        if ($athlete && $athlete['image']) {
            $image_path = "../../assets/images/" . $athlete['image'];
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
}
