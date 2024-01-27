<?php 

include '../database/koneksi.php';



function getDataMonitoring() {
    $conn = koneksiDatabase();

    // Menyiapkan kueri SQL
    $sql = "SELECT * FROM tb_monitor";
    $result = mysqli_query($conn, $sql);

    // Mengambil data dari hasil kueri
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Menutup koneksi
    mysqli_close($conn);

    return $data;
}

