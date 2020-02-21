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
"UPDATE CUSTOMER SET
CUST_NAME = '$cname', 
CUST_IC = '$cic',
CUST_PHONE = '$pnum', 
CUST_ADDRESS = '$add', 
CUST_EMAIL = '$email'

WHERE CUST_ID = '$cid'
";
// echo mysqli_error($conn);
mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn)>0){
    header('Location:'.ROOT_URL.'/editCustomer.php?success=1');
}else{
    header('Location:'.ROOT_URL.'/editCustomer.php?failed=0');
}
?>