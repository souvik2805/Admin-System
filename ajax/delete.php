<?php

require '../database/queries.php';

if($_POST['action'] == 1)
{
    $id = $_POST['transid'];
    $table = "tbl_sales_person";

    $where  = ['id' => $id];

    $delete_user = delete_one($table,$where);
    if($delete_user == 1)
    {
        $_SESSION['success'] = "User Deleted Successfully";
    }
    else
    {
        $_SESSION['error']   = "Failed to delete the User";
    }
}

if($_POST['action'] == 2)
{
    $id = $_POST['transid'];
    $table = "tbl_contract_form";

    $where  = ['id' => $id];

    $delete_user = delete_one($table,$where);
    if($delete_user == 1)
    {
        $_SESSION['success'] = "User Deleted Successfully";
    }
    else
    {
        $_SESSION['error']   = "Failed to delete the User";
    }
}



?>