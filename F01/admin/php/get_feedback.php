<?php
require_once '../../php/connect.php';

$query = "SELECT * FROM feedback ORDER BY id DESC";
$result = executeQuery($query);

$feedbacks = [];
while ($feedback = mysqli_fetch_assoc($result)) {
    $feedbacks[] = $feedback;
}

echo json_encode($feedbacks);
