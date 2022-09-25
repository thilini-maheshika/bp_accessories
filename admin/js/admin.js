
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

    var itemid = ele.id;
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

