<?php
    include 'init.php';
    include ROOT_DIR.'/includes/db-auth/db-auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SCIS | Index</title>
    <?php include ROOT_DIR . '/includes/header/header_style.php'; ?>
</head>
    <?php include ROOT_DIR . '/includes/navigation.php'; ?>
<body>
    <?php
        $sql = "SELECT CUST_ID, CUST_NAME, CUST_IC, CUST_PHONE FROM CUSTOMER;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

    ?>
    <div class="container">
        <div class="py-2">
            <h2>User Index</h2>
            
            <hr>
        </div>
        <div class="py-2">
            <a href="<?php echo ROOT_URL; ?>/register.php" role="button" class="btn btn-primary">Back To register</a>
            <!-- <a href="" role="button" class="btn btn-primary">Customer List</a> -->
        </div>
        <div class="card bg-light">
            <div class="card-header">Customer List</div>
                <div class="card-body">
                    <table id="userlist" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>IC</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                                if ($resultCheck>0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<tr>';
                                        echo '<td>'.$row['CUST_ID'].'</td>';
                                        echo '<td>'.$row['CUST_NAME'].'</td>';
                                        echo '<td>'.$row['CUST_IC'].'</td>';
                                        echo '<td>'.$row['CUST_PHONE'].'</td>';
                                        echo '<td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="'.ROOT_URL.'/editCustomer.php?id='.$row['CUST_ID'].'">Edit/View</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="'.ROOT_URL.'/booking.php?id='.$row['CUST_ID'].'">Booking</a>
                                            </div>
                                        </div>
                                        </td>';
                                        echo '</tr>';
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</body>
    <?php include ROOT_DIR . '/includes/footer/footer_style.php'; ?>
    <script>
        $(document).ready( function () {
            $('#userlist').DataTable();
        } );
    </script>
</html>