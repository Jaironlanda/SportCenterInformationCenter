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
    <title>SCIS| Index Court</title>
    <?php include ROOT_DIR . '/includes/header/header_style.php'; ?>

  </head>
    <?php include ROOT_DIR . '/includes/navigation.php'; ?>
  <body>

    <?php
      include 'navCourt.php';
    ?>

    <div class="container mt-5">
      <h1>Available Courts</h1>
      <table class="table table-bordered  border rounded">
        <thead class="thead-light">
          <tr>
            <th scope="col">Sport</th>
            <th scope="col">Court Name</th>
          </tr>
        </thead>
        <tbody>
          <?php

          

          $court_list = array();
          $result = mysqli_query($conn, "SELECT SPORT.SPORT_NAME AS 'SPORT_NAME', COURT.COURT_NAME AS 'COURT_NAME', COURT.COURT_ID AS 'COURT_ID' FROM COURT RIGHT JOIN SPORT ON COURT.SPORT_ID = SPORT.SPORT_ID ORDER BY SPORT.SPORT_ID, COURT.COURT_ID ASC;");

          while($row = mysqli_fetch_assoc($result)) {
            $court_list[$row['SPORT_NAME']][] = array('c_name' => $row['COURT_NAME'], 'c_id' => $row['COURT_ID']);
          }

          foreach ($court_list as $sport_name => $court_list) {
            echo "<tr><th class='align-middle text-center' rowspan='" . count($court_list) . "' scope='row'>$sport_name</th>";
            foreach ($court_list as $court_details) {
              if (array_search($court_details, $court_list) != 0) { echo "<tr>"; }
              echo "<td class='row mx-0'><p class='col-md-11'>" . $court_details['c_name'] . "</p>";
              echo "<form class='col-md-1' action='edit.php' method='GET'>";
              echo "  <input type='text' name='cid' value='" . $court_details['c_id'] . "' hidden>";
              echo "  <button class='btn btn-primary' name='search-court'>Edit</button>";
              echo "</form>";
              echo "</td></tr>";
            }
          }

          ?>
        </tbody>
      </table>
    </div>
    <?php include ROOT_DIR . '/includes/footer/footer_style.php'; ?>
  </body>
</html>
