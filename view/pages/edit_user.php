<?php
$table = 'tbl_sales_person';


if(isset($_GET['edit_user']) && !empty($_GET['edit_user'])){
  $where      = ['id' => $_GET['edit_user']];
  $data       = "*";
  $select     = select($table,$data,$where);
  $result     = mysqli_fetch_assoc($select);

  $name           = $result['display_name'];
  $user_name      = $result['user_name'];
  $password       = $result['password'];
  ?>










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
                                        <h3 style="color: blue;">Edit User Information</h3>
                                        <br><br>
                                      </div>
                                        <div class="form-group row">
                                         
                                            <label class="col-sm-4 a-label">Salesperson name <span class="red">*</span> :
                                            </label>
                                            <div class="col-md-6">
                                                  <input type="text" class="form-control" name="name" placeholder="Display Name"  value="<?=$name ?>" required="">
                                            </div>
                                        </div>
                                           
                                          <div class="form-group row">
                                              <label class="col-sm-4 a-label">Username <span class="red">*</span> :
                                              </label>
                                              <div class="col-md-6">
                                                    <input type="text" class="form-control" name="user_name" placeholder="Username" value="<?=$user_name  ?>" required="">
                                               </div>
                                          </div>

                                          <div class="form-group row">

                                               <label class="col-sm-4 a-label">Password <span class="red">*</span> :
                                              </label>
                                              <div class="col-md-6">
                                                    <input type="password" class="form-control" name="password1" placeholder="Password" value="<?=$password  ?>" required="">
                                               </div>
                                          </div>
                                            <div class="form-group row">

                                                <label class="col-sm-4 a-label">Confirm Password <span class="red"> * :</span>
                                                </label>
                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" name="password2" placeholder="Confirm Password" value="<?=$password  ?>" required="">
                                                </div>
                                             </div>
                                        <br>
                                      
                                    </div>
                                <div class="col-md-1"></div>
                            </div>
                            <br>
                              <center><input type="submit" name="update" value="Update User" class="btn btn-primary btn-lg"></center>
                        </form>
                        <br>
</div>
</div>


<?php } else{

?>
  <div class="main-content">
     <div class="page-content">
        <div class="container-fluid">
                    
                            <div class="row">
                                <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                       <br><br><br><br>
                                      <div style="text-align: center;">
                                        <h3 style="color: red;">Invalid User ID/URl</h3>
                                      </div>      
                                    </div>
                                <div class="col-md-1"></div>
                            </div>
</div>
</div>

<?php
}







if(isset($_POST["update"])){
     $table = 'tbl_sales_person';
      $name ='';
      $user_name='';
      $password ='';

    if(isset($_POST["name"])){
        $name  = $_POST["name"];
    }

    if(isset($_POST["user_name"])){
       $user_name = $_POST["user_name"];
    }
    if(isset($_POST["password2"])){
       $password = $_POST["password2"];
    }
    

    $data = [
        "display_name"  => $name ,
        "user_name" =>   $user_name ,
        "password"   => $password,
    ];

    $where = ['id' => $_GET['edit_user']];
    $update= update($table,$data,$where);


if($update == "1"){
    echo"<script>window.open('home?manage_user','_self')</script>";
} 
else{
         echo "<script>alert('Unable to Update user. Please try again!');</script>";
 }        
}
?>



