<?php
include '../model/model.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        deleteData($id);
    } else {
        echo json_encode(['status' => 500, 'message' => 'Parameter ID tidak ditemukan']);
    }
} else {
    echo json_encode(['status' => 500, 'message' => 'Metode HTTP tidak valid']);
}
