<?php
    include 'template/header.php';
	include 'template/dependencies.php';
    include 'auth/register/auth.php';
?>

<?php
    $getall = getAllCustomersByID($_SESSION['customer']);

        $row=mysqli_fetch_assoc($getall);
?>

<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                </nav>
            </div>
        </div>

        <?php
		$getall = getAllCustomersByID($_SESSION['customer']);
		$row=mysqli_fetch_assoc($getall);

			$img = $row['cust_img'];
			$img_src = "auth/upload/".$img;
        ?>

        <div class="row">
            <div class="col-lg-4">               
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <form method="post" enctype="multipart/form-data">
                            <?php if($row['cust_img']==NULL){ ?>
                            <img src="images/avatar 1.png" style="width: 150px;">
                            <?php }else{?>
                                <img src="<?php echo $img_src; ?>" style="width: 150px;">
                            <?php }?>
                            <div class="profile">
                                <label>
                                <input type="hidden" id="cust_id" name="cust_id" value="<?php echo $row['cust_id'];?>"/>
                                <input type="hidden" id="field" name="field" value="cust_img"/>
                                    <input type="file" name="file" id="file" onchange="profileImage(this.form)"><i
                                        class="fa fa-edit"></i>
                                </label>
                            </div>
                            <h5 class="my-3">Welcome <?php echo $row['cust_name']; ?> </h5>
                            <ul>
                                <li><a href="auth/logout.php">Log Out <br><i class="fa fa-power-off"></i></a></li>
                            </ul>
                        </form>
                    </div>
                </div>

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
                                <li>
                                    <input type="hidden" class="form-control" name="cust_id"
                                        value="<?php echo $_SESSION['customer']; ?>" id="cust_id">
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <button type="button" onclick="changePassword(this.form)" class="btn btn-darkblue"
                                        style="margin-left:50px;">Save
                                        changes</button>
                                </li>

                            </ul>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $row['cust_name']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $row['cust_email']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Phone</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $row['cust_phone']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">NIC</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $row['cust_nic']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $row['cust_address']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <h5 style="text-align:center; margin-top:8px;">Change Email</h5>
                            <form method="POST" novalidate enctype="multipart/form-data">
                                <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <input type="email" class="form-control" name="current_email" id="current_email"
                                            placeholder="Current Email Address" required>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <input type="email" class="form-control" name="new_email" id="new_email"
                                            placeholder="New Email Address" required>
                                    </li>
                                    <li>
                                        <input type="hidden" class="form-control" name="cust_id"
                                            value="<?php echo $row['cust_id']?>" id="cust_id">
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <button type="button" onclick="changeEmail(this.form)" class="btn btn-darkblue"
                                            style="margin-left:50px;">Save
                                            changes</button>
                                    </li>

                                </ul>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1"></span> Profile Setting
                                </p>
                                <div>
                                    <label class="mb-1" style="font-size: .77rem;">Name</label>
                                    <input type="text"
                                        onchange='changeCustomers(this, "<?php echo $row["cust_id"]; ?>","cust_name")'
                                        class="form-control" id="name" placeholder="Your name"
                                        value="<?php echo $row['cust_name']; ?>">
                                </div>

                                <div>
                                    <label class="mb-1" style="font-size: .77rem;">Phone</label>
                                    <input type="text"
                                        onchange='changeCustomers(this,"<?php echo $row["cust_id"]; ?>","cust_phone")'
                                        class="form-control" id="phone" placeholder="Your Phone"
                                        value="<?php echo $row['cust_phone']; ?>">
                                </div>

                                <div>
                                    <label class="mb-1" style="font-size: .77rem;">Address</label>
                                    <input type="text"
                                        onchange='changeCustomers(this,"<?php echo $row["cust_id"]; ?>","cust_address")'
                                        class="form-control" id="address" placeholder="Your Address"
                                        value="<?php echo $row['cust_address']; ?>">
                                </div>

                                <div>
                                    <label class="mb-1" style="font-size: .77rem;">NIC</label>
                                    <input type="text"
                                        onchange='changeCustomers(this,"<?php echo $row["cust_id"]; ?>","cust_nic")'
                                        class="form-control" id="nic" placeholder="Your NIC"
                                        value="<?php echo $row['cust_nic']; ?>">
                                </div>

                                <div>
                                    <label>Delete Account</label><br>
                                    <button class="border px-3 p-1 add-experience"
                                        onclick="deleteCustomer(<?php echo $row['cust_id']; ?>)"><i
                                            class="fa fa-trash"></i></button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="plugins/iziToast-master/dist/js/iziToast.min.js"></script>
<script src="admin/js/admin.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
.form-control {
    font-size: 12px;
    color: #3a89df;
}

.profile input[type="file"] {
    display: none;
}
</style>