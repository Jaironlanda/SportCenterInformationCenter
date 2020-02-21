<?php
  include 'init.php';
  include ROOT_DIR.'/includes/db-auth/db-auth.php';


  if(!isset($_POST['cid'])) { die("No data received!"); }

  $court_id = $_POST['cid'];
  $court_name = $_POST['cname'];
  $sport_id = $_POST['sid'];


  mysqli_query($conn, "UPDATE COURT SET COURT_NAME = '$court_name', SPORT_ID = $sport_id WHERE COURT_ID = $court_id;");

  header("Location: edit.php?edit=success&cid=$court_id&search-court=#");
?>
