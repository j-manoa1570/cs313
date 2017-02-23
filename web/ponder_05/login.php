<?php

// Begin session for using the app with first checking for if user is still logged in
session_start();

$badLogin = false;

// First check to see if we have post variables, if not, just
// continue on as always.
try
{
    if (isset($_POST['loginname']) && isset($_POST['loginpass']))
    {
	// they have submitted a username and password for us to check
        $username = $_POST['loginname'];
        $password = $_POST['loginpass'];
    
	// Connect to the DB
        require("heroku_access.php");
        $db = get_db();
        $query = 'SELECT password FROM login WHERE username=:username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $result = $statement->execute();
        if ($result)
        {
            $row = $statement->fetch();
            $hashedPasswordFromDB = $row['password'];
        
            try{
		// now check to see if the hashed password matches
                if (password_verify($password, $hashedPasswordFromDB))
                {
			// password was correct, put the user on the session, and redirect to home
                    $_SESSION['username'] = $username;
                    header("Location: machine.php");
                    die(); // we always include a die after redirects.
                }
                else
                {
                    $badLogin = true;
                }
            }
            catch (Exception $ex)
            {
	// Please be aware that you don't want to output the Exception message in
	// a production environment
                echo "Error with 'password_verify()' on line 32 Details: $ex";
                die();
            }
        }
        else
        {
            $badLogin = true;
        }
    }
}
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with if statement on line 12 Details: $ex";
	die();
}
// If we get to this point without having redirected, then it means they
// should just see the login form.
?>



<!-- Login page in order to access user account -->


<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="ponder_05.css">
        <link rel="stylesheet" href="login.css">
        <link rel="icon" href="welcome_to_the_machine.png">
        <title>Welcome to Machine!</title>
    </head>
    <body>
        
        <!-- Header stuff -->
        
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
        
        <br/>
        
        
        <!-- Error is displayed if login does not work -->
        
        <?php
        if ($badLogin)
        {
            echo "Incorrect username or password!<br /><br />\n";
        }
        ?>

        <!-- This is the login credentials page to login. Option for creating a new account is also available. -->
        
        <div id="standard2">
            <div id="center">
                <p>Welcome to Machine! Your one stop for increased productivity!</p>
                <form action="login.php" method="post">
                    <p>Username:
                        <input type="text" name="loginname">
                        <br/>
                        Password:
                        <input type="password" name="loginpass">
                    </p>
                    <input type="submit">
                </form>
                <hr/>
                <p>Don't have an account? Create one <a href="account_setup.php">here</a>.</p>
            </div>
        </div>
    </body>
</html>