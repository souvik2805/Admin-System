<?php
require 'database/queries.php';
$table = 'tbl_contract_form';


if(isset($_GET['edit_contract']) && !empty($_GET['edit_contract'])){
  $where      = ['form_no' => $_GET['edit_contract']];
  $data       = "*";
  $select     = select($table,$data,$where);
  $result     = mysqli_fetch_assoc($select);
  

  $form_no     = $result["form_no"];
  $advertiser  = $result["advertiser_name"];

  $full_address  =explode("|-^^=|",$result["full_address"]);
  $address = $full_address[0];
  $city    = $full_address[1];
  $pin     = $full_address[2];


  $all_phone_no = explode("|-^^=|", $result["all_phone_no"]);
  $primary_phone=$all_phone_no[0];
  $mobile       =$all_phone_no[1];

  $person_to_contact= explode("|-^^=|", $result["person_to_contact"]);
  $sri  =  $person_to_contact[0];
  $name =  $person_to_contact[1];

  $designation      = $result["designation"];

  $all_email = explode("|-^^=|", $result["all_email"]);
  $email_id  = $all_email[0];
  $reporting_email_id = $all_email[1];

   $contract_date    = $result["contract_date"];
   $sales_person     = $result["sales_person"];
   $special_billing  = $result["special_billing"];
   $website          = $result["website"];

   $customer_pan_gstin =  explode("|-^^=|", $result['customer_pan_gstin']);
   $customer_pan_no    =  $customer_pan_gstin[0];
   $customer_gstin_no  =  $customer_pan_gstin[1];

   // -----------------------product_and_services-------------->

   $product_and_services = explode("|-^^=|", $result["product_and_services"]);

  $product_service_1       = $product_and_services[0];
  $description_1           = $product_and_services[1];
  $product_service_rate_1  = $product_and_services[2];

  $product_service_2       = $product_and_services[3];
  $description_2           = $product_and_services[4];
  $product_service_rate_2  = $product_and_services[5];

  $product_service_3       = $product_and_services[6];
  $description_3           = $product_and_services[7];
  $product_service_rate_3  = $product_and_services[8];

  $product_service_4       = $product_and_services[9];
  $description_4           = $product_and_services[10];
  $product_service_rate_4  = $product_and_services[11];

  $product_service_5      = $product_and_services[12];
  $description_5           = $product_and_services[13];
  $product_service_rate_5  = $product_and_services[14];
 
 // -----------------------------------------end-------------------->

  $management_fees = $result["management_fees"];
  $total           = $result["total"];
  $net_payable     = $result["net_payable"];
  $gst18           = $result["gst"];
  $total_payable   = $result["total_payable"];
  $amount_received = $result["amout_received"];
  $balance         = $result["balance"];
  $c_date          = $result["cheque_date"];
  $c_no            = $result["cheque_no"];
  $c_amount        = $result["cheque_amout"];
  $c_manager_name  = $result["manager_name"];


  $sign_and_stamp =  explode("|-^^=|", $result['sign_and_stamp']);
  $sign = $sign_and_stamp[0];
  $stamp = $sign_and_stamp[1];

   // echo "<pre>";
   // print_r($result);
   // echo "</pre>";
  
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>CrispDigital Contract Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css2/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css2/style.css">
  <link rel="stylesheet" href="assets/css2/validationEngine.jquery.css">
  <link rel="stylesheet" href="assets/css2/bootstrap4-toggle.min.css">
 
</head>
<body>

<div class="container">
     <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">

          <li class="nav-item">
               <a class="navbar-brand" href="#">
               <img src="assets/image2/crisp-logo.png" class="logo" alt="logo" width="120" height="100" >
               </a>
          </li>
          <li class="nav-item">
            <div class="nav-link" href="#" style="padding:0px;">
              <ul class="list-unstyled" style="color: black;">
                <li><b>Crisp Digital India Private Limited</b></li>
                <li>216 SF, Sushant Tower, Sushant Lok-II</li>
                <li>Gurgaon - 122011, Tel: 0124-4867430</li>
                <li>CIN: U74999HR2017PTC069087</li>
              </ul>
            </div>
          </li>
          <li class="nav-item p-middle">
              <a class="nav-link disabled" href="#">
                <h4 style="text-align: center;color: black;text-shadow: 1px 1px blue;">Online/Digital Services <br>Contract<br>Edit</h4>
              </a>
          </li>
           <li class="nav-item" style="">
              <a class="navbar-brand" href="#">
               <img src="assets/image2/google-ad.jpg" class="google" alt="logo" width="250" height="85" >
               </a>
              <ul class="list-inline">
                <li class="list-inline-item">
                  <a href="https://www.facebook.com/crispdigitalindia/" target="_blank">
                    <i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                </li>
                <li  class="list-inline-item">
                  <a href="https://www.linkedin.com/company/crisp-digital-india-private-limited/" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                </li>
                <li  class="list-inline-item">
                  <a href="https://twitter.com/crisp_digital" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </li>
                <li  class="list-inline-item">
                  <a href="https://www.instagram.com/crispdigitalindia/" target="_blank">
                    <i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
                <li  class="list-inline-item">
                  <a href="https://www.youtube.com/channel/UCBMfcBdU3p3YrP9DvkGJq_w" target="_blank">
                    <i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                </li>
                <li  class="list-inline-item">
                  <a href="https://in.pinterest.com/crispdigitalindia/" target="_blank"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a>
                </li>
              </ul>
            
          </li>
        </ul>
      </div>
      <div class="card-body">


         <form  autocomplete="off" action="update_form.php" id="form" method="POST"  enctype="multipart/form-data"> 
             

             <div class="form-row">
                  <div class="form-group col-md-5">
                     <!-- <a class="btn btn-info "href="home?manage_contract">Back to Admin Panel</a> -->
                  </div>
                   <div class="form-group col-md-7">
                      <h3>Form No:- <?=  $form_no ?></h3>
                      <input type="hidden"  name="U_form_no" value="<?=$form_no?>">
                  </div>
            </div>
            <hr>

             <input type="hidden" name="form_no">
            <div class="form-group">
                <label class="label" for="advertiser">1. advertiser / company name</label>
                <input type="text" class="form-control validate[required]" name="advertiser"  placeholder="Crisp Digital India Private Limited" data-errormessage-value-missing="Advertiser /company name is required*" data-prompt-position="bottomLeft" value="<?=$advertiser?>">
            </div>
            <div class="form-group">
                <label class="label" for="address">2. address</label>
                <input type="text" class="form-control validate[required]"  name="address" placeholder="216 SF, Sushant Tower, Sushant Lok-II" data-errormessage-value-missing="Address is required*" data-prompt-position="bottomLeft"  value="<?=$address ?>">
            </div>
            <div class="form-row">
                  <div class="form-group col-md-6">
                      <label class="label" for="inputCity">3. City</label>
                      <input type="text" class="form-control validate[required]" name="city"  placeholder="Bhubaneswar." data-errormessage-value-missing="City is required*" data-prompt-position="bottomLeft"  value="<?=$city?>">
                  </div>
                   <div class="form-group col-md-6">
                      <label class="label" for="pin">4. PIN CODE</label>
                      <input type="text" class="form-control validate[required]" name="pin"  placeholder="741501.  " data-errormessage-value-missing="Pin is required*" data-prompt-position="bottomLeft"  value="<?=$pin?>">
                  </div>
            </div>

           <div class="form-row">
                 <div class="form-group col-md-6">
                      <label class="label" for="primary_phone">5. primary phone</label>
                      <input type="text" class="form-control validate[required]" name="primary_phone" placeholder="9812345678" data-errormessage-value-missing="Primary phone no is required*" data-prompt-position="bottomLeft"  value="<?=$primary_phone?>">
                 </div>
                 <div class="form-group col-md-6">
                      <label class="label" for="mobile">6. mobile</label>
                      <input type="text" class="form-control validate[required]" name="mobile" id="" placeholder="9812345678" data-errormessage-value-missing="Mobile no is required*" data-prompt-position="bottomLeft"  value="<?=$mobile?>">
                 </div>

                 <div class="form-group col-md-6">
                      <label class="label" for="person_to_contact">7. person to contact</label>
                       <div class="input-group">
                          <span class="input-group-addon">
                            <select name="sri" class="validate[required]" data-errormessage-value-missing="Title is required*" data-prompt-position="bottomLeft">
                     
  <option value="Mr."<?php if($sri == 'Mr.') { ?> selected="selected"<?php } ?>>Mr.</option>
  <option value="Mrs."<?php if($sri == 'Mrs.') { ?> selected="selected"<?php } ?>>Mrs.</option>
  <option value="Miss"<?php if($sri == 'Miss') { ?> selected="selected"<?php } ?>>Miss</option>
                              ?>
                            </select>
                          </span>
                          <input type="text" name="name" class="form-control validate[required]" placeholder="Ram Lakshman  Das "  data-errormessage-value-missing="Name is required*" data-prompt-position="bottomLeft" value="<?=$name?>">
                      </div><!-- /input-group -->
                        
                 </div>

                  <div class="form-group col-md-6">
                     <label class="label" for="person_to_contact">8. designation</label>
                        <select class="form-control validate[required]" name="designation" data-errormessage-value-missing="Designation is required*" data-prompt-position="bottomLeft">

   <option value="Director"<?php if($designation == 'Director') { ?> selected="selected"<?php } ?>>Director</option>
  <option value="Proprietor"<?php if($designation == 'Proprietor') { ?> selected="selected"<?php } ?>>Proprietor</option>
  <option value="Partner" <?php if($designation == 'Partner') { ?> selected="selected"<?php } ?>>Partner</option>
  <option value="Authorized Signatory" <?php if($designation == 'Authorized Signatory') { ?> selected="selected"<?php } ?>>Authorized Signatory</option>
                         

                      </select>
                  </div>
                  <div class="form-group col-md-6">
                      <label class="label" for="email_id">9. email id</label>
                      <input type="text" class="form-control validate[required[custom[email]]]" name="email_id" id="" placeholder="info@crispdigital.in"  data-errormessage-value-missing="Email is required*" data-prompt-position="bottomLeft" value="<?=$email_id ?>">
                  </div>
                <div class="form-group col-md-6">
                  <label class="label" for="contract date">10. contract date</label>
                  <input type="date" class="form-control validate[required]" name="contract_date" id="" placeholder="Email id" data-errormessage-value-missing="Contract date is required*" data-prompt-position="bottomLeft" value="<?=$contract_date?>">
               </div>


               <div class="form-group col-md-6">
                  <label class="label" for="sales person">11. sales person</label>
                  <input type="text" class="form-control validate[required]" name="sales_person" placeholder="Tapas Kumar  Biswas" data-errormessage-value-missing="Sales person name is required*" data-prompt-position="bottomLeft" / value="<?= $sales_person?>">
               </div>
               
           </div>

          <div class="form-group">
            <label class="label" for="special_billing">12. special billing <span class="optional"> (optional)</span></label>
            <input type="text" class="form-control" name="special_billing" placeholder="special billing" value="<?=$special_billing?>">
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="label" for="reporting_email_id">13. reporting email id</label>
              <input type="email" class="form-control validate[required[custom[email]]]" name="reporting_email_id"  placeholder="info@crispdigital.in" data-errormessage-value-missing="Reporting email is required*" data-prompt-position="bottomLeft" value="<?=$reporting_email_id?>">
            </div>
            <div class="form-group col-md-6">
              <label class="label" for="website">14. website</label>
              <input type="text" class="form-control" name="website" placeholder="www.crispdigitalindia.com" value="<?=$website?>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="label" for="customer_gstin_no">15. customer gstin no</label>
              <input type="text" class="form-control validate[required]" name="customer_gstin_no"  placeholder="29CRYPB9874B2Z5" data-errormessage-value-missing="GSTIN no is required*" data-prompt-position="bottomLeft" value="<?= $customer_pan_no ?>">
            </div>
            <div class="form-group col-md-6">
              <label class="label" for="customer_pan_no">16. customer pan no</label>
              <input type="text" class="form-control validate[required]" name="customer_pan_no" placeholder="CRYPB9874B" data-errormessage-value-missing="Pan no is required*" data-prompt-position="bottomLeft" value="<?=$customer_gstin_no ?>">
            </div>
            
          </div>
          <br><br>
          <div class="form-row">
                         <div class="form-group label col-md-4">SELECT YOUR PRODUCT AND SERVICES</div>
                         <div class="form-group label col-md-4">DESCRIPTION</div>
                         <div class="form-group label col-md-4">RATE (INR)</div>
          </div>
          
          <div class="form-row">
               <div class="form-group col-md-4">
                            <select class="form-control validate[required]" id="product_service_1" name="product_service_1" data-errormessage-value-missing="Minimum one product and services is required*" data-prompt-position="bottomLeft"> 
                                <option  value="<?=$product_service_1?>"><?=$product_service_1?></option>
                            </select>
               </div>
               <div class="form-group col-md-4">
                  <textarea  class="form-control " type="text" name="description_1" data-errormessage-value-missing="Description is required*" data-prompt-position="bottomLeft"><?=$description_1 ?></textarea>
               </div>
               <div class="form-group col-md-4">
                  <input class="form-control calculate auto_cal validate[required]" type="text" name="product_service_rate_1" data-errormessage-value-missing="Rate is required*" data-prompt-position="bottomLeft" id="calculate_1" onfocus="freez(this)" onblur="freez(this)" value="<?= $product_service_rate_1?>">
               </div>
          </div>

           <div class="form-row">
               <div class="form-group col-md-4">
                            <select class="form-control " id="product_service_2" name="product_service_2"> 
                               <option  value="<?=$product_service_2?>"><?=$product_service_2?></option>
                            </select>
               </div>
               <div class="form-group col-md-4">
                  <textarea  class="form-control" type="text" name="description_2" data-errormessage-value-missing="Rate is required*" data-prompt-position="bottomLeft" ><?=$description_2 ?></textarea>
               </div>
               <div class="form-group col-md-4">
                  <input class="form-control calculate auto_cal" type="text" name="product_service_rate_2"
                   id="calculate_2" onfocus="freez(this)" onblur="freez(this)"  value="<?= $product_service_rate_2?>">
               </div>
          </div>

          <div class="form-row">
                <div class="form-group col-md-4">
                            <select class="form-control " id="product_service_3" name="product_service_3"> 
                               <option  value="<?=$product_service_3?>"><?=$product_service_3?></option>
                            </select>
               </div>
               <div class="form-group col-md-4">
                  <textarea  class="form-control" type="text" name="description_3"><?=$description_3 ?></textarea>
               </div>
               <div class="form-group col-md-4">
                  <input class="form-control calculate auto_cal" type="text" name="product_service_rate_3" 
                  id="calculate_3" onfocus="freez(this)" onblur="freez(this)" value="<?= $product_service_rate_3?>">
               </div>
          </div>
          <div class="form-row">
               <div class="form-group col-md-4">
                            <select class="form-control" id="product_service_4" name="product_service_4"> 
                              <option  value="<?=$product_service_4?>"><?=$product_service_4?></option>
                            </select>
               </div>
               <div class="form-group col-md-4">
                  <textarea  class="form-control" type="text" name="description_4"><?=$description_4 ?></textarea>
               </div>
               <div class="form-group col-md-4">
                  <input class="form-control calculate auto_cal" type="text" name="product_service_rate_4"
                   id="calculate_4" onfocus="freez(this)" onblur="freez(this)"  value="<?= $product_service_rate_4?>">
               </div>
          </div>
          <div class="form-row">
              <div class="form-group col-md-4">
                            <select class="form-control" id="product_service_5" name="product_service_5"> 
                              <option  value="<?=$product_service_5?>"><?=$product_service_5?></option>
                            </select>
               </div>
               <div class="form-group col-md-4">
                  <textarea  class="form-control" type="text" name="description_5"><?=$description_5 ?></textarea>
               </div>
               <div class="form-group col-md-4">
                  <input class="form-control calculate auto_cal" type="text" name="product_service_rate_5" 
                  id="calculate_5" onfocus="freez(this)" onblur="freez(this)" value="0" value="<?= $product_service_rate_5?>">
               </div>
          </div>
          <div class="cbg">
             <div class="form-row">
                   <div class="form-group col-md-4"></div>
                   <div class="form-group col-md-4 label2">
                      MANAGEMENT FEES (INR)
                   </div>
                   <div class="form-group col-md-4 ">
                      <input class="form-control calculate auto_cal" type="text" name="management_fees"  id="calculate_6" onfocus="freez(this)" onblur="freez(this)" value="<?=$management_fees?>">
                   </div>
             </div>

              <div class="form-row">
                   <div class="form-group col-md-4"></div>
                   <div class="form-group col-md-4 label2">
                      TOTAL (INR)
                   </div>
                   <div class="form-group col-md-4">
                     <input type="text"  class="form-control calculate auto_cal" name="total" id="calculate_7" value="<?=$total ?>">
                   </div>
              </div>

               <div class="form-row">
                   <div class="form-group col-md-4"></div>
                   <div class="form-group col-md-4 label2">
                      NET PAYABLE (INR)
                   </div>
                   <div class="form-group col-md-4 ">
                     <input type="text"  class="form-control  calculate auto_cal" name="net_payable" id="calculate_8" value="<?=$net_payable ?>">
                   </div>
               </div>

                <div class="form-row">
                   <div class="form-group col-md-4"></div>
                   <div class="form-group col-md-4 label2">
                     GST 18% (INR)
                   </div>
                   <div class="form-group col-md-4">
                     <input type="text"  class="form-control calculate auto_cal" name="gst18" id="calculate_9" value="<?=$gst18?>">
                   </div>
               </div>

                <div class="form-row">
                   <div class="form-group col-md-4"></div>
                   <div class="form-group col-md-4 label2">
                     TOTAL PAYABLE (INR)
                   </div>
                   <div class="form-group col-md-4">
                     <input type="text"  class="form-control calculate auto_cal" name="total_payable" id="calculate_10" value="<?=$total_payable?>">
                   </div>
               </div>
               <div class="form-row">
                   <div class="form-group col-md-4"></div>
                   <div class="form-group col-md-4 label2  calculate auto_cal">
                    AMOUNT RECEIVED (INR)
                   </div>
                   <div class="form-group col-md-4">
                     <input type="text"  class="form-control calculate auto_cal" name="amount_received" 
                     id="calculate_11" onfocus="freez(this)" onblur="freez(this)" value="0" value="<?=$amount_received?>">
                   </div>
                </div>

              <div class="form-row">
                 <div class="form-group col-md-4"></div>
                 <div class="form-group col-md-4 label2 ">
                  BALANCE (INR)
                 </div>
                 <div class="form-group col-md-4">
                  <input type="text"  class="form-control calculate auto_cal" name="balance" id="calculate_12" value="<?=$balance?>">
                 </div>
               </div>
               <div class="form-row">
                  <div class="col-md-10"></div>
                  <div class="col-md-2">
                    <label>Auto Calculator</label>
                     <input type="checkbox" checked data-toggle="toggle" id="auto_toggle" data-size="xs">
                     <input type="hidden" id="textbox1"  value="1" />
                  </div>
               </div>

            </div>
          

     
          <div class="form-row">
            <div class="form-group col-md-6">
              <h5 class="office-only">FOR OFFICE USE ONLY</h5>
               <div class="table table-bordered" style="background-color: rgba(0,0,0,.03);">
                      <div class="row c_row">
                        <div class="col-md-4">CHEQUE DATES</div>
                          <div class="col-md-8">
                            <input  type="text" class="form-control date" id="Txt_Date"  name="c_date" onclick="show_cal(this)" value="<?=$c_date?>">
                          </div> 
                      </div>

                      <div class="row c_row">
                         <div class="col-md-4">CHEQUE NO/S</div>
                         <div class="col-md-8">
                            <textarea  class="form-control " type="text" name="c_no"><?=$c_no?></textarea>
                          </div>
                      </div>

                       <div class="row c_row">
                          <div class="col-md-4">CHEQUE AMOUNT</div>
                          <div class="col-md-8">
                              <textarea type="text" class="form-control " name="c_amount"><?=$c_amount?></textarea>
                          </div>
                      </div>

                      <div class="row c_row">
                         <div class="col-md-4">S.E / MANAGER NAME</div>
                        <div class="col-md-8">
                           <textarea type="text" class="form-control" name="c_manager_name"><?=$c_manager_name?></textarea>
                        </div>
                      </div>

                
                     
                </div>
            </div>
            <div class="form-group col-md-6">
               <h5 class="office-only">BANK DETAILS FOR NEFT/RTGS</h5>
              <table class="table table-bordered" style="background-color: #e8e7d3;">
                      <tr>
                        <th>PAN</th>
                        <td>AAHCC0085H</td>
                      </tr>

                      <tr>
                        <th>GSTIN</th>
                        <td>06AAHCC0085H1ZU</td>
                      </tr>

                       <tr>
                        <th>BANKER</th>
                        <td>KOTAK MAHINDRA BANK LIMITED</td>
                      </tr>

                      <tr>
                        <th>BANK ADDRESS</th>
                        <td>THE PEACH TREE COMPLEX BLOCK-C, SUSHANT LOK-1 GURGAON-122001</td>
                      </tr>

                       <tr>
                        <th>ACCOUNT NO</th>
                        <td>2611864866</td>
                      </tr>

                       <tr>
                        <th>IFS CODE</th>
                        <td>KKBK0004256</td>
                      </tr>
                       

                
                     
                </table>
            </div>
          </div>

 
            <div class="form-row">
               <div class="form-group col-md-12">
                   <hr>
                   <center><label class="label" style="text-align: center;">TERMS & CONDITIONS</label></center><br>
                      <p style="text-align: justify; padding: 5px 25px;font-size: 14px;">Signatory undertakes that he or she has full authority to contract for this advertising and further guarantees full payments of amount shown promptly with due.<br>
                      The above client here by requests 'Crisp Digital India Private Limited", to provide services for the items as shown in the table above as noted on the contract in accordance with the term and conditions endorsed herewith and on the following side of this contract.
                      <br><br>
                      <strong>IMPORTANT:</strong> the client warrants the he or she is/ they are the legal owner/ user of the telephone numbers given above and undertaken to indemnify  "Crisp Digital Private limited" against any claims by the telephone service provider or others party (les) on this account. The client also undertake to make payment specified on the face of this contract plus all state and local taxes which may be or become attributable there to on due dates noted above. Not with standing this 'Crisp Digital India Private Limited’ is entitled to collect full payment prior to providing service of the above items and failing such payment, is entitled to refuse to provide service (s) without prior notice to client. Sales personnel are expressly prohibited from collecting payment in cash. Only collectors bearing written authorization from MD/Digital Head of Crisp Digital India Private limited" may collect cash payment. Pursuant to the above contract, I/ We Hereby allow "Crisp Digital India Private Limited" to make commercial call to my / our Mobiles/ Number (s) and organization contact number (s). The declaration will hold valid even if I/We choose get my/ Our number(s) registered to NDNC.<br>
                    </p>
                  <center>
                    <h5 class="label">This applications is from Crisp Digital India Private Limited for all Digital Services</h5>
                  </center>
                  <p style="text-align: justify; padding: 5px 25px; font-size: 14px;">
                      Crisp Digital India Private Limited, shall be indemnified by the client for whom the services are provided in respect of any claims, actions, damages, costs and expenses arising out of an Illegal or libellous matter published for the client, or any infringement of copyright, patent ,design or mercantile or trademark. Crisp Digital India Private Limited, do not assure of or gives any performance guarantee in terms of lead, enquiry of order.
                      <br>
                      In case of any dispute the courts in Haryana only have jurisdiction.
                      <br>
                      All services are for a period 1 day to 365 days as specified and according to the services taken.
                  </p>

                    <p style="text-align: justify; padding: 5px 25px;font-size: 14px;">
                       <strong>FORCE MAJEURE :  </strong> 
                       The service provider (Crisp Digital India Private Limited) shall not be liableIn damages or have the right to terminate this contract for any delay or default in performing hereunder if such delay or default is caused by conditions beyond its control including, but not limited to Acts of God, war, insurrections/change of law, strikes or other labour disturbances , refusal on the part of the government agencies or other competent authority to grant any necessary permit or in the event of any other supervening clause ,and/or any other cause tendering performance of any of the obligations committed under the said contract.
                       <br>

                        <strong>Indemnity:   </strong>
                           The client hereby irrevocably and unconditionally undertakes to Indemnify Crisp Digital India Private Limited, In full and keep Crisp Digital India Private Limited, fully indemnified of claims arising out of Information, date, text, software, music, sound, photographs, graphics, videos, messages or any other material or content posted on the website or privately transmitted. The client undertakes the sole responsibility to take necessary action under such circumstances and takes entire responsibility for all contents present on the company website, posted or transmitted. 
                           <br><br>
                           It is the responsibility of client to ensure that material or content complies with national and international laws. 
                           <br><br>
                           Crisp Digital India Private Limited, reserves the right to add, alter, amend any of the terms and conditions of this agreement, at any time, after giving a written notice of one month to the advertiser under the hand of the MD//Head Digital of Crisp Digital India Private Limited. 
                           <br><br>
                           • On Cancellation/ request for refund of any contract from client side, a total of 18% of the contract value will be deducted. 
                           <br><br>
                            * Client will be responsible for keeping the of all its emails at his end, and under no circumstances Crisp Digital India Private Limited will be held responsible for managing backup of emails.
                            <br><br>
                            • Client emails can be blocked if it is found sending SPAMs or Viruses. 
                            <br><br>
                            • Crisp Digital India Private Limited will not provide any C-panel details, backup of website or emails to client under any circumstances.  
                            <br><br>
                            It will be client’s responsibility to provide the images for its products and services and in case of any copy infringement from clients end then Crisp Digital India Private Limited will not held responsible.
                            <br><br>
                            Search Engine Optimization (SEO) activities takes minimum 4 to 5 Months for measurable results to show.
                            <br><br>
                            Social Media Optimization (SMO) activities are purely organic as per the packages unless agreed to manage paid activities for additional agreed budget by the client. 
                            <br><br>
                             Crisp Digital India Private Limited will not provide any kind of access for Google Ads Account, backup of Ads except the daily report to client under any circumstances.  
                     </p>
                  </div>
                  
                  <div class="col-md-11" style="padding-left: 20px;color: blue;font-size: 18px;;">
                     <input type="checkbox" required="" checked="" style="zoom:1.5" >
                       <label >I understand, accept, and agree to the following terms and conditions </label><br>
                  </div>

                       
                          
                  
                 


          </div><br><hr> 


             <div class="form-row">

                <div class="form-group col-md-6" style="padding:0px 25px;">
                    <label class="label" for="inputState" >Authorised Signature</label><br>
                   
                    <input type="file" name="file_1" id="file_1" accept="image/*"  >
                     <img id="output_image" src="assets/upload_sign_stamp/<?=$sign?>" />
                </div>
                <div class="form-group col-md-6">

                    <label class="label" for="inputState">Company's Stamp</label><br>
                    
                    <input type="file" class="" name="file_2"  accept="image/*" onchange="preview_image2(event)"  >
                    <img id="output_image2" src="assets/upload_sign_stamp/<?=$stamp?>" />
                </div> 
                  
            </div>  

 
           <br><br>
          <center>

         <!--    <div class="form-group g-recaptcha" style="margin-left: 22px;" data-sitekey="6LevFbkUAAAAACVOogk8Eq-0Jo6cfNoWswWddnyW" data-callback="enableBtn"></div>
          
            <div class="g-recaptcha"></div>   -->
             
         

            <button type="submit"  class="btn btn-primary" id="liquidacion_save" name="liquidacion[save]" onclick="$('form').attr('target', '');$('form').attr('action', 'update_form.php');">
            Update
            </button>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                <button type="submit" class="btn btn-success" id="liquidacion_Previsualizar" name="Preview" onclick="$('form').attr('target', '_blank');$('form').attr('action', 'preview.php');">Preview</button>
             

         
              
           </center><br><br>
           

       
        </form>
      </div>
    </div>
</div>



<script src="assets/js2/jquery.min.js"></script>
<script src="assets/js2/popper.min.js"></script>
<script src="assets/js2/bootstrap.min.js"></script>
<script src="assets/js2/jquery.validate.min.js"></script>
<script src="assets/js2/jquery.validationEngine-en.js"></script>
<script src="assets/js2/jquery.validationEngine.js"></script>
<!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
<script src='assets/js2/main.js'></script>
<script src="assets/js2/bootstrap4-toggle.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet"/>

<script>

function freez(obj){
  var input = obj.value;
      input = input.trim();
       if(input == '0'){
         obj.value='';
       }
       else if(input == ''){
         obj.value='0';
       }
}



function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}


function preview_image2(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image2');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}

</script>
</body>
</html>
