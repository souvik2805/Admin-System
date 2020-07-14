 <?php
	include('connection.php');


	/********* THIS FILE CONTAINS ALL THE NECESSARY FUNCTIONS , FOR RUNNING THE QUERIES AND GETTING THE RESULT. JUST CALL THE FUNCTION , WITH APPROPRIATE FUNCTION PARAMETERS .**********************/



	//Function for inserting the data in any table
	/*
		Function Parameter :- 
			$table_name :- Must be string
			$data       :- Must be array.

		Function Return :- 
			1) return 1 ; On Success
			2) Error Messages; //On Failure
	*/
	function insert($table_name,$data)
	{ 
		// print_r($table_name);exit();

		global $con;
		$insert = "INSERT INTO ".$table_name;
		$keys = "";
		$values = "";
		$insert_status = 0;
		if(!is_string($table_name)){
			die('<b class="query_error">Table name must be a string</b>');
		}
		if(is_array($data))
		{
			foreach($data as $key => $value)
			{
				$value1 = htmlspecialchars(mysqli_real_escape_string($con, $value));
				$keys .= "`".$key."`"." , ";
				$values .= "'".$value1."'"." , ";
			}
			$keys = trim($keys," , ");
			$values = trim($values," , ");
		}
		else
		{
			die("<b class='query_error'>Expecting Array.</b>");
		}
		$query = $insert." ( ".$keys." ) "." VALUES(".$values.") ;";
		
		
	
		if($con->query($query))
		{
			return 1;
		}
		else
		{
			echo mysqli_error($con);
		}
	}

	
	/*********** ADMIN LOGIN *****************/
	function admin_login($email,$pass)
	{
		   global $con;
		   $email   = $email;
		$password   = $pass;
		$email_empty= '';
		$pass_empty = '';
		if(isset($email) AND !empty($email))
		{
			$email  = refine($email);
		}
		else
		{
			$email_empty = 'Email Must not be empty';
		}
		if(isset($password) AND !empty($password)){
			$password = refine($password);
		}
		else
		{
			$pass_empty = 'Password Must Not be Empty';
		}
		$table = 'tbl_admin';
		$query = "SELECT * FROM $table WHERE  email = '".$email."';";
		$result = mysqli_query($con,$query);
		if($result)
		{
			if(mysqli_num_rows($result) > 0)
			{
				$result = mysqli_fetch_row($result);
				$original_pass = base64_decode($result[4]);
				if($password == $original_pass)
				{
					// $_SESSION['user_email'] = $result[3]; //Uncomment Me
					// $_SESSION['user_transid'] = $result[1];//Uncomment Me
					echo "OK";//Remove this
					//header('YOUR URL FOR DASHBOARD'); //Uncomment Me
				}
				else
				{
					$_SESSION['pass_error'] = 'Password is incorrect';
					echo "Password is incorrect";//Remove this
					//header('YOUR URL FOR Error Page'); //Uncomment Me
				}
			}
			else
			{
				$_SESSION['email_error'] = 'Email is invalid';
				echo "Email is Invalid";//Remove This
				//header('YOUR URL FOR Error Page'); //Uncomment Me
			}
		}
		else
		{
			die(mysqli_error($con));
		}
	}




	/*************** FUNCTION FOR DELETING A RECORD *********************/
	//Function for deleting the data in any table
	/*
		Function Parameter :- 
			$table_name :- Must be string
			$data       :- Must be array.

		Function Return :- 
			1) return 1 ; On Success
			2) Error Messages; //On Failure
	*/
	function delete_one($table_name,$data)
	{
		global $con;

		$delete = "DELETE FROM    ".$table_name;
		$keys = "";
		$values = "";
		$delete_status = 0;
		$column = '';
		if(!is_string($table_name)){
			die('<b class="query_error">Table name must be a string</b>');
		}
		if(is_array($data))
		{
			foreach($data as $key => $value)
			{
				$column .= $key." = ".($value)." AND ";
			}
			$column = trim($column," AND ");
		}
		else
		{
			die("<b class='query_error'>Expecting Array.</b>");
		}
		$query = $delete." WHERE $column;";
		if($con->query($query))
		{
			return 1;
		}
		else
		{
			echo mysqli_error($con);
		}
	}


	/************** FOR UPDATING THE DATA ****************************/
	/*
		STRUCTURE : 
			1) $table :- String
			2) $data  :- Array .(Column name and column value)
			3) $where :- Array 
	*/

	function update($table,$data,$where)
	{
		global $con;
		$keys       = '';
		$values     = '';
		$update_status = 0;
		$set   = '';
		$find  = '';
		$update = "UPDATE ".$table." SET ";
		if(!is_string($table)){
			die('<b class="query_error">Table name must be a string</b>');
		}
		if(is_array($data) && is_array($where))
		{
			foreach($data as $key => $value)
			{
				// $keys .= "`".$key."`"." , ";
				// $values .= "'".$value1."'"." , ";

				$set .= "`".$key."`"."= "."'".($value)."'"." , ";
			}
			foreach($where as $key => $value)
			{
				$find .= "`".$key."`"." = "."'".($value)."'"." AND ";
			}

			$set = trim($set," , ");
			$find = trim($find," AND ");
		}
		else
		{
			die("<b class='query_error'>Expecting Array.</b>");
		}
		$query = $update.$set." WHERE ".$find.";";

		// echo $query;
		if($con->query($query))
		{
			return 1;
		}
		else
		{
			echo mysqli_error($con);
		}
	}


	/************* FUNCTIONS FOR SELECT **************/
	/*
		FUNCTION SIGNATURE :- 
			$table = String
			$select = (MANDATORY) Array
			$where  = (MANDATORY) Array
			$orderBY = (optional) ARRAY

		FUNCTION RETURNS :- 
			1) ERROR : On failure
			2) $result : on success
	
	*/
	function select($table,$select="",$where="true",$orderBy="true", $groupby="true")
	{
			// print_r($select);exit();
		global $con;
		$keys       = '';
		$values     = '';
		$select_status = 0;
		$select_as = '';
		$where_as = "";
		$orderByAs = "";
		if(!is_string($table)){
			die('<b class="query_error">Table name must be a string</b>');
		}
		if(is_array($select))
		{
			foreach($select as $value)
			{
				$select_as .= "`".$value."`".",";
			}
			$select_as = trim($select_as,",");
		}
		else
		{
			$select_as = " * ";
		}

		if(is_array($where))
		{
			foreach($where as $key => $value)
			{
				$where_as .= $key." = '".($value)."' AND ";
			}
			$where_as = trim($where_as," AND ");
		}
		else
		{
			$where_as = " 1 = 1 ";
		}

		if(is_array($orderBy))
		{
			foreach($orderBy as $value)
			{
				$orderByAs .= $value." , ";
			}
			$orderByAs = trim($orderByAs," , ");
		}
		else
		{
			$orderByAs = $orderBy;
		}

		$query = "SELECT ".$select_as." FROM ".$table." WHERE ".$where_as." GROUP BY ".$groupby." ORDER BY ".$orderByAs." ";
		// print_r($query);exit();
		$result = mysqli_query($con,$query);
		if($result){
			return $result;
		}
		else
		{
			die(mysqli_error($con));
		}
	}
?>