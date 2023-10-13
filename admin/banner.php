<?php
$page_title = "Banner";
include('connect/head.php'); ?>
<?php include('connect/menu-nav.php');
?>

<style>
    .col-md-4.setheight {
        height: 150px;
        overflow: hidden;
        display: flex;
        gap: 10px;
        width: 30%;
    }

    .iclass {
        color: #FF6262;
        text-align: center;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        line-height: 20px;
        border-radius: 50%;
    }
</style>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class=" container-xxl " id="kt_content_container">
        <div class="card card-xl-stretch mb-xl-8">
            <form class="form-horizontal" action="controller/banner/controller.php" method="POST" enctype="multipart/form-data">
                <div class="card-header  borderBottom1">
                    <div class="card-title">
                        <div class="d-flex align-items-center themeColor text-upper position-relative my-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="black">
                                <rect x="2" y="2" width="9" height="9" rx="2" fill="black"></rect>
                                <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black"></rect>
                                <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black"></rect>
                                <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black"></rect>
                            </svg>&nbsp; List Of <?php echo $page_title; ?>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="me-3 btn btn-sm btn-success">ADD</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row" id="product_box1">
                                <label for="Attribute" class="col-sm-3 control-label col-form-label">Image</label>
                                <div class="col-md-3"><input type="file" class="form-control mt-3 mb-2" name="image_attr[]" id="image_attr" required></div>
                                <div class="col-md-3"><input type="text" class="form-control mt-3 mb-2" name="alt_attr[]" id="alt_attr" placeholder="Alt" required></div>
                                <div class="col-md-3"><button type="button" class="mt-3 btn btn-sm btn-secondary waves-effect waves-light shadow-none" onclick="add_more()">Add More</button></div>
                            </div>
                            <div class="container mt-5">
                                <div class="row g-4 align-items-center">
                                    <?php
                                    $img = getBannerImg();
                                    // print_r($img);
                                    $count = 0;
                                    foreach ($img as $bannerImg) {
                                        if ($count % 3 == 0) {
                                            // Start a new row for every 3 images
                                            echo '<div class="row g-4">';
                                        }
                                    ?>
                                        <div class="col-md-4 setheight">
                                            <i class="fa fa-trash cursor-pointer iclass" onclick="DeletePhotoFeed(<?php echo $bannerImg['ID'] ?>,'<?php echo $bannerImg['image'] ?>')"></i>
                                            <a href="<?php echo SITE_PATH ?>admin/media/banner/<?php echo $bannerImg['image']; ?>">
                                                <img class="img-fluid" src="<?php echo SITE_PATH ?>admin/media/banner/<?php echo $bannerImg['image']; ?>" alt="">
                                            </a>
                                        </div>
                                    <?php
                                        if ($count % 3 == 2 || $count == count($img) - 1) {
                                            // Close the row after every 3 images or at the end of the loop
                                            echo '</div>';
                                        }
                                        $count++;
                                    }
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>

        <?php include('connect/copyrights.php'); ?>
        <?php include('connect/footer-script.php'); ?>


        <input type="hidden" id="add_more" value="1">
        <script type="text/javascript" src="../js/light-gallery.js"></script>
        <script type="text/javascript" src="../js/light-gallery-delete-button.js"></script>
        <script>
            function add_more() {
                var add_more = jQuery(' #add_more').val();
                add_more++;
                jQuery('#add_more').val(add_more);
                var html = '<div class="form-group row" id="box' + add_more + '">  <label for="Attribute" class="col-sm-3 control-label col-form-label"></label><div class="col-md-3"><input type="file" class="form-control mt-3 mb-2" name="image_attr[]" id="image_attr" required></div><div class="col-md-3"><input type="text" class="form-control mt-3 mb-2" name="alt_attr[]" id="alt_attr" placeholder="Alt" required></div><div class="col-md-3"><button type="button" class=" mt-3 btn btn-sm btn-danger waves-effect waves-light shadow-none" onclick="remove_more(' + add_more + ')">Remove</button></div></div>';
                jQuery('#product_box1').append(html);
            }

            function remove_more(id) {
                $('#box' + id).fadeOut(100, function() {
                    $('#box' + id).remove();
                });
            }
        </script>
        <script>
            function DeletePhotoFeed(PhotoId, Image) {
                showDeleteConfirmation(function() {
                    $('#overlay').fadeIn();
                    var param = encryptpost('delete_data');
                    var requestData = {
                        PhotoId: PhotoId,
                        Image: Image
                    };
                    $.ajax({
                        type: "POST",
                        url: "controller/banner/controller.php",
                        data: requestData,
                        success: function(response) {
                            $('#overlay').fadeOut();
                            showPopup(response.status, response.message)
                            $('#maketable').DataTable().ajax.reload(null, false);
                            setTimeout(() => {
                                location.reload();

                            }, 500);
                        }
                    });
                });
            }
        </script>
        <?php include('connect/footer-end.php'); ?>