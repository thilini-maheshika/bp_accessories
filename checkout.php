<?php
	include 'template/header.php';
	include 'template/dependencies.php';
?>
<?php
    if(isset($_REQUEST['cust_id'])){
        $cust_id = $_REQUEST['cust_id'];
        $getCustomer = checkCustomerByID($cust_id);
    } 
?>

<section class="h-100 h-custom">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <form method="post" novalidateenctype="multipart/form">

                    <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
                        <div class="card-body p-4">

                            <div class="row">
                                <div class="col-md-6 col-lg-4 col-xl-3 mb-4 mb-md-0">
                                    <div class="d-flex flex-row pb-3">
                                        <div class="d-flex align-items-center pe-2">
                                            <input class="form-check-input" type="radio" name="radioNoLabel"
                                                id="radioNoLabel1v" value="" aria-label="..." checked />
                                        </div>
                                        <div class="rounded border w-100 p-3">
                                            <p class="d-flex align-items-center mb-0">
                                                <i class="fab fa-cc-mastercard fa-2x text-dark pe-2"></i>Credit
                                                Card
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row pb-3">
                                        <div class="d-flex align-items-center pe-2">
                                            <input class="form-check-input" type="radio" name="radioNoLabel"
                                                id="radioNoLabel2v" value="" aria-label="..." />
                                        </div>
                                        <div class="rounded border w-100 p-3">
                                            <p class="d-flex align-items-center mb-0">
                                                <i class="fab fa-cc-visa fa-2x fa-lg text-dark pe-2"></i>Debit Card
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <div class="d-flex align-items-center pe-2">
                                            <input class="form-check-input" type="radio" name="radioNoLabel"
                                                id="radioNoLabel3v" value="" aria-label="..." />
                                        </div>
                                        <div class="rounded border w-100 p-3">
                                            <p class="d-flex align-items-center mb-0">
                                                <i class="fab fa-cc-amex fa-2x fa-lg text-dark pe-2"></i>American
                                                Express
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-6">

                                    <div class="row">
                                        <div class="col-12 col-xl-6">
                                            <div class="form-outline mb-4 mb-xl-5">
                                                <input type="text" id="typeName" name="typeName"
                                                    class="form-control form-control-sm" siez="17"
                                                    placeholder="John Smith" />
                                                <label class="form-label" for="typeName">Name on card</label>
                                            </div>

                                            <div class="form-outline mb-4 mb-xl-5">
                                                <input type="text" id="typeExp" name="typeExp"
                                                    class="form-control form-control-sm" placeholder="MM/YY" size="7"
                                                    id="exp" minlength="7" maxlength="7" />
                                                <label class="form-label" for="typeExp">Expiration</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xl-6">
                                            <div class="form-outline mb-4 mb-xl-5">
                                                <input type="text" id="typeText" name="typeText"
                                                    class="form-control form-control-sm" siez="17"
                                                    placeholder="1111 2222 3333 4444" minlength="19" maxlength="19" />
                                                <label class="form-label" for="typeText">Card Number</label>
                                            </div>

                                            <div class="form-outline mb-4 mb-xl-5">
                                                <input type="password" id="cvv" class="form-control form-control-sm"
                                                    placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3"
                                                    maxlength="3" />
                                                <label class="form-label" for="cvv">Cvv</label>
                                            </div>

                                            <!-- hidden part -->
                                            <?php if(isset($_REQUEST['total'])){ 
                                                   ?>
                                            <input type="hidden" name='total' id='total'
                                                value="<?php echo $_REQUEST['total']; ?>">
                                            <?php  }?>


                                            <!-- hidden part -->

                                        </div>
                                    </div>

                                    <div class="row">

                                        <?php 
                                        
                                                while($row = mysqli_fetch_assoc($getCustomer)){

                                            ?>
                                        <div class="row ml-1">
                                            <div class="col-md-6">
                                                <label>Shipping Address.</label>
                                                <div class="form-outline mb-4 mb-xl-5">
                                                    <input type="text" name="address1" id="address1" required 
                                                        style="color:black;" value="<?php echo $row['cust_address'] ?>" size="50"><br><br>
                                               
                                                </div>
                                                <input value="<?php echo $row['cust_id']; ?>" type="hidden" id="cust_id"
                                                    name="cust_id" />
                                            </div>
                                        </div>
                                        <div class="row ml-1">
                                            <div class="col-md-6">
                                                <label>Billing Address.</label>
                                                <div class="form-outline mb-4 mb-xl-5">
                                                    <input type="text" name="address2" id="address2" required
                                                        style="color:black; " value="<?php echo $row['cust_address'] ?>" size="50"><br><br>
                                               
                                                </div>
                                            </div>

                                        </div>
                                        <?php } ?>
                                    </div>

                                    <div class="col-lg-5 col-xl-6">
                                        <button type="button" class="btn btn-primary btn-block btn-md"
                                            onclick="placeOrder(this.form)">
                                            <div class="d-flex justify-content-center">
                                                <span>Checkout</span>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php
		include 'template/footer.php';
?>

<style>
@media (min-width: 1500px) {
    .h-custom {
        height: 100vh !important;
    }

    .form-control {
        color: black;
    }
}
</style>
