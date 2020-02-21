<?php

include 'init.php';
include ROOT_DIR.'/includes/db-auth/db-auth.php';

  $court_name = $_POST['cname'];
  $sport_id = $_POST['sid'];

  if(mysqli_num_rows(mysqli_query($conn, "SELECT COURT_NAME FROM COURT WHERE COURT_NAME = '$court_name';")) > 0) {
    header("Location: new.php?addcourt=fail");
  }

  mysqli_query($conn, "INSERT INTO COURT(COURT_NAME, SPORT_ID) VALUES('$court_name', '$sport_id');");

  header("Location: new.php?addcourt=success");
?>
