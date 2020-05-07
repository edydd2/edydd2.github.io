<!DOCTYPE html>
<html>
<head>
    <title>Insert Form</title>
    <link rel="stylesheet" href="../stylesheets/topnavbar.css">
    <link rel="stylesheet" href="../stylesheets/forms.css">
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
    <div class="wrapper">
        <div class="insert-form">

            <div class="input-fields">
                <div class="heading">insert</div>

                <input class="input" type="number" name="filmid" placeholder="Film ID" autofocus required />
            
                <input class="input" type="text" name="title" placeholder="Film Title" required />
                
                <input class="input" type="text" name="description" placeholder="Description" required />
            </div>
            
            <input class="btn" type="submit" name="insert"></button>

        </div>
    </div>	
</form>

<?php
include_once '../connect.php';

if (ISSET($_POST['insert'])) {
    $filmid = $_POST['filmid'];
    $title = $_POST['title'];
    $description = $_POST['description'];

   $sql = "INSERT INTO film_text (film_id, title, description) 
            VALUES ('$filmid', '$title', $description);";

    mysqli_query($conn, $sql);

    header("Location: index.php");
}
?>

</body>
</html>