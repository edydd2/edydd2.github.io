<?php
    include_once '../connect.php';

    $sql = "DELETE FROM customer WHERE customer_id='$_GET[customerid]';";
    
    mysqli_query($conn, $sql);

    header("refresh:1; url=deleteform.php");
?>
