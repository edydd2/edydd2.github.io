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

    <div class="tabletitle">film</div>

    <table>
        <tr>
            <th>film_id</th>
            <th>title</th>
            <th>description</th>
            <th>release_year</th>
            <th>language_id</th>
            <th>original_language_id</th>
            <th>rental_duration</th>
            <th>rental_rate</th>
            <th>length</th>
            <th>replacement_cost</th>
            <th>rating</th>
            <th>special_features</th>
            <th>last_update</th>
        </tr>
        
        <tr>
            <tbody>

            <?php
            include_once '../connect.php';

            $sql = "SELECT * FROM film;";
            $result = mysqli_query ($conn, $sql);
            $resultnum = mysqli_num_rows ($result);

            if ($resultnum > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                    
                        <td>' . $row["film_id"] . '</td>
                        <td>' . $row["title"] . '</td>
                        <td>' . $row["description"] . '</td>
                        <td>' . $row["release_year"] . '</td>
                        <td>' . $row["language_id"] . '</td>
                        <td>' . $row["original_language_id"] . '</td>
                        <td>' . $row["rental_duration"] . '</td>
                        <td>' . $row["rental_rate"] . '</td>
                        <td>' . $row["length"] . '</td>
                        <td>' . $row["replacement_cost"] . '</td>
                        <td>' . $row["rating"] . '</td>
                        <td>' . $row["special_features"] . '</td>
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