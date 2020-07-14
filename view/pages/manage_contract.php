<?php

$qry1="SELECT distinct `sales_person` FROM  tbl_contract_form  ORDER BY sales_person ASC";
   
$sales_person = mysqli_query($con,$qry1);
// echo "<pre>";
// print_r($sales_person["sales_person"]);

?>
 

 <div class="main-content">
     <div class="page-content">
        <!--  <div class="row">
                
            </div> -->
        <div class="container-fluid">
                        
                            <div class="row">
                                <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <div class="row">
                                          <label class="col-sm-2 c-label">Advertiser Name:</label>
                                              <div class="col-md-4">
                                                <input type="text" class="form-control" placeholder="Advertiser Name" id="adv_name">
                                              </div>
                                             <label class="col-sm-2 c-label">Sales Person</label>
                                              <div class="col-md-4">
                                                 <select class="form-control" id="sales_person">
                                                      <option value="">Select Sales Person Name</option>
                                                      <?php
                                                        foreach ($sales_person as $key => $rows_value)
                                                         {

                                                        echo '<option value="'.$rows_value["sales_person"].'"> '.$rows_value['sales_person'].'</option>';
                                                         }
                                                        ?>
                                                  </select>&nbsp;
                                              </div>
                                             
                                        </div>
                                        <br>
                                        <div class="row">
                                          <label class="col-sm-2 c-label">Enquiry From Date:</label>
                                              <div class="col-md-4">
                                                 <input type="date" class="form-control" placeholder="enquiry date" id="e_f_d">
                                              </div>
                                         
                                             <label class="col-sm-2 c-label">Enquiry End Date:</label>
                                              <div class="col-md-4">
                                                 <input type="date" class="form-control" placeholder="Last name" id="e_e_d">
                                              </div>
                                        </div>
                                    </div>
                                <div class="col-md-1"></div>
                            </div>
                            <br>
                              <center>
                                <input type="submit" id="filter" value="Filter Now" class="btn btn-primary">
                              </center>
                      
                        <br>


                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="background-color: white;">
                                <div class="card-body" style="padding: 0.5rem;">
                                   <div class="table-responsive">
                                     <table class="ctable table table-striped table-bordered">
                                        <thead>
                                            <tr class="c_row">
                                                <th>SL.</th>
                                                <th>Adv. Name</th>
                                                <th>Person to Contract</th>
                                                <th>Adv. Mobile</th>
                                                <th>Adv. Mail</th>
                                                <th>Salesperson</th>
                                                <th>Contract Date</th>
                                                <th>Form</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="append_id">
                                        <?php
                                            $sl = 1;
                                            $table1 = "tbl_contract_form";
                                            $select1 = "*";
                                       
                                            $orderby='id ASC';
                                            $form_result = select($table1,$select1,$orderby);
                                         while($row = mysqli_fetch_array($form_result,MYSQLI_ASSOC)){

                                            $p_to_c = explode("|-^^=|", $row["person_to_contact"]);
                                            $sri  =  $p_to_c[0];
                                            $name =  $p_to_c[1];

                                              echo
                                               '<tr class="t-center t-black">
                                                  <td>'.$sl.'</td>
                                                  <td>'.$row["advertiser_name"].'</td>
                                                  <td>'.$sri." ".$name.'</td>';

                                                  $mobile_no = explode("|-^^=|", $row["all_phone_no"]);
                                                  $adv_email = explode("|-^^=|", $row["all_email"]);

                                              echo '
                                                  <td>'.$mobile_no[1].'</td>
                                                  <td>'.$adv_email[0].'</td>
                                                  <td>'.$row["sales_person"].'</td>
                                                  <td>'.$row["contract_date"].'</td>
                                                  <td>
                                                    <a href="'.$row["pdf_name"].'" target="_blank"  title="Preview">
                                                      <i class="fa fa-eye" aria-hidden="true"></i>
                                                      </a>
                                                        &nbsp;&nbsp;
                                                      <a href="'.$row["pdf_name"].'" download title="Download">
                                                      <i class="fa fa-download" aria-hidden="true"></i>
                                                      </a>
                                                  </td>
                                                  <td>
                                                     <a href="home?edit_contract='.$row['form_no'].'" class="green" title="Edit" target="_blank">
                                                           <i class="fa fa-edit"></i>
                                                        </a>
                                                        &nbsp;
                                                      <a href="#" class="red" onclick="delete_contract('."'".$row['id']."'".')"  title="Delete">
                                                          <i class="fa fa-trash " aria-hidden="true"></i>
                                                      </a>


                                                    </td>
                                               </tr>';
                                               $sl++;
                                   
                                             }
                                          ?>
                                    
                                    
                                          </tbody>
                                            
                                    </table>
                                  </div>

                                </div> <!-- end card body-->
                            </div> <!-- end card -->
                        </div><!-- end col-->
                    </div>
          </div>
      </div>
</div>
                    <!-- end row-->

<script>


 function delete_contract(transid) {

       $status    = confirm('Do you want to delete this Contract Form?');
      
        if($status==true){
    
             $.ajax({
                type:'POST',
                url:'ajax/delete.php',
                data: {
                       transid: transid,
                        action : 2,
                },
                success:function(data){
                    location.reload();

                }
             });
        }   
        
    }

</script>