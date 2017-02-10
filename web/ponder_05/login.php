<?php
session_start();
?>



<!-- Login page in order to access user account -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" href="http://img02.deviantart.net/5f38/i/2003/40/6/3/welcome_to_the_machine.jpg">
        <title>Welcome to Machine!</title>
    </head>
    <body>
        <div>
            <p>Welcome to Machine! Your one stop for increased productivity!</p>
            <form action="machine.php" method="post"><p>Username:
            <input type="text" name="username">
                <br/>
                Password:
            <input type="text" name="password">
            <br/>
                <input type="submit" value="submit"></p>
            </form>
        </div>
    </body>
</html>