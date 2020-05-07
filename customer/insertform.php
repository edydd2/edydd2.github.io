<!DOCTYPE html>
<html>
<head>
    <title>Insert Form</title>
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
          <li><a href="index.php">back</a></li>
          <li><a href="updateform.php">update</a></li>
          <li><a href="deleteform.php">delete</a></li>
        </ul>
      </nav>
    </div>
</header>

<body onload="startTime()">
    
<form action="" method="POST">
    <div class="wrapper" style="margin-top: 2.6%; margin-bottom: 40px">
        <div class="insert-form">

            <div class="input-fields">
                <div class="heading">insert</div>

                <input class="input" type="number" name="customerid" placeholder="Customer ID" autofocus required />
                
                <input class="input" type="number" name="storeid" placeholder="Store ID" required />
                
                <input class="input" type="text" name="firstname" placeholder="First Name" required 
                oninput="let p = this.selectionStart; this.value = this.value.toUpperCase();this.setSelectionRange(p, p)" />
                
                <input class="input" type="text" name="lastname" placeholder="Last Name" required 
                oninput="let p = this.selectionStart; this.value = this.value.toUpperCase();this.setSelectionRange(p, p)"/>

                <input class="input" type="number" name="addressid" placeholder="Address ID" required />

                <input class="input" type="number" name="active" placeholder="Active Status (1 or 0)" required />

                <input class="input" type="datetime-local" name="createdate"  required />
                
                <div class="input" id="txt"></div>
            </div>
            
            <input class="btn" type="submit" name="insert"></button>

        </div>
    </div>	
</form>

<?php
include_once '../connect.php';
include 'alerts.php';

if (ISSET($_POST['insert'])) {
    $customerid = $_POST['customerid'];
    $storeid = $_POST['storeid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $firstname . '.' . $lastname . '@sakilacustomer.org';
    $addressid = $_POST['addressid'];
    $active = $_POST['active'];
    $createdate = $_POST['createdate'];

    if (1 == preg_match('/[0-9]/', $firstname)) {
        firstname ();
    } else if (1 == preg_match('/[0-9]/', $lastname)) {
        lastname ();
    } else if (1 == preg_match('/[2-9]{1}/', $active)) {
        active ();
    } else {
        $sql = "INSERT INTO customer (customer_id, store_id, first_name, last_name, email, address_id, active, create_date, last_update) 
                VALUES ('$customerid', '$storeid', '$firstname', '$lastname', '$email', '$addressid', '$active', '$createdate', now());";

        mysqli_query($conn, $sql);

        header("Location: index.php");
    }
}
?>

</body>
</html>