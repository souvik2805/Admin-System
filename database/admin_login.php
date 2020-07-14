<?php 
		session_start();
		include('connection.php');
		include('path.php');
		include "queries.php";
		// require '../php_mailer/PHPMailerAutoload.php';
		global $con;
	
		if(isset($_POST['user_id'])){

		$user_id   = $_POST['user_id'];
		$password   = $_POST['password'];;
	
		
		$table = 'tbl_superadmin';
		$query = "SELECT * FROM $table WHERE  user_id  = '".$user_id."';";
		$result = mysqli_query($con,$query);
		if($result)
		{
			if(mysqli_num_rows($result) > 0)
			{
				$result = mysqli_fetch_assoc($result);
				$original_pass = $result['password'];
				if($password == $original_pass)
				{

					$_SESSION['digital-contract-superadmin'] = $result;
					$_SESSION['success'] ='You are successfully logged';
				    echo"<script>window.open('../home.php?dashboard','_self')</script>";
				}
				else
				{
					$_SESSION['error'] = 'Please enter correct password';
				    echo"<script>window.open('../index.php','_self')</script>";
				}
			}
			else
			{
				$_SESSION['error'] = 'This user id is not register with us!';
				echo"<script>window.open('../index.php','_self')</script>";
				
			}
		}
		else
		{
			die(mysqli_error($con));
		}
	}

?>