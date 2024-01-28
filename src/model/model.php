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

    // Tambahkan kolom untuk pengurutan berdasarkan waktu atau ID secara descending
    if ($orderBy == 'id_monitor') {
        $orderDir = 'desc';
    }
    $sql = "SELECT id_monitor, nama, status, tanggal FROM tb_monitor WHERE nama LIKE '%$search%' OR status LIKE '%$search%' OR tanggal LIKE '%$search%' ORDER BY $orderBy $orderDir  LIMIT $start, $length";

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


function getPersentaseStatusmasuk()
{
    $conn = koneksiDatabase();

    $sql = "SELECT (COUNT(*) / (SELECT COUNT(*) FROM tb_monitor)) * 100 AS persentase_status_1 FROM tb_monitor WHERE status = '1'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $persentaseStatus1 = $row['persentase_status_1'];
        mysqli_close($conn);
        return $persentaseStatus1;
    } else {
        // Handle kesalahan jika kueri gagal
        mysqli_close($conn);
        return false;
    }
}


function getPersentaseStatusKeluar()
{
    $conn = koneksiDatabase();

    $sql = "SELECT (COUNT(*) / (SELECT COUNT(*) FROM tb_monitor)) * 100 AS persentase_status_0 FROM tb_monitor WHERE status = '0'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $persentaseStatus0 = $row['persentase_status_0'];
        mysqli_close($conn);
        return $persentaseStatus0;
    } else {
        // Handle kesalahan jika kueri gagal
        mysqli_close($conn);
        return false;
    }
}


function tambahData($nama, $status)
{
    // Lakukan validasi atau operasi lain sesuai kebutuhan

    // Simpan data ke database atau lakukan operasi lainnya
    // Contoh: Simpan data ke tabel 'tb_monitor'
    $conn =  koneksiDatabase();

    if ($conn->connect_error) {
        die("Koneksi database gagal: " . $conn->connect_error);
    }

    $tanggal = date('Y-m-d H:i:s');

    $sql = "INSERT INTO tb_monitor (nama, status, tanggal) VALUES ('$nama', '$status', '$tanggal')";

    $return = $conn->query($sql);


    $conn->close();

    return $return;
}


function getDataById($id)
{
    // Lakukan validasi atau operasi lain sesuai kebutuhan

    // Ambil data dari database berdasarkan ID atau lakukan operasi lainnya
    // Contoh: Ambil data dari tabel 'tb_monitor' berdasarkan ID
    $conn = koneksiDatabase();

    if ($conn->connect_error) {
        echo json_encode(['status' => 500, 'message' => 'Gagal terhubung ke database']);
        die();
    }

    $sql = "SELECT * FROM tb_monitor WHERE id_monitor = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        echo json_encode(['status' => 200, 'data' => $data]);
    } else {
        echo json_encode(['status' => 404, 'message' => 'Data tidak ditemukan']);
    }

    $conn->close();
}


function updateData($id, $nama, $status)
{
    // Lakukan validasi atau operasi lain sesuai kebutuhan

    // Update data di database atau lakukan operasi lainnya
    // Contoh: Update data di tabel 'tb_monitor'
    $conn = koneksiDatabase();

    if ($conn->connect_error) {
        echo json_encode(['status' => 500, 'message' => 'Gagal terhubung ke database']);
        die();
    }

    $tanggal = date('Y-m-d H:i:s');

    $sql = "UPDATE tb_monitor SET nama='$nama', status='$status', tanggal='$tanggal' WHERE id_monitor=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 200, 'message' => 'Data berhasil diubah']);
    } else {
        echo json_encode(['status' => 500, 'message' => 'Gagal mengubah data']);
    }

    $conn->close();
}


function deleteData($id)
{
    // Lakukan validasi atau operasi lain sesuai kebutuhan

    // Hapus data dari database atau lakukan operasi lainnya
    // Contoh: Hapus data dari tabel 'tb_monitor'
    $conn = koneksiDatabase();

    if ($conn->connect_error) {
        echo json_encode(['status' => 500, 'message' => 'Gagal terhubung ke database']);
        die();
    }

    $sql = "DELETE FROM tb_monitor WHERE id_monitor=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 200, 'message' => 'Data berhasil dihapus']);
    } else {
        echo json_encode(['status' => 500, 'message' => 'Gagal menghapus data']);
    }

    $conn->close();
}
