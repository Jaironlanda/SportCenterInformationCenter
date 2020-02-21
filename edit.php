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
    <title>SCIS| Edit Court</title>
    <?php include ROOT_DIR . '/includes/header/header_style.php'; ?>

  </head>
    <?php include ROOT_DIR . '/includes/navigation.php'; ?>
  <body>
    <?php
      include 'navCourt.php';
    ?>

    

    <div class="container mt-5">
      <?php

        if (isset($_GET['edit'])) {
          echo "<div class='alert alert-success alert-dissmissible mt-3 p-2' role='alert'>
                  <strong>Court successfully edited.</strong>
                  <button class='close' data-dismiss='alert'>&times;</button>
                </div>";
        } elseif (isset($_GET['delete'])) {
          echo "<div class='alert alert-success alert-dissmissible mt-3 p-2' role='alert'>
                  <strong>Court successfully deleted.</strong>
                  <button class='close' data-dismiss='alert'>&times;</button>
                </div>";
        }

      ?>
    </div>

    <form class="form-group row justify-content-center mt-5" action="#" method="GET">
      <select class='form-control col-md-5' name='cid'>
        <?php
          

          $court_list = mysqli_query($conn, 'SELECT * FROM COURT;');

          while ($court_row = mysqli_fetch_assoc($court_list)) {
            echo "<option ";
            if(isset($_GET['cid']) && $_GET['cid'] == $court_row['COURT_ID']) { echo "selected "; }
            echo "value='" . $court_row['COURT_ID'] . "'>" . $court_row['COURT_NAME'] . "</option>";
          }
        ?>
      </select>
      <div class="col-md-0 px-2"></div>
      <button class="btn btn-primary col-md-1" type="submit" name="search-court">Get Details</button>
    </form>

    <div class="container mt-2">
      <div class="jumbotron">
        <?php

          if(!isset($_GET['search-court'])) {
            echo "<h1 class='text-center font-weight-light text-muted'>Please select a court</h1>";
          } else {
            $court_id = $_GET['cid'];
            $court_details = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM COURT LEFT JOIN SPORT ON COURT.SPORT_ID = SPORT.SPORT_ID WHERE COURT.COURT_ID = '$court_id';"));
            $sport_list = mysqli_query($conn, "SELECT * FROM SPORT ORDER BY SPORT_ID ASC;");

            // Form
            echo "<h1 class='text-center font-weight-light'>Court Details</h1>";
            echo "<form class='form-group' action='edit_court.php' method='POST'>";
            echo "  <input class='form-control' type='text' name='cid' value='" . $court_details['COURT_ID'] . "' hidden>";
            echo "  <label for='cname'>Court Name</label>";
            echo "  <input class='form-control' type='text' name='cname' value='" . $court_details['COURT_NAME'] . "'>";
            echo "  <label class='mt-3' for='sname'>Sport Name</label>";
            echo "  <select class='form-control' name='sid'>";
            while($sport_row = mysqli_fetch_assoc($sport_list)) {
              echo "<option ";
              if($sport_row['SPORT_ID'] == $court_details['SPORT_ID']) { echo "selected "; }
              echo " value='" . $sport_row['SPORT_ID'] . "'>" . $sport_row['SPORT_NAME'] . "</option>";
            }
            echo "  </select>";
            echo "  <button class='btn btn-primary mt-3' type='submit' name='submit-edit'>Edit Court</button>";
            echo "  <button class='btn btn-danger mt-3' type='submit' name='submit-delete' formaction='#'>Delete Court</button>";
            echo "</form>";

            // Redirect & delete warning
            if(isset($_POST['submit-delete'])) {
              echo "<div class='alert alert-warning border border-warning rounded alert-dissmissible mt-3 p-2 fade show'>";
              echo "  Are you sure? This <strong>cannot</strong> be undone!<br>";
              echo "  <form action='delete_court.php' method='POST'>";
              echo "    <input type='text' name='cid' value='" . $_POST['cid'] . "' hidden>";
              echo "    <button class='btn btn-success mr-2 my-2' type='submit'>Yes</button>";
              echo "    <button class='btn btn-danger my-2' data-dismiss='alert'>No</button>";
              echo "  </form>";
              echo "</div>";
            }
          }

        ?>
      </div>
    </div>
    <?php include ROOT_DIR . '/includes/footer/footer_style.php'; ?>

  </body>
</html>
