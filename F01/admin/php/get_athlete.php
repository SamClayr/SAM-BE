<?php
require_once '../../php/connect.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM athletes WHERE id = $id";
    $result = executeQuery($query);

    if ($athlete = mysqli_fetch_assoc($result)) {
        echo json_encode($athlete);
    } else {
        echo json_encode(['error' => 'Athlete not found']);
    }
}
