<?php
session_start();
require("heroku_access.php");
$db = get_db();

$fname = $_POST['new_fname'];
$lname = $_POST['new_lname'];
$title = $_POST['new_title'];
$email = $_POST['new_email'];
$bio = $_POST['new_bio'];


if (!isset($fname) && $fname == "" && !isset($lname) && $lname == "" && !isset($title) && $title == "" && !isset($email) && $email == "" && !isset($bio) && $bio == "")
{
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location: machine.php");
    die();
}
else {
    if (isset($fname) && $fname != "")
    {
        $query = 'INSERT INTO profile(fname) VALUES(:fname) WHERE profile_id = 1';
        $new = $db->prepare($query);
        $new->bindValue(':fname', $fname);
        $new->execute();
    }

    if (isset($lname) && $lname != "")
    {
        $query = 'INSERT INTO profile(lname) VALUES(:lname) WHERE profile_id = 1';
        $new = $db->prepare($query);
        $new->bindValue(':lname', $lname);
        $new->execute();
    }
*/
    try 
    {
        if (isset($title) && $title != "")
        {
            $query = 'update profile set title= :title where player_id = 1';
            $new = $db->prepare($query);
            $new->bindValue(':title', $title);
            $new->execute();
        }
    }
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}

    if (isset($email) && $email != "")
    {
        $query = 'INSERT INTO profile(email) VALUES(:email) WHERE profile_id = 1';
        $new = $db->prepare($query);
        $new->bindValue(':email', $email);
        $new->execute();
    }

    if (isset($bio) && $bio != "")
    {
        $query = 'INSERT INTO profile(bio) VALUES(:bio) WHERE profile_id = 1';
        $new = $db->prepare($query);
        $new->bindValue(':bio', $bio);
        $new->execute();
    }
}

header("Location: machine.php");
die();

?>