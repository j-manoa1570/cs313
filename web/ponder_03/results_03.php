<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="/ponder_02/cs313styles.css">
        <link rel="stylesheet" href="ponder_03.css">
    </head>
    <body class="survey_bg">

        <!-- Header for navigation -->
        <header id="headerround">
                    <center>
            <div class="dropdown">
                <button class="dropbtn">Profile</button>
                <div class="dropdown-content">
                    <a href="/ponder_02/home.html">Homepage</a>
                    <a href="#">About Me</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Assignments</button>
                <div class="dropdown-content">
                    <a href="/ponder_02/assignments.html">Homepage</a>
                    <a href="#">Others</a>
                    <a href="#">Coming Soon</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">DJ/Lighting</button>
                <div class="dropdown-content">
                    <a href="http://www.djandx.com/">DJAndX</a>
                    <a href="#">Island Thunder</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Hammocks/Outdoors</button>
                <div class="dropdown-content">
                    <a href="/ponder_02/assign03/assign03.html">Rexburg Hammocks</a>
                </div>
            </div>
                                </center>
       </header>

        <?php
        
        $read_file = file_get_contents("results.json");
        $data = json_decode($read_file,true);
        
        $_SESSION["Sstarwars"]=$_POST["starwars"];
        $_SESSION["Sgame"]=$_POST["game"];
        $_SESSION["Scomics"]=$_POST["comics"];
        $_SESSION["Scake"]=$_POST["cake"];
        $_SESSION["Sprogram"]=$_POST["program"];
        
        if($_SESSION["Sstarwars"] == "Star Wars")
            $data[0]++;
        else if($_SESSION["Sstarwars"] == "Star Trek")
            $data[1]++;
        
        if($_SESSION["Sgame"] == "Dungeon & Dragons")
            $data[2]++;
        else if($_SESSION["Sgame"] == "Pathfinder")
            $data[3]++;
        else if($_SESSION["Sgame"] == "Magic: The Gathering")
            $data[4]++;
        else if($_SESSION["Sgame"] == "Warhammer")
            $data[5]++;
        else if($_SESSION["Sgame"] == "Other")
            $data[6]++;
        
        if($_SESSION["Scomics"] == "DC")
            $data[7]++;
        else if($_SESSION["Scomics"] == "Marvel")
            $data[8]++;
        else if($_SESSION["Scomics"] == "Dark Horse")
            $data[9]++;
        else if($_SESSION["Scomics"] == "Other")
            $data[10]++;
        
        if($_SESSION["Scake"] == "Yes")
            $data[12]++;
        else if($_SESSION["Scake"] == "No")
            $data[13]++;
        
        if($_SESSION["Sprogram"] == "C/C++")
            $data[14]++;
        else if($_SESSION["Sprogram"] == "Java")
            $data[15]++;
        else if($_SESSION["Sprogram"] == "eLisp")
            $data[16]++;
        else if($_SESSION["Sprogram"] == "Python")
            $data[17]++;
        else if($_SESSION["Sprogram"] == "Other")
            $data[18]++;
        
        $update = json_encode($data);
            
        if (file_put_contents("results.json", $update)) {
            //header('Location: ' . '/assignments/ponder_03/results_03.php');    
        }
        else {
            echo "There was a problem with the survey. Please go back and try again!";
        }
        
        ?>
        <br/>
        <div id="standard">
            <p>Star Wars or Star Trek</p>
            <p>Star Wars: <?php echo $data[0]; ?></p>
            <p>Star Trek: <?php echo $data[1]; ?></p>
            <hr>
            
            <p>RPG/Tabletop game</p>
            <p>Dungeons & Dragons: <?php echo $data[2]; ?></p>
            <p>Pathfinder: <?php echo $data[3]; ?></p>
            <p>Magic: The Gathering: <?php echo $data[4]; ?></p>
            <p>Warhammer: <?php echo $data[5]; ?></p>
            <p>Other: <?php echo $data[6]; ?></p>
            <hr>
            
            <p>Comic Book Company</p>
            <p>DC: <?php echo $data[7]; ?></p>
            <p>Marvel: <?php echo $data[8]; ?></p>
            <p>Dark Horse: <?php echo $data[9]; ?></p>
            <p>Other: <?php echo $data[10]; ?></p>
            <hr>

            <p>Is the cake a lie?</p>
            <p>Yes: <?php echo $data[11]; ?></p>
            <p>No: <?php echo $data[12]; ?></p>
            <hr>
            
            <p>Programming Language</p>
            <p>C/C++: <?php echo $data[13]; ?></p>
            <p>Java: <?php echo $data[14]; ?></p>
            <p>eLisp: <?php echo $data[15]; ?></p>
            <p>Python: <?php echo $data[16]; ?></p>
            <p>Other: <?php echo $data[17]; ?></p>
            <hr>
            
        </div>
    
        <br/>
    </body>
</html>