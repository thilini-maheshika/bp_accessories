<?php
    require_once 'pages/header.php';
?>

<div class="container-fluid">
    <div class="row" style="margin-left:50px;" >
        <div class="col-sm-10 title">
            <h3 style="font-size:20px; margin-bottom:20px;"><i class="fa fa-bars"></i> Settings - Website Home page </h3>
        </div>

        <div class="col-sm-12">
            <div class="row">
                <!-- Banner Settings Start -->
                <div class="col-sm-9 " style="border:1px solid gray; ">
                    <h5 class="text" style="font-size:17px; margin-bottom:2%;">Banner Settings</h5>

                    <?php
                        $getall = getAllSettings();
                        if($res = mysqli_fetch_assoc($getall)){

                        $bb_img = $res['banner_back_img'];
                        $bb_img_src = 'upload/setting_img/'.$bb_img;

                        $b_img = $res['banner_img'];
                        $b_img_src = 'upload/setting_img/'.$b_img;

                        $sub_img = $res['subpage_back_img'];
                        $sub_img_src = 'upload/setting_img/'.$sub_img;

                    ?>

                    <div class="mb-3">
                        <label>Banner Title</label>
                        <input type="text" name="banner-title" id="banner-title" class="form-control" onchange="quickUpdate(this,'banner_title')" value="<?php echo $res['banner_title']; ?>"  required />
                    </div>

                    <div class="mb-3">
                        <label>Banner Product Name</label>
                        <input type="text" name="banner-pname" id="banner-pname" class="form-control" onchange="quickUpdate(this,'banner_pname')"
                            value="<?php echo $res['banner_pname']; ?>">
                    </div>

                    <form class="mt-3" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="hidden" name="field" id="field" value="banner_back_img">
                            <label for="formFile" class="form-label">Banner background Image</label>
                            <input class="form-control" onchange="quickUpdateImageSetting(this.form);" name="file" type="file" id="formFile">
                        </div>
                    </form>
                    <img class="mt-2" width="200px" src='<?php echo $bb_img_src; ?>'>

                    <form class="mt-3" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="hidden" name="field" id="field" value="banner_img">
                            <label for="formFile" class="form-label">Banner Image</label>
                            <input class="form-control" onchange="quickUpdateImageSetting(this.form);" name="file" type="file" id="formFile">
                        </div>
                    </form>
                    <img style="margin-bottom:2%;" class="mt-2" width="200px" src='<?php echo $b_img_src; ?>'>

                </div>

                <!-- Banner part end -->

                <!-- Contact Settings start -->

                <div class="col-sm-9" style="border:1px solid gray; margin-top:30px;">
                    <h5 class="text" style="font-size:17px; margin-top:5%; margin-bottom:2%;">Contact Settings</h5>
                    <div class="mb-3">
                        <label>Company Email</label>
                        <input type="email" name="com-email" id="com-email" class="form-control" onchange="quickUpdate(this,'com_email')" value="<?php echo $res['com_email']; ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label>Company Phone Number</label>
                        <input type="text" name="com-phone" id="com-phone" class="form-control" onchange="quickUpdate(this,'com_phone')" value="<?php echo $res['com_phone']; ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label>Company Address</label>
                        <input type="text" name="com-address" id="com-address" class="form-control" onchange="quickUpdate(this,'com_address')"
                            value="<?php echo $res['com_address']; ?>" required>
                    </div>

                    <div class="mb-3" style="margin-bottom:2%;">
                        <label>Social Media -URL</label><br>
                        Facebook<input type="url" name="facebook" id="facebook" class="form-control" onchange="quickUpdate(this,'fb')"
                            value="<?php echo $res['fb']; ?>">
                        Instagram<input type="url" name="instagram" id="instagram" class="form-control" onchange="quickUpdate(this,'insta')"
                            value="<?php echo $res['insta']; ?>">
                        Google<input type="url" name="google" id="google" class="form-control" onchange="quickUpdate(this,'google')" value="<?php echo $res['google']; ?>">

                    </div>
                </div>
                
                <!-- Contact Settings end -->

                <!-- Shop Background Setting start-->

                <div class="col-sm-9" style="border:1px solid gray; margin-top:30px; margin-bottom:30px;">
                    <h5 class="text" style="font-size:17px; margin-top:5%; margin-bottom:2%;">Subpage Background Settings</h5>
                    <div class="mb-3">
                        <label>Sub Page Title</label>
                        <input type="text" name="subpage-title" id="subpage-title" class="form-control" onchange="quickUpdate(this,'subpage_title')"
                            value="<?php echo $res['subpage_title']; ?>" required>
                    </div>

                    <form class="mt-3" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="hidden" name="field" id="field" value="subpage_back_img">
                            <label for="formFile" class="form-label">Background Image</label>
                            <input class="form-control" onchange="quickUpdateImageSetting(this.form);" name="file" type="file" id="formFile">
                        </div>
                    </form>
                    <img style="margin-bottom:2%;" class="mt-2" width="200px" src="<?php echo $sub_img_src; ?>">
                </div>

                <!-- Contact Settings start -->

                <div class="col-sm-9" style="border:1px solid gray; margin-top:30px; margin-bottom:2%; ">
                    <h5 class="text" style="font-size:17px; margin-top:5%; margin-bottom:2%;">Order Settings</h5>
                    <div class="mb-3">
                        <label>Shipping Fee</label>
                        <input type="text" name="ship_fee" id="ship_fee" class="form-control" onchange="quickUpdate(this,'ship_fee')" value="<?php echo $res['ship_fee']; ?>"
                            required style="margin-bottom:2%;">
                    </div>                  
                </div>

            <?php } ?>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/app.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.fa-bars').click(function() {
            $('.sidebar').toggle();
        })
    });
    </script>

    </body>

    </html>