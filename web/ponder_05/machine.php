<?php
require "heroku_access.php";
$db = get_db();
session_start();

$username = $_SESSION['username'];
                    
// 2) Preparing to access the database by declaring what columns are being accessed from
//    what table under what conditions. Variables are bound so that we can access data
//    from database.
$query = 'SELECT id FROM player WHERE username= :username';
$user_id = $db->prepare($query);
$user_id->bindValue(':username', $username);

// 3) The SQL command is executed, data is fetched, fetched data is assigned to a php
//    variable, and SQL database connection is closed.
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
        <!--<link rel="stylesheet" href="ponder_05.css">
        <link rel="stylesheet" href="login.css">-->
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
                     * NOTE: This should really be in a seperate file that contains php functions
                     *       since this is used in a section below again almost line for line.
                     *************************************************************************/
                    
                    // 1) Takes the form information from login.php (username and password that was entered in) 
                    //    and sets it to variables to be used for pinging the database.
                   /* $username = $_SESSION['username'];
                    
                    // 2) Preparing to access the database by declaring what columns are being accessed from
                    //    what table under what conditions. Variables are bound so that we can access data
                    //    from database.
                    $query = 'SELECT id FROM player WHERE username= :username';
                    $user_id = $db->prepare($query);
                    $user_id->bindValue(':username', $username);
                    
                    // 3) The SQL command is executed, data is fetched, fetched data is assigned to a php
                    //    variable, and SQL database connection is closed.
                    $user_id->execute();
                    $row = $user_id->fetch(PDO::FETCH_ASSOC);
                    $user_id->closeCursor();
*/
                    //$id = get_id();
                    
                    // 4) This is a combination of steps 2 and 3 but this time to the profile table
                    //    so we can retreive data on the player's profile.
                    //$id = $row['id'];
                    $query = 'SELECT fname, lname, title, email, bio FROM profile WHERE player_id= :id';
                    $user_profile = $db->prepare($query);
                    $user_profile->bindValue(':id', $_SESSION['id']);
                    $user_profile->execute();
                    $row_profile = $user_profile->fetch(PDO::FETCH_ASSOC);
                    $user_profile->closeCursor();
                    
                    // 5) All of the retrieved data is outputted to the screen for the player.
                    echo '<p><strong>' . 'Name:</strong> ' . $row_profile['fname'] . ' ' . $row_profile['lname'] . '</p>';
                    echo '<p><strong>' . 'Title:</strong> ' . $row_profile['title'] . '</p>';
                    //echo '<p><strong>' . 'Phone:</strong> ' . $row_profile['phone'] . '</p>';
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
                        <?php
                        /**************************************************************************
                        * This PHP does a couple of things. 
                        * 1) Grabs user login information from login.php
                        * 2) Prepares to access database
                        * 3) Fetches player id using the username and password as criteria
                        * 4) Fetches player profile information using player id as fk
                        * 5) Outputs the player's profile information 
                        * More detail is below in each of the 5 sections
                        * NOTE: Part 4 should really be a txt file that it pulls in as it will 
                        *       allow for formatting instead of it being one long string. Not sure
                        *       currently how to do that except to have the php generate a txt file
                        *       that is updated everytime the user pressed the submit button and
                        *       the database stores the txt filename and then echos an <a href="">
                        *       tag, parses through the file, and then displays it out to the user.
                        *************************************************************************/
                    
                        // 1) Takes the form information from login.php (username and password that was entered in) 
                        //    and sets it to variables to be used for pinging the database.
                        $username = $_POST['username'];
                        
                        // 2) Preparing to access the database by declaring what columns are being accessed from
                        //    what table under what conditions. Variables are bound so that we can access data
                        //    from database.
                        $query = 'SELECT id FROM player WHERE username= :username';
                        $user_id = $db->prepare($query);
                        $user_id->bindValue(':username', $username);
                    
                        // 3) The SQL command is executed, data is fetched, fetched data is assigned to a php
                        //    variable, and SQL database connection is closed.
                        $user_id->execute();
                        $row = $user_id->fetch(PDO::FETCH_ASSOC);
                        $user_id->closeCursor();

                        // 4) This is a combination of steps 2 and 3 but this time to the profile table
                        //    so we can retreive data on the player's profile.
                        $id = $row['id'];
                        $query = 'SELECT dcon FROM conversation WHERE player_id= :id';
                        $user_profile = $db->prepare($query);
                        $user_profile->bindValue(':id', $_SESSION['id']);
                        $user_profile->execute();
                        $row_conversation = $user_profile->fetch(PDO::FETCH_ASSOC);
                        $user_profile->closeCursor();
                       
                        // 5) All of the retrieved data is outputted to the screen for the player.
                        echo '<p>' . $row_conversation['communication'] . '</p>';
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