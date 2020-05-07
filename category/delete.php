<?php
    include_once '../connect.php';

    $sql = "DELETE FROM category WHERE category_id='$_GET[categoryid]';";
    
    mysqli_query($conn, $sql);

    header("refresh:1; url=deleteform.php");
?>
