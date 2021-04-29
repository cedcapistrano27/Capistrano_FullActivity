<?php

	session_start();



	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

if(!isset($_SESSION["username"])){
	$_SESSION['msg'] = "You must log in first";
    header("location: welcome.php");}
  

  

    	if (isset($_GET['logout'])) {

    	$db = new mysqli('localhost', 'root', '', 'account');
    	$event = mysqli_query($db, "INSERT INTO event_log(event_user, event_act, date) VALUES('".$_SESSION['username']."', 'Signed-Out', current_timestamp())");

    	if (isset($_SESSION['username'])) {
    		

    	session_destroy();
	  	unset($_SESSION['username']);
	  	header("location: index.php");
    	}
    	
    	}
   

   
	  
  
  


?>

<!DOCTYPE html>
<html>
<head>
	<title>My Website</title>
</head>

<style type="text/css">
	
body {

	background: url(1.jpg);
	background-repeat: no-repeat;
	background-size: cover;
	background-attachment: fixed;
	font-family: Gadugi;


}



h1{

	color: white;
	background-color: tomato;
	border: 5px solid;
	border-radius: 7px;
	border-color: #18F710;
}


.content{

	width: 300px;
	height: auto;
	padding: 30px;
	background-color: white;
	margin-left: auto;
	margin-right: auto;
	border-radius: 10px;
	border: 5px solid;



}

.lorem{
	background-color: black;
	color: white;
	border-radius: 10px;
	width: 350px;
	padding: 20px;
	margin-right: auto;
	margin-left: auto;


}

a:hover {

	color: #18F710;
}

</style>
<body>

<center>
	<h1>Hi User</h1>
</center>

<div class="content">

<?php if (isset($_SESSION['success'])): ?>

			<div class="error success">
				<h3>
					<?php 
						echo $_SESSION['success'];
						unset($_SESSION['success']);
						?>
				</h3>			
			</div>
		<?php endif	?>

		   <?php  if (isset($_SESSION['username'])) : ?>
    	<center><p style="font-size: 20px;">Welcome ! <strong style="color: #17d60d; "><?php echo $_SESSION['username']; ?></strong></p></center>
      <br>
    <?php endif ?>

    	<p> <a href="welcome.php?logout='1'" style="color: red;" >logout</a> </p>
    	
       

</div>

<br><br>


<div class="lorem">
	<strong>lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.


</strong>
</div>
	

</body>
</html>