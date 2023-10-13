<?php
session_start();
include('../admin/controller/common-controller.php');

include('../admin/order/controller/order-controller.php');
$conn = _connectodb();

$getorder = getsingledelieveryorder($conn);
$getorder = json_decode($getorder, true);
include('../admin/setting/controller/setting-controller.php');
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
    // print_r($getsetting);
}
include('../admin/controller/constant.inc.php');
?>

<?php require("includes/top.php"); ?>
<?php include('includes/header.php'); ?>


<!-- Bread crumb and right sidebar toggle -->



<div class="container-fluid mt-5 pt-5">

    <!-- -------------Content Here------------- -->
    <div class="card">
        <div class="card-body table-responsive">
           
            <table class="display responsive nowrap stipe" width="100%" id="dataTable">
                <thead>
                    <tr>
                        <th> <strong>Order ID</strong></th>
                        <th> <strong>Address</strong></th>
                        <th> <strong>Name/ Email/ Phone</strong></th>
                        <th> <strong>Payment Type</strong></th>
                        <th> <strong>Payment Status</strong></th>
                        <th> <strong>Order Status</strong></th>
                        
                        <th> <strong>Added On</strong></th>
                        <th> <strong>Delievered On</strong></th>
                    </tr>
                </thead>
                <?php
                $i = 1;
                foreach ($getorder as $order) {
                    $ID  = $order['ID'];
                    // echo '<pre>';
                    // print_r($order);
                ?>
                    <?php
                    if ($order['order_status_id'] == '2') {
                        $href = 'javascript:void(0)';
                        $fadone = '<i class="fa fa-check text-success"></i>';
                        $bgsuccess = 'background: #f1ffd5;';
                        $icon='';
                    } else {
                        $href = 'order-detail.php?id=' . $ID . '';
                        $fadone = '<i class="fa fa-question text-danger"></i>';
                        $bgsuccess = 'background: #ffeaea;';
                        $icon='<i class="fas fa-eye"></i>';
                    }
                    ?>
                    <tr style="<?php echo $bgsuccess; ?>">
                        <td><a href="<?php echo $href; ?>"><?php echo $ID ?> &nbsp; <?php echo $icon ?> </a></td>
                        <td><?php echo $order['address'] ?> <br> <?php echo $order['appartment'] ?> <br> <?php echo $order['city'] ?> &nbsp; <?php echo $order['postcode'] ?></td>
                        <td><?php echo $order['name'] ?> <br> <?php echo $order['email'] ?><br><?php echo $order['phone'] ?></td>
                       
                        <td><?php echo $order['payment_type'] ?></td>
                        <td><?php echo ucwords($order['payment_status'])  ?></td>
                        <td><?php echo ucwords($order['status'])  ?> <?php echo $fadone; ?></td>
                       
                        <td><?php $date = $order['added_on'];
                            $date = str_replace('-', '/', $date);
                            echo date('d-M-Y h:i', strtotime($date));
                            ?>
                        </td>
                        <td><?php 
                        
                        $date = $order['delievered_on'];
                        if($date=='0000-00-00 00:00:00')
                        {
                            echo 'Not Delievered';
                        }
                        else{
                            $date = str_replace('-', '/', $date);
                            echo date('d-M-Y h:i', strtotime($date));
                        }                          
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
    <script>
     
        $(document).ready(function() {
        var table = $('#dataTable').DataTable({
            rowReorder: {
            selector: 'td:nth-child(2)'
        },
            responsive: true
        });
        
        
    });
    </script>