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
        <link rel="stylesheet" href="ponder_05.css">
        <title>Machine</title>
    </head>
    <body>
        <div class="containerrow">
            <div id="side">
                <div id="containercol">
                    <p>This is profile information for</p><p>(Type 1 for Jonathan and 2 for Seth):</p>
                    <input type="text" name="selection" method="POST">
                    
                    <?php
                    
                        $choice = $_POST['selection'];

                        $statement = $db->prepare("SELECT fname, lname, bio FROM profile WHERE id=$choice");
                        $statement->execute();
                        // Go through each result
                        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                        {
                            // The variable "row" now holds the complete record for that
                            // row, and we can access the different values based on their
                            // name
                            echo '<p>' . $row['fname'] . '</p>';
                            echo '<p>' . $row['lname'] . '</p>';
                            echo '<p>' . $row['bio'] . '</p>';
                        }
                        ?>
                </div>
            </div>
            <div id="standard">
                <div class="containercol">
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
                        
              <!--      <p id="text_color">
                    Admin 4:51:29PM: This is where the conversation text will appear. I think one problem I will run into is that this should actually be a text file but for now it is just stuff in the database.
                </p>
               <!-- <p>
                    Admin 4:52:09PM: Hopefully I will also figure out how to display the text similar to this but better.
                </p> --></div>
                    <br>
                    <textarea rows="5" style="width: 100%">Type here!</textarea>
                </div>
            </div>
            <div id="side">
                <p>This is stuff on the right side of the page</p>
            </div>
        </div>
    </body>
</html>