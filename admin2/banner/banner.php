<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('controller/banner-controller.php');

$conn = _connectodb();

$getbanner = getbanner($conn);
$getbanner = json_decode($getbanner, true);
foreach ($getbanner as $key => $getsinglebanner) {
    extract($getsinglebanner);
}
include('../setting/controller/setting-controller.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
    // print_r($getsetting);
}
include('../controller/constant.inc.php');
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>
<div class="page-wrapper">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.0/css/lightgallery.min.css">

    <!-- Bread crumb and right sidebar toggle -->

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Update Banner</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>

                            <li class="breadcrumb-item active" aria-current="page">Update Banner</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bread crumb and right sidebar toggle -->
    <div class="container-fluid">
        <!-- -------------Content Here------------- -->
        <div class="card">
            <form class="form-horizontal" action="action/update-banner.php" method="POST" enctype="multipart/form-data">




                <div class="card-body">


                    <div class="form-group row" id="product_box1">
                        <label for="Attribute" class="col-sm-3 control-label col-form-label">Image</label>

                        <div class="col-md-3"><input type="file" class="form-control mt-3 mb-2" name="image_attr[]" id="image_attr" required></div>
                        <div class="col-md-3"><input type="text" class="form-control mt-3 mb-2" name="alt_attr[]" id="alt_attr" placeholder="Alt" required></div>
                        <div class="col-md-3"><button type="button" class="mt-3 btn btn-sm btn-secondary waves-effect waves-light shadow-none" onclick="add_more()">Add More</button></div>

                    </div>

                    <div class="form-group row mt-5">
                        <label for="image" class="col-sm-3 control-label col-form-label">Banners</label>
                        <div class="col-md-9">
                            <div id="js-lightgallery">
                                <?php
                                $img = getBannerImg();
                                // print_r($img);
                                foreach ($img as $bannerImg) {
                                ?>
                                    <?php
                                    if ($_SESSION['ADMIN_ROLE'] == 'super') {
                                    ?>
                                        <a href="../media/banner/<?php echo $bannerImg['image']; ?>">
                                            <i class="fa fa-trash" onclick="DeletePhotoFeed(<?php echo $bannerImg['ID'] ?>,'<?php echo $bannerImg['image'] ?>')" style="z-index:999;position: relative;  color: #FF6262;"></i>
                                            <img class="img-responsive m-0" src="../media/banner/<?php echo $bannerImg['image']; ?>" alt="">
                                        </a>
                                    <?php } else {
                                    ?>
                                        <a href="../media/banner/<?php echo $bannerImg['image']; ?>">
                                            <i class="fa fa-trash" onclick="rolecheck()" style="z-index:999;position: relative;  color: #FF6262;"></i>
                                            <img class="img-responsive" src="../media/banner/<?php echo $bannerImg['image']; ?>" alt="">
                                        </a>
                                    <?php } ?>

                                <?php
                                }

                                ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <?php
                            if ($_SESSION['ADMIN_ROLE'] == 'super') {
                            ?>
                                <button type="submit" name="submit" class="btn btn-primary waves-effect waves-dark shadow-none">Update</button>
                            <?php } else {
                            ?>
                                <button type="button" onclick="rolecheck()" class="btn btn-primary waves-effect waves-dark shadow-none">Update</button>

                            <?php } ?>
                        </div>
                    </div>
            </form>
        </div>

        <!-- ------------------------------------------------>
    </div>

    <input type="hidden" id="add_more" value="1">
    <?php include('../includes/footer.php'); ?>
    <script type="text/javascript" src="../js/light-gallery.js"></script>
    <script type="text/javascript" src="../js/light-gallery-delete-button.js"></script>
    <script>
        function add_more() {
            var add_more = jQuery(' #add_more').val();

            // var count = 1;

            add_more++;

            jQuery('#add_more').val(add_more);
            var html = '<div class="form-group row" id="box' + add_more + '">  <label for="Attribute" class="col-sm-3 control-label col-form-label"></label><div class="col-md-3"><input type="file" class="form-control mt-3 mb-2" name="image_attr[]" id="image_attr" required></div><div class="col-md-3"><input type="text" class="form-control mt-3 mb-2" name="alt_attr[]" id="alt_attr" placeholder="Alt" required></div><div class="col-md-3"><button type="button" class=" mt-3 btn btn-sm btn-danger waves-effect waves-light shadow-none" onclick="remove_more(' + add_more + ')">Remove</button></div></div>';
            jQuery('#product_box1').append(html);
        }

        function remove_more(id) {
            $('#box' + id).fadeOut(600, function() {
                $('#box' + id).remove();
            });
        }
    </script>
    <script>
        $(document).ready(function() {

            var $initScope = $('#js-lightgallery');
            if ($initScope.length) {
                $initScope.justifiedGallery({
                    border: 1,
                    rowHeight: 150,
                    margins: 18,
                    waitThumbnailsLoad: true,
                    randomize: false,
                }).on('jg.complete', function() {
                    $initScope.lightGallery({
                        thumbnail: true,
                        animateThumb: true,
                        showThumbByDefault: true,
                    });
                });
            };
            $initScope.on('onAfterOpen.lg', function(event) {
                $('body').addClass("overflow-hidden");
            });
            $initScope.on('onCloseAfter.lg', function(event) {
                $('body').removeClass("overflow-hidden");
            });
        });

        function DeletePhotoFeed(PhotoId, Image) {
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
                        $.post("action/delete-banner.php", {
                                PhotoId: PhotoId,
                                Image: Image
                            },
                            function(data, status) {
                                //document.getElementById("s_users_info").innerHTML = data;
                                var response = JSON.parse(data);
                                if (response.error == false) {
                                    alert(response.message);
                                    location.reload();
                                } else {
                                    alert(response.message);
                                }
                            });
                    }
                },
                function() {
                    alertify.error('Cancel')
                });
        }
    </script>