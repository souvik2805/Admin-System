<?php 

if(isset($_GET['dashboard']) )
 {
  include ('view/layout/header.php');
 	include ('view/layout/sidebar.php');
 	include ('view/pages/dashboard.php'); 
 	include ('view/layout/footer.php'); 
 }

 else if(isset($_GET['manage_contract']))
 {
  include ('view/layout/header.php');
  include ('view/layout/sidebar.php');
  include ('view/pages/manage_contract.php'); 
  include ('view/layout/footer.php'); 
 }
 else if(isset($_GET['manage_user']))
 {
  include ('view/layout/datatable_header.php');
  include ('view/layout/sidebar.php');
  include ('view/pages/manage_user.php'); 
  include ('view/layout/datatable_footer.php'); 
 }

else if(isset($_GET['add_user']))
 { 
  include ('view/layout/header.php');
  include ('view/layout/sidebar.php');
  include ('view/pages/add_user.php'); 
  include ('view/layout/footer.php'); 
}
else if(isset($_GET['edit_user']))
{
  include ('view/layout/header.php');
  include ('view/layout/sidebar.php');
  include ('view/pages/edit_user.php'); 
  include ('view/layout/footer.php');  
}

else if(isset($_GET['change_password']))
{
 include ('view/layout/header.php');
  include ('view/layout/sidebar.php');
  include ('view/pages/change_password.php'); 
  include ('view/layout/footer.php'); 
}

else if(isset($_GET['contract_form']))
{ 
 	include "form.php"; 
}

else if(isset($_GET['edit_contract']))
{ 
  include "edit_contract.php"; 
}



else{
  echo "<pre>";
  // print_r($_GET);
 	// include "views/template/question_type.php"; 
	echo "404 page";
}
?> 	
 

