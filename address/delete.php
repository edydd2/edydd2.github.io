<?php
    include_once '../connect.php';

    $sql = "DELETE FROM address WHERE address_id='$_GET[addressid]';";
    
    mysqli_query($conn, $sql);

    header("refresh:1; url=deleteform.php");
?>
