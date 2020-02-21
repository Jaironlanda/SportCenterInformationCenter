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
    <title>SCIS | Index Booking</title>
    <?php include ROOT_DIR . '/includes/header/header_style.php'; ?>
</head>
    <?php include ROOT_DIR . '/includes/navigation.php'; ?>
<body>
    <?php
        $indexBookingSQL = "SELECT 
        BOOKING.BOOKING_ID,
        BOOKING.CUST_ID, 
        BOOKING.COURT_ID,
        BOOKING.START_DATETIME,
        BOOKING.END_DATETIME,
        
        CUSTOMER.CUST_ID,
        CUSTOMER.CUST_NAME,
        CUSTOMER.CUST_PHONE,

        COURT.COURT_ID,
        COURT.COURT_NAME

        FROM BOOKING

        LEFT JOIN COURT ON COURT.COURT_ID = BOOKING.COURT_ID
        LEFT JOIN CUSTOMER ON CUSTOMER.CUST_ID = BOOKING.CUST_ID
        ORDER BY START_DATETIME ASC;";
        $result = mysqli_query($conn, $indexBookingSQL);
        echo mysqli_error($conn);
        $resultCheck = mysqli_num_rows($result);
        
    ?>
    <div class="container">
        <div class="py-2">
            <h2>Booking Index</h2>
            
            <hr>
        </div>
        <div class="py-2">
            <a href="<?php echo ROOT_URL; ?>/register.php" role="button" class="btn btn-primary">Go To register</a>
            <!-- <a href="" role="button" class="btn btn-primary">Customer List</a> -->
        </div>
        <div class="card bg-light">
            <div class="card-header">Customer List</div>
                <div class="card-body">
                    <table id="userlist" class="table table-striped table-bordered dt-responsive nowrap">
                        <thead>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Phone Number</th>
                            <th>Court</th>
                            <th>Start Date - End Date</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                                if ($resultCheck>0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<tr>';
                                        echo '<td>'.$row['BOOKING_ID'].'</td>';
                                        echo '<td>'.$row['CUST_NAME'].'</td>';
                                        echo '<td>'.$row['CUST_PHONE'].'</td>';
                                        echo '<td>'.$row['COURT_NAME'].'</td>';
                                        echo '<td>'.date("d/m/Y", strtotime($row['START_DATETIME'])).' - '.date("d/m/Y", strtotime($row['END_DATETIME'])).'</td>';
                                        echo '<td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="'.ROOT_URL.'/invoice.php?id='.$row['BOOKING_ID'].'">Invoice</a>
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
            $('#userlist').DataTable({
                "order": []
            });
        } );
    </script>
</html>