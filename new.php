<?php
    include 'init.php';
    include ROOT_DIR.'/includes/db-auth/db-auth.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SCIS| New Court</title>
    <?php include ROOT_DIR . '/includes/header/header_style.php'; ?>

  </head>
  <?php include ROOT_DIR . '/includes/navigation.php'; ?>

  <body>

    <?php
      include 'navCourt.php';
    ?>

    <div class="container mt-5">
      <?php

        if (isset($_GET['addcourt'])) {
          if($_GET['addcourt'] == 'success') {
            echo "<div class='alert alert-success alert-dissmissible mt-3 p-2' role='alert'>
                    <strong>Court added successfully.</strong>
                    <button class='close' data-dismiss='alert'>&times;</button>
                  </div>";
          } elseif ($_GET['addcourt'] == 'fail') {
            echo "<div class='alert alert-danger alert-dissmissible mt-3 p-2' role='alert'>
                    <strong>Failed to add court!</strong>
                    <button class='close' data-dismiss='alert'>&times;</button>
                  </div>";
          }
        } elseif (isset($_GET['addsport'])) {
          if ($_GET['addsport'] == 'success') {
            echo "<div class='alert alert-success alert-dissmissible mt-3 p-2' role='alert'>
                    <strong>Sport added successfully.</strong>
                    <button class='close' data-dismiss='alert'>&times;</button>
                  </div>";
          } elseif ($_GET['addsport'] == 'fail') {
            echo "<div class='alert alert-danger alert-dissmissible mt-3 p-2' role='alert'>
                    <strong>Failed to add sport!</strong>
                    <button class='close' data-dismiss='alert'>&times;</button>
                  </div>";
          }
        }

      ?>
      <div class="row justify-content-center">
        <div class="col-md-5 justify-content-center">
          <h1>Add Court</h1>
          <div class="mt-2">
            <form class="form-group" action="add_court.php" method="POST">
              <label for="cname">Court Name</label>
              <input class="form-control" type="text" name="cname" value="">
              <label class="mt-3" for="sname">Sport Name</label>
              <select class='form-control' name='sid'>
                <?php
                  

                  $sport_list = mysqli_query($conn, 'SELECT * FROM SPORT;');

                  while ($sport_row = mysqli_fetch_assoc($sport_list)) {
                    echo "<option ";
                    if($sport_row['SPORT_NAME'] == 'Tennis') { echo "class='active' "; }
                    echo "value='" . $sport_row['SPORT_ID'] . "'>" . $sport_row['SPORT_NAME'] . "</option>";
                  }
                ?>
              </select>
              <button class="btn btn-primary mt-3" type="submit" name="submit-court">Add Court</button>
            </form>
          </div>
        </div>
        <div class="col-md-0" style="border:1px solid lightgray"></div>
        <div class="col-md-5 justify-content-center">
          <h1>Add Sport</h1>
          <form class="form-group" action="add_sport.php" method="POST">
            <label for="sname">Sport Name</label>
            <input class="form-control" type="text" name="sname" value="">
            <button class="btn btn-primary mt-3" type="submit" name="submit-sport">Add Sport</button>
          </form>
        </div>
      </div>
    </div>

    <?php include ROOT_DIR . '/includes/footer/footer_style.php'; ?>
    
  </body>
</html>
