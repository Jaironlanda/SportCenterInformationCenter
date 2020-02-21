<?php
  include 'init.php';
  include  ROOT_DIR. '/includes/db-auth/db-auth.php';

  $court_id = $_POST['cid'];

  mysqli_query($conn, "DELETE FROM COURT WHERE COURT_ID = $court_id;");

  header("Location: edit.php?delete=success");

?>
