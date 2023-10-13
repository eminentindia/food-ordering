<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('controller/users-controller.php');
$conn = _connectodb();
$getusers = getusers($conn);
$getusers = json_decode($getusers, true);
include('../setting/controller/setting-controller.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
    // print_r($getsetting);
}
include('../controller/constant.inc.php');
if (isset($_GET['action']) && $_GET['action'] == 'active' && isset($_GET['ID']) && !empty($_GET['ID'])) {
    $query = "UPDATE users SET status='deactive' WHERE ID=" . $_GET['ID'] . "";
    $result = mysqli_query($conn, $query);
    header("location:users");
}
if (isset($_GET['action']) && $_GET['action'] == 'deactive' && isset($_GET['ID']) && !empty($_GET['ID'])) {
    $query = "UPDATE users SET status='active' WHERE ID=" . $_GET['ID'] . "";
    $result = mysqli_query($conn, $query);
    header("location:users");
}
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>
<div class="page-wrapper">

    <!-- Bread crumb and right sidebar toggle -->

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Users</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo ADMIN_SITE_PATH; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
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
            <div class="card-body">
                <table class="display responsive nowrap stipe" width="100%" id="zero_config">
                    <thead>
                        <tr>
                            <th> <strong>S.No</strong></th>
                            <th> <strong>Name</strong></th>
                            <th> <strong>Email</strong></th>
                            <th> <strong>Mobile</strong></th>
                            <th> <strong>Status</strong></th>
                            <th> <strong>Added On</strong></th>

                        </tr>
                    </thead>
                    <?php
                    $i = 1;
                    foreach ($getusers as $users) {
                        $ID  = $users['ID'];
                        $status  = $users['status'];

                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $users['name'] ?></td>
                            <td><?php echo $users['email'] ?></td>
                            <td><?php echo $users['mobile'] ?></td>

                            <?php
                            if ($_SESSION['ADMIN_ROLE'] == 'super') {
                            ?>
                                <td>
                                    <?php if ($status == 'deactive') { ?>
                                        <a href="?action=deactive&ID=<?php echo $ID; ?>" class="btn btn-dark btn-sm shadow-none waves-effect waves-dark" title="Click to active" data-toggle="tooltip">
                                            Deactive</a>
                                        </a>
                                    <?php } else { ?>
                                        <a href="?action=active&ID=<?php echo $ID; ?>" class="btn btn-success btn-sm shadow-none waves-effect waves-dark" title="Click to Deactive" data-toggle="tooltip">
                                            Active</a>
                                        </a>
                                    <?php } ?>
                                </td>
                            <?php } else {
                            ?>
                                <td>
                                    <a onclick="rolecheck()" class="btn btn-success btn-sm shadow-none waves-effect waves-dark" title="Click to Deactive" data-toggle="tooltip">
                                        Active</a>
                                </td>
                            <?php } ?>

                            <td><?php $date = $users['added_on'];
                                $date = str_replace('-', '/', $date);
                                echo date('d-M-Y', strtotime($date));
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <!-- ------------------------------------------------>
    </div>
    <?php include('../includes/footer.php'); ?>