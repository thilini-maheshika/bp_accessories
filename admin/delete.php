<?php

    require_once 'connection.php';

    if(isset($_REQUEST['cat_id'])){

        $cat_id=$_REQUEST['cat_id'];

        $querygetcode="SELECT  * FROM category where cat_id='".$cat_id."'";
        $result=mysqli_query($con,$querygetcode);
        
        if(mysqli_num_rows($result) > 0){

            $query1="DELETE FROM category WHERE cat_id='$cat_id'";
            mysqli_query($con,$query1);

            header('location:category.php');

        }else{
            header('location:category.php');
        }
    }else{
        header('location:index.php');
    }



?>
