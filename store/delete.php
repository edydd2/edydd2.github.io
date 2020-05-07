<?php
    include_once '../connect.php';

    $sql = "DELETE FROM store WHERE store_id='$_GET[storeid]';";
    
    mysqli_query($conn, $sql);

    header("refresh:1; url=deleteform.php");
?>
