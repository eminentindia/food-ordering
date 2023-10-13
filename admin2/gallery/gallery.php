<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('controller/gallery-controller.php');

$conn = _connectodb();

$getgallery = getgallery($conn);
$getgallery = json_decode($getgallery, true);

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
    <link rel="stylesheet" href="../css/dropzone.css">
    <link rel="stylesheet" href="../css/lightgallery.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.0/css/lightgallery.min.css">
    <!-- Bread crumb and right sidebar toggle -->

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Gallery</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>

                            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
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
            <form class="form-horizontal" action="action/update-gallery.php" method="POST" enctype="multipart/form-data">

                <div class="card-body">


                    <div class="form-group row">

                        <div class="col-12">
                            <div id="js-lightgallery">
                                <?php
                                $per_page = 12;
                                $start = 0;
                                $current_page = 1;
                                $record = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM images"));
                                $pagi = ceil($record / $per_page);
                                if (isset($_GET['start'])) {
                                    $start = $_GET['start'];
                                    if ($start <= 0) {
                                        $start = 0;
                                        $current_page = 1;
                                    } else {
                                        $current_page = $start;
                                        $start--;
                                        $start = $start * $per_page;
                                    }
                                }
                                $query = "SELECT * FROM images  ORDER BY image_id DESC  LIMIT $start,$per_page ";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    while ($photo_feed = mysqli_fetch_assoc($query_run)) {
                                ?>
                                        <?php
                                        if ($_SESSION['ADMIN_ROLE'] == 'super') {
                                        ?>
                                            <a href="../media/dish/<?php echo $photo_feed['image']; ?>">
                                                <i class="fa fa-trash" onclick="DeletePhotoFeed(<?php echo $photo_feed['image_id'] ?>,'<?php echo $photo_feed['image'] ?>')" style="z-index:999;position: relative;  color: #FF6262;"></i>
                                                <img class="img-responsive" src="../media/dish/<?php echo $photo_feed['image']; ?>" alt="">
                                            </a>
                                        <?php } else {
                                        ?>
                                            <a href="../media/dish/<?php echo $photo_feed['image']; ?>">
                                                <i class="fa fa-trash" onclick="rolecheck()" style="z-index:999;position: relative;  color: #FF6262;"></i>
                                                <img class="img-responsive" src="../media/dish/<?php echo $photo_feed['image']; ?>" alt="">
                                            </a>
                                        <?php } ?>
                                    <?php
                                    }
                                } else { ?>
                                    <div class="col-lg-12">
                                        <p class="text-danger">No Images Found...</p>
                                    </div>

                                <?php }  ?>

                            </div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <?php

                                    for ($i = 1; $i <= $pagi; $i++) {
                                        $class = '';
                                        if ($current_page == $i) {
                                    ?>
                                            <li class="page-item active"><a class="page-link" href="javascript:void(0)"><?php echo $i; ?></a></li>
                                        <?php
                                        } else {
                                        ?>
                                            <li class="page-item <?php echo $class; ?>"><a class="page-link" href="?start=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                                        <?php
                                        }
                                        ?>

                                    <?php  } ?>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

            </form>
        </div>

        <!-- ------------------------------------------------>
    </div>


    <?php include('../includes/footer.php'); ?>
    <script type="text/javascript" src="../js/light-gallery.js"></script>
    <script type="text/javascript" src="../js/light-gallery-delete-button.js"></script>
    <script>
        $(document).ready(function() {

            var $initScope = $('#js-lightgallery');
            if ($initScope.length) {
                $initScope.justifiedGallery({
                    border: -1,
                    rowHeight: 150,
                    margins: 8,
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
                confirmButtonColor: '#5d6',
                cancelButtonColor: '#F0754F',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                    if (result.isConfirmed) {

                        $.post("action/delete-gallery.php", {
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
                                    noboAlert(response.message);
                                }
                            });
                    }
                },
                function() {
                    alertify.error('Cancel')
                });
        }
    </script>