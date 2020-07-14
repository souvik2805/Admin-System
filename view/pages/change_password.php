
 <div class="main-content">
     <div class="page-content">
        <!--  <div class="row">
                
            </div> -->
        <div class="container-fluid">
                        <form method="POST" method="POST" autocomplete="off">
                            <div class="row">
                                <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                      <div style="text-align: center;">
                                        <h3 style="color: blue;">Chanage Password</h3>
                                        <br><br>
                                      </div>
                                        
                                           
                                          <div class="form-group row">
                                              <label class="col-sm-4 a2-label">Old Password<span class="red">*</span> :
                                              </label>
                                              <div class="col-md-6">
                                                    <input type="password" class="form-control" name="old_password" placeholder="Username"  required="">
                                               </div>
                                          </div>

                                          <div class="form-group row">

                                               <label class="col-sm-4 a2-label">New Password <span class="red">*</span> :
                                              </label>
                                              <div class="col-md-6">
                                                    <input type="password" class="form-control" name="password1" placeholder="Password"  required="">
                                               </div>
                                          </div>
                                            <div class="form-group row">

                                                <label class="col-sm-4 a2-label">Confirm New Password <span class="red"> * :</span>
                                                </label>
                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" name="password2" placeholder="Confirm Password"  required="">
                                                </div>
                                             </div>
                                        <br>
                                      
                                    </div>
                                <div class="col-md-1"></div>
                            </div>
                            <br>
                              <center><input type="submit" name="change_password" value="Change Password" class="btn btn-primary btn-lg"></center>
                        </form>
                        <br>
</div>
</div>


<?php
if(isset($_SESSION['error'])){
  echo '
  <script>
   alert("'.$_SESSION['error'].'")
  </script>';
  unset($_SESSION['error']);
}



if(isset($_POST["change_password"])){
     $table = 'tbl_superadmin';

      $password1 ='';
      $password2 ='';

    if($_SESSION['digital-contract-superadmin']["password"] != $_POST["old_password"]){

      $_SESSION['error'] = 'Please enter correct old password';
      echo"<script>window.open('home?change_password','_self')</script>";
    }

    if($_POST['password1'] != $_POST['password2']){
      $_SESSION['error'] = 'New password and Confirm new password do not match.';
      echo"<script>window.open('home?change_password','_self')</script>";
    }

    $data = [
        "password"  =>$_POST["password2"]
    ];

    $where = ['user_id' => "superadmin"];
    $update= update($table,$data,$where);


if($update == "1"){
  $_SESSION['digital-contract-superadmin']["password"] = $_POST["password2"];
          echo '
                <script>
                 alert("Password changed succesfully");
                </script>';
    echo"<script>window.open('home?dashboard','_self')</script>";
} 
else{
         echo "<script>alert('Unable to Update user. Please try again!');</script>";
 }        
}
?>



