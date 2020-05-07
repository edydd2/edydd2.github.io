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
    <div class="wrapper" style="margin-top: 2.5%; margin-bottom: 60px">
        <div class="insert-form">

            <div class="input-fields">
                <div class="heading">update</div>
                
                <input class="input" type="number" name="staffid" placeholder="Select A Staff ID To Update" autofocus required />

                <input class="input" type="number" name="newstaffid" placeholder="Staff ID" required />

                <input class="input" type="text" name="firstname" placeholder="First Name" required />
                
                <input class="input" type="text" name="lastname" placeholder="Last Name" required/>

                <input class="input" type="number" name="addressid" placeholder="Address ID" required />

                <input class="input" type="url" name="picture" placeholder="Picture URL" />

                <input class="input" type="number" name="storeid" placeholder="Store ID" required />

                <input class="input" type="number" name="active" placeholder="Active Status (1 or 0)" required />

                <input class="input" type="text" name="username" placeholder="Username" required />

                <input class="input" type="text" name="password" placeholder="Password" required />
                
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
    $staffid = $_POST['staffid'];
    $newstaffid = $_POST['newstaffid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $addressid = $_POST['addressid'];
    $picture = $_POST['picture'];
    $email = $firstname . '.' . $lastname . '@sakilastaff.com';
    $storeid = $_POST['storeid'];
    $active = $_POST['active'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (1 == preg_match('/[0-9]/', $firstname)) {
        firstname ();
    } else if (1 == preg_match('/[0-9]/', $lastname)) {
        lastname ();
    } else if (0 == preg_match('/[0-1]{1}/', $active)) {
        active ();
    } else if (1 == preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $username)) {
        username ();
    } else {
        $sql = "UPDATE staff SET staff_id='$newstaffid', first_name='$firstname', last_name='$lastname', 
                                address_id='$addressid', picture='$picture', email='$email', store_id='$storeid', 
                                active='$active', username='$username', password='$password', last_update=now()
                WHERE staff_id='$staffid';"; 
    
        mysqli_query($conn, $sql);

        header("Location: index.php");
    }
}
?>

</body>
</html>

