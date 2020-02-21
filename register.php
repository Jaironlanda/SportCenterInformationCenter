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
    <title>SCIS | Register</title>
    <?php include ROOT_DIR . '/includes/header/header_style.php'; ?>
</head>
    <?php include ROOT_DIR . '/includes/navigation.php'; ?>
<body>
    <div class="container">
        <div class="py-2">
            <h2>Register</h2>
            
            <?php
                if (isset($_GET['success']) && $_GET['success'] == 1) {
                   echo '<div class="alert alert-success" role="alert"> Success</div>';
                }elseif (isset($_GET['failed']) && $_GET['failed'] == 0) {
                    echo '<div class="alert alert-danger" role="alert">Error</div>';
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
                    <form action="postRegister.php" method="POST">
                    <div class="form-group row">
                        <label for="inputname" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="cname" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputname" class="col-sm-2 col-form-label">IC</label>
                        <div class="col-sm-10 col-md-3">
                        <input type="text" class="form-control" name="cic" required>
                        </div>
                    </div><div class="form-group row">
                        <label for="inputname" class="col-sm-2 col-form-label">Phone Number</label>
                        <div class="col-sm-10 col-md-5">
                        <input type="text" class="form-control" name="pnum" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputname" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="add"> -->
                        <textarea name="add" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputname" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10 col-md-5">
                        <input type="email" class="form-control " name="email">
                        </div>
                    </div>
                    <div class="form-group row float-right">
                        <div class="col-sm-10 ">
                        <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
</body>
    <?php include ROOT_DIR . '/includes/footer/footer_style.php'; ?>
</html>