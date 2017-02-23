<?php
session_start();
require("heroku_access.php");
$db = get_db();

$fname = $_POST['new_fname'];
$lname = $_POST['new_lname'];
$title = $_POST['new_title'];
$email = $_POST['new_email'];
$bio = $_POST['new_bio'];
$id = $_SESSION['id'];

/*******************************************
 * This php will update the datebase (or at
 * least it is supposed to).
 ******************************************/


if (!isset($fname) && $fname == "" && !isset($lname) && $lname == "" && !isset($title) && $title == "" && !isset($email) && $email == "" && !isset($bio) && $bio == "")
{
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("Location: machine.php");
    die();
}
else 
{
    if (isset($fname) && $fname != "")
    {
        $query = 'UPDATE profile SET fname= :fname WHERE player_id = :id';
        $new = $db->prepare($query);
        $new->bindValue(':fname', $fname);
        $new->bindValue(':id', $ide);
        $new->execute();
    }
    
    if (isset($lname) && $lname != "")
    {
        $query = 'UPDATE profile SET lname= :lname WHERE player_id = :id';
        $new = $db->prepare($query);
        $new->bindValue(':lname', $lname);
        $new->bindValue(':id', $id);
        $new->execute();
    }
      
    if (isset($title) && $title != "")
    {
        $query = 'UPDATE profile SET title= :title WHERE player_id = :id';
        $new = $db->prepare($query);
        $new->bindValue(':title', $title);
        $new->bindValue(':id', $id);
        $new->execute();
    }
    
    if (isset($email) && $email != "")
    {
        $query = 'UPDATE profile SET email= :email WHERE player_id = :id';
        $new = $db->prepare($query);
        $new->bindValue(':email', $email);
        $new->bindValue(':id', $id);
        $new->execute();
    }

    if (isset($bio) && $bio != "")
    {
        $query = 'UPDATE profile SET bio= :bio WHERE player_id = :id';
        $new = $db->prepare($query);
        $new->bindValue(':bio', $bio);
        $new->bindValue(':id', $id);
        $new->execute();
    }
}

header("Location: machine.php");
die();

?>