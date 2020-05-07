<?php
    include_once '../connect.php';

    $sql = "DELETE FROM film_category WHERE film_id='$_GET[filmid]' AND category_id='$_GET[categoryid]'";
    
    mysqli_query($conn, $sql);

    header("refresh:1; url=deleteform.php");
?>
