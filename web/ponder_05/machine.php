<?php
require "heroku_access.php";
$db = get_db();


?>


<!--
The general format of the php to postgresql is taken from the instructor's solution from Week 04 Team Activity. I have modified it to fit my application so that my tables would function.
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
 
            <!-- For now, this side will display the user profile. For a future version, this will be most likely for user selection and group selection. -->
            
            <div id="side">
                <div id="containercol">
                    <?php
                        
                    $username = $_POST['username'];
                    $password = $_POST['password'];        
//                   if ($choice == null)
//                        $choice = 1;
                        
                    $user_id = $db->prepare("SELECT id FROM player WHERE username=$username AND password=$password");
                    $user_id->execute();
                    $choice = $choice[id];
                    $statement = $db->prepare("SELECT fname, lname, bio FROM profile WHERE player_id=$choice");
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
                
                <!-- This will contain the conversation text as well as the input field for text below it. -->
                
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
                    <form action="" method="post">
                        <textarea rows="5" name="instant_message" style="width: 100%">Type here!</textarea>
                        <input type="submit">
                    </form>
                </div>
            </div>
            
            <!-- For now, this is an empty field because I do not know what else should go here -->
            
            <div id="side">
                <p>This is stuff on the right side of the page</p>
            </div>
        </div>
    </body>
</html>