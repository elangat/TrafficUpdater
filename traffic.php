<!DOCTYPE html>
<html>
<head>
	<title>TrafficUpdate</title>
</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/
	bootstrap/4.1.3/css/bootstrap.min.css">
<center>

	<legend>

	<h1 class="jumbotron">TRAFFIC UPDATER</h1>

	<fieldset>
	
	<form action="" method="POST">
		<input type="text" name="road"
		placeholder="ENTER ROAD NAME">
		<br><br>
		<input type="text" name="info"
		placeholder="Whats Going On">
		<br><br>
		
		
		
		<br><br>

		<input type="update" value="UPDATE" class="btn btn-info">
		
	</form>
	</fieldset>

</legend>
</center>
</body>
</html>




<?php 
$conn=mysqli_connect("localhost","root","","table_db");
$response1=mysqli_query($conn,"SELECT * FROM table_traffic ORDER BY time DESC");

        	while ($row = mysqli_fetch_array($response1)) {
        		echo "<i class='text-muted'> $row[0]</i>";
        		echo "<p class='alert alert-warning'> $row[1]</p>";
        		echo "<b class=badge badge-secondary> $row[2]</b>";
        		echo "<hr> ";
        	}


//This is the logic:provide construct with form values
if (empty($_POST)){
	exit();//quit executing PHP code until, forrm button is clicked
}

$object = new Traffic($_POST['road'],
	                  $_POST['info'] );


$object->save(); //trigger save function


class Traffic{
	function __construct($Road_Name	, $Traffic_info){



		$this->Road_Name = $Road_Name;
		$this->Traffic_info = $Traffic_info;
	




	}//end constructor



	function save(){
		//connect to your database
		$conn =mysqli_connect("localhost","root", "","table_db");
		//save to table
		$response=mysqli_query($conn, "INSERT INTO `table_traffic`(`Road_Name`, `Traffic_info`) VALUES ('$this->Road_Name	','$this->Traffic_info')");


		if ($response==true){
			echo "Posted Successfully";
		}
        
        else{
        	echo "Record Failed, check your Details";
        }
		
        	



	}//end








}










 ?>