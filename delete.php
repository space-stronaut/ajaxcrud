<?php 

    include "config.php";

    $id = $_GET['id'];

    $query = mysqli_query($conn, "DELETE FROM search WHERE id='$id'");

?>