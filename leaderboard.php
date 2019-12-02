<?php
 $userbool = false;
 //Read in post conditions
 if($_REQUEST['uid'] != ""){
    $uid = $_REQUEST['uid'];
    $userbool = true;
 }

 //var_dump($_REQUEST);
// Create connection
$con=mysqli_connect("localhost","pdcareon_admin","pdcareadmin","pdcareon_Users");
 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if($userbool){
    $selectsql = "select * from profiles where uid=".$uid.";";
    $result = mysqli_query($con, $selectsql);
    $row = $result->fetch_row();
    if ($row != NULL)
    {
        $userbool=true;
        $username = $row[1];
    
    }
}else{
    $userbool = false;
    $username = "";
}

print('<html>
<head><style>
#container {
  width: 600px;
  height: auto;
}

.row {
  position: relative;
  display: block;
  width: 100%;
  height: 40px;
  border-style: solid;
  border-width: 1px;
  border-top: 0px;
}
.place{
      position: relative;
  display: inline-block;
  width: 25%;
}
.name {
  position: relative;
  display: inline-block;
  text-align: center;
  width: 50%;
  line-height: 45px;
}

.score {
  position: relative;
  display: inline-block;
  width: 25%;
}

.row:nth-child(1) {
  background: gold;
  border-style: solid;
  border-width: 1px;
}

.row:nth-child(2) {
  background: #c0c0c0;
}

.row:nth-child(3) {
  background: #cd7f32;
}
</style>
</head><body><center>');
//balance game leaderboard
print(' <h4>Balance Game Leaderboard</h4><div id="container">
    <div class="place">Rank</div><div class="name">Name</div><div class="score">Score</div>
  </div>');
print('<div id="container">');
$scoresql1 = "select p.name, max(s.score), s.game from profiles p join scores s on p.uid=s.uid where s.game=1 group by (p.name) order by max(s.score) desc";
//print($scoresql1);
$result = mysqli_query($con, $scoresql1);
$index = 0;
$founduser = false;
while($row = $result->fetch_row()){
    $index+=1;
    if($index <= 10){
        if($row[0] != $username){
        print('  <div class="row">
        <div class="place">'.$index.'</div><div class="name">'.$row[0].'</div><div class="score">'.$row[1].'</div>
      </div>');
        }else{
            $founduser=true;
            print('  <div class="row"><b>
        <div class="place">'.$index.'</div><div class="name">'.$row[0].'</div><div class="score">'.$row[1].'</div></b>
      </div>');
        }
    }else if($row[0] != $username){
        $founduser=true;
            print('  <div class="row"><b>
        <div class="place">'.$index.'</div><div class="name">'.$row[0].'</div><div class="score">'.$row[1].'</div></b>
      </div>');
    }
}

print(' <h4>Memory Game Leaderboard</h4><div id="container">
    <div class="place">Rank</div><div class="name">Name</div><div class="score">Score</div>
  </div>');
print('<div id="container">');
$scoresql2 = "select p.name, max(s.score), s.game from profiles p join scores s on p.uid=s.uid where s.game=2 group by (p.name) order by max(s.score) desc";
//print($scoresql1);
$result = mysqli_query($con, $scoresql2);
$index = 0;
$founduser = false;
while($row = $result->fetch_row()){
    $index+=1;
    if($index <= 10){
        if($row[0] != $username){
        print('  <div class="row">
        <div class="place">'.$index.'</div><div class="name">'.$row[0].'</div><div class="score">'.$row[1].'</div>
      </div>');
        }else{
            $founduser=true;
            print('  <div class="row"><b>
        <div class="place">'.$index.'</div><div class="name">'.$row[0].'</div><div class="score">'.$row[1].'</div></b>
      </div>');
        }
    }else if($row[0] != $username){
        $founduser=true;
            print('  <div class="row"><b>
        <div class="place">'.$index.'</div><div class="name">'.$row[0].'</div><div class="score">'.$row[1].'</div></b>
      </div>');
    }
}

print(' <h4>Drawing Game Leaderboard</h4><div id="container">
    <div class="place">Rank</div><div class="name">Name</div><div class="score">Score</div>
  </div>');
print('<div id="container">');
$scoresql3 = "select p.name, max(s.score), s.game from profiles p join scores s on p.uid=s.uid where s.game=3 group by (p.name) order by max(s.score) desc";
//print($scoresql3);
$result = mysqli_query($con, $scoresql3);
$index = 0;
$founduser = false;
while($row = $result->fetch_row()){
    $index+=1;
    //var_dump($row);
    if($index <= 10){
        if($row[0] != $username){
        print('  <div class="row">
        <div class="place">'.$index.'</div><div class="name">'.$row[0].'</div><div class="score">'.$row[1].'</div>
      </div>');
        }else{
            $founduser=true;
            print('  <div class="row"><b>
        <div class="place">'.$index.'</div><div class="name">'.$row[0].'</div><div class="score">'.$row[1].'</div></b>
      </div>');
        }
    }else if($row[0] != $username){
        $founduser=true;
            print('  <div class="row"><b>
        <div class="place">'.$index.'</div><div class="name">'.$row[0].'</div><div class="score">'.$row[1].'</div></b>
      </div>');
    }
}

// Close connections
mysqli_close($con);



?>