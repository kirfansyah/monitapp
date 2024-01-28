<?php

include '../model/model.php';

// Panggil fungsi tambahData dengan parameter yang diterima dari query string
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['nama']) && isset($_GET['status'])) {
        $return = tambahData($_GET['nama'], $_GET['status']);
        if ($return) {
            echo json_encode(['status' => 200, 'message' => 'Data berhasil ditambahkan']);
        } else {
            echo json_encode(['status' => 500, 'message' => 'Gagal menambahkan data']);
        }
    } else {
        echo json_encode(['status' => 500, 'message' => 'Parameter tidak lengkap']);
    }
} else {
    echo json_encode(['status' => 500, 'message' => 'Metode HTTP tidak valid']);
}
