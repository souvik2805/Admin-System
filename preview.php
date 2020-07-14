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


// Calculate the Form No: 
$query = "SELECT `form_no` FROM  tbl_contract_form ORDER BY id DESC LIMIT 1";
$result = mysqli_query($con, $query);
$final_form_no = '';

if(mysqli_num_rows($result)>0){
  $row     = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $last_no = $row["form_no"];
  $last_no = explode("-", $last_no);
  $last_no = $last_no[1]+1;
  
  $final_form_no = sprintf("%06d", $last_no);
  $final_form_no = "CDIPL-".$final_form_no;
}
else{
  $final_form_no = 'CDIPL-000001';
}





if(isset($_POST)){

     // echo "<pre>";
     // print_r($_POST);


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
            'form_no'           =>$final_form_no,
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

$insert = insert($table,$data);
                   
// echo "Insert == ".$insert;



}




$pdf=new PDF_MC_Table();
$pdf->AddPage();
$pdf->SetFont('Arial','',14);


// ---------------------------------------------------->
$pdf->SetFont('Arial','B',9);
$pdf->Image('assets/image2/crisp-logo.png',3,6,27);
$pdf->Cell(21);
$pdf->Cell(00 ,5,'Crisp Digital India Private Limited',0,1);
$pdf->SetFont('Arial','',9);	
$pdf->Cell(21);
$pdf->Cell(60 ,5,'216 SF, Sushant Tower, Sushant Lok-II',0,0);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(20 ,2,'Online/Digital Services',0,0);
$pdf->Image('assets/image2/gp-all.PNG',158,10,50);
$pdf->Cell(34 ,5,'',0,1);/*end of line*/
$pdf->SetFont('Arial','',9);
$pdf->Cell(21);
$pdf->Cell(65 ,5,'Gurgaon - 122011, Tel: 0124-4867430',0,0);
$pdf->Cell(100 ,5,'',0,1);
$pdf->Cell(21);
$pdf->SetFont('Arial','',9);
$pdf->Cell(20,5,'CIN: U74999HR2017PTC069087',0,0);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(55);
$pdf->Cell(2,0,' Contract',0,20);
$pdf->Cell(189 ,0,'',0,1);


$pdf->Line(0, 34, 2100, 34);
// Line------------------------------------------->
$pdf->SetFont('Arial','BI',12);
$pdf->Cell(50 ,10,'',0,1);
$pdf->Cell(188 ,10,"NO : ".$final_form_no,0,1,'R');




// 1.###########################################-------------------------------------------->
$pdf->Line(0, 34, 2100, 34);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(46 ,7,'1.  ADVERTISER : ',0,0,'L');
$pdf->SetFont('Arial','',10);
// Set Font color Blue------->
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(138,7, $advertiser,0,1,'L');
$pdf->SetTextColor(0, 0, 0);
// --------------------------------------------->
// set line color----------->
$pdf->SetDrawColor(197, 197, 160);
$pdf->Line(13, 51, 200, 51);
// ##################################################


