<?php 

    include "config.php";

        $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $nis = $_POST['nis'];

    $query = mysqli_query($conn, "INSERT INTO search VALUES('','$nama', '$jurusan', '$nis')");

?>