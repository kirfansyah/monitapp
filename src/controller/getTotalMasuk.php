<?php
include '../model/model.php';

$totalMasuk = getTotalMasuk();
$PersentaseStatusmasuk = getPersentaseStatusmasuk();

$data = [
    'total_masuk' => $totalMasuk,
    'persentase_masuk' => $PersentaseStatusmasuk,
];

echo json_encode($data);
