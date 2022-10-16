<?php
    require_once 'pages/header.php';
    require_once 'pages/admin.php';
?>
<?php
    $getall = checkCustomerByID($_SESSION['admin']);

        $row=mysqli_fetch_assoc($getall);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 title">
            <h1><i class="fa fa-bars"></i> Profile Setting </h1>
        </div>


        <div class="col-sm-8 cat-view">
                <h4>Password Recovery</h4>
            <div class="content">
                
            <div class="card mb-6 mb-lg-2">
                    <div class="card-body p-0">

                        <h5 style="text-align:center; margin-top:8px;">Change password</h5>
                        <form method="POST" novalidate enctype="multipart/form-data">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <input type="password" class="form-control" name="current_password"
                                        id="current_password" placeholder="Current Password Name" required>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <input type="password" class="form-control" name="new_password" id="new_password"
                                        placeholder="New Password" required>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <input type="password" class="form-control" name="confirm_new_password"
                                        id="confirm_new_password" placeholder="Confirm New Password" required>
                                </li>
                                
                                    <input type="hidden" class="form-control" name="cust_email"
                                        value="<?php echo $_SESSION['admin']; ?>" id="cust_email">
                                
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <button type="button" onclick="changePasswordadmin(this.form)" class="btn btn-darkblue"
                                        style="margin-left:50px;">Save
                                        changes</button>
                                </li>

                            </ul>
                        </form>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="../plugins/iziToast-master/dist/css/iziToast.min.css">

<script src="../plugins/iziToast-master/dist/js/iziToast.min.js"></script>