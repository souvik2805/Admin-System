<?php
$uri = $_SERVER['REQUEST_URI']; 
$exploded_uri = explode('/', $uri); 
$domain_name  = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http'
.'://'.$_SERVER['SERVER_NAME'].'/'.$exploded_uri[1];

$uri = $_SERVER['REQUEST_URI']; 
$exploded_uri = explode('/', $uri); 
$upload_path=$_SERVER['DOCUMENT_ROOT'].'/'.$exploded_uri[1];

$domain_active  =$exploded_uri[2]; 

?>