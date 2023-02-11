<?php 

$conn = mysqli_connect('localhost', 'root', '', 'cobaa');

function selectData($table, $order) {
    global $conn;

    $query = mysqli_query($conn, "SELECT * FROM $table ORDER BY $order DESC");

    $rows = [];

    while ($row = mysqli_fetch_assoc($query)) {
        $rows[] = $row;
    }

    return $rows;
}

function selectWhere($table, $clausa, $value) {
    global $conn;

    $query = mysqli_query($conn, "SELECT * FROM $table WHERE $clausa = '$value'");

    return mysqli_fetch_assoc($query);
}

function query($query)
{
    global $conn;

    $query = mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapusData($table, $where, $value)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM $table WHERE $where = $value");

    return mysqli_affected_rows($conn);
}

function cekData($table, $clausa, $value) {
    global $conn;

    $query = mysqli_query($conn, "SELECT * FROM $table WHERE $clausa = '$value'");

    return mysqli_num_rows($query);
}


function selectDataJoin($query) {
    global $conn;

    $query = mysqli_query($conn, $query);

    $rows = [];

    while ($row = mysqli_fetch_assoc($query)) {
        $rows[] = $row;
    }

    return $rows;
}

function insertSiswaSpp($data)
{
    global $conn;

    $nisn       = htmlspecialchars($data['nisn']);
    $nis        = htmlspecialchars($data['nis']);
    $nama       = htmlspecialchars($data['nama']);
    $kelas      = $data['kelas'];
    $alamat     = htmlspecialchars($data['alamat']);
    $noTelepon  = htmlspecialchars($data['noTelepon']);
    $spp        = $data['spp'];

    $query      = "INSERT INTO siswa VALUES('', '$nisn', '$nis', '$nama', '$kelas', '$alamat', '$noTelepon', '$spp')";

    mysqli_query($conn, $query);

    // Buat kartu SPP
    $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    $idSiswa    = mysqli_insert_id($conn);
    foreach ($bulan as $b) {
        mysqli_query($conn, "INSERT INTO pembayaran VALUES('', '', '$idSiswa', '', '$b', '', '$spp', '')");
    }

    return mysqli_affected_rows($conn);
}

function hitungJumlah($table)
{
    global $conn;

    $query = mysqli_query($conn, "SELECT * FROM $table");

    return mysqli_num_rows($query);

}

function selectDataNot($table, $not, $value) {
    global $conn;

    $query = mysqli_query($conn, "SELECT * FROM $table WHERE NOT $not = '$value'");

    $rows = [];

    while ($row = mysqli_fetch_assoc($query)) {
        $rows[] = $row;
    }

    return $rows;
}


?>