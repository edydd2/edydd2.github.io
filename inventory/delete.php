<?php
    include_once '../connect.php';

    $sql = "DELETE FROM inventory WHERE inventory_id='$_GET[inventoryid]';";
    
    mysqli_query($conn, $sql);

    header("refresh:1; url=deleteform.php");
?>
