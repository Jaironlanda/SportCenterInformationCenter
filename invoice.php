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
    <title>SCIS| Invoice</title>
    <?php include ROOT_DIR . '/includes/header/header_style.php'; ?>
</head>
    <?php include ROOT_DIR . '/includes/navigation.php'; ?>
<body>
    <?php
        if(isset($_GET['id'])){
            $booking_id = $_GET['id'];
        }
        
        $invoiceSQL = 
        "SELECT 
        BOOKING.BOOKING_ID,
        BOOKING.CUST_ID,
        BOOKING.PYMT_ID,
        BOOKING.COURT_ID,
        BOOKING.BOOKING_DESC,
        BOOKING.START_DATETIME,
        BOOKING.END_DATETIME,
        
        CUSTOMER.CUST_ID,
        CUSTOMER.CUST_NAME,
        CUSTOMER.CUST_IC,
        CUSTOMER.CUST_PHONE,
        CUSTOMER.CUST_EMAIL,
        
        PAYMENT.PYMT_ID,
        PAYMENT.PYMT_AMOUNT,
        PAYMENT.PYMT_TYPE_ID,

        PYMT_TYPE.PYMT_TYPE_ID,
        PYMT_TYPE.PYMT_TYPE_NAME,

        COURT.COURT_ID,
        COURT.COURT_NAME,
        COURT.SPORT_ID,

        SPORT.SPORT_ID,
        SPORT.SPORT_NAME

        FROM BOOKING
        LEFT JOIN CUSTOMER ON CUSTOMER.CUST_ID = BOOKING.CUST_ID
        LEFT JOIN PAYMENT ON PAYMENT.PYMT_ID = BOOKING.PYMT_ID
        LEFT JOIN PYMT_TYPE ON PAYMENT.PYMT_TYPE_ID = PYMT_TYPE.PYMT_TYPE_ID
        LEFT JOIN COURT ON COURT.COURT_ID = BOOKING.COURT_ID
        LEFT JOIN SPORT ON SPORT.SPORT_ID = COURT.SPORT_ID
        WHERE BOOKING.BOOKING_ID = $booking_id;";
        $invoiceResult = mysqli_query($conn, $invoiceSQL);
        echo mysqli_error($conn);
        $invoiceResultCheck = mysqli_num_rows($invoiceResult);
        
        if(!$invoiceResult > 0){
            echo '<div class="alert alert-danger" role="alert">Invoice not exist.</div>';
        }
        //fetch data
        $inData = mysqli_fetch_array($invoiceResult);
        // var_dump($inData['CUST_NAME']);
        // var_dump($inData['PYMT_AMOUNT']);
        // var_dump($inData['PYMT_TYPE_NAME']);
    ?>
    <div class="container">
        <div class="py-4">
            <h2>Invoice</h2>
            <hr>
        </div>
        <div class="card bg-light">
            <div class="card-header">Invoice Detail</div>
                <div class="card-body">
                <form>
                        <div class="form-group row">
                            <label for="inputname" class="col-sm-2 col-form-label">Customer Name</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="cname" value="<?php echo $inData['CUST_NAME']; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputname" class="col-sm-2 col-form-label">IC</label>
                            <div class="col-sm-10 col-md-3">
                            <input type="text" class="form-control" name="cic" value="<?php echo $inData['CUST_IC']?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputname" class="col-sm-2 col-form-label">Phone Number</label>
                            <div class="col-sm-10 col-md-3">
                            <input type="text" class="form-control" name="cic" value="<?php echo $inData['CUST_PHONE']?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputname" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10 col-md-3">
                            <input type="text" class="form-control" name="cic" value="<?php echo $inData['CUST_EMAIL']?>" disabled>
                            </div>
                        </div>
                    </form>
                    <hr>
                    
                    <form>
                    <div class="form-group row">
                        <label for="selectCourt" class="col-sm-2 col-form-label">Court</label>
                        <div class="col-sm-10 col-md-3">
                            <input type="text" class="form-control" value="<?php echo $inData['COURT_NAME']?>" readonly>   
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="selectCourt" class="col-sm-2 col-form-label">Sport</label>
                        <div class="col-sm-10 col-md-3">
                            <input type="text" class="form-control" value="<?php echo $inData['SPORT_NAME']?>" readonly>   
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputname" class="col-sm-2 col-form-label">Start Date Time</label>
                        <div class="col-sm-10 col-md-5">
                        <input type="text" class="form-control" value="<?php echo date("d/m/Y", strtotime($inData['START_DATETIME']))?>" readonly>   
                    </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputname" class="col-sm-2 col-form-label">End Date Time</label>
                        <div class="col-sm-10 col-md-5">
                        <input type="text" class="form-control" value="<?php echo date("d/m/Y", strtotime($inData['END_DATETIME']))?>" readonly>   

                    </div>
                    </div>

                    <!-- <div class="form-group row">
                        <label for="inputname" class="col-sm-2 col-form-label">Day(s)</label>
                        <div class="col-sm-10 col-md-3">
                        <input type="text" class="form-control" value="<?php //echo $inData['SPORT_NAME']?>" readonly>
                    </div>
                    </div> -->
                    
                    <div class="form-group row">
                        <label for="inputname" class="col-sm-2 col-form-label">Amount (RM)</label>
                        <div class="col-sm-10 col-md-3">
                        <input type="text" class="form-control" name="pymt_amount"  value="<?php echo $inData['PYMT_AMOUNT']?>" readonly>
                    </div>
                    </div>

                    <div class="form-group row">
                        <label for="selectCourt" class="col-sm-2 col-form-label">Payment</label>
                        <div class="col-sm-10 col-md-3">
                        <input type="text" class="form-control" value="<?php echo $inData['PYMT_TYPE_NAME']?>" readonly>   
                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="selectCourt" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10 col-md-8">
                            <!-- <textarea name="booking_desc" class="form-control" rows="5" placeholder="any note"></textarea> -->
                            <?php echo $inData['BOOKING_DESC']?>
                        </div>
                    </div>
                    <div class="form-group row float-right">
                        <div class="col-sm-10 ">
                        <a role="button" href="<?php echo ROOT_URL; ?>/indexBooking.php" class="btn btn-primary">Close</a>
                        </div>
                    </div>
                    </form>
                </div>
        </div>
    </div>
</body>
    <?php include ROOT_DIR . '/includes/footer/footer_style.php'; ?>
</html>