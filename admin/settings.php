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
                    <h5 class="text" style="font-size:15px;">Banner Settings</h5>
                    <div class="mb-3">
                        <label>Banner Title</label>
                        <input type="text" name="banner-title" id="banner-title" class="form-control" onchange=""
                            value="" required>
                    </div>

                    <div class="mb-3">
                        <label>Banner Product Name</label>
                        <input type="text" name="banner-pname" id="banner-pname" class="form-control" onchange=""
                            value="">
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
                    <h5 class="text" style="font-size:15px;">Contact Settings</h5>
                    <div class="mb-3">
                        <label>Company Email</label>
                        <input type="email" name="comp-email" id="com-email" class="form-control" onchange="" value=""
                            required>
                    </div>

                    <div class="mb-3">
                        <label>Company Phone Number</label>
                        <input type="text" name="comp-phone" id="comp-phone" class="form-control" onchange="" value=""
                            required>
                    </div>

                    <div class="mb-3">
                        <label>Company Address</label>
                        <input type="text" name="comp-address" id="comp-address" class="form-control" onchange=""
                            value="" required>
                    </div>

                    <div class="mb-3">
                        <label>Social Media -URL</label><br>
                        Facebook<input type="url" name="facebook" id="facebook" class="form-control" onchange=""
                            value="">
                        Instagram<input type="url" name="instagram" id="instagram" class="form-control" onchange=""
                            value="">
                        Google<input type="url" name="google" id="google" class="form-control" onchange="" value="">

                    </div>
                </div>
                
                <!-- Contact Settings end -->
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