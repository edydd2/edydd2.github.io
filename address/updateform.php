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
    <div class="wrapper" style="margin-top: 70px; margin-bottom: 50px">
        <div class="insert-form">

            <div class="input-fields">
                <div class="heading">update</div>

                <input class="input" type="number" name="addressid" placeholder="Select An Address ID To Update" autofocus required />
                
                <input class="input" type="number" name="newaddressid" placeholder="Address ID" required />
                
                <input class="input" type="text" name="address" placeholder="Address" required />

                <input class="input" type="text" name="address2" placeholder="Address 2" />

                <input class="input" type="text" name="district" placeholder="District" required />

                <input class="input" type="number" name="cityid" placeholder="City ID" required />

                <input class="input" type="text" name="postalcode" placeholder="Postal Code" required />
                
                <input class="input" type="number" name="phone" placeholder="Phone Number" />
                
                <div class="input" id="txt"></div>
            </div>
            
            <input class="btn" type="submit" name="update"></button>

        </div>
    </div>	
</form>

<?php
include_once '../connect.php';

if (ISSET($_POST['update'])) {
    $adressid = $_POST['addressid'];
    $newaddressid = $_POST['newaddressid'];
    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $district = $_POST['district'];
    $cityid = $_POST['cityid'];
    $postalcode = $_POST['postalcode'];
    $phone = $_POST['phone'];

    if (1 == preg_match('/[A-Za-z]/', $addressid)) {
        id ();
    } else if (1 == preg_match('/[A-Za-z]/', $newaddressid)) {
        id ();
    } else if (1 == preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $address)) {
        address ();
    } else if (1 == preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $address2)) {
        address2 ();
    } else if (1 == preg_match('/[0-9]/', $district)) {
        district ();
    } else if (1 == preg_match('/[A-Za-z]/', $cityid)) {
        cityid ();
    } else if (1 == preg_match('/[0-9]/', $postalcode)) {
        postalcode ();
    } else if (1 == preg_match('/[A-Za-z]/', $phone)) {
        phone ();
    } else {
        $sql = "UPDATE address SET address_id='$newaddressid', address='$address', address2='$address2',
                district='$district', city_id='$cityid', postal_code='$postalcode', phone='$phone', last_update=now()
                WHERE actor_id='$addressid';"; 
    
        mysqli_query($conn, $sql);

        header("Location: index.php");
    }
}
?>

</body>
</html>