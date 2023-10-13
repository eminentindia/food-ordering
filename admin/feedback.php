<?php
$page_title = "Feedback";
include('connect/head.php'); ?>
<?php include('connect/menu-nav.php');
?>
<style>

</style>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class=" container-xxl " id="kt_content_container">
        <div class="card card-xl-stretch mb-xl-8">
            <form method="post">
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

                    </div>
                </div>
                <div class="card-body p-1">
                    <div class="row">
                        <div class="col-md-8">
                            <table id="maketable" class=" table display nowrap table-striped table-bordered" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th> <strong>S.No</strong></th>
                                        <th> <strong>Feedback</strong></th>
                                        <th> <strong>Rating</strong></th>
                                        <th> <strong>User</strong></th>
                                        <th> <strong>Added On</strong></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4 mt-5">
                            <?php
                            $did=$_GET['dish_id'];
                            $query = "SELECT * FROM dish WHERE ID='$did' ";
                            $con = mysqli_query($conn, $query);
                            $r = mysqli_fetch_assoc($con);
                            ?>
                            <h4 class="text-center"><?php echo $r['dish'] ?></h4>
                            <img src="<?php echo SITE_PATH ?>admin/media/dish/<?php echo $r['image'] ?>" class="img-fluid img-thumbnail" alt="">
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <?php include('connect/copyrights.php'); ?>
    <?php include('connect/footer-script.php'); ?>
    <script>
        // ------------------------------------ FOR DATATABLE -----------------------------------------------------
        function rowCreationFunction(nRow, aData, iDataIndex) {

        }

        $(document).ready(function() {
            initializeDynamicDataTable('maketable', 'connect/listdata.php?show=<?php echo md5('feedback') ?>&&dish_id=<?php echo $_GET['dish_id'] ?>', 0, 0, rowCreationFunction);
        });
    </script>


    <?php include('connect/footer-end.php'); ?>