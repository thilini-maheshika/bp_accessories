
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

    $.ajax({
        method: "POST",
        url: "database.php?function_code=categoryDelete",
        data: data,
        success:function($data){
            console.log($data);
            //sweetAlert3();
            location.reload(this);
        },
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
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

function CategoryEditImage(ele){
    var formData = new FormData(ele);

    $.ajax({

        method: "POST",
        url: "database.php?function_code=categoryImageEdit",
        data: formData,
        success:function($data){
            console.log($data);
            
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
        timer: 2000
    }).then((result) => {
        location.reload(true);
    })
}

// function sweetAlert3(){
//     Swal.fire({
//         title: 'Are you sure?',
//         text: "You won't be able to revert this!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Yes, delete it!'
//       }).then((result) => {
//         if (result.isConfirmed) {
//             deleteCategory();
//             location.reload(true);
            
//         }
//       })
// }