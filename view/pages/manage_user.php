
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
<div class="main-content">
     <div class="page-content">
        <div class="container-fluid">
             <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                               <a href="home?add_user" class="btn btn-primary">Add User</a>
                            </div>
                        </div>
              </div>
            <div class="row">
                 <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="basic-datatable" class="table dt-responsive nowrap">
                                        <thead>
                                            <tr class="c_row">
                                                <th>Sl.</th>
                                                <th>Salesperson name</th>
                                                <th>Username</th>
                                                <th style="width: 150px;">Actions</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $sl = 1;
                                            $table1 = " tbl_sales_person";
                                            $select1 = "*";
                                       
                                            $orderby='id DESC';
                                            $form_result = select($table1,$select1,$orderby);
                                         while($row = mysqli_fetch_array($form_result,MYSQLI_ASSOC)){
                                              echo
                                               '<tr class="t-center t-black">
                                                    <td>'.$sl.'</td>
                                                    <td>'.$row["display_name"].'</td>
                                                    <td>'.$row["user_name"].'</td>
                                                   
                                                    <td>
                                                       
                                                         <a href="home?edit_user='.$row['id'].'" class="green" title="Edit">
                                                           <i class="fa fa-edit"></i>
                                                        </a>

                                                     

                                                        &nbsp;&nbsp;


                                                           <a href="#" class="red" onclick="delete_user('."'".$row['id']."'".')"  title="Delete">
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
                        </div>
                 </div> <!-- end col -->  
            </div>
                    <!-- end row-->
       </div> <!-- container-fluid -->
   </div>
</div>



<script>


 function delete_user(transid) {

       $status     = confirm('Do you want to delete this User?');
      
        if($status==true){
    
             $.ajax({
                type:'POST',
                url:'ajax/delete.php',
                data: {
                       transid: transid,
                        action : 1,
                },
               
                success:function(data){
                    location.reload();

                }
             });
        }   
        
    }

</script>
   




