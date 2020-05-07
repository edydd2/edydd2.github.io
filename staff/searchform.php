<!DOCTYPE html>
<html>
<head>
    <title>Insert Form</title>
    <link rel="stylesheet" href="../stylesheets/topnavbar.css">
    <link rel="stylesheet" href="../stylesheets/searchform.css">
    <link rel="stylesheet" href="../stylesheets/tables.css">
</head>

<header>
    <div class="container">
      <nav>
        <ul>
          <li><a href="../index.html">home</a></li>
          <li><a href="index.php">back</a></li>
          <li><a href="insertform.php">insert</a></li>
          <li><a href="updateform.php">update</a></li>
          <li><a href="deleteform.php">delete</a></li>
        </ul>
      </nav>
    </div>
</header>

<body>
    
<form action="" method="POST">
    <div class="wrapper">
        <div class="insert-form">

            <div class="input-fields">
                <div class="heading">search</div>
                <input class="input" type="text" name="search" placeholder="e.g. Customer ID, Store ID, First Name, Last Name, etc..." autofocus />
            </div>
            
            <input class="btn" type="submit" name="submit-search"></button>

        </div>
    </div>	
</form>

<table class="tablesearch">
        <tr>
            <th>staff_id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>address_id</th>
            <th>picture</th>
            <th>email</th>
            <th>store_id</th>
            <th>active</th>
            <th>username</th>
            <th>password</th>
            <th>last_update</th>
        </tr>
        
        <tr>
            <tbody>

            <?php
            include_once '../connect.php';

            function noresults () {
                echo "<div class=\"error\">No Records Found</div>";
            }

            if (ISSET($_POST['submit-search'])) {
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                $sql = "SELECT * FROM customer WHERE 
                staff_id LIKE '%$search%' OR 
                first_name LIKE '%$search%' OR 
                last_name LIKE '%$search%' OR 
                address_id LIKE '%$search%' OR 
                picture LIKE '%$search%' OR 
                email LIKE '%$search%' OR 
                store_id LIKE '%$search%' OR 
                active LIKE '%$search%' OR  
                username LIKE '%$search%' OR
                password LIKE '%$search%';";

                $result = mysqli_query($conn, $sql);
                $resultnum = mysqli_num_rows ($result);

                if ($resultnum > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo '<tr>
                    
                        <td>' . $row["staff_id"] . '</td>
                        <td>' . $row["first_name"] . '</td>
                        <td>' . $row["last_name"] . '</td>
                        <td>' . $row["address_id"] . '</td>
                        <td>' . $row["picture"] . '</td>
                        <td>' . $row["email"] . '</td>
                        <td>' . $row["store_id"] . '</td>
                        <td style=\'text-align: center;\'>' . ($row["active"] ? 'YES' : 'NO') . '</td>
                        <td>' . $row["username"] . '</td>
                        <td>' . $row["password"] . '</td>
                        <td style=\'text-align: center;\'>' . $row["last_update"] . '</td>
                    
                        </tr>';
                    }
                    echo "</table>";
                 } else {
                    noresults();
                }
            }
            ?>
            
            </tbody>
        </tr>
    </table>
</body>
</html>