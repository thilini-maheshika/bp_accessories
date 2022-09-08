
function catForm(){
    let formDetails= document.getElementById('fileinfo');
    let fd = new FormData(formDetails);
    
    $.ajax({

        method: "POST",
        url: "database.php?function_code=categoryAdd",
        data: fd,
        success:function($data){
            console.log($data);
            //location.reload(this);
            if($data == "This category Already Here"){
                Swal.fire(
                  'Sorry',
                  $data,
                  'Try again'
                )
          }
        },
        cache:false,
        contentType: false,
        processData: false,
        error: function (error) {
            console.log(`Error ${error}`);
        }

        
    });
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
            //location.reload(this);
            console.log($data);
        },
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}
