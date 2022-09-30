
window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});

var error = "error";
var success = "success";
var warning = "warning";

function catForm(){

    let formDetails= document.getElementById('fileinfo');
    let fd = new FormData(formDetails);

    if(document.getElementById('cat_name').value == ''){
         sweetAlert1(error,"Please Enter Category Name");
    }else if(document.getElementById('cat_des').value == ''){
        sweetAlert1(error,"Please Enter Category Description!");
    }else if(document.getElementById('file').value == ''){
        sweetAlert1(error, "Please Select Image!");
    }else{

        $.ajax({

            method: "POST",
            url: "database.php?function_code=categoryAdd",
            data: fd,
            success:function($data){
                console.log($data);

                if($data > 0){
                    sweetAlert1(warning,"This Category Already Exists..");
                }else{
                    sweetAlert2(success,'Your work has been saved');
                }
            },
            cache: false,
            contentType: false,
            processData: false,
            error: function (error) {
                console.log(`Error ${error}`);
                sweetAlert2(warning,'Something Wrong.Try again!!');
            }

            
        });
    }
}

function CategoryDelete(cat_id){

    const data = {
        cat_id : cat_id
    }

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'

      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: "POST",
                url: "database.php?function_code=categoryDelete",
                data: data,
                success:function($data){
                    console.log($data);
                    sweetAlert3();
                    location.reload(this);
                },
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
        }
      })
    
}

function CategoryEdit(ele, cat_id ,field){

    var itemid = ele.id;
    var val = document.getElementById(ele.id).value;

    const data = {
        cat_id: cat_id,
        field: field,
        value: val,
    }

    $.ajax({
        method: "POST",
        url: "database.php?function_code=categoryEdit",
        data: data,
        success:function($data){
            console.log($data);
            location.reload(this);
        },
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}

const CategoryEditImage = (ele) => {

    var formData = new FormData(ele);

    $.ajax({

        method: "POST",
        url: "database.php?function_code=categoryImageEdit",
        data: formData,
        success:function($data){
            console.log($data);
            loading("Image Uploading...");
            
        },
        cache: false,
        contentType: false,
        processData: false,
        error: function (error) {
            console.log(`Error ${error}`);
            sweetAlert2(warning,'Something Wrong.Try again!!');
        }  
    })
}

//Model

function modForm(){

    let formDetails= document.getElementById('modinfo');
    let fd = new FormData(formDetails);

    if(document.getElementById('mod_name').value == ''){
         sweetAlert1(error,"Please Enter Model Name");
    }else if(document.getElementById('file').value == ''){
        sweetAlert1(error, "Please Select Image!");
    }else{

        $.ajax({

            method: "POST",
            url: "database.php?function_code=modelAdd",
            data: fd,
            success:function($data){
                console.log($data);

                if($data > 0){
                    sweetAlert1(warning,"This Model Already Exists..");
                }else{
                    sweetAlert2(success,'Your work has been saved');
                }
            },
            cache: false,
            contentType: false,
            processData: false,
            error: function (error) {
                console.log(`Error ${error}`);
                sweetAlert2(warning,'Something Wrong.Try again!!');
            }

            
        });
    }
}

function ModelDelete(mod_id){

    const data = {
        mod_id : mod_id
    }

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'

      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: "POST",
                url: "database.php?function_code=modelDelete",
                data: data,
                success:function($data){
                    console.log($data);
                    sweetAlert3();
                    location.reload(this);
                },
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
        }
      })
    
}

function ModelEdit(ele, mod_id ,field){

        var itemid = ele.id;
        var val = document.getElementById(ele.id).value;
    
        const data = {
            mod_id: mod_id,
            field: field,
            value: val,
        }
    
        $.ajax({
            method: "POST",
            url: "database.php?function_code=modelEdit",
            data: data,
            success:function($data){
                console.log($data);
                //location.reload(this);
            },
            error: function (error) {
                console.log(`Error ${error}`);
            }
        });
}

