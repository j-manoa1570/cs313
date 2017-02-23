<?php
session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="ponder_05.css"> 
        <link rel="stylesheet" href="login.css">
        <link rel="icon" href="welcome_to_the_machine.png">
        <title>Update Profile</title>
        
    </head>
    
    <body>
        
        
        
        <header id="headerround">
            <div class="dropdown">
                <button class="dropbtn">Profile</button>
                <div class="dropdown-content">
                    <a href="../prove02/home.html">Homepage</a>
                    <a href="#">About Me</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Assignments</button>
                <div class="dropdown-content">
                    <a href="../prove02/assignments.html">Homepage</a>
                    <a href="../ponder_03/ponder_03.php">Survey</a>
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
                    <a href="../ponder_02/assign03/assign03.html">Rexburg Hammocks</a>
                </div>
            </div>
       </header>
        
        
        <!-- This is the form that is used to update the user's profile. -->

        
        <div id="standard2">
            <div id="center">
                <form action="update.php" method="post">
                    <p>Profile Picture:
                        <input type="text" name="new_picture">
                        <br/>
                        First Name:
                        <input type="text" name="new_fname">
                        <br/>
                        Last Name:
                        <input type="text" name="new_lname">
                        <br/>
                        Title:
                        <input type="text" name="new_title">
                        <br/>
                        Email:
                        <input type="text" name="new_email">
                        <br/>
                        Bio:
                        <textarea rows="4" cols="50" name="new_bio">Enter your biography</textarea>
                    </p>
                    <input type="submit">
                </form>
            </div>
        </div>
    </body>
    
</html>