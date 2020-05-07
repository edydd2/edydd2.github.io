<?php
    include_once '../connect.php';

    $sql = "DELETE FROM staff WHERE staff_id='$_GET[staffid]';";
    
    mysqli_query($conn, $sql);

    header("refresh:1; url=deleteform.php");
?>
