<?php
 
 //Read in post conditions
 $username = $_REQUEST['username'];
 $password = $_REQUEST['password'];
 $uid = $_REQUEST['uid'];
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
$selectsql = "select * from profiles where uid=".$uid.";";
$result = mysqli_query($con, $selectsql);
$row = $result->fetch_row();
if ($row != NULL)
{
    //var_dump($row);
	$uid = $row[0];
	$sql = "update profiles set email='".$email."', uname='".$uname."', upwd='".$upwd."' where uid=".$uid;
    print $sql;
    if (mysqli_query($con, $sql))
    {
	    echo "OK";
    }else{
        echo "Failed";
    }

}else{
    echo "There is no user with that uid";
    exit();
}



// Close connections
mysqli_close($con);



?>