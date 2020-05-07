<!DOCTYPE html>
<html>
<head>
    <title>Delete Form</title>
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
          <li><a href="index.php">back</a></li>
        </ul>
      </nav>
    </div>
</header>

<body>

    <div class="tabletitle">category</div>
    <table>
        <tr>
            <th>category_id</th>
            <th>category</th>
            <th>last_update</th>
            <th>select</th>
        </tr>
        
        <tr>
            <tbody>
            <?php
            include_once '../connect.php';

            $sql = "SELECT * FROM category;";
            $result = mysqli_query($conn, $sql);
            $resultnum = mysqli_num_rows($result);

            if ($resultnum > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>

                        <td>' . $row["category_id"] . '</td>
                        <td>' . $row["category"] . '</td>
                        <td style=\'text-align: center;\'>' . $row["last_update"] . '</td>

                        <td style=\'text-align: center;\'>
                            <a style=\'text-align: center;text-decoration: none;color: #9b0000;\' href=delete.php?categoryid=' . $row["category_id"] . '>DELETE</a>' .
                        '</td>

                    </tr>';
                }
                echo '</table>';
            }else{
                echo "0 results found";
            }
            ?>
            </tbody>
        </tr>
    </table>
</body>
</html>
