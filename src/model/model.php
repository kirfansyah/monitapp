<?php

include '../database/koneksi.php';



function countDataMonitoring()
{
    $conn = koneksiDatabase();
    $sql = "SELECT COUNT(*) AS count FROM tb_monitor";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $row['count'];
}

function countDataMonitoringFiltered($search)
{
    $conn = koneksiDatabase();
    $sql = "SELECT COUNT(*) AS count FROM tb_monitor WHERE nama LIKE '%$search%' OR status LIKE '%$search%' OR tanggal LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $row['count'];
}



function getDataMonitoringServerSide($start, $length, $search)
{
    $conn = koneksiDatabase();

    $columns = array(
        0 => 'id_monitor',
        1 => 'nama',
        2 => 'status',
        3 => 'tanggal'
    );

    $orderColumn = $_GET['order'][0]['column']; // Kolom yang diinginkan untuk diurutkan
    $orderDir = $_GET['order'][0]['dir']; // Arah pengurutan (asc atau desc)

    $orderBy = $columns[$orderColumn];
    $sql = "SELECT id_monitor, nama, status, tanggal FROM tb_monitor WHERE nama LIKE '%$search%' OR status LIKE '%$search%' OR tanggal LIKE '%$search%' ORDER BY $orderBy $orderDir LIMIT $start, $length";

    $result = mysqli_query($conn, $sql);
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    mysqli_close($conn);
    return $data;
}


function getTotalMasuk()
{
    $conn = koneksiDatabase();
    $sql = "SELECT COUNT(status) as total_masuk FROM tb_monitor WHERE status = '1'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $totalMasuk = $row['total_masuk'];
        mysqli_close($conn);
        return $totalMasuk;
    } else {
        // Handle kesalahan jika kueri gagal
        mysqli_close($conn);
        return false;
    }
}


function getTotalKeluar()
{
    $conn = koneksiDatabase();
    $sql = "SELECT COUNT(status) as total_keluar FROM tb_monitor WHERE status = '0'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $totalKeluar = $row['total_keluar'];
        mysqli_close($conn);
        return $totalKeluar;
    } else {
        // Handle kesalahan jika kueri gagal
        mysqli_close($conn);
        return false;
    }
}


function getTotalKeseluruhan()
{
    $totalMasuk = getTotalMasuk();
    $totalKeluar = getTotalKeluar();

    if ($totalMasuk !== false && $totalKeluar !== false) {
        // Mengembalikan total keseluruhan
        return $totalMasuk + $totalKeluar;
    } else {
        // Handle kesalahan jika salah satu kueri gagal
        return false;
    }
}
