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
                <input class="input" type="text" name="search" placeholder="e.g. City ID, City, Country ID" autofocus />
            </div>
            
            <input class="btn" type="submit" name="submit-search"></button>

        </div>
    </div>	
</form>

<table class="tablesearch">
        <tr>
            <th>city_id</th>
            <th>city</th>
            <th>country_id</th>
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
                $sql = "SELECT * FROM city WHERE 
                city_id LIKE '%$search%' OR 
                city LIKE '%$search%' OR 
                countryid LIKE '%$search%';";

                $result = mysqli_query($conn, $sql);
                $resultnum = mysqli_num_rows ($result);

                if ($resultnum > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo '<tr>
                    
                        <td>' . $row["city_id"] . '</td>
                        <td>' . $row["city"] . '</td>
                        <td>' . $row["country_id"] . '</td>
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