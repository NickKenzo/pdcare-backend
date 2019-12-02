<?php
 
 //Read in post conditions
 $username = $_REQUEST['username'];
 $password = $_REQUEST['password'];
 $name = $_REQUEST['name'];
 $email = $_REQUEST['email'];
 $uname = $_REQUEST['uname'];
 $upwd = $_REQUEST['upwd'];
 
 //var_dump($_REQUEST);
// Create connection
$con=mysqli_connect("localhost",$username,$password,"pdcareon_Users");
 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$selectsql = "select * from profiles where email='".$email."' or uname='".$uname."'";
print($selectsql);
$result = mysqli_query($con, $selectsql);
var_dump($result);
if ($result->fetch_row())
{
    echo "There is already a user with that email or username. Please try again with different credentials.";
}else{

    $sql = "INSERT into profiles (name, email, uname, upwd) VALUES ('".$name."', '".$email."', '".$uname."', '".$upwd."')";
    print $sql;
    if (mysqli_query($con, $sql))
    {
	    echo "OK";
    }else{
        echo "Failed";
    }
}
// Close connections
mysqli_close($con);



?>