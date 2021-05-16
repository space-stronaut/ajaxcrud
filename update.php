<?php 

    include "config.php";

    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $nis = $_POST['nis'];
    $get = $_GET['id'];

    $query = mysqli_query($conn, "UPDATE search SET nama='$nama', jurusan='$jurusan', nis='$nis' WHERE id='$get'");
?>