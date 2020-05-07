<?php
    include_once '../connect.php';

    $sql = "DELETE FROM actor WHERE actor_id='$_GET[actorid]';";
    
    mysqli_query($conn, $sql);

    header("refresh:1; url=deleteform.php");
?>
