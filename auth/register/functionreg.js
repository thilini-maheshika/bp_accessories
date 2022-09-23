
function CustomerSignup(form)  {
    var formData = new FormData(form);

    if (formData.get('custname').trim() != '') {
        if (formData.get('email').trim() != '') {
            if (formData.get('phone').trim() != '') {
                if (formData.get('pass').trim() != '') {
                    if (formData.get('repass').trim() != '') {
                        if (formData.get('pass') == formData.get('repass')) {
                            if (emailvalidation(formData.get('email'))) {
                                if (phonenumber(formData.get('phone'))) {

                                    $.ajax({
                                        method: "POST",
                                        url: "../../admin/database.php?function_code=regcustomer",
                                        data: formData,
                                        success: function ($data) {
                                            console.log($data);

                                            if ($data > 0) {
                                                errorMessage("You are Already Registerd!");
                                            } else {
                                                successToast();
                                                 window.location.href = '../../admin/login.php'
                                            }
                                        },
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        error: function (error) {
                                            console.log(`Error ${error}`);
                                        }
                                    });

                                }
                            }
                        } else { errorMessage("Password is Not Match"); }
                    } else { errorMessage("Please Confirm Password"); }
                } else { errorMessage("Please Enter Password"); }
            } else { errorMessage("Please Enter Phone number"); }
        } else { errorMessage("Please Enter Email"); }
    } else { errorMessage("Please Enter Your Name"); }
}


function errorMessage(title) {
    iziToast.error({
        timeout: 2000,
        title: 'Error',
        message: title,
    });
}


function successToast() {
    iziToast.success({
        timeout: 1000,
        title: 'Saving..',
        message: 'Successfully inserted data!',
    })
}

function phonenumber(inputtxt) {
    var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    if (inputtxt.match(phoneno)) {
        return true;
    } else {
        errorMessage("Please Enter valid Phone Number");
        return false;
    }
}
function emailvalidation(inputtxt) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (inputtxt.match(mailformat)) {
        return true;
    } else {
        errorMessage("Please Enter valid Email");
        return false;
    }
}