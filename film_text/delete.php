<?php
    include_once '../connect.php';

    $sql = "DELETE FROM film_text WHERE film_id='$_GET[filmid]';";
    
    mysqli_query($conn, $sql);

    header("refresh:1; url=deleteform.php");
?>
