<?php
    include_once '../connect.php';

    $sql = "DELETE FROM language WHERE language_id='$_GET[languageid]';";
    
    mysqli_query($conn, $sql);

    header("refresh:1; url=deleteform.php");
?>
