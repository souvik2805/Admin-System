<?php
session_start();
require 'path.php';

unset($_SESSION['digital-contract-superadmin']);
unset($_SESSION['error']);

header("location:$domain_name");

?>