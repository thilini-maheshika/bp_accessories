<?php
    require_once 'pages/header.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 title">
            <h1><i class="fa fa-bars"></i> Gallery</h1>
        </div>

        <div class="col-sm-4 cat-form">
            <h3>Add New Images for gallery</h3>
            <form method="post" novalidateenctype="multipart/form-data" id="gallery">

                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" id="title" name="title" rows="5">
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" id="file" name="file" /><br>
                </div>

                <div class="form-group">
                    <button type="button" onclick="galleryForm()" id="submit" name="submit" class="btn btn-primary">Add
                        New Image</button>
                </div>
            </form>
        </div>

        <div class="col-sm-8 cat-view">
            <div class="content">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
							$getall = getAllGalleryImages();

							while($row=mysqli_fetch_assoc($getall)){

								$img = $row['g_img'];
								$img_src = "upload/gallery/".$img;?>

                        <tr>
                            <td>
                                <a href="#"><?php echo $row['title']; ?></a>
                            </td>

                            <td><img width="200px" src='<?php echo $img_src; ?>'></td>

                            <td>
                                <a>
                                    <button type="button"
                                        style="text-decoration: none; color: #AA1928; font-size: 15px;"
                                        onclick="galleryDelete(<?php echo $row['g_id']; ?>)">
                                        <i class="fa fa-trash"></i></button>
                                </a>
                            </td>

                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>