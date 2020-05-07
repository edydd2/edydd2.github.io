<!DOCTYPE html>
<html>
<head>
    <title>Update Form</title>
    <link rel="stylesheet" href="../stylesheets/topnavbar.css">
    <link rel="stylesheet" href="../stylesheets/forms.css">
    
    <script language = 'javascript'>
        function startTime () {
            var today = new Date();
            var yyyy = today.getFullYear();
            var mm = today.getMonth()+1;
            var dd = today.getDate();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            mm = checkTime(mm);
            dd = checkTime(dd);
            h = checkTime(h);
            m = checkTime(m);
            s = checkTime(s);
            
            document.getElementById('txt').innerHTML =
            "Last Update" + '\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0' + yyyy + "-" + mm + "-" + dd + " " + h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }
        
        function checkTime (i) {
            if (i < 10) {i = "0" + i};
            return i;
        }
    </script>
</head>

<header>
    <div class="container">
      <nav>
        <ul>
          <li><a href="../index.html">home</a></li>
          <li><a href="searchform.php">search</a></li>
          <li><a href="insertform.php">insert</a></li>
          <li><a href="index.php">back</a></li>
          <li><a href="deleteform.php">delete</a></li>
        </ul>
      </nav>
    </div>
</header>

<body onload="startTime()">
    
<form action="" method="POST">
    <div class="wrapper">
        <div class="insert-form">

            <div class="input-fields">
                <div class="heading">update</div>
                
                <input class="input" type="number" name="languageid" placeholder="Select A Language ID To Update" autofocus required />

                <input class="input" type="number" name="newlanguageid" placeholder="Language ID" required />
                
                <input class="input" type="text" name="language" placeholder="Language" required />
                
                <div class="input" id="txt"></div>
            </div>
            
            <input class="btn" type="submit" name="update"></button>

        </div>
    </div>	
</form>

<?php
include_once '../connect.php';
include 'alerts.php';

if (ISSET($_POST['update'])) {
    $languageid = $_POST['languageid'];
    $newlanguageid = $_POST['newlanguageid'];
    $language = $_POST['language'];

    if (1 == preg_match('/[0-9]/', $language)) {
        language ();
    } else {
        $sql = "UPDATE language SET language_id='$newlanguageid', language='$language', last_update=now()
                WHERE language_id='$languageid';"; 
    
        mysqli_query($conn, $sql);

        header("Location: index.php");
    }
}
?>

</body>
</html>

