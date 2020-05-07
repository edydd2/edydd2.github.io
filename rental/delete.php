<?php
    include_once '../connect.php';

    $sql = "DELETE FROM rental WHERE rental_id='$_GET[rentalid]';";
    
    mysqli_query($conn, $sql);

    header("refresh:1; url=deleteform.php");
?>
