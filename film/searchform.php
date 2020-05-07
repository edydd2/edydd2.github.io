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
                <input class="input" type="text" name="search" placeholder="e.g. Film ID, Film Title, Description, Release Year, etc..." autofocus />
            </div>
            
            <input class="btn" type="submit" name="submit-search"></button>

        </div>
    </div>	
</form>

<table class="tablesearch">
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

            function noresults () {
                echo "<div class=\"error\">No Records Found</div>";
            }

            if (ISSET($_POST['submit-search'])) {
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                $sql = "SELECT * FROM film WHERE 
                film_id LIKE '%$search%' OR 
                title LIKE '%$search%' OR 
                description LIKE '%$search%' OR
                release_year LIKE '%$search%' OR 
                language_id LIKE '%$search%' OR 
                original_language_id LIKE '%$search%' OR
                rental_duration LIKE '%$search%' OR  
                rental_rate LIKE '%$search%' OR  
                length LIKE '%$search%' OR
                replacement_cost LIKE '%$search%' OR
                rating LIKE '%$search%' OR  
                special_features LIKE '%$search%';";

                $result = mysqli_query($conn, $sql);
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
                    noresults();
                }
            }
            ?>
            
            </tbody>
        </tr>
    </table>
</body>
</html>