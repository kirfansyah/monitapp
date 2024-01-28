<?php
include '../model/model.php';

// $data = getDataMonitoring();

// echo json_encode(['data' => $data]);


// Mengambil parameter dari DataTables
$draw = isset($_GET['draw']) ? intval($_GET['draw']) : 1;
$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$length = isset($_GET['length']) ? intval($_GET['length']) : 10;
$search = isset($_GET['search']['value']) ? $_GET['search']['value'] : '';

// Menghitung total data tanpa filter
$totalData = countDataMonitoring();


// Menghitung total data dengan filter
$totalFiltered = countDataMonitoringFiltered($search);

// Mengambil data dari database
$data = getDataMonitoringServerSide($start, $length, $search);

// Format data untuk DataTables
$output = array(
    "draw" => intval($draw),
    "recordsTotal" => intval($totalData),
    "recordsFiltered" => intval($totalFiltered),
    "data" => $data
);

// Mengembalikan data dalam format JSON
echo json_encode($output);
