<?php 

$conn = mysqli_connect('localhost', 'root', '', 'coba');

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


?>