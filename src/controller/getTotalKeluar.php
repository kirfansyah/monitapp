<?php
include '../model/model.php';

$totalKeluar = getTotalKeluar();
$PersentaseStatusKeluar = getPersentaseStatusKeluar();

$data = [
    'total_keluar' => $totalKeluar,
    'persentase_keluar' => $PersentaseStatusKeluar,
];

echo json_encode($data);
