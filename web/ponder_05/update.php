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
    try {
    if (isset($fname) && $fname != "")
    {
        $query = 'UPDATE profile SET fname= :fname WHERE player_id = 1';
        $new = $db->prepare($query);
        $new->bindValue(':fname', $fname);
        $new->execute();
    }
    }
    catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with 'fname' Details: $ex";
	die();
}

    try {
    if (isset($lname) && $lname != "")
    {
        $query = 'UPDATE profile SET lname= :lname WHERE player_id = 1';
        $new = $db->prepare($query);
        $new->bindValue(':lname', $lname);
        $new->execute();
    }
    }
    catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with 'lname' Details: $ex";
	die();
}
        
    try 
    {
        if (isset($title) && $title != "")
        {
            $query = 'UPDATE profile SET title= :title WHERE player_id = 1';
            $new = $db->prepare($query);
            $new->bindValue(':title', $title);
            $new->execute();
        }
    }
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with 'title' Details: $ex";
	die();
}

    try
    {
    if (isset($email) && $email != "")
    {
        $query = 'UPDATE profile SET email= :email WHERE player_id = 1';
        $new = $db->prepare($query);
        $new->bindValue(':email', $email);
        $new->execute();
    }
    }
    catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with 'email' Details: $ex";
	die();
}

    try
    {
    if (isset($bio) && $bio != "")
    {
        $query = 'UPDATE profile SET bio= :bio WHERE player_id = 1';
        $new = $db->prepare($query);
        $new->bindValue(':bio', $bio);
        $new->execute();
    }
    }
    catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with 'bio' Details: $ex";
	die();
}
}

header("Location: machine.php");
die();

?>