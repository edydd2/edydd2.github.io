<!DOCTYPE html>
<html>


<head>
    <link rel = "stylesheet" href = "../stylesheets/topnavbar.css">
    <link rel = "stylesheet" href = "../stylesheets/tables.css">
</head>

<header>
    <div class="container">
      <nav>
        <ul>
          <li><a href="../index.html">home</a></li>
          <li><a href="searchform.php">search</a></li>
          <li><a href="insertform.php">insert</a></li>
          <li><a href="updateform.php">update</a></li>
          <li><a href="deleteform.php">delete</a></li>
        </ul>
      </nav>
    </div>
</header>

<body>

    <div class="tabletitle">address</div>

    <table>
        <tr>
            <th>address_id</th>
            <th>address</th>
            <th>address2</th>
            <th>district</th>
            <th>city_id</th>
            <th>postal_code</th>
            <th>phone</th>
            <th>last_update</th>
        </tr>
        
        <tr>
            <tbody>

            <?php
            include_once '../connect.php';

            $sql = "SELECT * FROM address;";
            $result = mysqli_query ($conn, $sql);
            $resultnum = mysqli_num_rows ($result);

            if ($resultnum > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                    
                    <td>' . $row["address_id"] . '</td>
                    <td>' . $row["address"] . '</td>
                    <td>' . $row["address2"] . '</td>
                    <td>' . $row["district"] . '</td>
                    <td>' . $row["city_id"] . '</td>
                    <td>' . $row["postal_code"] . '</td>
                    <td>' . $row["phone"] . '</td>
                    <td style=\'text-align: center;\'>' . $row["last_update"] . '</td>
                    
                    </tr>';
                }
                echo "</table>";
            } else {
                echo "0 results found";
            }
            ?>
            
            </tbody>
        </tr>
    </table>
</body>
</html>