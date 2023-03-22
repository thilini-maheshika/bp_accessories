<?php
    require_once 'pages/header.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 title">
            <h1><i class="fa fa-bars"></i> View Products <button class="btn btn-sm btn-default"><a
                        href="add-products.php">Add New</a></button></h1>
        </div>
        <div class="search-div">
            <div class="col-sm-9">
                All( <?php 
                    $all=getAllProducts();
                    echo $row=mysqli_num_rows($all);;
                    ?> )
            </div>
        </div>

        <div class="col-sm-12">
            <div class="content">
                <div class="table-responsive">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th width="10%">Description</th>
                                <th width="10%">Category</th>
                                <th>Brand</th>
                                <th>Image</th>
                                <th width="10%">Price</th>
                                <th width="7px">Stock Quantity</th>
                                <th>Waranty</th>
                                <th width="15%">Product Active</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $getpro= getAllProductsPre();
                            while($row=mysqli_fetch_assoc($getpro)){

                            $cat_id = $row['cat_id'];
                            $p_id=$row['p_id'];
                            $img = $row['p_img'];
                            $img_src = "upload/Products/".$img;
                            
                            ?>

                            <tr>

                                <td>
                                    <a href="#"><?php echo $row['p_name']; ?></a>
                                </td>

                                <td>
                                    <a href="#"><?php echo $row['p_des']; ?></a>
                                </td>

                                <td>
                                    <?php $all=getAllCategorybyID($cat_id); 

                                        while($row1=mysqli_fetch_assoc($all)){
    
                                        $cat_name=$row1['cat_name'];
                                    ?>
                                    <a href="#"><?php echo $cat_name; ?></a>
                                </td>
                                <?php } ?>
                                <td>
                                    <a href="#">
                                        <?php 
                                            $res=getAllModelbyID($row['model']);

                                            if($row2=mysqli_fetch_assoc($res)) {
                                                echo $row2['mod_name'];
                                            }
                                        ?>
                                    </a>
                                </td>

                                <td>
                                    <img width="100px" src='<?php echo $img_src; ?>'>
                                </td>

                                <td>
                                    <input type="number" onchange='ProductEdit(this, "<?php echo $p_id; ?>","p_price")'
                                        id="p_price <?php echo $p_id; ?>" class='form-control norad tx12' name="p_price"
                                        value="<?php echo $row['p_price']; ?>">
                                </td>

                                <td>
                                    <input type="number" onchange='ProductEdit(this, "<?php echo $p_id; ?>","p_qnt")'
                                        id="p_qnt <?php echo $p_id; ?>" class='form-control norad tx12' name="p_qnt"
                                        value="<?php echo $row['p_qnt']; ?>">
                                </td>

                                <td>
                                
                                    <a href="#"><?php echo $row['p_waranty']; ?></a>
                                </td>


                                <td>
                                    <select onchange='ProductEdit(this, "<?php echo $p_id; ?>","p_active")'
                                        id="p_active <?php echo $p_id; ?>" class='form-control norad tx12'
                                        name="p_active" type='text' value="<?php echo $p_active; ?>">

                                        <option value='1' <?php if ($row['p_active'] == '1') echo
                                            "selected"; ?>>Active</option>
                                        <option value='0' <?php if ($row['p_active'] == '0') echo
                                            "selected"; ?>>Deactive</option>
                                            <option value='2' <?php if ($row['p_active'] == '2') echo
                                            "selected"; ?>>Coming Soon</option>
                                    </select>

                                </td>

                                <td>
                                    <a>
                                        <?php if($row['p_active']=='0') :?>
                                        <button type="button"
                                            style="text-decoration: none; color: #AA1928; font-size: 15px;"
                                            onclick="ProductDelete(<?php echo $row['p_id']; ?>)">
                                            <i class="fa fa-trash"></i></button>
                                    </a><br><br>
                                    <a>
                                        <?php else : ?>

                                        <button type="button"
                                            style="text-decoration: none; color: #080641; font-size: 15px;"
                                            onclick="location.href='edit-product.php?p_id=<?php echo $row['p_id']; ?>'">
                                            <i class="fa fa-edit"></i>
                                            <?php endif ?>
                                    </a>
                                </td>


                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>