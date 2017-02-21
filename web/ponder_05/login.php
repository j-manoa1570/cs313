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
        
        <div id="standard2">
            <div id="center">
                <p>Welcome to Machine! Your one stop for increased productivity!</p>
                <form action="machine.php" method="post">
                    <p>Username:
                        <input type="text" name="username">
                        <br/>
                        Password:
                        <input type="password" name="password"></p>
                    <div class="button">
                        <a href="machine.php">Sign In</a>
                    </div>
                        <!-- <input type="submit" value="submit"/> -->
                </form>
                <hr/>
                <p>Don't have an account? Create one <a href="account_setup.php">here</a>.</p>
            </div>
        </div>
    </body>
</html>