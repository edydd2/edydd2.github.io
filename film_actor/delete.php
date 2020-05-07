<?php
    include_once '../connect.php';

    $sql = "DELETE FROM film_actor WHERE film_id='$_GET[filmid]' AND actor_id='$_GET[actorid]'";
    
    mysqli_query($conn, $sql);

    header("refresh:1; url=deleteform.php");
?>