// 2.######################--------------------------------------------->
$pdf->SetFont('Arial','B',9);
$pdf->Cell(46 ,7,'2.  ADDRESS : ',0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(142,7, $address,0,1,'L');
$pdf->SetTextColor(0, 0, 0);
$pdf->Line(13, 58, 200, 58);
//########################## --------------------------------------------->


// 3. &&& 4 #######################--------------------------------------------->
$pdf->SetFont('Arial','B',9);
$pdf->Cell(46 ,7,'3.  CITY : ',0,0,'L');
$pdf->SetFont('Arial','',10);

$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(85,7, $city ,0,0,'L');
$pdf->SetTextColor(0, 0, 0);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(29,7,'4.  PIN CODE : ',0,0,'L');

$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(78,7,$pin,0,1,'L');
$pdf->SetTextColor(0, 0, 0);
$pdf->Line(13, 65, 200, 65);
// --------------------------------------------->


// 5 && 6.################--------------------------------------------->
$pdf->SetFont('Arial','B',9);
$pdf->Cell(46 ,7,'5.  PRIMARY PHONE : ',0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(85,7, $primary_phone,0,0,'L');
$pdf->SetTextColor(0, 0, 0);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(29 ,7,'6.  MOBILE : ',0,0,'L');
$pdf->SetTextColor(0, 0, 255);
$pdf->SetFont('Arial','',10);	
$pdf->Cell(78,7, $mobile ,0,1,'L');
$pdf->SetTextColor(0, 0,0);
$pdf->Line(13, 72, 200, 72);
// ###########################-------------------------------------------->



// 7& 8 .#########################--------------------------------------------->
$pdf->SetFont('Arial','B',9);
$pdf->Cell(46 ,7,'7.  PERSON TO CONTACT : ',0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(85,7,  $p_full_name ,0,0,'L');
$pdf->SetTextColor(0, 0, 0);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(29,7,'8.  DESIGNATION : ',0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(80,7, $designation,0,1,'L');	
$pdf->SetTextColor(0, 0, 0);

 $pdf->Line(13, 79, 200, 79);
// --------------------------------------------->



//9 &10 ############## --------------------------------------------->
$pdf->SetFont('Arial','B',9);
$pdf->Cell(46 ,7,'9.  EMAIL ID : ',0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(84,7,$email_id,0,0,'L');
$pdf->SetTextColor(0, 0, 0);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(36 ,7,'10. CONTRACT DATE : ',0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(78,7,$contract_date,0,1,'L');	
$pdf->SetTextColor(0, 0, 0);

$pdf->Line(13, 86, 200, 86);
// --------------------------------------------->


// 11 ###########--------------------------------------------->
// $pdf->Line(0, 34, 2100, 34);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(46 ,7,'11. SALES PERSON : ',0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(138,7,$sales_person,0,1,'L');
$pdf->SetTextColor(0, 0, 0);
// --------------------------------------------->
$pdf->Line(13, 93, 200, 93);



// 12.####--------------------------------------------->
$pdf->SetFont('Arial','B',9);
$pdf->Cell(56,7,'12. SPECIAL BILLING (OPTIONAL) : ',0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(138,7, $special_billing,0,1,'L');
$pdf->SetTextColor(0, 0, 0);

$pdf->Line(13, 100, 200, 100);
// --------------------------------------------->





// 13.#######--------------------------------------------->
$pdf->SetFont('Arial','B',9);
$pdf->Cell(46 ,7,'13. REPORTING EMAIL ID : ',0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(85,7,$reporting_email_id,0,1,'L');
$pdf->SetTextColor(0, 0, 0);

$pdf->Line(13, 107, 200, 107);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(46,7,'14. WEBSITE : ',0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(78,7, $website,0,1,'L');
$pdf->SetTextColor(0, 0, 0);	


$pdf->Line(13, 114, 200, 114);
// --------------------------------------------->


// 14.############--------------------------------------------->


$pdf->SetFont('Arial','B',9);
$pdf->Cell(46 ,7,'15. CUSTOMER GSTIN NO : ',0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(78,7, $customer_gstin_no,0,1,'L');	
$pdf->SetTextColor(0, 0, 0);
$pdf->Line(13, 128, 200, 128);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(46 ,7,'16. CUSTOMER PAN NO : ',0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(85,7,$customer_pan_no ,0,1,'L');
$pdf->SetTextColor(0, 0, 0);
$pdf->Line(13, 121, 200, 121);

// --------------------------------------------->

// --------------------------------------------->
$pdf->MultiCell( 188, 5, "", 0,0);
// --------------------------------------------->
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(70 ,8,' YOUR PRODUCT AND SERVICES',1,0,'C');
$pdf->Cell(80 ,8,'DESCRIPTION: ',1,0,'C');
$pdf->Cell(40 ,8,'RATE (INR)',1,0,'C');
// --------------------------------------------->




// ------------Separator--------------------------Table Header and Table Body---------->>>
$pdf->MultiCell( 188, 5, "", 0,0);
$pdf->MultiCell( 188, 3, "", 0,0);
// ------------------------------------------------------------------------------------->>>


// Table YOUR PRODUCT AND SERVICES, DESCRIPTION, RATE (INR):
$pdf->SetTextColor(0, 0, 255);	
$pdf->SetFont('Arial','',11);	
$pdf->SetWidths(array(70,80,40));
$pdf->Row(array($product_service_1,$description_1,$product_service_rate_1));

$pdf->Row(array($product_service_2,$description_2,$product_service_rate_2));
$pdf->Row(array($product_service_3,$description_3,$product_service_rate_3));
$pdf->Row(array($product_service_4,$description_4,$product_service_rate_4));
$pdf->Row(array($product_service_5,$description_5,$product_service_rate_5));
$pdf->SetTextColor(0, 0, 0);


// ------------------
$pdf->SetFont('Arial','B',9);
$pdf->SetDrawColor(0, 0, 0);
$pdf->Cell(150 ,7,'MANAGEMENT FEES (INR)',1,0,'C');

$pdf->SetTextColor(0, 0, 255);
$pdf->SetFont('Arial','',11);
$pdf->Cell(40 ,7,$management_fees,1,1,'L');
$pdf->SetTextColor(0, 0, 0);
// -------------------------------------------

// ------------------
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(150 ,7,'TOTAL (INR)',1,0,'C');

$pdf->SetTextColor(0, 0, 255);
$pdf->SetFont('Arial','',11);
$pdf->Cell(40 ,7,$total,1,1,'L');
$pdf->SetTextColor(0, 0, 0);
// -------------------------------------------

// ------------------
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(150 ,7,'NET PAYABLE (INR)',1,0,'C');

$pdf->SetTextColor(0, 0, 255);
$pdf->SetFont('Arial','',11);
$pdf->Cell(40 ,7,$net_payable,1,1,'L');
$pdf->SetTextColor(0, 0, 0);
// -------------------------------------------

// ------------------
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(150 ,7,'GST 18% (INR)',1,0,'C');

$pdf->SetTextColor(0, 0, 255);
$pdf->SetFont('Arial','',11);
$pdf->Cell(40 ,7,$gst18,1,1,'L');
$pdf->SetTextColor(0, 0, 0);
// -------------------------------------------

// ------------------
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(150 ,7,'TOTAL PAYABLE (INR)',1,0,'C');

$pdf->SetTextColor(0, 0, 255);
$pdf->SetFont('Arial','',11);
$pdf->Cell(40 ,7,$total_payable ,1,1,'L');
$pdf->SetTextColor(0, 0, 0);
// -------------------------------------------

// ------------------
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(150 ,7,'AMOUNT RECEIVED (INR)',1,0,'C');

$pdf->SetTextColor(0, 0, 255);
$pdf->SetFont('Arial','',11);
$pdf->Cell(40 ,7,$amount_received ,1,1,'L');
$pdf->SetTextColor(0, 0, 0);
// -------------------------------------------


// ------------------
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(150 ,7,'BALANCE (INR)',1,0,'C');

$pdf->SetFont('Arial','',11);
$pdf->SetTextColor(0, 0, 255);
$pdf->Cell(40 ,7,$balance ,1,1,'L');
$pdf->SetTextColor(0, 0, 0);
// -------------------------------------------




// --------------------------------------------->


$y=$pdf->GetY();
if($y >200){
	$pdf->addPage();
	$pdf->MultiCell( 188, 5, "", 0,0);
}

 $pdf->MultiCell( 188, 5, "", 0,0);
// ------------------------------------->>>>>>>>>>>>>>>
$pdf->SetFont('Arial','B',9);
$pdf->Cell(188 ,8,"FOR OFFICE USE ONLY",1,1,'C');
$pdf->SetFont('Arial','',10);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetWidths(array(70,118));
$pdf->Row(array("CHEQUE DATES",$c_date));
$pdf->Row(array("CHEQUE NO/S",$c_no));
$pdf->Row(array("CHEQUE AMOUNT", $c_amount ));
$pdf->Row(array("S.E / MANAGER NAME",$c_manager_name));

$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(8 ,10,"",0,1,'C');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(188 ,8,"BANK DETAILS FOR NEFT/RTGS",1,1,'C');
$pdf->SetFont('Arial','',10);
$pdf->SetWidths(array(70,118));
$pdf->Row(array("PAN","AAHCC0085H"));
$pdf->Row(array("GSTIN","06AAHCC0085H1ZU")	);
$pdf->Row(array("BANKER","	KOTAK MAHINDRA BANK LIMITED"));
$pdf->Row(array("BANK ADDRESS","THE PEACH TREE COMPLEX BLOCK-C, SUSHANT LOK-1 GURGAON-122001"));
$pdf->Row(array("ACCOUNT NO","2611864866"));
$pdf->Row(array("IFS CODE","KKBK0004256"));



$pdf->MultiCell( 188, 5, "", 0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(188 ,5,"*TERMS & CONDITIONS:-",0,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->MultiCell( 188, 5, "
	Signatory undertakes that he or she has full authority to contract for this advertising and further guarantees full payments of amount shown promptly with due.The above client here by requests 'Crisp Digital India Private Limited\", to provide services for the items as shown in the table above as noted on the contract in accordance with the term and conditions endorsed herewith and on the following side of this contract.
IMPORTANT: the client warrants the he or she is/ they are the legal owner/ user of the 	telephone numbers given above and undertaken to indemnify  \"Crisp Digital Private limited\" against any claims by the telephone service provider or others party (les) on this account. The client also undertake to make payment specified on the face of this contract plus all state and local taxes which may be or become attributable there to on due dates noted above. Not with standing this 'Crisp Digital India Private Limited' is entitled to collect full payment prior to providing service of the above items and failing such payment, is entitled to refuse to provide service (s) without prior notice to client. Sales personnel are expressly prohibited from collecting payment in cash. Only collectors bearing written authorization from MD/Digital Head of Crisp Digital India Private limited\" may collect cash payment. Pursuant to the above contract, I/ We Hereby allow \"Crisp Digital India Private Limited\" to make commercial call to my / our Mobiles/ Number (s) and organization contact number (s). The declaration will hold valid even if I/We choose get my/ Our number(s) registered to NDNC."
, 0,"J");
$pdf->SetFont('Arial','B',9);
$pdf->Cell(188 ,5,"This applications is from Crisp Digital India Private Limited for all Digital Services",0,1,'C');
$pdf->SetFont('Arial','',9);
$pdf->MultiCell( 188, 5, "
Crisp Digital India Private Limited, shall be indemnified by the client for whom the services are provided in respect of any claims, actions, damages, costs and expenses arising out of an Illegal or libellous matter published for the client, or any infringement of copyright, patent ,design or mercantile or trademark. Crisp Digital India Private Limited, do not assure of or gives any performance guarantee in terms of lead, enquiry of order. In case of any dispute the courts in Haryana only have jurisdiction. All services are for a period 1 day to 365 days as specified and according to the services taken. 
FORCE MAJEURE :	 The service provider (Crisp Digital India Private Limited) shall not be liable In damages or have the right to terminate this contract for any delay or default in performing hereunder if such delay or default is caused by conditions beyond its control including, but not limited to Acts of God, war, insurrections/change of law, strikes or other labour disturbances , refusal on the part of the government agencies or other competent authority to grant any necessary permit or in the event of any other supervening clause ,and/or any other cause tendering performance of any of the obligations committed under the said contract.
Indemnity:	 The client hereby irrevocably and unconditionally undertakes to Indemnify Crisp Digital India Private Limited, In full and keep Crisp Digital India Private Limited, fully indemnified of claims arising out of Information, date, text, software, music, sound, photographs, graphics, videos, messages or any other material or content posted on the website or privately transmitted. The client undertakes the sole responsibility to take necessary action under such circumstances and takes entire responsibility for all contents present on the company website, posted or transmitted. It is the responsibility of client to ensure that material or content complies with national and international laws. Crisp Digital India Private Limited, reserves the right to add, alter, amend any of the terms and conditions of this agreement, at any time, after giving a written notice of one month to the advertiser under the hand of the MD//Head Digital of Crisp Digital India Private Limited. 
* On Cancellation/ request for refund of any contract from client side, a total of 18% of the contract value will be deducted. 
* Client will be responsible for keeping the of all its emails at his end, and under no circumstances Crisp Digital India Private Limited will be held responsible for managing backup of emails.
* Client emails can be blocked if it is found sending SPAMs or Viruses. 
* Crisp Digital India Private Limited will not provide any C-panel details, backup of website or emails to client under any circumstances. It will be client’s responsibility to provide the images for its products and services and in case of any copy infringement from clients end then Crisp Digital India Private Limited will not held responsible. 
Search Engine Optimization (SEO) activities takes minimum 4 to 5 Months for measurable results to show. 
Social Media Optimization (SMO) activities are purely organic as per the packages unless agreed to manage paid activities for additional agreed budget by the client. 
*Crisp Digital India Private Limited will not provide any kind of access for Google Ads Account, backup of Ads except the daily report to client under any circumstances.
", 0,"J");

$pdf->MultiCell( 188, 5, "", 0,0);

$pdf->SetFont('Arial','B',9);
$y=$pdf->GetY();
$tick = "assets/image2/tick.png";
$pdf->Cell(188, 5, "     I understand, accept, and agree to the following terms and conditions.", 0, 1, 'L',$pdf->Image($tick,6,$y-4,12,12));


$pdf->MultiCell( 188, 5, "", 0,0);
$pdf->MultiCell( 188, 5, "", 0,0);
$y=$pdf->GetY();
$pdf->SetDrawColor(10, 100, 100);
$pdf->SetFont('Arial','B',10);

if($signature !="0"){

$pdf->Cell(188, 40, " ", 1, 1, 'C',$pdf->Image( $signature,41,$y,40,40));

}

if($stamp !="0"){
    $pdf->Cell(188, 5, "AUTHORISED SIGNATURE                                                        COMPANY'S STAMP", 1, 1, 'C',$pdf->Image($stamp,132,$y+2,40,38));
}




// else{
//     $pdf->SetTextColor(255, 0, 0);
//     $pdf->Cell(188 ,7,"Unable to Upload Stamp & Signature." ,1,1,'C');
// }


$pdf->PageNo();
$pdf->AliasNbPages(); 
$pdf->AliasNbPages('{totalPages}');










$pdf->output();
$pdf->Output('F', $filename, true);

?>

