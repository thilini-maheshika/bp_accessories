<?php
    require_once 'pages/header.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-10 title">
            <h3 style="font-size:20px;"><i class="fa fa-bars"></i> Settings - Website Home page </h3>
        </div>

        <div class="col-sm-12">
            <div class="row">
                <!-- Banner Settings Start -->
                <div class="col-sm-9">
                    <h5 class="text" style="font-size:17px; margin-bottom:2%;">Banner Settings</h5>

                    <?php
                        $getall = getAllSettings();
                        if($res = mysqli_fetch_assoc($getall)){

                        $b_img = $res['banner_img'];
                        $b_img_src = 'upload/setting_img/banner_img'.$b_img;
                    ?>

                    <div class="mb-3">
                        <label>Banner Title</label>
                        <input type="text" name="banner-title" id="banner-title" class="form-control" onchange="quickUpdate(this,'banner-title')"
                            value="<?php echo $res['banner-title']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label>Banner Product Name</label>
                        <input type="text" name="banner-pname" id="banner-pname" class="form-control" onchange="quickUpdate(this,'banner-pname')"
                            value="<?php echo $res['banner-pname']; ?>">
                    </div>

                    <form class="mt-3" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="hidden" name="field" id="field" value="banner_image">
                            <label for="formFile" class="form-label">Banner Image</label>
                            <input class="form-control" onchange="" name="file" type="file" id="formFile">
                        </div>
                    </form>
                    <img class="mt-2" width="200px" src=''>

                </div>

                <!-- Banner part end -->

                <!-- Contact Settings start -->

                <div class="col-sm-9">
                    <h5 class="text" style="font-size:17px; margin-top:5%; margin-bottom:2%;">Contact Settings</h5>
                    <div class="mb-3">
                        <label>Company Email</label>
                        <input type="email" name="com-email" id="com-email" class="form-control" onchange="quickUpdate(this,'com-email')" value="<?php echo $res['com-email']; ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label>Company Phone Number</label>
                        <input type="text" name="com-phone" id="com-phone" class="form-control" onchange="quickUpdate(this,'com-phone')" value="<?php echo $res['com-phone']; ?>"
                            required>
                    </div>

                    <div class="mb-3">
                        <label>Company Address</label>
                        <input type="text" name="com-address" id="com-address" class="form-control" onchange="quickUpdate(this,'com-address')"
                            value="<?php echo $res['com-address']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label>Social Media -URL</label><br>
                        Facebook<input type="url" name="facebook" id="facebook" class="form-control" onchange="quickUpdate(this,'facebook')"
                            value="<?php echo $res['fb']; ?>">
                        Instagram<input type="url" name="instagram" id="instagram" class="form-control" onchange="quickUpdate(this,'instagram')"
                            value="<?php echo $res['insta']; ?>">
                        Google<input type="url" name="google" id="google" class="form-control" onchange="quickUpdate(this,'google')" value="<?php echo $res['google']; ?>">

                    </div>
                </div>
                
                <!-- Contact Settings end -->

                <!-- Shop Background Setting start-->

                <div class="col-sm-9">
                    <h5 class="text" style="font-size:17px; margin-top:5%; margin-bottom:2%;">Subpage Background Settings</h5>
                    <div class="mb-3">
                        <label>Sub Page Title</label>
                        <input type="text" name="subpage-title" id="subpage-title" class="form-control" onchange="quickUpdate(this,'subpage-title')"
                            value="<?php echo $res['subpage_title']; ?>" required>
                    </div>

                    <form class="mt-3" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="hidden" name="field" id="field" value="sub_image">
                            <label for="formFile" class="form-label">Background Image</label>
                            <input class="form-control" onchange="" name="file" type="file" id="formFile">
                        </div>
                    </form>
                    <img class="mt-2" width="200px" src=''>
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