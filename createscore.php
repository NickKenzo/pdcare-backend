<?php
//This file creates a score using a specific web call
//No Known Bugs


 //Read in post conditions
 $username = $_REQUEST['username'];
 $password = $_REQUEST['password'];
 $name = $_REQUEST['name'];
 $score = $_REQUEST['score'];
 $game = $_REQUEST['game'];
 
 //var_dump($_REQUEST);
// Create connection
$con=mysqli_connect("localhost",$username,$password,"pdcareon_Users");
 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$selectsql = "select uid from profiles where name='".$name."';";
$result = mysqli_query($con, $selectsql);
$row = $result->fetch_row();
if ($row != NULL)
{
    //var_dump($row);
	$uid = $row[0];
	$sql = "INSERT into scores (uid, score, game) VALUES (".$uid.", ".$score.", ".$game.")";
    print $sql;
    if (mysqli_query($con, $sql))
    {
	    echo "OK";
    }else{
        echo "Failed";
    }

}else{
    echo "There is no user with that name";
    exit();
}



// Close connections
mysqli_close($con);



?>
