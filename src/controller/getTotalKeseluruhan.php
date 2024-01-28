<?php
include '../model/model.php';

$getTotalKeseluruhan = getTotalKeseluruhan();

echo json_encode($getTotalKeseluruhan);
