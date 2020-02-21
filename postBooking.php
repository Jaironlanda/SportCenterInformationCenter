<?php
    include 'init.php';
    include ROOT_DIR . '/includes/db-auth/db-auth.php';

    //booking
    $cust_id = $_POST['cust_id'];
    $court_id = $_POST['court_id'];
    $booking_desc = $_POST['booking_desc'];
    $originalStartDate = $_POST['start_datetime'];
    $originalEndDate = $_POST['end_datetime'];
    $start_datetime = date("Y-m-d", strtotime($originalStartDate));
    $end_datetime = date("Y-m-d", strtotime($originalEndDate));
    
    //payment
    $pymt_amount = $_POST['pymt_amount'];
    $pymt_type = $_POST['pymt_type_id'];
    $pymt_date = date("Y-m-d");

    // var_dump($pymt_amount);
    // var_dump($pymt_type);
    // var_dump($pymt_date);

    //insert payment
    $pymtSQL = "INSERT INTO 
    PAYMENT (PYMT_AMOUNT, PYMT_TYPE_ID, PYMT_DATE) 
    VALUES ('$pymt_amount', '$pymt_type', '$pymt_date');";

    //GET LAST ID
    if (mysqli_query($conn, $pymtSQL)) {
        $pymt_id = mysqli_insert_id($conn);

        $bookingSQL = 
        "INSERT INTO BOOKING 
        (CUST_ID, COURT_ID, PYMT_ID, BOOKING_DESC, START_DATETIME, END_DATETIME ) 
        VALUES
        ('$cust_id',
        '$court_id',
        '$pymt_id',
        '$booking_desc',
        '$start_datetime',
        '$end_datetime');";
        
        
        if(mysqli_query($conn, $bookingSQL)){
            $booking_id = mysqli_insert_id($conn);
        }
        // echo mysqli_error($conn);
        if(mysqli_affected_rows($conn)>0){
            header('Location:'.ROOT_URL.'/invoice.php?id='.$booking_id);
        }else {
            header('Location:'.ROOT_URL.'/invoice.php?failed=0');

        }
    }
?>