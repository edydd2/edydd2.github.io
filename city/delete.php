<?php
    include_once '../connect.php';

    $sql = "DELETE FROM city WHERE city_id='$_GET[cityid]';";
    
    mysqli_query($conn, $sql);

    header("refresh:1; url=deleteform.php");
?>
