<?php
require_once 'koneksi.php';

function getData($query = "SELECT * FROM handphone ORDER BY nama_handphone ASC")
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}


function insert($data)
{
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $merk = mysqli_real_escape_string($koneksi, $data['merk']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $stock = mysqli_real_escape_string($koneksi, $data['stock']);
    $warna = mysqli_real_escape_string($koneksi, $data['warna']);
    $storage = mysqli_real_escape_string($koneksi, $data['storage']);
    $ram = mysqli_real_escape_string($koneksi, $data['ram']);



    $sqlHp = "INSERT INTO handphone VALUES ('$id', '$nama', '$merk', '$harga', '$stock', '$warna','$storage', '$ram')";

    mysqli_query($koneksi, $sqlHp);
    return mysqli_affected_rows($koneksi);
}

function delete($id)
{
    global $koneksi;

    $sqlDel = "DELETE FROM handphone WHERE id_handphone = $id";
    mysqli_query($koneksi, $sqlDel);

    return mysqli_affected_rows($koneksi);
}

function update($data)
{
    global $koneksi;

    $id = mysqli_real_escape_string($koneksi, $data['kode']);
    $nama = mysqli_real_escape_string($koneksi, $data['nama']);
    $merk = mysqli_real_escape_string($koneksi, $data['merk']);
    $harga = mysqli_real_escape_string($koneksi, $data['harga']);
    $stock = mysqli_real_escape_string($koneksi, $data['stock']);
    $warna = mysqli_real_escape_string($koneksi, $data['warna']);
    $storage = mysqli_real_escape_string($koneksi, $data['storage']);
    $ram = mysqli_real_escape_string($koneksi, $data['ram']);

    mysqli_query($koneksi, "UPDATE handphone SET
                            nama_handphone = '$nama',
                            merk_handphone = '$merk',
                            harga = '$harga',
                            stock = '$stock',
                            warna = '$warna',
                            storage = '$storage',
                            ram = '$ram'
                            WHERE id_handphone = '$id'
    ");
    return mysqli_affected_rows($koneksi);
}
