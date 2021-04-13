<?php
session_start();
$message="";
$db = mysqli_connect('localhost', 'root', '', 'dbmsproject');
if(isset($_POST['submitissue'])){
	$uemail=$_SESSION['email'];
	$comp=$_POST['issuebox'];

	$sqi="INSERT INTO ISSUES(uemail,complaints) values('$uemail','$comp')";
	$exec=mysqli_query($db,$sqi);
	if($exec){
$message="We have received your problem, we will take action against it.";}
else{
$message ="Please check your internet connection . If the problem repeats try after some time";
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Issues</title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<style type="text/css">
		a,h1{
			color: white;
			text-align: center;
		}
        body{
			min-height:100%;
			height:100%;
			/*background-color:linear-gradient(#0f2453,yellow);*/
			background-color:#0f2453;
			-webkit-background-size:cover;
			-moz-background-size:cover;
			-o-background-size:cover;
			background-repeat:no-repeat;
			background-size:cover;
			/*background-image:linear-gradient(blue,yellow,white);
			-webkit-background-image:linear-gradient(blue,yellow,white);
			-moz-background-image:linear-gradient(blue,yellow,white);
			-o-background-image:linear-gradient(blue,yellow,white);*/

        }
        textarea{
        	margin-top: 5%;
        	margin-left: 25%;
        	width: 40%;
        	height: 30%;
        }
        button{
        	margin-left: 45;
        }
	</style>
</head>

<body>

<form method="POST" action="issues.php" id="msg">
	
     <h1> Enter your issue here</h1>
	<textarea name="issuebox" id="message" rows="8"></textarea>

<input type="submit" value="Submit" class="primary" name="submitissue" />

</form>

<?php
echo "<h2>".$message."</h2>";
?>
<button style="margin-left: 40%;"><p><a href="../index.php" style="color:black;">Home</a></p></button>
</body>
</html>