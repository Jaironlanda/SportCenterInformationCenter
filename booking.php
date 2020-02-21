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
    <title>SCIS| Booking</title>
    <?php include ROOT_DIR . '/includes/header/header_style.php'; ?>
</head>
    <?php include ROOT_DIR . '/includes/navigation.php'; ?>
<body>
    <?php
        //get customer detail
        if(isset($_GET['id'])){
            $cust_id = $_GET['id'];
        }
        
        $getCusSQL = "SELECT CUST_ID, CUST_NAME, CUST_IC FROM CUSTOMER WHERE CUST_ID = $cust_id;";
        $cusResult = mysqli_query($conn, $getCusSQL);
        $resultCheck = mysqli_num_rows($cusResult);

        //return error if user is not exist.
        if(!$resultCheck > 0){
            echo '<div class="alert alert-danger" role="alert">Customer not exist.</div>';
        }
        //fetch data
        $cusData = mysqli_fetch_array($cusResult);


        //select court name
        $getCourtSQL = "SELECT 
        COURT.COURT_ID, 
        COURT.COURT_NAME, 
        COURT.SPORT_ID, 
        SPORT.SPORT_ID, 
        SPORT.SPORT_NAME 
        FROM COURT 
        LEFT JOIN
        SPORT ON SPORT.SPORT_ID = COURT.SPORT_ID;";
        $courtResult = mysqli_query($conn, $getCourtSQL);
        $resultCourtCheck = mysqli_num_rows($courtResult);
        
        
        //select payment type
        $getPaymentSQL = "SELECT PYMT_TYPE_ID, PYMT_TYPE_NAME FROM PYMT_TYPE;";
        $pymtTypeResult = mysqli_query($conn, $getPaymentSQL);
        $resultpymtTypeCheck = mysqli_num_rows($pymtTypeResult);
        
    ?>
    <div class="container">
        <div class="py-4">
            <h2>Booking</h2>
            <hr>
        </div>
        <div class="card bg-light">
            <div class="card-header">Booking Detail</div>
                <div class="card-body">
                    <h4>Personal Info</h4>
                    <hr>
                    <form>
                        <div class="form-group row">
                            <label for="inputname" class="col-sm-2 col-form-label">Customer Name</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="cname" value="<?php echo $cusData['CUST_NAME']; ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputname" class="col-sm-2 col-form-label">IC</label>
                            <div class="col-sm-10 col-md-3">
                            <input type="text" class="form-control" name="cic" value="<?php echo $cusData['CUST_IC']?>" disabled>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <h4>Booking Detail</h4><hr>
                    <form action="postBooking.php" method="POST" autocomplete="off">
                    <input type="hidden" name="cust_id" value="<?php echo $cusData['CUST_ID'];?>">
                    <div class="form-group row">
                        <label for="selectCourt" class="col-sm-2 col-form-label">Court</label>
                        <div class="col-sm-10 col-md-8">
                            <select name="court_id" class="custom-select form-control" required>
                                <option value="">Select Court</option>
                                <?php
                                    if($resultCourtCheck>0){
                                        while ($row = mysqli_fetch_array($courtResult)) {
                                            echo '<option value="'.$row['COURT_ID'].'">'.$row['COURT_NAME'].' | '.$row['SPORT_NAME'].'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputname" class="col-sm-2 col-form-label">Start Date Time</label>
                        <div class="col-sm-10 col-md-5">
                        <input type="text" class="form-control" name="start_datetime" id="start_datetime" required>   
                    </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputname" class="col-sm-2 col-form-label">End Date Time</label>
                        <div class="col-sm-10 col-md-5">
                        <input type="text" class="form-control" name="end_datetime" id="end_datetime" required>
                    </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputname" class="col-sm-2 col-form-label">Day(s)</label>
                        <div class="col-sm-10 col-md-3">
                        <input type="text" class="form-control" name="total_day" id="total_day" readonly>
                    </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="inputname" class="col-sm-2 col-form-label">Amount (RM)</label>
                        <div class="col-sm-10 col-md-3">
                        <input type="text" class="form-control" name="pymt_amount"  id="pymt_amount" readonly>
                    </div>
                    </div>

                    <div class="form-group row">
                        <label for="selectCourt" class="col-sm-2 col-form-label">Payment</label>
                        <div class="col-sm-10 col-md-3">
                            <select name="pymt_type_id" class="custom-select form-control" required>
                                <option value="">Select Payment</option>
                                <?php
                                    if($resultpymtTypeCheck>0){
                                        while ($row = mysqli_fetch_array($pymtTypeResult)) {
                                            echo '<option value="'.$row['PYMT_TYPE_ID'].'">'.$row['PYMT_TYPE_NAME'].'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="selectCourt" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10 col-md-8">
                            <textarea name="booking_desc" class="form-control" rows="5" placeholder="any note"></textarea>
                        </div>
                    </div>
                    <div class="form-group row float-right">
                        <div class="col-sm-10 ">
                        <button type="submit" class="btn btn-primary">Book</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
    <?php include ROOT_DIR . '/includes/footer/footer_style.php'; ?>

    <script>
        $( "#start_datetime" ).datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
        });
        $('#end_datetime').datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
        });
        $('#start_datetime').datepicker().bind("change", function () {
            var minValue = $(this).val();
            minValue = $.datepicker.parseDate("dd-mm-yy", minValue);
            $('#end_datetime').datepicker("option", "minDate", minValue);
            calculate();
        });
        $('#end_datetime').datepicker().bind("change", function () {
            var maxValue = $(this).val();
            maxValue = $.datepicker.parseDate("dd-mm-yy", maxValue);
            $('#start_datetime').datepicker("option", "maxDate", maxValue);
            calculate();
        });
        function calculate() {
            var price1Day = 100.00;
            var totalPrice = 0;
            var d1 = $('#start_datetime').datepicker('getDate');
            var d2 = $('#end_datetime').datepicker('getDate');
            // var oneDay = 24*60*60*1000;
            var oneDay = 1000*60*60*24;
            var diff = 0;
            var total = 0;
            if (d1 && d2) {
                diff = Math.round(Math.abs((d2.getTime() - d1.getTime())/(oneDay)));
                total = diff + 1;
                totalPrice = total * price1Day;
            }
            $('#total_day').val(total);
            $('#pymt_amount').val(totalPrice);

        }
    </script>
</html>