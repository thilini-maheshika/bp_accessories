<?php
	include 'template/header.php';
	include 'template/dependencies.php';
    include 'auth/register/auth.php';
?>

<section class="py-5" style="margin-top: -50px; backgroud-color: gray;">

    <div class="card-body">
        <div class="container">
            <?php 
                $getall = getAllOrdersByCustID($_SESSION['customer']);

                while($row=mysqli_fetch_assoc($getall)){ 
                    $order_id = $row['order_id'];
                    ?>
            <article class="card mt-5">
                <header class="card-header"> Orders / Tracking </header>
                <div class="card-body">
                    <h6>Order ID: #<?php echo $row['order_id']; ?> </h6>
                    <article class="card">
                        <div class="card-body row">

                            <div class="col"> <strong>Shipping TO:</strong>
                                <br><?php echo $row['shipping_address']; ?>
                            </div>
                            <div class="col"> <strong>Billing TO:</strong>
                                <br><?php echo $row['billing_address']; ?>
                            </div>
                            <div class="col"> <strong>Status:</strong>
                                <br>
                                <?php if($row['order_status'] == 1){
                                            echo 'Order confirmed';
                                        }else if($row['order_status'] == 2){
                                            echo 'Prepare Order';
                                        } else if($row['order_status'] == 3){
                                            echo 'Shipped Order';
                                        } else if($row['order_status'] == 4){
                                            echo 'Deliverd';
                                        } else if($row['order_status'] == 5){
                                            echo 'Canceled';
                                        } ?>
                            </div>
                            <div class="col"> <strong>Tracking #:</strong> <br>
                                <?php if($row['tracking'] != 'Pending'){ echo $row['tracking']; }else{echo "Pending";}?>
                            </div>
                            <div class="col"> <strong>Order Purchase Date:</strong>
                                <br><?php echo $row['date_updated']; ?>
                            </div>
                        </div>
                    </article>
                    <?php if($row['order_status'] != 5) {?>
                    <div class="track">

                        <div
                            class="step <?php if($row['order_status'] == 1 || $row['order_status'] == 2 || $row['order_status'] == 3 || $row['order_status'] == 4) {echo 'active';}?>">
                            <span class="icon"> <i class="fa fa-check"></i> </span>
                            <span class="text">Order confirmed</span>
                        </div>
                        <div
                            class="step <?php if($row['order_status'] == 2 || $row['order_status'] == 3 || $row['order_status'] == 4) {echo 'active';}?>">
                            <span class="icon"> <i class="fa fa-user"></i> </span>
                            <span class="text">Prepare Order</span>
                        </div>
                        <div
                            class="step <?php if($row['order_status'] == 3 || $row['order_status'] == 4) {echo 'active';}?>">
                            <span class="icon"> <i class="fa fa-truck"></i> </span>
                            <span class="text"> Shipped Order </span>
                        </div>
                        <div class="step <?php if($row['order_status'] == 4) {echo 'active';}?>"> <span class="icon"> <i
                                    class="fa fa-box"></i> </span>
                            <span class="text">Deliverd</span>
                        </div>
                    </div>
                    <?php } ?>
                    <hr>
                    <ul class="row">
                        <?php 
                                $getdetails = getAllOrderItemsBYOrder($row['order_id']);

                                while($row2=mysqli_fetch_assoc($getdetails)){
                                    
                                    $img = $row2['p_image'];
                                    $img_src = "admin/upload/Products/".$img;?>
                        <li class="col-md-4">
                            <figure class="itemside mb-3">
                                <div class="aside"><img src="<?php echo $img_src; ?>" class="img-sm border"></div>
                                <figcaption class="info align-self-center">
                                    <p class="title"><?php echo $row2['p_name']; ?> <br>
                                        <?php echo $row2['p_des']; ?></p> <span class="text-muted">Rs.
                                        <?php echo $row2['p_price']; ?> </span>
                                </figcaption>
                            </figure>
                        </li>
                        <?php } ?>
                    </ul>
                    <hr>
                    <?php if ($row['order_status'] != "5") { ?>
                    <div class="col-md-2">
                        <button type="button" onclick='orderChangeCancel("<?php echo $order_id ; ?>","order_status")'
                            class="btn btn-darkblue">Cancel Order</button>
                    </div>
                    <?php } ?>
                </div>
            </article>
            <?php } ?>
        </div>
    </div>

</section>


<style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

body {
    background-color: #eeeeee;
    font-family: 'Open Sans', serif
}

.container {
    margin-top: 50px;
    margin-bottom: 50px
}

.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.10rem
}

.card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
}

.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1)
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
    background: #FF5722
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
    background: #ee5435;
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

.itemside {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%
}

.itemside .aside {
    position: relative;
    -ms-flex-negative: 0;
    flex-shrink: 0
}

.img-sm {
    width: 80px;
    height: 80px;
    padding: 7px
}

ul.row,
ul.row-sm {
    list-style: none;
    padding: 0
}

.itemside .info {
    padding-left: 15px;
    padding-right: 7px
}

.itemside .title {
    display: block;
    margin-bottom: 5px;
    color: #212529
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}

.btn-warning {
    color: #ffffff;
    background-color: #ee5435;
    border-color: #ee5435;
    border-radius: 1px
}

.btn-warning:hover {
    color: #ffffff;
    background-color: #ff2b00;
    border-color: #ff2b00;
    border-radius: 1px
}
</style>

<?php
	include 'template/footer.php';
?>