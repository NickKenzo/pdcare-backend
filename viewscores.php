<?php
 
// Create connection
$con=mysqli_connect("localhost","pdcareon_admin","pdcareadmin","pdcareon_Users");
 
 
 $uid = $_REQUEST['uid'];
 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
print('<html>
<head>  
<script>');
// This SQL statement selects ALL from the table 'Locations'
$sql = "SELECT score, date FROM scores where uid=".$uid." and game=1 order by date desc LIMIT 10";
 
// Check if there are results
if ($result = mysqli_query($con, $sql))
{
 // If so, then create a results array and a temporary one
 // to hold the data
 $resultArray = array();
 $tempArray = array();
 
 // Loop through each row in the result set
 while($row = $result->fetch_row())
 {
 // Add each row into our results array
 $tempArray = $row;
     array_push($resultArray, $tempArray);
 }
 //var_dump($resultArray);
 // Finally, encode the array to JSON and output the results
 print('window.onload = function () {

var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	theme: "light2",
	title:{');
	if(sizeof($resultArray) ==  0){
	    print('text: "Balance Game (No Data Found)"');
	}
	else{
	    print('text: "Balance Game"');
	}
		
	print('},
    axisX:{
    tickLength: 1,
    minimum: 0,
    maximum: 11
    },
    
	data: [{        
		type: "line",       
		dataPoints: [');
		//var_dump($resultArray);
		/*
		if(sizeof($resultArray) ==  0){
		    print('{y: 0},{y: 0},{y: 0},{y: 0},{y: 0},{y: 0},{y: 0},{y: 0},{y: 0},{y: 0}');
		}*/
	    foreach($resultArray as $key=>$row){
	        //print($row[0]);
	        if($key != sizeof($resultArray)-1){
	            //print('{y: '.$row[0].', x: new Date('.$year.','.$month.','.$day.','.$hour.','.$min.','.$sec.')},');
	            print('{y: '.$row[0].', x: '.($key+1).'},');
	        }else{
	            //print('{y: '.$row[0].', x: new Date('.$year.','.$month.','.$day.','.$hour.','.$min.','.$sec.')}');
	            print('{y: '.$row[0].', x: '.($key+1).'}');
	        }
	    }
		print(']
	}]


});');
 //echo json_encode($resultArray);
}

$sql = "SELECT score, date FROM scores where uid=".$uid." and game=2 order by date desc LIMIT 10";
 
// Check if there are results
if ($result = mysqli_query($con, $sql))
{
 // If so, then create a results array and a temporary one
 // to hold the data
 $resultArray = array();
 $tempArray = array();
 
 // Loop through each row in the result set
 while($row = $result->fetch_row())
 {
 // Add each row into our results array
 $tempArray = $row;
     array_push($resultArray, $tempArray);
 }
 // Finally, encode the array to JSON and output the results
 print('

var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	theme: "light2",
	title:{');
	if(sizeof($resultArray) ==  0){
	    print('text: "Memory Game (No Data Found)"');
	}
	else{
	    print('text: "Memory Game"');
	}
		
	print('},
    axisX:{
    tickLength: 1,
    minimum: 0,
    maximum: 11
    },
    
	data: [{        
		type: "line",       
		dataPoints: [');
		//var_dump($resultArray);
		/*
		if(sizeof($resultArray) ==  0){
		    print('{y: 0},{y: 0},{y: 0},{y: 0},{y: 0},{y: 0},{y: 0},{y: 0},{y: 0},{y: 0}');
		}*/
	    foreach($resultArray as $key=>$row){
	        //print($row[0]);
	        if($key != sizeof($resultArray)-1){
	            //print('{y: '.$row[0].', x: new Date('.$year.','.$month.','.$day.','.$hour.','.$min.','.$sec.')},');
	            print('{y: '.$row[0].', x: '.($key+1).'},');
	        }else{
	            //print('{y: '.$row[0].', x: new Date('.$year.','.$month.','.$day.','.$hour.','.$min.','.$sec.')}');
	            print('{y: '.$row[0].', x: '.($key+1).'}');
	        }
	    }
		print(']
	}]



});');
 //echo json_encode($resultArray);
}
$sql = "SELECT score, date FROM scores where uid=".$uid." and game=3 order by date desc LIMIT 10";
 
// Check if there are results
if ($result = mysqli_query($con, $sql))
{
 // If so, then create a results array and a temporary one
 // to hold the data
 $resultArray = array();
 $tempArray = array();
 
 // Loop through each row in the result set
 while($row = $result->fetch_row())
 {
 // Add each row into our results array
 $tempArray = $row;
     array_push($resultArray, $tempArray);
 }
 // Finally, encode the array to JSON and output the results
 print('

var chart3 = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	theme: "light2",
	title:{');
	if(sizeof($resultArray) ==  0){
	    print('text: "Drawing Game (No Data Found)"');
	}
	else{
	    print('text: "Drawing Game"');
	}
		
	print('},
    axisX:{
    tickLength: 1,
    minimum: 0,
    maximum: 11
    },
    
	data: [{        
		type: "line",       
		dataPoints: [');
		//var_dump($resultArray);
		/*
		if(sizeof($resultArray) ==  0){
		    print('{y: 0},{y: 0},{y: 0},{y: 0},{y: 0},{y: 0},{y: 0},{y: 0},{y: 0},{y: 0}');
		}*/
	    foreach($resultArray as $key=>$row){
	        //print($row[0]);
	        if($key != sizeof($resultArray)-1){
	            //print('{y: '.$row[0].', x: new Date('.$year.','.$month.','.$day.','.$hour.','.$min.','.$sec.')},');
	            print('{y: '.$row[0].', x: '.($key+1).'},');
	        }else{
	            //print('{y: '.$row[0].', x: new Date('.$year.','.$month.','.$day.','.$hour.','.$min.','.$sec.')}');
	            print('{y: '.$row[0].', x: '.($key+1).'}');
	        }
	    }
		print(']
	}]
});

chart1.render();
chart2.render();
chart3.render();

}');
 //echo json_encode($resultArray);
}

print('</script>
</head>
<body>
<br><br>
<center>
<a href="/leaderboard.php?uid='.$uid.'">
<button style="background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">View Leaderboards</button></a></center><br><br>
<div>
<div id="chartContainer1" style="height: 300px; width: 100%;"></div>
</div>
<div>
<div id="chartContainer2" style="height: 300px; width: 100%;"></div>
</div>
<div>
<div id="chartContainer3" style="height: 300px; width: 100%;"></div>
</div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>');
// Close connections
mysqli_close($con);

?>