function ModelEditImage(ele){
 
    var formData = new FormData(ele);
    
    $.ajax({
        
        method: "POST",
        url: "database.php?function_code=modelImageEdit",
        data: formData,
        success:function($data){
            console.log($data);
            loading("Image Uploading...");
            
        },
        cache: false,
        contentType: false,
        processData: false,
        error: function (error) {
            console.log(`Error ${error}`);
            sweetAlert2(warning,'Something Wrong.Try again!!');
        }  
    })
    
}

//Products

function productForm(){

    let formDetails= document.getElementById('productinfo');
    let fd = new FormData(formDetails);

    if(document.getElementById('p_name').value == ''){
         sweetAlert1(error,"Please Enter Product Name");
    }else if(document.getElementById('p_des').value == ''){
        sweetAlert1(error,"Please Enter Product Description!");
    }else if(document.getElementById('cat_name').value == ''){
        sweetAlert1(error,"Please Select Product Category!");
    }else if(document.getElementById('brand').value == ''){
        sweetAlert1(error,"Please Select Product Brand!");
    }else if(document.getElementById('p_price').value == ''){
        sweetAlert1(error,"Please Enter Product Price!");
    }else if(document.getElementById('p_qnt').value == ''){
        sweetAlert1(error,"Please Enter Stock Quantity!");
    }else if(document.getElementById('product_active').value == ''){
        sweetAlert1(error,"Please Select Product in-stock state!");
    }else if(document.getElementById('file').value == ''){
        sweetAlert1(error, "Please Select Image!");
    }else{

        $.ajax({

            method: "POST",
            url: "database.php?function_code=ProductAdd",
            data: fd,
            success:function($data){
                console.log($data);

                if($data > 0){
                    sweetAlert1(warning,"This Product Already Exists..");
                }else{
                    sweetAlert2(success,'Your work has been saved');
                }
            },
            cache: false,
            contentType: false,
            processData: false,
            error: function (error) {
                console.log(`Error ${error}`);
                sweetAlert2(warning,'Something Wrong.Try again!!');
            }

            
        });
    }
}

function ProductDelete(p_id){
    const data = {
        p_id : p_id
    }

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'

      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: "POST",
                url: "database.php?function_code=proDelete",
                data: data,
                success:function($data){
                    console.log($data);
                    sweetAlert3();
                    location.reload(this);
                },
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
        }
      })
}

function ProductEdit(ele, p_id ,field){

    var val = document.getElementById(ele.id).value;

    const data = {
        p_id: p_id,
        field: field,
        value: val,
    }

    $.ajax({
        method: "POST",
        url: "database.php?function_code=productEdit",
        data: data,
        success:function($data){
            console.log($data);
            location.reload(this);
        },
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}

function ProductEditImage(ele){
 
    var formData = new FormData(ele);
    
    $.ajax({
        
        method: "POST",
        url: "database.php?function_code=productImageEdit",
        data: formData,
        success:function($data){
            console.log($data);
            loading("Image Uploading...");
            
        },
        cache: false,
        contentType: false,
        processData: false,
        error: function (error) {
            console.log(`Error ${error}`);
            sweetAlert2(warning,'Something Wrong.Try again!!');
        }  
    });
    
}

//gallery

function galleryForm(){

    let formDetails= document.getElementById('gallery');
    let fd = new FormData(formDetails);

    if(document.getElementById('title').value == ''){
         sweetAlert1(error,"Please Enter Image Title");
    }else if(document.getElementById('file').value == ''){
        sweetAlert1(error, "Please Select Image!");
    }else{

        $.ajax({

            method: "POST",
            url: "database.php?function_code=galleryImageAdd",
            data: fd,
            success:function($data){
                console.log($data);

                if($data > 0){
                    sweetAlert1(warning,"This Gallery Image Already Exists..");
                }else{
                    sweetAlert2(success,'Your work has been saved');
                }
            },
            cache: false,
            contentType: false,
            processData: false,
            error: function (error) {
                console.log(`Error ${error}`);
                sweetAlert2(warning,'Something Wrong.Try again!!');
            }

            
        });
    }
}

function galleryDelete(g_id){

    const data = {
        g_id : g_id
    }

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'

      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: "POST",
                url: "database.php?function_code=galleryDelete",
                data: data,
                success:function($data){
                    console.log($data);
                    sweetAlert3();
                    location.reload(this);
                },
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
        }
      })
}

