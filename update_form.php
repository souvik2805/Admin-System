<?php
require('database/connection.php');
require ('database/queries.php');
require 'database/path.php';
require('mc_table.php');
$table = "tbl_contract_form";


$advertiser='';
$address ='';
$city ='';
$pin = '';
$designation='';
$primary_phone='';
$mobile='';
$full_name='';
$p_full_name= '';
$email_id ='';
$contract_date='';
$sales_person='';
$special_billing='-';
$reporting_email_id ='';
$website ='';
$customer_pan_no ='';
$customer_gstin_no ='';




$product_service_1 = "";
$description_1     = "";
$product_service_rate_1='0'; 

$product_service_2 = "";
$description_2     = "";
$product_service_rate_2='0'; 

$product_service_3 = "";
$description_3     = "";
$product_service_rate_3='0'; 

$product_service_4 = "";
$description_4     = "";
$product_service_rate_4='0'; 

$product_service_5 = "";
$description_5     = "";
$product_service_rate_5='0'; 




$management_fees="";
$total          = "";
$net_payable    = "";
$gst18          = "";
$total_payable   = "";
$amount_received  ="";
$balance          = "";
$c_date           = "";
$c_no              = "";
$c_amount         = "";
$c_manager_name   = "";






if(isset($_POST)){  
      
      $final_form_no = $_POST['U_form_no'];

      $signature='0';
	    $stamp ='assets/image2/white.png';
      $target_dir ='assets/upload_sign_stamp/';
      $path1 = '';
      $path2 = '';
      $sign_path = '';
      $stamp_path = '';

          if(isset($_FILES["file_1"])){
              $path1 = $_FILES['file_1']['name'];
              $ext1 = pathinfo($path1, PATHINFO_EXTENSION);
              if($ext1 == 'jpg' || $ext1 == 'png' || $ext1 == 'gif' || $ext1== 'jpeg' || $ext1 == 'JPG' ||$ext1 == 'JPEG' || $ext1 == 'PNG' || $ext1 == 'GIF'){
                
                 $target_file1 = $target_dir.$final_form_no."-sign-".basename($_FILES["file_1"]["name"]);
                 
                 move_uploaded_file($_FILES["file_1"]["tmp_name"], $target_file1);
                 $signature = $target_file1;

                 $sign_path = $final_form_no."-sign-".basename($_FILES["file_1"]["name"]);
              }

          }

          if (isset($_FILES["file_2"])){
               $path2 = $_FILES['file_2']['name'];
               $ext2 = pathinfo($path2, PATHINFO_EXTENSION);
              if($ext2 == 'jpg' || $ext2 == 'png' || $ext2 == 'gif' || $ext2== 'jpeg' || $ext2 == 'JPG' ||$ext2 == 'JPEG' || $ext2 == 'PNG' || $ext2 == 'GIF'){
                  
                  $target_file2 = $target_dir.$final_form_no."-stamp-".basename($_FILES["file_2"]["name"]);
                    move_uploaded_file($_FILES["file_2"]["tmp_name"], $target_file2);
                    $stamp   = $target_file2;

                    $stamp_path = $final_form_no."-stamp-".basename($_FILES["file_2"]["name"]);
                }

          }
 

 




if(isset($_POST['advertiser'])){
 $advertiser = $_POST['advertiser'];	
}

if(isset($_POST['address'])){
$address    = $_POST['address'];	
}


if(isset($_POST['city'])){
 $city= $_POST['city'];	
}

if(isset($_POST['pin'])){
 $pin = $_POST['pin'];	
}

if(isset($_POST['designation'])){
 $designation = $_POST['designation'];	
}

if(isset($_POST['primary_phone'])){ 
 $primary_phone = $_POST['primary_phone'];	
}

if(isset($_POST['mobile'])){ 
 $mobile= $_POST['mobile'];
}

if(isset($_POST['name'])){ 
  $full_name = array(
                     "sri"   =>$_POST['sri'], 
                      "name" =>$_POST['name']
              );
  $full_name = implode("|-^^=|",$full_name);
   $p_full_name= $_POST['sri']." ".$_POST['name'];
}

if(isset($_POST['email_id'])){ 
 $email_id = $_POST['email_id'];
}

if(isset($_POST['contract_date'])){ 
 $contract_date = $_POST['contract_date'];
}

if(isset($_POST['contract_date'])){ 
 $contract_date = $_POST['contract_date'];
}

if(isset($_POST['website'])){
    $website = $_POST['website'];
}

if(isset( $_POST['sales_person'])){ 
 $sales_person = $_POST['sales_person'];
}

if(isset($_POST['special_billing'])){ 
 $special_billing = $_POST['special_billing'];
}

if(isset($_POST['reporting_email_id'])){ 
 $reporting_email_id  = $_POST['reporting_email_id'];
}

if(isset($_POST['special_billing'])){ 
 $website = $_POST['special_billing'];
}

if(isset($_POST['customer_pan_no'])){ 
$customer_pan_no = $_POST['customer_pan_no'];
}

if(isset($_POST['customer_gstin_no'])){ 
$customer_gstin_no = $_POST['customer_gstin_no'];
}

// ------------------------------------------------------------------------->>
if(isset($_POST['product_service_1']) && $_POST['product_service_1'] !="0"){ 
$product_service_1= $_POST['product_service_1'];
}

if(isset($_POST['description_1'])){ 
$description_1 = $_POST['description_1'];
}

if(isset($_POST['product_service_rate_1'])){ 
$product_service_rate_1 = "  ".$_POST['product_service_rate_1'];
}

// ----------------------------------------------------------------------->
if(isset($_POST['product_service_2']) && $_POST['product_service_2'] !="0"){ 
 $product_service_2=$_POST['product_service_2'];
}

if(isset($_POST['description_2'])){ 
 $description_2= $_POST['description_2'];
}

if(isset($_POST['product_service_rate_2'])){ 
 $product_service_rate_2 = "  ".$_POST['product_service_rate_2'];
}
// ------------------------------------------------------------------------>

if(isset($_POST['product_service_3']) && $_POST['product_service_3'] !="0"){ 
 $product_service_3=$_POST['product_service_3'];
}

if(isset($_POST['description_3'])){ 
 $description_3= $_POST['description_3'];
}

if(isset($_POST['product_service_rate_3'])){ 
 $product_service_rate_3 = "  ".$_POST['product_service_rate_3'];
}
// --------------------------------------------------------------------------->

if(isset($_POST['product_service_4']) && $_POST['product_service_4'] !="0"){ 
 $product_service_4= $_POST['product_service_4'];
}

if(isset($_POST['description_4'])){ 
 $description_4= $_POST['description_4'];
}

if(isset($_POST['product_service_rate_4'])){ 
 $product_service_rate_4 = "  ".$_POST['product_service_rate_4'];
}

// -------------------------------------------------------------------------->

if(isset($_POST['product_service_5']) && $_POST['product_service_5'] !="0"){ 
 $product_service_5= $_POST['product_service_5'];
}

if(isset($_POST['description_5'])){ 
 $description_5= $_POST['description_5'];
}

if(isset($_POST['product_service_rate_5'])){ 
 $product_service_rate_5 = "  ".$_POST['product_service_rate_5'];
}


if(isset($_POST['management_fees'])){ 
 $management_fees = "  ".$_POST['management_fees'];
}

if(isset($_POST['total'])){ 
 $total= "  ".$_POST['total'];
}

if(isset($_POST['net_payable'])){ 
 $net_payable= "  ".$_POST['net_payable'];
}

if(isset($_POST['gst18'])){ 
 $gst18 = "  ".$_POST['gst18'];
}

if(isset($_POST['total_payable'])){ 
 $total_payable = "  ".$_POST['total_payable'];
}

if(isset($_POST['amount_received'])){ 
$amount_received = "  ".$_POST['amount_received'];
}

if(isset($_POST['balance'])){ 
  $balance = "  ".$_POST['balance'];
}

if(isset($_POST['c_date'])){ 
 $c_date= $_POST['c_date'];
}

if(isset($_POST['c_no'])){ 
 $c_no = $_POST['c_no'];
}

if(isset($_POST['c_amount'])){ 
$c_amount = $_POST['c_amount'];
}

if(isset($_POST['c_manager_name'])){ 
$c_manager_name= $_POST['c_manager_name'];
}

$U_form_no= $_POST['U_form_no'];
// ------------------------------------------------------------------------------------>>>>>>>>




$full_address = array("address"=>$address, "city"=>$city, "pin_code" =>$pin);
$full_address = implode( "|-^^=|", $full_address );


$all_phone_no =  array("primary_phone"=> $primary_phone, "mobile"=>$mobile);
$all_phone_no =  implode( "|-^^=|", $all_phone_no );


$all_email    =  array("email_id"=> $email_id, "reporting_email_id"=> $reporting_email_id);
$all_email    =  implode("|-^^=|", $all_email);


$customer_pan_gstin  = array(
                            "customer_pan_no"   =>$customer_pan_no, 
                            "customer_gstin_no" => $customer_gstin_no
                            );
$customer_pan_gstin  = implode("|-^^=|",$customer_pan_gstin);




// ------------------------------------------------------------------------------------->
$product_and_services  = array(
                              "product_service_1"       =>$product_service_1,
                              "description_1"           =>$description_1,
                              "product_service_rate_1"  =>$product_service_rate_1,

                              "product_service_2"       =>$product_service_2,
                              "description_2"           =>$description_2,
                              "product_service_rate_2"  =>$product_service_rate_2,

                              "product_service_3"       =>$product_service_3,
                              "description_3"           =>$description_3,
                              "product_service_rate_3"  =>$product_service_rate_3,

                              "product_service_4"       =>$product_service_4,
                              "description_4"           =>$description_4,
                              "product_service_rate_4"  =>$product_service_rate_4,

                              "product_service_5"       =>$product_service_5,
                              "description_5"           =>$description_5,
                              "product_service_rate_5"  =>$product_service_rate_5,

);
$product_and_services  =  implode("|-^^=|",$product_and_services);


$sign_and_stamp =  array(
                        "sign"   =>$sign_path, 
                         "stamp" => $stamp_path,
                       );

$sign_and_stamp =  implode("|-^^=|",$sign_and_stamp);


// pdf-name---------------------------------------------------------------->
$pdf_name = substr($advertiser,0,20)."_".$final_form_no.".pdf";
$filename = $upload_path."/all_pdf_form/".$pdf_name;

$pdf_name_d = "all_pdf_form/".$pdf_name;

if(isset($_POST['sales_person'])){
   $folder_name =  substr($_POST['sales_person'],0,30);

    if(is_dir($upload_path."/all_pdf_form/".$folder_name) == false){
       mkdir($upload_path."/all_pdf_form/".$folder_name);
    }

    $filename = $upload_path."/all_pdf_form/".$folder_name."/".$pdf_name;

    $pdf_name_d = "all_pdf_form/".$folder_name."/".$pdf_name;
}
// ----------------------------------------------------------------------->>>>>





 $data = [
            'advertiser_name'   =>  $advertiser,
            'full_address'      =>  $full_address,
            'all_phone_no'      =>  $all_phone_no,
            'person_to_contact' =>  $full_name,
            'designation'       =>  $designation,
            'all_email'         =>  $all_email ,
            'contract_date'     =>  $contract_date,
            'sales_person'      =>  $sales_person,
            'special_billing'   =>  $special_billing,
            'website'           =>  $website,

            'customer_pan_gstin'   =>  $customer_pan_gstin,
            'product_and_services' =>  $product_and_services,

            'management_fees'      =>  $management_fees,
            'total'                =>  $total,
            'net_payable'          =>  $net_payable,
            'gst'                  =>  $gst18,
            'total_payable'        =>  $total_payable,
            'amout_received'       =>  $amount_received,
            'balance'              =>  $balance,
            'cheque_date'          =>  $c_date,
            'cheque_no'            =>  $c_no,
            'cheque_amout'         =>  $c_amount,
            'manager_name'         =>  $c_manager_name,
            'sign_and_stamp'       =>  $sign_and_stamp, 
            'pdf_name'             =>  $pdf_name_d
         ];


    $where = ['form_no' => $U_form_no];
    $update= update($table,$data,$where);
                   
if($update == "1"){
 echo"
 <script>
  alert('Form Updated Succesfully!!');
  window.open('home.php?dashboard','_self')
 </script>";
}
else{
    echo"
    <script>
    alert('Unable to Update Form!!');
    window.open('home.php?dashboard','_self')
    </script>";
}



}




?>

