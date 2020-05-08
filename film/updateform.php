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
    <div class="wrapper" style="margin-top: 8%; margin-bottom: 50px">
        <div class="insert-form">

            <div class="input-fields">
                <div class="heading">update</div>
                
                <input class="input" type="number" name="filmid" placeholder="Select A Film ID To Update" autofocus required />

                <input class="input" type="number" name="newfilmid" placeholder="Film ID" required />
                
                <input class="input" type="text" name="title" placeholder="Title" required
                oninput="let p = this.selectionStart; this.value = this.value.toUpperCase();this.setSelectionRange(p, p)" />
                
                <input class="input" type="text" name="description" placeholder="Description" required />

                <input class="input" type="number" name="releaseyear" placeholder="Release Year" required />

                <input class="input" type="number" name="languageid" placeholder="Language ID" required />

                <input class="input" type="number" name="originallanguageid" placeholder="Original Language ID" />

                <input class="input" type="number" name="rentalduration" placeholder="Rental Duration" required />
                
                <input class="input" type="number" name="rentalrate" placeholder="Rental Rate" required />

                <input class="input" type="number" name="length" placeholder="Film Length" required />

                <input class="input" type="number" name="replacementcost" placeholder="Replacement Cost" required />

                <input class="input" type="text" name="rating" placeholder="Rating" readonly />
                <div class="checkbox">
                    <span><input type="radio" name="rating" value="G" />G</span>

                    <span><input type="radio" name="rating" value="PG" />PG</span>

                    <span><input type="radio" name="rating" value="PG-13" />PG-13</span>

                    <span><input type="radio" name="rating" value="R" />R</span>

                    <span><input type="radio" name="rating" value="NC-17" />NC-17</span>
                </div>

                <input class="input" type="text" name="specialfeatures" placeholder="Special Features" readonly />
                <div class="checkbox">
                    <span><input type="checkbox" name="specialfeatures[]" value="Trailers" />Trailers</span>

                    <span><input type="checkbox" name="specialfeatures[]" value="Commentaries" />Commentaries</span>

                    <span><input type="checkbox" name="specialfeatures[]" value="Deleted Scenes" />Deleted Scenes</span>

                    <span><input type="checkbox" name="specialfeatures[]" value="Behind the Scenes" />Behind the Scenes</span>
                </div>
                <div class="input" id="txt"></div>
            </div>
            
            <input class="btn" type="submit" name="update"></button>

        </div>
    </div>	
</form>

<?php
include_once '../connect.php';

if (ISSET($_POST['update'])) {
    $filmid = $_POST['filmid'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $releaseyear = $_POST['releaseyear'];
    $languageid = $_POST['languageid'];
    $originallanguageid = $_POST['originallanguageid'];
    $rentalduration = $_POST['rentalduration'];
    $rentalrate = $_POST['rentalrate'];
    $length = $_POST['length'];
    $replacementcost = $_POST['replacementcost'];
    $rating = $_POST['rating'];
    $SFarray = $_POST['specialfeatures[]'];
    $specialfeatures = implode(",", $SFarray);

    $sql = "UPDATE film SET film_id='$filmid', title='$title', description='$description', release_year='$releaseyear', 
                            original_language_id='$originallanguageid', rental_duration='$rentalduration', rental_rate='$rentalrate', 
                            length='$length', replacement_cost='$replacementcost', rating='$rating', 
                            special_features='$specialfeatures',  last_update=now()
            WHERE film_id='$newfilmid';"; 
    
    mysqli_query($conn, $sql);

    header("Location: index.php");
}
?>

</body>
</html>

