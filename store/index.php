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

    <div class="tabletitle">store</div>

    <table>
        <tr>
            <th>store_id</th>
            <th>manager_staff_id</th>
            <th>address_id</th>
            <th>last_update</th>
        </tr>
        
        <tr>
            <tbody>

            <?php
            include_once '../connect.php';

            $sql = "SELECT * FROM store;";
            $result = mysqli_query ($conn, $sql);
            $resultnum = mysqli_num_rows ($result);

            if ($resultnum > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                    
                    <td>' . $row["store_id"] . '</td>
                    <td>' . $row["manager_staff_id"] . '</td>
                    <td>' . $row["address_id"] . '</td>
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