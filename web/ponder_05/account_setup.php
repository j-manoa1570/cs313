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
            <form action="account_creation.php" id="accountSetup" method="post">
                <input type="text" id="new_user" name="new_user" placeholder="Username">
                <label for="new_user">Username</label>
                <br /><br />

                <input type="password" id="new_pass" name="new_pass" placeholder="Password">
                <label for="new_pass">Password</label>
                <br /><br />

                <input type="submit" value="Create Account" />
                </form>
                <br/>
                <hr/>
        </div>
        </div>
    </body>
</html>

