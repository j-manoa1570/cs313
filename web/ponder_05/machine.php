<?php
require "heroku_access.php";
$db = get_db();
?>


<!--
Some parts of the php is not what I created. It is taken from the instructor file for accessing a database from the Week 05 Team Activity.

-->
<!DOCTYPE html>
<html lang="en">
    <head>
<!--        <link rel="stylesheet" href="ponder_05.css"> -->
        <link rel="icon" href="http://img02.deviantart.net/5f38/i/2003/40/6/3/welcome_to_the_machine.jpg">
        <title>Machine</title>
    </head>
    <body>
        <div class="containerrow">
            <div id="side">
                <div id="containercol">
                    <?php
                        
                        $choice = $_POST['selection'];
                        if ($choice == null)
                            $choice = 1;
                    
                        $statement = $db->prepare("SELECT fname, lname, bio FROM profile WHERE id=$choice");
                        $statement->execute();
                        // Go through each result
                        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                        {
                            // The variable "row" now holds the complete record for that
                            // row, and we can access the different values based on their
                            // name
                            echo '<p>' . $row['fname'] . ' ' . $row['lname'];
                            echo '<p>' . $row['bio'] . '</p>';
                        }
                        ?>
                </div>
            </div>
                <div class="containercol">
                    <div id="standard">
                    <div id="standardtext">
                        <?php
                        
                        $statement = $db->prepare("SELECT communication, player_id FROM conversation");
                        $statement->execute();
                        // Go through each result
                        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                        {
                            // The variable "row" now holds the complete record for that
                            // row, and we can access the different values based on their
                            // name
                            echo '<p>';
                            echo $row['communication'];
                            echo '</p>';
                        }
                        ?>
                    </div>
                    <br>
                    <textarea rows="5" style="width: 100%">Type here!</textarea>
                </div></div>
            <div id="side">
                <p>This is stuff on the right side of the page</p>
            </div>
            </div>
    </body>
</html>