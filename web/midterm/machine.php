<?php
require "heroku_access.php";
$db = get_db();
session_start();

// Username is saved into the session array variable so it can be accessed later on
$username = $_SESSION['username'];
                    
// Prepare to receive id from data base so we can assign it to the session array variable
$query = 'SELECT id FROM player WHERE username= :username';
$user_id = $db->prepare($query);
$user_id->bindValue(':username', $username);

// SQL command is executed and query information is retrieved and then assigned to session
$user_id->execute();
$row = $user_id->fetch(PDO::FETCH_ASSOC);
$user_id->closeCursor();

$_SESSION['id'] = $row['id'];

?>

<!--
Originally the PHP that was used for this page was the php that was found in the instructor solution in Week 05 Team Activity but was changed once it was found that it was not sufficient for my needs. Received help on writing PHP from Seth Childers who received help from another student taking a database class using MySQL.
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="ponder_05.css">
        <link rel="stylesheet" href="login.css">
        <link rel="icon" href="welcome_to_the_machine.png">
        <title>Machine</title>
    </head>
    <body>
        <div class="containerrow">
 
            <!-- For now, this side will display the user profile. For a future version, this will be most likely for user selection and group selection. -->
            
            <div id="side">
                <div id="containercol">
                    <?php
                    
                    // Requests from the data base the user profile information
                    $query = 'SELECT fname, lname, title, email, bio FROM profile WHERE player_id= :id';
                    $user_profile = $db->prepare($query);
                    $user_profile->bindValue(':id', $_SESSION['id']);
                    $user_profile->execute();
                    $row_profile = $user_profile->fetch(PDO::FETCH_ASSOC);
                    $user_profile->closeCursor();
                    
                    // 5) All of the retrieved data is outputted to the screen for the player.
                    echo '<p><strong>' . 'Name:</strong> ' . $row_profile['fname'] . ' ' . $row_profile['lname'] . '</p>';
                    echo '<p><strong>' . 'Title:</strong> ' . $row_profile['title'] . '</p>';
                    echo '<p><strong>' . 'Email:</strong> ' . $row_profile['email'] . '</p>';
                    echo '<p><strong>' . 'Biography:</strong> ' . $row_profile['bio'] . '</p>'; 
                    ?>
                    <div class="button">
                        <a href="profile_update.php">Update Profile</a>
                    </div>
                </div>
            </div>
            <div class="containercol">
                
                <!-- This will contain the conversation text as well as the input field for text below it. -->
                
                <div id="standard">
                    <div id="standardtext">
                        
                        
                        <!-- PHP is used to generate the information for the messages from the database.
                             Currently the messaging information that is pulled from the database are in
                             a column so the message that is sent replaces the last message that is found
                             in the data base. This can be resolved through the use of JSON but I do not 
                             currently possess the knowledge to make this possible with JSON so the last 
                             message sent will have to due. Also, it does not connect with other users -->
                        
                        <?php

                        // Requests from the data base 'dcon' which is a column that stores the last message sent
                        $id = $row['id'];
                        $query = 'SELECT dcon FROM conversation WHERE player_id= :id';
                        $user_profile = $db->prepare($query);
                        $user_profile->bindValue(':id', $_SESSION['id']);
                        $user_profile->execute();
                        $row_conversation = $user_profile->fetch(PDO::FETCH_ASSOC);
                        $user_profile->closeCursor();
                       
                        //All of the retrieved data is outputted to the screen for the player.
                        //echo '<p>Your messages display below:</p>';
                        echo '<p id="messages">' . $row_conversation['dcon'] . '</p>';
                        ?>
                    </div>
                    <br>
                    
                    <!-- This will be used for submitting more instant messages -->
                    <form action="message.php" method="post">
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