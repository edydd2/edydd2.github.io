<?php
    include_once '../connect.php';

    $sql = "DELETE FROM country WHERE country_id='$_GET[countryid]';";
    
    mysqli_query($conn, $sql);

    header("refresh:1; url=deleteform.php");
?>
