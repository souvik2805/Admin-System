<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thank You.</title>
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
                <h4 style="text-align: center;color: black;text-shadow: 1px 1px blue;">Online/Digital Services <br>Contract</h4>
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
        <?php 
           if($_SESSION['digital-contract-form']['sent_mail'] == 'YES'){
              echo '
              <div class="alert alert-success">
                <strong>Email Send Successfully!</strong>
              </div>';
           }
           else{
             echo '
             <div class="alert alert-danger">
              <strong>Warning !</strong> Unable to send mail.
              </div>';
           }

          

          echo '
           <center>
                <h5 class="card-title">Greetings from Crisp Digital India Pvt Ltd.</h5>
                <p class="card-text">Thank you for your contract with us.</p>
                <h4 class="card-title">Contract Form No: '.$_SESSION['digital-contract-form']['no'].'</h4>
                <br>
                 
                 <a href="'.$_SESSION['digital-contract-form']['pdf_name'].'" download title="Download" 
                 class="btn btn-warning">Download this form
                 <i class="fa fa-download" aria-hidden="true"></i>
                 </a>

 
                <a href="form.php" class="btn btn-primary">New Application</a>
                 <a href="index.php" class="btn btn-success">Back to Admin Panel</a>

          </center>';
        ?>
        

        
          
           
           
            <br>
            
            
           
           
         </center>
      </div>
    </div>
</div>



<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/jquery.validationEngine-en.js"></script>
<script src="assets/js/jquery.validationEngine.js"></script>
<!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
<script src='assets/js/main.js'></script>
<script src="assets/js/bootstrap4-toggle.min.js"></script>

<script>


</script>
</body>
</html>
