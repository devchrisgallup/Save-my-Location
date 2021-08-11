<?php 
// set up database connection "localhost","my_user","my_password","my_db"
$db_conx = mysqli_connect("localhost", "root", "", "location");
    // Check connection
    if(mysqli_connect_error()) {
            echo mysqli_connect_error();
            exit();
    } 

    // if nameofspot input field was set
    // Save Name of location, Latitude(l) and Longitude(g) into database
    if (isset($_POST["nameofspot"])) {
        $nameofspot = addslashes($_POST["nameofspot"]); 
        $l = addslashes($_POST["l"]);
        $g = addslashes($_POST["g"]);
        
        $sqlInsertnameofspot = "INSERT INTO gps (nameofspot,l,g)
                    VALUES ('$nameofspot','$l','$g')";
            if ($db_conx->query($sqlInsertnameofspot)) {
                header("Refresh:0");
            } else {
                echo "Error: " . $sqlInsertnameofspot . "<br>" . $db_conx->error;
            }
    }

    $sql = "SELECT * FROM gps"; 
    $result = $db_conx->query($sql); 
    // Display name of location, Latitude(l) and Longitude(g) from database
    if ($result->num_rows > 0) {
            // output data of each row
            echo "<div id='output'>";
            echo "<ul>";
            while($row = $result->fetch_assoc()) {
                echo "<li>";
                echo "<button class='getdata' onclick='getLocationDB()' value=" ."'". $row["l"] . "," .$row["g"] ."'" . ">Go To </button>";
                echo $row["nameofspot"];
                echo "</li>\n";
                }
            } else {
                echo "You do not have any locations saved"; 
            }
            echo "</ul>";
            echo "</div>";
// close database connection
$db_conx->close();


?>