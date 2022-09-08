
var error = "error";
var success = "success";
var warning = "warning";

function catForm(){
    let formDetails= document.getElementById('fileinfo');
    let fd = new FormData(formDetails);

    if(document.getElementById('cat_name').value == ''){
         sweetAlert1(error,"Please Enter Cat Name");
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
                    sweetAlert1(warning,"This Category Already Here..");
                }else{
                    location.reload(this);
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

function sweetAlert1($icon, $data){
    Swal.fire({
      icon: $icon,
      title: 'Sorry',
      text: $data,
    }).then((result) => {
        location.reload(true);
    })
}

function deleteCategory(cat_id){

    const data = {
        cat_id : cat_id
    }

    $.ajax({
        method: "POST",
        url: "database.php?function_code=categoryDelete",
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
