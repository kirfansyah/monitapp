<?php
include '../model/model.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id']) && isset($_GET['nama']) && isset($_GET['status'])) {
        $id = $_GET['id'];
        $nama = $_GET['nama'];
        $status = $_GET['status'];

        updateData($id, $nama, $status);
    } else {
        echo json_encode(['status' => 500, 'message' => 'Parameter tidak lengkap']);
    }
} else {
    echo json_encode(['status' => 500, 'message' => 'Metode HTTP tidak valid']);
}
