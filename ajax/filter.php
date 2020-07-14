<?php
require '../database/queries.php';

if($_POST['action'] == 100){

    $sales_person = $_POST['sales_person'];
    $adv_name     = $_POST['adv_name'];
    $e_f_d        = $_POST['e_f_d'];
    $e_e_d        = $_POST['e_e_d'];

        if(!empty($sales_person) && !empty($adv_name) && !empty($e_f_d ) && !empty($e_e_d )){

             $qry="SELECT  * FROM tbl_contract_form  WHERE  `sales_person`= '$sales_person' AND `advertiser_name`= '$adv_name'  AND `contract_date`>='$e_f_d'  AND `contract_date`<= '$e_e_d' ORDER BY `id` DESC";
        }
        
        elseif(!empty($adv_name) && !empty($e_f_d ) && !empty($e_e_d)){
             $qry="SELECT  * FROM tbl_contract_form  WHERE  `advertiser_name`  LIKE '%$adv_name%'   AND `contract_date`>='$e_f_d'  AND `contract_date`<= '$e_e_d' ORDER BY `id` DESC";
        }

         elseif(!empty($sales_person) && !empty($e_f_d ) && !empty($e_e_d)){
             $qry="SELECT  * FROM tbl_contract_form  WHERE `sales_person`= '$sales_person'  AND `contract_date`>='$e_f_d'  AND `contract_date`<= '$e_e_d' ORDER BY `id` DESC";
         }

         elseif(!empty($sales_person) && !empty($adv_name)){
             $qry="SELECT  * FROM tbl_contract_form  WHERE `advertiser_name`  LIKE '%$adv_name%'   AND  `sales_person`= '$sales_person' ORDER BY `id` DESC";
          }

          elseif(!empty($e_f_d ) && !empty($e_e_d )){
             $qry="SELECT  * FROM tbl_contract_form  WHERE  `contract_date`>='$e_f_d'  AND `contract_date`<= '$e_e_d' ORDER BY `id` DESC";
          }

          elseif(!empty($adv_name)){
             $qry="SELECT  * FROM tbl_contract_form  WHERE  `advertiser_name`  LIKE '%$adv_name%' ORDER BY `id` DESC";
           }

           elseif(!empty($sales_person)){
             $qry="SELECT  * FROM tbl_contract_form  WHERE `sales_person`= '$sales_person' ORDER BY `id` DESC";
           }


        

        else{
            echo '<h3>No data Found</h3>';
            exit();
        }


        $result = mysqli_query($con,$qry);
                                           $sl = 1;
                                         while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){

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
                                          

                        

}

                        
?>