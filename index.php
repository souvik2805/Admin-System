 <?php 
session_start();
include "database/path.php";

if(isset($_SESSION['error'])){
  echo '
  <script>
   alert("'.$_SESSION['error'].'")
  </script>';
}
if(empty($_SESSION['digital-contract-superadmin'])){
}
else{
header("location:$domain_name/home?dashboard");
}
?>
<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from myrathemes.com/lunoz/layouts/vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jul 2020 09:26:17 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Superadmin CDIPL Contract Form </title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="MyraStudio" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/logo-dark.png">
    
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    
    </head>

<body >

    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block my-5">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center mb-4 mt-3">
                                                <a href="#">
                                                    <span><img src="assets/images/logo-dark.png" alt="" height="120"></span>
                                                </a>
                                            </div>
                                            <form action="database/admin_login.php" method="POST" class="p-2">
                                                <div class="form-group">
                                                    <label class="cl">User Name</label>
                                                    <input class="form-control" type="text" name="user_id" required="" placeholder="username">
                                                </div>
                                                <div class="form-group">
                                                    <a href="pages-recoverpw.html" class="text-muted float-right">Forgot your password?</a>

                                                    <label for="password" class="cl">Password</label>
                                                    <input class="form-control" type="password" required="" name="password" placeholder="Enter your password" id="o_password">
                                                       <i class="fa fa-eye-slash showicon" onclick="OPtoggleShowPassword()" id="showicon_o" style="cursor: pointer;right: 40px !important; margin-top: -25px;position: absolute;"></i> 
                                                </div>
            
                                                
                                             
                                                <div class="mb-3 text-center">
                                                    <button class="btn btn-primary btn-block" type="submit"> Sign In </button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end card-body -->
                                    </div>
                                    <!-- end card -->
            
                                    <div class="row mt-4">
                                        <div class="col-sm-12 text-center">
                                            <p class="text-white-50 mb-0">Create an account? <a href="pages-register.html" class="text-white-50 ml-1"><b>Sign Up</b></a></p>
                                        </div>
                                    </div>
            
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/simplebar.min.js"></script>

    <!-- App js -->
    <script src="assets/js/theme.js"></script>
<script>
  function OPtoggleShowPassword(){
        var x = document.getElementById("o_password");
        var imgsrc = document.getElementById("showicon_o");
        if (x.type === "password") {
            
            $('#showicon_o').removeClass('fa fa-eye-slash');
            $('#showicon_o').addClass('fa fa-eye');
            x.type = "text";                    
        } else {
            
            
            $('#showicon_o').removeClass('fa fa-eye');
            $('#showicon_o').addClass('fa fa-eye-slash');
            x.type = "password";                    
        }
    }

</script>
</body>


<!-- Mirrored from myrathemes.com/lunoz/layouts/vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jul 2020 09:26:17 GMT -->
</html>