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

    <div class="tabletitle">film_text</div>

    <table>
        <tr>
            <th>film_id</th>
            <th>title</th>
            <th>description</th>
        </tr>
        
        <tr>
            <tbody>

            <?php
            include_once '../connect.php';

            $sql = "SELECT * FROM film_text;";
            $result = mysqli_query ($conn, $sql);
            $resultnum = mysqli_num_rows ($result);

            if ($resultnum > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                    
                    <td>' . $row["film_id"] . '</td>
                    <td>' . $row["title"] . '</td>
                    <td>' . $row["description"] . '</td>
                    
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