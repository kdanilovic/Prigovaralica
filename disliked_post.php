<?php

include "spoj.php";
header('Content-Type: application/json');

$sql = "SELECT * FROM objave ORDER BY dislajk DESC LIMIT 1";
$result = mysqli_query($spoj, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $opis = $row['opis'];
        $id = $row['id'];

        echo json_encode(['opis' => $opis, 'id' => $id]);
    } else {
        echo json_encode(['error' => 'No posts found']);
    }
} else {
    echo json_encode(['error' => mysqli_error($spoj)]);
}


mysqli_close($spoj);
?>