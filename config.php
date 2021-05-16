<?php 

    $conn = mysqli_connect('localhost', 'root', '', 'live');

    $query = mysqli_query($conn, "SELECT * FROM search");

    if(mysqli_num_rows($query) > 0){
        
        while( $data = mysqli_fetch_array($query) ){
            $id = $data['id'];
            $nama = $data['nama'];
            $jurusan = $data['jurusan'];
            $nis = $data['nis'];
            $update = "<a class='update' nama='$nama' jurusan='$jurusan' nis='$nis' href='update.php?id=$id'>Edit</a>";
            $delete = "<a class='delete' nama='$nama' jurusan='$jurusan' nis='$nis' href='delete.php?id=$id'>Delete</a>";

            echo $id.' '.$nama.' '.$jurusan.' '.$nis.' '.$update.' '.$delete;
            echo "<br>";
        }
    }

?>