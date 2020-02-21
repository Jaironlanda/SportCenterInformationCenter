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
    <title>SCIS | Edit Customer</title>
    <?php include ROOT_DIR . '/includes/header/header_style.php'; ?>
</head>
    <?php include ROOT_DIR . '/includes/navigation.php'; ?>
<body>
    <?php
        //get user id
        if(isset($_GET['id'])){
            $cust_id = $_GET['id'];
        }

        $sqlCust = "SELECT * FROM CUSTOMER;";

        $custResult = mysqli_query($conn, $sqlCust);
        echo mysqli_error($conn);
        $invoiceResultCheck = mysqli_num_rows($custResult);
        
        if(!$invoiceResultCheck>0){
            echo '<div class="alert alert-danger" role="alert">Customer not exist.</div>';
        }

        //fetch data
        $custData = mysqli_fetch_array($custResult);

    ?>
    <div class="container">
        <div class="py-2">
            <h2>Edit Customer</h2>
            
            <?php
                if (isset($_GET['success']) && $_GET['success'] == 1) {
                   echo '<div class="alert alert-success" role="alert">Success update</div>';
                }elseif (isset($_GET['failed']) && $_GET['failed'] == 0) {
                    echo '<div class="alert alert-danger" role="alert">Error update</div>';
                }
            ?>

            <hr>
        </div>
        <div class="py-2">
            <a href="<?php echo ROOT_URL; ?>/indexRegister.php" role="button" class="btn btn-primary">Customer List</a>
        </div>
        <div class="card bg-light">
            <div class="card-header">Customer Detail</div>
                <div class="card-body">
                    <form action="updateCustomer.php" method="POST">
                    <input type="hidden" name="bid" value="<?php echo $custData['CUST_ID']; ?>">
                    <div class="form-group row">
                        <label for="inputname" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="cname" value="<?php echo $custData['CUST_NAME']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputname" class="col-sm-2 col-form-label">IC</label>
                        <div class="col-sm-10 col-md-3">
                        <input type="text" class="form-control" name="cic" value="<?php echo $custData['CUST_IC']; ?>" required>
                        </div>
                    </div><div class="form-group row">
                        <label for="inputname" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10 col-md-5">
                        <input type="text" class="form-control" name="pnum" value="<?php echo $custData['CUST_PHONE']; ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputname" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="add"> -->
                        <textarea name="add" class="form-control" rows="3"><?php echo $custData['CUST_ADDRESS']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputname" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10 col-md-5">
                        <input type="email" class="form-control" value="<?php echo $custData['CUST_EMAIL']; ?>" name="email">
                        </div>
                    </div>
                    <div class="form-group row float-right">
                        <div class="col-sm-10 ">
                        <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
</body>
    <?php include ROOT_DIR . '/includes/footer/footer_style.php'; ?>
</html>