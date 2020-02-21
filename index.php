<?php
    include 'init.php';
    include ROOT_DIR . '/includes/db-auth/db-auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SCIS | Dashboard</title>
    <?php include ROOT_DIR .'/includes/header/header_style.php'; ?>
</head>
    <?php include ROOT_DIR .'/includes/navigation.php'; ?>
<body>
    <?php
        $sqlCountBooking = "SELECT * FROM BOOKING;";
        $resultCount = mysqli_query($conn, $sqlCountBooking);
        $totalBooking = mysqli_num_rows($resultCount);

        $sqlCountCust = "SELECT * FROM CUSTOMER;";
        $resultCountCust = mysqli_query($conn, $sqlCountCust);
        $totalCust = mysqli_num_rows($resultCountCust);

        $sqlAVGAmt = "SELECT ROUND(AVG(PYMT_AMOUNT),2) AS total_avg FROM PAYMENT;";
        $resultAvg = mysqli_query($conn, $sqlAVGAmt);
        $avg = mysqli_fetch_assoc($resultAvg);

        $sqlSumAmt = "SELECT SUM(PYMT_AMOUNT) AS total_amt FROM PAYMENT;";
        $resultSum = mysqli_query($conn, $sqlSumAmt);
        $sum = mysqli_fetch_assoc($resultSum); 
        
    ?>
    <div class="container">
        <div class="py-4">
            <h2>Dashboard</h2>
            <hr>
        </div>
        <div class="card bg-light">
            <div class="card-header">Statistics</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 py-2">
                            <div class="card text-white bg-primary">
                            <div class="card-header">Total Customer(s)</div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $totalCust ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 py-2">
                            <div class="card text-white bg-primary">
                            <div class="card-header">Total Booking(s)</div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $totalBooking; ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 py-2">
                            <div class="card text-white bg-primary">
                            <div class="card-header">Total Booking Payment (MYR)</div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $sum['total_amt']; ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 py-2">
                            <div class="card text-white bg-primary">
                            <div class="card-header">Average Booking Payment</div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $avg['total_avg']; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
        </div>
    </div>
</body>
    <?php include ROOT_DIR. '/includes/footer/footer_style.php'; ?>
</html>