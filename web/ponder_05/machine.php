<?php
require "heroku_access.php";
$db = get_db();



?>


<!--
Originally the PHP that was used for this page was the php that was found in the instructor solution in Week 05 Team Activity but was changed once it was found that it was not sufficient for my needs. Received help on writing PHP from Seth Childers who received help from another student taking a database class using MySQL.
-->
<!DOCTYPE html>
<html lang="en">
    <head>
      <!--  <link rel="stylesheet" href="ponder_05.css"> -->
        <link rel="icon" href="welcome_to_the_machine.png">
        <title>Machine</title>
    </head>
    <body>
        <div class="containerrow">
 
            <!-- For now, this side will display the user profile. For a future version, this will be most likely for user selection and group selection. -->
            
            <div id="side">
                <div id="containercol">
                    <?php
                    
                    /**************************************************************************
                     * This PHP does a couple of things. 
                     * 1) Grabs user login information from login.php
                     * 2) Prepares to access database
                     * 3) Fetches player id using the username and password as criteria
                     * 4) Fetches player profile information using player id as fk
                     * 5) Outputs the player's profile information 
                     * More detail is below in each of the 5 sections
                     *************************************************************************/
                    
                    // 1) Takes the form information from login.php (username and password that was entered in) 
                    //    and sets it to variables to be used for pinging the database.
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    
                    // 2) Preparing to access the database by declaring what columns are being accessed from
                    //    what table under what conditions. Variables are bound so that we can access data
                    //    from database.
                    $user_id = $db->prepare('SELECT id FROM player WHERE username= :username AND password= :password');
                    $user_id->bindValue(':username', $username);
                    $user_id->bindvalue(':password', $password);
                    
                    // 3) The SQL command is executed, data is fetched, fetched data is assigned to a php
                    //    variable, and SQL database connection is closed.
                    $user_id->execute();
                    $row = $user_id->fetch(PDO::FETCH_ASSOC);
                    $user_id->closeCursor();

                    // 4) This is a combination of steps 2 and 3 but this time to the profile table
                    //    so we can retreive data on the player's profile.
                    $id = $row['id'];
                    $user_profile = $db->prepare('SELECT fname, lname, location, email, bio, title, phone FROM profile WHERE player_id= :id');
                    $user_profile->bindValue(':id', $id);
                    $user_profile->execute();
                    $row_profile = $user_profile->fetch(PDO::FETCH_ASSOC);
                    $user_profile->closeCursor();
                    
                    // 5) All of the retrieved data is outputted to the screen for the player.
                    echo '<p><strong>' . 'Name:</strong> ' . $row_profile['fname'] . ' ' . $row_profile['lname'] . '</p>';
                    echo '<p><strong>' . 'Title:</strong> ' . $row_profile['title'] . '</p>';
                    echo '<p><strong>' . 'Phone:</strong> ' . $row_profile['phone'] . '</p>';
                    echo '<p><strong>' . 'Email:</strong> ' . $row_profile['email'] . '</p>';
                    echo '<p><strong>' . 'Biography:</strong> ' . $row_profile['bio'] . '</p>';
                    ?>
                </div>
            </div>
            <div class="containercol">
                
                <!-- This will contain the conversation text as well as the input field for text below it. -->
                
                <div id="standard">
                    <div id="standardtext">
                        <?php
                        /**************************************************************************
                        * This PHP does a couple of things. 
                        * 1) Grabs user login information from login.php
                        * 2) Prepares to access database
                        * 3) Fetches player id using the username and password as criteria
                        * 4) Fetches player profile information using player id as fk
                        * 5) Outputs the player's profile information 
                        * More detail is below in each of the 5 sections
                        *************************************************************************/
                    
                        // 1) Takes the form information from login.php (username and password that was entered in) 
                        //    and sets it to variables to be used for pinging the database.
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        echo '<p>' . '1' , '</p>';
                        
                        // 2) Preparing to access the database by declaring what columns are being accessed from
                        //    what table under what conditions. Variables are bound so that we can access data
                        //    from database.
                        $user_id = $db->prepare('SELECT id FROM player WHERE username= :username AND password= :password');
                        $user_id->bindValue(':username', $username);
                        $user_id->bindvalue(':password', $password);
                        echo '<p>' . '2' , '</p>';
                    
                        // 3) The SQL command is executed, data is fetched, fetched data is assigned to a php
                        //    variable, and SQL database connection is closed.
                        $user_id->execute();
                        $row = $user_id->fetch(PDO::FETCH_ASSOC);
                        $user_id->closeCursor();
                        echo '<p>' . '3' , '</p>';

                        // 4) This is a combination of steps 2 and 3 but this time to the profile table
                        //    so we can retreive data on the player's profile.
                        $id = $row['id'];
                        echo '<p>' . '3.1' , '</p>';
                        $user_profile = $db->prepare('SELECT communication FROM conversation WHERE player1_id= :id OR play2_id = :id');
                        echo '<p>' . '3.2' , '</p>';
                        $user_profile->bindValue(':id', $id);
                        echo '<p>' . '3.3' , '</p>';
                        $user_profile->execute();
                        echo '<p>' . '3.4' , '</p>';
                        $row_conversation = $user_profile->fetch(PDO::FETCH_ASSOC);
                        echo '<p>' . '3.5' , '</p>';
                        $user_profile->closeCursor();
                        echo '<p>' . '4' , '</p>';
                       
                        // 5) All of the retrieved data is outputted to the screen for the player.
                        echo '<p>' . $row_conversation['communication'] . '</p>';
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