//contact form messages

function contactForm(form) {
    var formData = new FormData(form);

    $.ajax({
        
        method: "POST",
        url: "admin/database.php?function_code=contactmsg",
        data: formData,
        success:function($data){
            console.log($data);
              sweetAlert4("Your message has sent. We will response soon.Thank You!!");
              location.reload(true);  
            
        },
            contentType: false,
            processData: false,
            error: function(error){
                console.log(`Error ${error}`);
                sweetAlert2(warning,'Something Wrong.Try again!!');
            } 
    });             
}

function NotifyMsgs(count){

    if(count > 0){
        $.ajax({
        
            method: "POST",
            url: "database.php?function_code=msgnotify",
            success:function(){
                console.log("Success");
                location.reload(this);
            },
                contentType: false,
                processData: false,
                error: function(error){
                    console.log(`Error ${error}`);
                } 
        });
    }
}

function MessageDelete(contact_id){
    const data = {
        contact_id : contact_id
    }

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'

      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: "POST",
                url: "database.php?function_code=msgDelete",
                data: data,
                success:function($data){
                    console.log($data);
                    sweetAlert3();
                    location.reload(this);
                },
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
        }
      })
}

//login

function loginForm(ele){
    var formData = new FormData(ele);
    
    $.ajax({
        method: "POST",
        url: "database.php?function_code=loginAdmin",
        data: formData,
        success: function($data){
            if($data > 0){
                    if(formData.get('email') === 'admin'){
                        window.location.href='index.php';
                    }else{
                        window.location.href='../index.php';
                    }
                }else{
                    sweetAlert2(warning,'Something Wrong.Try again!!');
                }
        },
        contentType: false,
        processData: false,
        error: function(error){
            console.log(`Error ${error}`);
        }
    });
}

//search

function searchProduct(ele){
    var formData = new FormData(ele);
    var key = formData.get('key');
    window.location.href="shop.php?keyword=" + key;
    
}

