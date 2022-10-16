<!DOCTYPE html>
<html>

<head>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css"> -->
</head>

<body>
    <div class="photo-gallery">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Lightbox Gallery</h2>
                <p class="text-center">Our Featured Products and New Trends here.. </p>
            </div>
            <div class="row photos">
                <?php 
                    $getall = getAllGalleryImages();

                    while($row=mysqli_fetch_assoc($getall)){

                        $g_id = $row['g_id'];
                        $img = $row['g_img'];
                        $img_src = "admin/upload/gallery/".$img;?>
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="<?php echo $img_src ?>"
                        data-lightbox="photos"><img class="img-fluid" src="<?php echo $img_src ?>"></a></div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script> -->
</body>

</html>

<style>
.photo-gallery {
    color: #313437;
    background-color: #fff;
}

.photo-gallery p {
    color: #7d8285;
}

.photo-gallery h2 {
    font-weight: bold;
    margin-bottom: 40px;
    padding-top: 40px;
    color: inherit;
}

@media (max-width:767px) {
    .photo-gallery h2 {
        margin-bottom: 25px;
        padding-top: 25px;
        font-size: 24px;
    }
}

.photo-gallery .intro {
    font-size: 16px;
    max-width: 500px;
    margin: 0 auto 40px;
}

.photo-gallery .intro p {
    margin-bottom: 0;
}

.photo-gallery .photos {
    padding-bottom: 20px;
}

.photo-gallery .item {
    padding-bottom: 30px;
}
</style>