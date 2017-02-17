<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="login.css">
        <link rel="stylesheet" href="ponder_05.css">
        <link rel="icon" href="welcome_to_the_machine.png">
        <title>Machine Sign Up</title>
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
        
        
        <!-- Signup Page -->
        <div id="standard2">
            <div id="center">
            <p>In order to create an account, we need a little bit of information:</p>
            <form action="" method="post">
                <p>Username:
                    <input type="text" name="new_user">
                    <br/>
                    Password:
                    <input type="password" name="new_pass">
                    <br/>
                    Confirm Password:
                    <input type="password" name="confirm"></p>
                    <div class="button">
 //                       <a href="">Create Account</a>
                    </div>
                <input type="submit" value="submit">
            </form>
                <br/>
                <hr/>
        </div>
        </div>
    </body>
</html>

<?php
$password = $_POST['new_pass'];
$username = $_POST['new_user'];
// if username or password are empty, then redirect back to signup page
If (!isset($username) || $username = "" || !isset($password) || $password = "")
{
	header("Location: account_setup.php");
	die();
}
require("heroku_access.php"); // connect to database
$db = get_db();


$passwordHash = password_hash($password, PASSWORD_DEFAULT);
try {
	$newuserSQL = 'INSERT INTO player (username, password) VALUES (:username, :password)';
	$statement = $db->prepare($newuserSQL);
	$statement->bindValue(':username', $username);
	$statement->bindValue(':password', $passwordHash);
	$statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
	$statement->closeCursor();
} catch (PDOException $e) {
	// If the username and password are not inserted correctly, throw error message
	$error_message = $e->getMessage();
	Echo "<p>Database error: $error_message </p>";
}
header("Location: login.html");
die();
?>