<?php
session_start();
?>



<!-- Login page in order to access user account -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" href="welcome_to_the_machine.png">
        <title>Welcome to Machine!</title>
    </head>
    <body>
        <div>
            <p>Welcome to Machine! Your one stop for increased productivity!</p>
            <form action="machine.php" method="post">
                <p>Username:
            <input type="text" name="username">
                <br/>
                Password:
            <input type="password" name="password">
            <br/>
                <input type="submit" value="submit"></p>
            </form>
        </div>
    </body>
</html>