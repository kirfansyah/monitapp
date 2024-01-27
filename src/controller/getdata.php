<?php
include '../model/model.php';

$data = getDataMonitoring();

echo json_encode(['data'=>$data]);