//settings
function quickUpdate(ele,field){

    var val = document.getElementById(ele.id).value;

    const data = {
        field: field,
        value: val,
    }

    $.ajax({
        method: "POST",
        url: "database.php?function_code=updateSettings",
        data: data,
        success:function($data){
            console.log($data);
            location.reload(this);
        },
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}

function quickUpdateImageSetting(ele){
 
    var formData = new FormData(ele);
    
    $.ajax({
        
        method: "POST",
        url: "database.php?function_code=updateSettingsImage",
        data: formData,
        success:function($data){
            console.log($data);
            loading("Image Uploading...");
            
        },
        cache: false,
        contentType: false,
        processData: false,
        error: function (error) {
            console.log(`Error ${error}`);
            sweetAlert2(warning,'Something Wrong.Try again!!');
        }  
    });
    
}

//profile setting
function changePassword(form) {
    
    var formData = new FormData(form);

    if (formData.get('current_password').trim() != '') {
        if (formData.get('new_password').trim() != '') {
            if (formData.get('confirm_new_password').trim() != '') {
                if (formData.get('new_password') == formData.get('confirm_new_password')) {
                    if (checkPassword(formData.get('current_password'), formData.get('cust_id')) > 0) {

                        
                        const data = {
                            cust_id: formData.get('cust_id'),
                            field: 'cust_password',
                            value: formData.get('new_password'),
                        }

                            $.ajax({
                                method: "POST",
                                url: "admin/database.php?function_code=CustomerEdit",
                                data: data,
                                success:function($data){
                                    console.log($data);
                                    successToastwithLogout();
                                },
                                error: function (error) {
                                    console.log(`Error ${error}`);
                                }
                            });

                    } else { errorMessage("Current Password is Wrong"); }
                } else { errorMessage("Password is Not Match!"); }
            } else { errorMessage("Please Confirm Your Password"); }
        } else { errorMessage("Please Enter New Password"); }
    } else { errorMessage("Please Enter Current Password"); }

}

function checkPassword(cust_password, cust_id) {
 
    const data = {
        cust_password: cust_password,
        cust_id: cust_id,
    }
    var values;
    console.log(values);

    $.ajax({
        method: "POST",
        url: "admin/database.php?function_code=checkPass",
        data: data,
        async: false,
        success:function(data){
            console.log(data);
            values= data;
        },
        
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
    return values;
    
}

function changeEmail(form){

    var formData=new FormData(form);

    if (formData.get('current_email').trim() != '') {
        if (formData.get('new_email').trim() != '') {
            if (checkEmail(formData.get('current_email'), formData.get('cust_id')) > 0) {

                var data = {
                    cust_id: formData.get('cust_id'),
                    field: 'cust_email',
                    value: formData.get('new_email'),
                }

                $.ajax({
                    method: "POST",
                    url: "admin/database.php?function_code=CustomerEdit",
                    data: data,
                    success: function ($data) {
                        console.log($data);
                        successToastwithLogout();
                    },
                    error: function (error) {
                        console.log(`Error ${error}`);
                    }
                });

            } else { errorMessage("Current Emaiil is Wrong!"); }
        } else { errorMessage("Please Enter Your new Email"); }
    } else { errorMessage("Please Enter Your Current Email"); }
}

function checkEmail(cust_email, cust_id) {
    const data = {
        cust_email: cust_email,
        cust_id: cust_id,
    }
    var values;

    $.ajax({
        method: "POST",
        url: "admin/database.php?function_code=emailCheck",
        data: data,
        async: false,
        success: function (data) {
            console.log(data);
            values = data;

        },
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });

    return values;
}

function changeCustomers(ele,cust_id,field){

    var value = document.getElementById(ele.id).value;
    
        const data = {
            cust_id: cust_id,
            field: field,
            value: value,
        }
    
        $.ajax({
            method: "POST",
            url: "admin/database.php?function_code=CustomerEdit",
            data: data,
            success:function($data){
                console.log($data);
                 successToastEdit();
            },
            error: function (error) {
                console.log(`Error ${error}`);
            }
        });
}

function deleteCustomer(cust_id){
    const data = {
        cust_id : cust_id
    }

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'

      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                method: "POST",
                url: "admin/database.php?function_code=customerDelete",
                data: data,
                success:function($data){
                    console.log($data);
                    sweetAlert3();
                    window.location.href="auth/logout.php";
                },
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
        }
      })
}

//cart

function addtoCartwithQty(p_id,p_price){

    var qnt = document.getElementById('quantity_input').value;

    var data = {
        p_id: p_id,
        p_price: p_price,
        qnt: qnt,
    };

    $.ajax({
        method: "POST",
        url: "pages/addtocart.php?p_id=" + p_id + "&p_price=" + p_price + "&qnt=" + qnt,
        data: data,
        success: function ($data) {
            console.log($data);
            if ($data === '"Fail"') {
                window.location.href = 'admin/login.php';
            } else {
                sweetAlert2(success,'Product added to cart');
                window.location.href = 'cart.php?cart_id=' + $data;
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

function deleteCart(cart_id){

    var data = {
        cart_id: cart_id,
    }

    $.ajax({
        method: "POST",
        url: "admin/database.php?function_code=cartItemDelete",
        data: data,
        success: function ($data) {
            console.log($data);
             sweetAlert3();
             window.location.href = 'index.php';
        },
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });

}

function quantityChange(ele,cart_id,field){

    var value = document.getElementById(ele.id).value;

    var data = {
        cart_id: cart_id,
        field: field,
        value: value,
    }

    $.ajax({
        method: "POST",
        url: "admin/database.php?function_code=qntEdit",
        data: data,
        success: function ($data) {
            console.log($data);
            successToastEdit();
        },
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}

//order

function placeOrder(form) {
    var formData = new FormData(form);

    if (formData.get('typeName').trim() != '') {
        if (formData.get('typeExp').trim() != '') {
            if (formData.get('typeText').trim() != '') {

                    if (formData.get('address1').trim() != '') {
                        if (formData.get('address2').trim() != '') {

                            if (formData.get('total') > 0) {

                                var data = {
                                    cust_id: formData.get('cust_id'),
                                    address1: formData.get('address1'),
                                    address2: formData.get('address2'),
                                    total: formData.get('total'),
                                }

                                $.ajax({
                                    method: "POST",
                                    url: "orderall.php?function_code=orderAll",
                                    data: data,
                                    success: function ($data) {
                                         console.log($data);
                                         successToast1();
                                         window.location.href="order.php";
                                    },
                                    error: function (error) {
                                        console.log(`Error ${error}`);
                                    }
                                });

                            } else { errorMessage("Please Select Atleast one Item to Buy!"); }

                        } else { errorMessage("Please Enter Billing Address"); }
                    } else { errorMessage("Please Enter Shipping Address"); }
  
            } else { errorMessage("Please Enter Card Number"); }
        } else { errorMessage("Please Enter Expire Details"); }
    } else { errorMessage("Please Enter Holder Name"); }

}

function addtocart(p_id){

    window.location.href="product.php?p_id=" + p_id;
}


// function profileImage(ele){
 
//     var formData = new FormData(ele);

//     var data = {
//         cust_id: formData.get('cust_id'),
//         field: 'cust_img',
//         value: formData.append("new_img",file),
//     }
    
//     $.ajax({
        
//         method: "POST",
//         url: "admin/database.php?function_code=profileImageEdit",
//         data: data,
//         success:function($data){
//             console.log($data);
//             //  loading("Image Uploading...");
            
//         },
//         cache: false,

//         error: function (error) {
//             console.log(`Error ${error}`);
//             sweetAlert2(warning,'Something Wrong.Try again!!');
//         }  
//     });
    
// }


//Sweet Alert Functions Zone

function sweetAlert1($icon, $data){
    Swal.fire({
      icon: $icon,
      title: 'Sorry',
      text: $data,
    }).then((result) => {
        location.reload(true);
    })
}


function sweetAlert2($icon,$data){
    Swal.fire({
        position: 'center',
        icon: $icon,
        title: $data,
        showConfirmButton: false,
        timer: 5000
    }).then((result) => {
        location.reload(true);
    })
}

function sweetAlert3(){
    Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
        )
    }
    
function sweetAlert4($data){
    Swal.fire({
        title: $data,
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
        })
}
function loading(gettitle){
    let timerInterval
    Swal.fire({
      title: gettitle,
      html: 'Loading.. <b></b> Ms.',
      timer: 2000,
      timerProgressBar: true,
      didOpen: () => {
        Swal.showLoading()
        const b = Swal.getHtmlContainer().querySelector('b')
        timerInterval = setInterval(() => {
          b.textContent = Swal.getTimerLeft()
        }, 100)
      },
      willClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      if (result.dismiss === Swal.DismissReason.timer) {
        console.log('Loading');
        location.reload(true);
      }
    })
}

function errorMessage(title) {
    iziToast.error({
        timeout: 2000,
        title: 'Error',
        message: title,
    });
}

function successToastwithLogout() {
    iziToast.success({
        timeout: 1000,
        title: 'Saving..',
        message: 'Your Changes saved Successfully!',
        onClosing: function () {
            window.location.href = 'auth/logout.php';
        }
    })
}

function successToastEdit() {
    iziToast.success({
        timeout: 1000,
        title: 'Saving..',
        message: 'Successfully Saved Changes!',
        onClosing: function () {
            location.reload(true);
        }
    })
}

function successToastCart() {
    iziToast.success({
        timeout: 1000,
        title: 'Saving..',
        message: 'Product added to cart!',
        onClosing: function () {
                      
        }
    })
}

function successToast() {
    iziToast.success({
        timeout: 1000,
        title: 'Saving..',
        message: 'Successfully Inserted record!',
        onClosing: function () {
            location.reload(true);
        }
    })
}

function successToast1() {
    iziToast.success({
        timeout: 1000,
        title: 'Saving..',
        message: 'Successfully Placed Order!',
        onClosing: function () {
            
        }
    })
}