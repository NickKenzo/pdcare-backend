<?php
 
// Create connection
$con=mysqli_connect("localhost","pdcareon_admin","pdcareadmin","pdcareon_Users");
 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//var_dump($_POST);
if($_POST){
    //print("submitted");
    $username = $_POST['uname'];
    $password = $_POST['psw'];
    $sql = "select uid from profiles where uname='".$username."' and upwd='".$password."'";
    //print($sql);
    if ($result = mysqli_query($con, $sql))
    {
        //successfullogin
        //print("success");
        $row = $result->fetch_row();
	    $uid = $row[0];
	    header("location: /viewscores.php?uid=".$uid);
    }
    else{
        print("<b style='color:red; text-align:center'>There is no user with those credentials</b>");
    }
}
 /*
// This SQL statement selects ALL from the table 'Locations'
$sql = "SELECT * FROM profiles";
 
// Check if there are results
if ($result = mysqli_query($con, $sql))
{
 // If so, then create a results array and a temporary one
 // to hold the data
 $resultArray = array();
 $tempArray = array();
 
 // Loop through each row in the result set
 while($row = $result->fetch_object())
 {
 // Add each row into our results array
 $tempArray = $row;
     array_push($resultArray, $tempArray);
 }
 
 // Finally, encode the array to JSON and output the results
 echo json_encode($resultArray);
}
 */
 print('<html><head><style>/* Bordered form */
form {
  border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text], input[type=password] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the avatar image inside this container */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
  width: 40%;
  border-radius: 50%;
}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* The "Forgot password" text */
span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
    display: block;
    float: none;
  }
  .cancelbtn {
    width: 100%;
  }
}</style></head>');
 print('<center><form method="post">
  <center>
    <b style="font-size:30px">P.D. Care</b>
  </center>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit" value="submit">Login</button><br>
    <!--<label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>-->
  </div>

  <!--<div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>-->
  </div>
</form></center>');
print("</html>");

// Close connections
mysqli_close($con);
?>