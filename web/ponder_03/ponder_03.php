<?php 
session_start();
if ($_SESSION["taken"] == "done")
{
    $results = "/web/ponder_03/results_03.php";
    header('Location: '. $results);
}
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

        <br/>
        
        <!-- Introduction Text to survey -->
        <div id="standard">
            <p>Let's be honest, we all fall within the Computer Science realm which means we all have a bit of nerdiness in our lives. This survey is to find out about our nerdiness</p>
        </div>
        <br/>
        
        <!-- Survey Questions -->
        <div id="standard">
            <form action="results_03.php" method="post">
                <p>First question: Star Wars or Star Trek?</p>
                <input type="radio" name="starwars" value="Star Wars">Star Wars
                <input type="radio" name="starwars" value="Star Trek">Star Trek
                <hr>
                
                <p>What is your favorite RPG/Tabletop game?</p>
                <input type="radio" name="game" value="Dungeons & Dragons">Dungeons & Dragons
                <input type="radio" name="game" value="Pathfinder">Pathfinder
                <input type="radio" name="game" value="Magic: The Gathering">Magic: The Gathering
                <input type="radio" name="game" value="Warhammer">Warhammer
                <input type="radio" name="game" value="Other">Other
                <hr>
                
                <p>Comic book company?</p>
                <input type="radio" name="comics" value="DC">DC
                <input type="radio" name="comics" value="Marvel">Marvel
                <input type="radio" name="comics" value="Dark Marvel">Dark Horse
                <input type="radio" name="comics" value="Other">Other
                <hr>
                
                <p>Is the cake a lie?</p>
                <input type="radio" name="cake" value="Yes">Yes
                <input type="radio" name="cake" value="No">No
                <hr>
                
                <p>Programming Language?</p>
                <input type="radio" name="program" value="C/C++">C/C++
                <input type="radio" name="program" value="Java">Java
                <input type="radio" name="program" value="eLisp">eLisp
                <input type="radio" name="program" value="Python">Python
                <input type="radio" name="program" value="Other">Other
                <hr>
                <br/>
                <input type="submit"> 
            </form>
        </div>
    </body>
</html>