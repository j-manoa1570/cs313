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
        <link rel="icon" href="welcome_to_the_machine.png">
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

                    
                    $user_id = $db->prepare("SELECT id FROM player WHERE username= :username AND password= :password");
                    $user_id->bindValue(':username', $username);
                    $user_id->bindvalue(':password', $password);
                    // do a bind value for the password as well
                    $user_id->execute();
                    $row = $user_id->fetch(PDO::FETCH_ASSOC);
                  /*  while ($row = $user_id->fetch(PDO::FETCH_ASSOC))
                    {
                            // The variable "row" now holds the complete record for that
                            // row, and we can access the different values based on their
                            // name
                        echo '<p>' . $row['username'] . ' ' . $row['password'];
                        echo '<p>' . $row['bio'] . '</p>';
                    }  */  
                    
                    $user_id->closeCursor();
                    
                    $id = $row['id'];
                    
                    $user_profile = $db->prepare("SELECT fname, lname, location, email, bio, title, phone FROM profile where player_id= :id");
                    $user_profile->bindValue(' :id', $id);
                    $user_profile->execute();
                    $row_profile = $user_profile->fetch(PDO::FETCH_ASSOC);
                    $user_profile->closeCursor();
                    
                    echo '<p>' . $row_profile['fname'] . ' ' . $row_profile['lname'];
                    ?>
                </div>
            </div>
            <div class="containercol">
                
                <!-- This will contain the conversation text as well as the input field for text below it. -->
                
                <div id="standard">
                    <div id="standardtext">
                        <?php
                        
//                        $statement = $db->prepare("SELECT communication, player_id FROM conversation");
//                        $statement->execute();
                        // Go through each result
                        /*while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                        {
                            // The variable "row" now holds the complete record for that
                            // row, and we can access the different values based on their
                            // name
                            echo '<p>';
                            echo $row['communication'];
                            echo '</p>';
                        }*/
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