<?php
include 'init.php';
require 'includes/db-auth/db-auth.php';


$cid = $_POST['bid'];
$cname = $_POST['cname'];
$cic = $_POST['cic'];
$pnum = $_POST['pnum'];
$add = $_POST['add'];
$email = $_POST['email'];

$sql = 
"INSERT INTO 
CUSTOMER 
(CUST_NAME,CUST_IC,CUST_PHONE,CUST_ADDRESS,CUST_EMAIL) 
VALUES
('$cname','$cic','$pnum','$add','$email');";

mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn)>0){
    header('Location:'.ROOT_URL.'/register.php?success=1');
}else{
    header('Location:'.ROOT_URL.'/register.php?failed=0');
}
?>