<?php
    require_once 'pages/header.php';
    
?>
    
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 title">
            <h1><i class="fa fa-bars"></i>Customer Pre Orders <button class="btn btn-sm btn-default"><a
                        href="index.php">Back</a></button></h1>
            <div class="col-sm-4">
                All( <?php 
                    $getall = getAllpre_order();
                    echo $row=mysqli_num_rows($getall);
                    ?> )
            </div>
        </div>

        <?php  
        
        while($row=mysqli_fetch_assoc($getall)){ 
                    $pre_order_id = $row['pre_order_id']; 
        ?>

        <div class="col-lg-12 my-lg-0 my-1 " style="padding-top:30px;">
            <div id="main-content" class="bg-white border">

                <div class="order my-3 bg-light">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="d-flex flex-column justify-content-between order-summary">
                                <div class="d-flex align-items-center">
                                    <div class="text-uppercase">Pre Order Token #<?php echo $pre_order_id ;?></div>
                                </div>
                                <div class="fs-8"><?php echo $row['date_updated'] ;?></div><br>
                                <?php 
                                $getdetails = getAllProductsbyID($row['p_id']);

                                while($row2=mysqli_fetch_assoc($getdetails)){
                                    
                                    $img = $row2['p_img'];
                                    $img_src = "upload/Products/".$img;?>
                                 <div class="fs-8"><strong>Product ID :#</strong> <?php echo $row2['p_id'] ;?></div>
                                 <div class="fs-8"><strong>Product Name:</strong> <?php echo $row2['p_name'] ;?></div>  
                                 <div class="fs-8"><strong>Product Price:</strong> <?php echo $row2['p_price'] ;?></div><br>
                                 
                                 <?php } ?> 
                                 <div class="fs-8"><strong>Name : </strong> <?php echo $row['customer_name'] ;?></div>
                                 <div class="fs-8"><strong>Email:</strong> <?php echo $row['customer_email'] ;?></div>  
                                 <div class="fs-8"><strong>Address:</strong> <?php echo $row['customer_address'] ;?></div><br>
                                 <div class="fs-8"><strong>Phone:</strong> <?php echo $row['customer_phone'] ;?></div><br>
                            </div>
                            <div>

                                <select style=" background-color:  #AED6F1; width:50%;"
                                    onchange='orderChangePreOrder(this, "<?php echo $pre_order_id; ?>","pre_order_status")'
                                    id="pre_order_status <?php echo $pre_order_id; ?>" class='form-control norad tx12'
                                    name="pre_order_status" type='text'>

                                    <option value="1" <?php if ($row['pre_order_status']=="1") echo "selected"; ?>>
                                        Order confirmed
                                    </option>
                                    <option value="2" <?php if ($row['pre_order_status']=="2") echo "selected"; ?>>
                                        Prepare Order
                                    </option>
                                    <option value="3" <?php if ($row['pre_order_status']=="3") echo "selected"; ?>>
                                        Shipped Order
                                    </option>
                                    <option value="4" <?php if ($row['pre_order_status']=="4") echo "selected"; ?>>
                                        Delivered
                                    </option>
                                    <option value="5" <?php if ($row['pre_order_status']=="5") echo "selected"; ?>>
                                        Canceled
                                    </option>

                                </select>
                            </div>

                        </div>
                        <div class="col-lg-8">
                            <div class="d-sm-flex align-items-sm-start justify-content-sm-between">
                                <div class="status">Status :

                                    <?php if($row['pre_order_status'] == 1){
                                            echo 'Order confirmed';
                                        }else if($row['pre_order_status'] == 2){
                                            echo 'Prepare Order';
                                        } else if($row['pre_order_status'] == 3){
                                            echo 'Shipped Order';
                                        } else if($row['pre_order_status'] == 4){
                                            echo 'Deliverd';
                                        } else if($row['pre_order_status'] == 5){
                                            echo 'Canceled';
                                        } ?>
                                </div>
     

                            </div>
                            <?php if($row['pre_order_status'] != 5) {?>
                            <div class="track">

                                <div
                                    class="step <?php if($row['pre_order_status'] == 1 || $row['pre_order_status'] == 2 || $row['pre_order_status'] == 3 || $row['pre_order_status'] == 4) {echo 'active';}?>">
                                    <span class="icon"> <i class="fa fa-check"></i> </span>
                                    <span class="text">Order confirmed</span>
                                </div>
                                <div
                                    class="step <?php if($row['pre_order_status'] == 2 || $row['pre_order_status'] == 3 || $row['pre_order_status'] == 4) {echo 'active';}?>">
                                    <span class="icon"> <i class="fa fa-user"></i> </span>
                                    <span class="text">Prepare Order</span>
                                </div>
                                <div
                                    class="step <?php if($row['pre_order_status'] == 3 || $row['pre_order_status'] == 4) {echo 'active';}?>">
                                    <span class="icon"> <i class="fa fa-truck"></i> </span>
                                    <span class="text"> Shipped Order </span>
                                </div>
                                <div class="step <?php if($row['pre_order_status'] == 4) {echo 'active';}?>"> <span
                                        class="icon"> <i class="fa fa-home"></i> </span>
                                    <span class="text">Delivered</span>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <?php } ?>

        <div class="clearfix"></div>
    </div>
</div>


<style>
/* Resetting */


#main-content {
    padding: 10px;
    border-radius: 15px;
}

