<?php
    include_once '../connect.php';

    $sql = "DELETE FROM payment WHERE payment_id='$_GET[paymentid]';";
    
    mysqli_query($conn, $sql);

    header("refresh:1; url=deleteform.php");
?>
