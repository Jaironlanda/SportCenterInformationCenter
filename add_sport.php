<?php

include 'init.php';
include ROOT_DIR.'/includes/db-auth/db-auth.php';

  $sport_name = $_POST['sname'];

  if(mysqli_num_rows(mysqli_query($db_conn, "SELECT * FROM SPORT WHERE SPORT_NAME = '$sport_name';")) > 0) {
    header("Location: new.php?addsport=fail");
  }

  mysqli_query($conn, "INSERT INTO SPORT(SPORT_NAME) VALUES('$sport_name');");

  header("Location: new.php?addsport=success");

?>