#main-content .h5,
#main-content .text-uppercase {
    font-weight: 600;
    margin-bottom: 0;
}

#main-content .h5+div {
    font-size: 2rem;
}

#main-content .box {
    padding: 10px;
    border-radius: 6px;
    width: 500px;
    height: 90px;
}

#main-content .box img {
    width: 40px;
    height: 40px;
    object-fit: contain;
}

#main-content .box .tag {
    font-size: 1rem;
    color: #000;
    font-weight: 500;
}

#main-content .box .number {
    font-size: 1.5rem;
    font-weight: 600;
}

.order {
    padding: 10px 30px;
    min-height: 150px;
}

.order .order-summary {
    height: 100%;
}

.order .blue-label {
    background-color: #aeaeeb;
    color: #0046dd;
    font-size: 1em;
    padding: 0px 3px;
}

.order .green-label {
    background-color: #a8e9d0;
    color: #008357;
    font-size: 1em;
    padding: 0px 3px;
}

.order .fs-8 {
    font-size: 1em;
}

.order .rating img {
    width: 20px;
    height: 20px;
    object-fit: contain;
}

.order .rating .fas,
.order .rating .far {
    font-size: 0.9rem;
}

.order .rating .fas {
    color: #daa520;
}

.order .status {
    font-weight: 600;
}

.order .btn.btn-primary {
    background-color: #fff;
    color: #4e2296;
    border: 1px solid #4e2296;
}

.order .btn.btn-primary:hover {
    background-color: #4e2296;
    color: #fff;
}

.order .progressbar-track {
    margin-top: 20px;
    margin-bottom: 20px;
    position: relative;
}

.order .progressbar-track .progressbar {
    list-style: none;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-left: 0rem;
}

.order .progressbar-track .progressbar li {
    font-size: 1.5rem;
    border: 1px solid #333;
    padding: 5px 10px;
    border-radius: 50%;
    background-color: #dddddd;
    z-index: 100;
    position: relative;
}

.order .progressbar-track .progressbar li.green {
    border: 1px solid #007965;
    background-color: #d5e6e2;
}

.order .progressbar-track .progressbar li::after {
    position: absolute;
    font-size: 0.9rem;
    top: 50px;
    left: 0px;
}

#tracker {
    position: absolute;
    border-top: 1px solid #bbb;
    width: 100%;
    top: 25px;
}

#step-1::after {
    content: 'Order confirmed';
    left: -10px;
}

#step-2::after {
    content: 'Prepare Order';
}

#step-3::after {
    content: 'Shipped';
}

#step-4::after {
    content: 'Delivered';
    left: -10px;
}

.track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px
}

.track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative
}

.track .step.active:before {
    background: #45B39D
}

.track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px
}

.track .step.active .icon {
    background: #1ABC9C;
    color: #fff
}

.track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd
}

.track .step.active .text {
    font-weight: 400;
    color: #000
}

.track .text {
    display: block;
    margin-top: 7px
}

/* Backgrounds */
.bg-purple {
    background-color: #A569BD;
}

.bg-light {
    background-color: #D0D3D4 !important;
}

.green {
    color: #82E0AA !important;
}

/* Media Queries */
@media(max-width: 1199.5px) {
    nav ul li {
        padding: 0 10px;
    }
}

@media(max-width: 1000px) {
    .order .progressbar-track .progressbar li {
        font-size: 1rem;
    }

    .order .progressbar-track .progressbar li::after {
        font-size: 0.8rem;
        top: 35px;
    }

    #tracker {
        top: 20px;
    }
}

@media(max-width: 440px) {
    #main-content {
        padding: 20px;
    }

    .order {
        padding: 20px;
    }

    #step-4::after {
        left: -5px;
    }
}

@media(max-width: 395px) {
    .order .progressbar-track .progressbar li {
        font-size: 0.8rem;
    }

    .order .progressbar-track .progressbar li::after {
        font-size: 0.7rem;
        top: 35px;
    }

    #tracker {
        top: 15px;
    }

    .order .btn.btn-primary {
        font-size: 0.85rem;
    }
}

@media(max-width: 355px) {
    #main-content {
        padding: 15px;
    }

    .order {
        padding: 10px;
    }
}
</style>

<link rel="stylesheet" href="../plugins/iziToast-master/dist/css/iziToast.min.css">

<script src="../plugins/iziToast-master/dist/js/iziToast.min.js"></script>