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
    <div class="wrapper" style="margin-top: 1%; margin-bottom: 50px">
        <div class="insert-form">

            <div class="input-fields">
                <div class="heading">update</div>
                
                <input class="input" type="number" name="rentalid" placeholder="Select A Rental ID To Update" autofocus required />
                
                <input class="input" type="number" name="newrentalid" placeholder="Inventory ID" autofocus required />

                <input class="input" type="datetime-local" name="rentaldate" placeholder="Rental Date" required />
                
                <input class="input" type="number" name="inventoryid" placeholder="Inventory ID" required />

                <input class="input" type="number" name="customerid" placeholder="Customer ID" required />

                <input class="input" type="datetime-local" name="returndate" placeholder="Return Date" required />

                <input class="input" type="number" name="staffid" placeholder="Staff ID" required />
                
                <div class="input" id="txt"></div>
            </div>
            
            <input class="btn" type="submit" name="update"></button>
        </div>
    </div>	
</form>

<?php
include_once '../connect.php';

if (ISSET($_POST['update'])) {
    $rentalid = $_POST['rentalid'];
    $newrentalid = $_POST['newrentalid'];
    $rentaldate = $_POST['rentaldate'];
    $inventoryid = $_POST['inventoryid'];
    $customerid = $_POST['customerid'];
    $returndate = $_POST['returndate'];
    $staffid = $_POST['staffid'];

    $sql = "UPDATE rental SET rental_id='$newrentalid', rental_date='$rentaldate', inventory_id='$inventoryid', 
            customer_id='$customerid', return_date='$returndate', staff_id='$staffid', last_update=now()
            WHERE rental_id='$rentalid';"; 
    
        mysqli_query($conn, $sql);

        header("Location: index.php");
}
?>

</body>
</html>

