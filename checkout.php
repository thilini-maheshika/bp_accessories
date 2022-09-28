<?php
	include 'template/header.php';
	include 'template/dependencies.php';
?>

<section class="h-100 h-custom">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">

                <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
                    <div class="card-body p-4">

                        <div class="row">
                            <div class="col-md-8 col-lg-4 col-xl-3 mb-4 mb-md-0">
                                <div class="col-12 col-xl-6" style="margin-left:150px;">
                                    <form>
                                        <h4>Shipping Info.</h4>
                                        <div class="form-outline mb-4 mb-xl-5">
                                            <label class="form-label" for="typeText">Address Line 1</label>
                                            <input type="text" class="form-control form-control-sm" name="address1"
                                                id="address1" />
                                        </div>

                                        <div class="form-outline mb-4 mb-xl-5">
                                            <label class="form-label" for="typeText">Address Line 2</label>
                                            <input type="text" class="form-control form-control-sm" name="address2"
                                                id="address2" />
                                        </div>

                                        <div class="form-outline mb-4 mb-xl-5">
                                            <label class="form-label" for="typeText">Address Line 3</label>
                                            <input type="text" class="form-control form-control-sm" name="address3"
                                                id="address3" />
                                        </div>

                                        <div class="form-outline mb-4 mb-xl-5">
                                            <label class="form-label" for="typeText">Zip Code</label>
                                            <input type="text" class="form-control form-control-sm" name="address1"
                                                id="address1" />
                                        </div>


                                    </form>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-xl-6">

                                <div class="col-12 col-xl-6" style="margin-left:150px;">
                                    <form>
                                        <h4>Billing Info.</h4>
                                        <div class="form-outline mb-4 mb-xl-5">
                                            <label class="form-label" for="typeText">Address Line 1</label>
                                            <input type="text" class="form-control form-control-sm" name="address1"
                                                id="address1" />
                                        </div>

                                        <div class="form-outline mb-4 mb-xl-5">
                                            <label class="form-label" for="typeText">Address Line 2</label>
                                            <input type="text" class="form-control form-control-sm" name="address2"
                                                id="address2" />
                                        </div>

                                        <div class="form-outline mb-4 mb-xl-5">
                                            <label class="form-label" for="typeText">Address Line 3</label>
                                            <input type="text" class="form-control form-control-sm" name="address3"
                                                id="address3" />
                                        </div>

                                        <div class="form-outline mb-4 mb-xl-5">
                                            <label class="form-label" for="typeText">Zip Code</label>
                                            <input type="text" class="form-control form-control-sm" name="address1"
                                                id="address1" />
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
                    <div class="card-body p-4">

                        <div class="row">
                            <div class="col-md-6 col-lg-4 col-xl-3 mb-4 mb-md-0">
                                <form>
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
                                                <i class="fab fa-cc-amex fa-2x fa-lg text-dark pe-2"></i>American Express
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6 col-lg-4 col-xl-6">
                                <div class="row">
                                    <div class="col-12 col-xl-6">
                                        <div class="form-outline mb-4 mb-xl-5">
                                            <input type="text" id="typeName" class="form-control form-control-sm"
                                                siez="17" placeholder="John Smith" />
                                            <label class="form-label" for="typeName">Name on card</label>
                                        </div>

                                        <div class="form-outline mb-4 mb-xl-5">
                                            <input type="text" id="typeExp" class="form-control form-control-sm"
                                                placeholder="MM/YY" size="7" id="exp" minlength="7" maxlength="7" />
                                            <label class="form-label" for="typeExp">Expiration</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-6">
                                        <div class="form-outline mb-4 mb-xl-5">
                                            <input type="text" id="typeText" class="form-control form-control-sm"
                                                siez="17" placeholder="1111 2222 3333 4444" minlength="19"
                                                maxlength="19" />
                                            <label class="form-label" for="typeText">Card Number</label>
                                        </div>

                                        <div class="form-outline mb-4 mb-xl-5">
                                            <input type="password" id="typeText" class="form-control form-control-sm"
                                                placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3"
                                                maxlength="3" />
                                            <label class="form-label" for="typeText">Cvv</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-xl-3">
                                <div class="d-flex justify-content-between" style="font-weight: 500;">
                                    <p class="mb-2">Subtotal</p>
                                    <p class="mb-2">$23.49</p>
                                </div>

                                <div class="d-flex justify-content-between" style="font-weight: 500;">
                                    <p class="mb-0">Shipping</p>
                                    <p class="mb-0">$2.99</p>
                                </div>

                                <hr class="my-4">

                                <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                                    <p class="mb-2">Total (tax included)</p>
                                    <p class="mb-2">$26.48</p>
                                </div>

                                <button type="button" class="btn btn-primary btn-block btn-md">
                                    <div class="d-flex justify-content-between">
                                        <span>Checkout</span>
                                        <span>$26.48</span>
                                    </div>
                                </button>

                            </div>
                        </div>

                    </div>
                </div>

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
}
</style>