<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('controller/pages-controller.php');
$conn = _connectodb();

$getabout = getabout($conn);
$getabout = json_decode($getabout, true);
foreach ($getabout as $getabout) {
    extract($getabout);
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
<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>

<div class="page-wrapper">

    <!-- Bread crumb and right sidebar toggle -->

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">About</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>

                            <li class="breadcrumb-item active" aria-current="page">Update about</li>
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
            <form class="form-horizontal" action="action/update-about.php" method="POST" enctype="multipart/form-data" onsubmit="return Updateabout()">
                <div class="card-body">
                    <input type="hidden" name="ID" value="<?php echo $about_id; ?>">
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3  control-label col-form-label">Heading</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="heading" id="heading" value="<?php echo $heading; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3  control-label col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea name="description" id="description" class="form-control"><?php echo $description; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 control-label col-form-label">Image</label>
                        <div class="col-sm-9">
                            <img src="../media/about/<?php echo $image; ?>" width="80px" alt="" onclick="about('<?php echo $image; ?>')">
                            <input type="file" class="form-control" name="image" id="image">
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

                        <?php }
                        ?>
                    </div>
                </div>
            </form>
        </div>

        <!-- ------------------------------------------------>
    </div>

    <?php
    if (isset($_SESSION["Updateabout"])) {
        echo '<script> validation_msg("Updated !", "success","2000");</script>';
        unset($_SESSION["Updateabout"]);
    }
    ?>
    <script>
        function about(about) {
            var url = "../media/about/" + about;
            window.open(url, 'Documents', ['menubar=yes,scrollbars=yes,controlbox=yes', 'top=10,left=150,width=1050,height=650']);
            return;
        }
    </script>
    <?php include('../includes/footer.php'); ?>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>