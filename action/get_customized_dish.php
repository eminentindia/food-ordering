
<?php
session_start();
include('../admin/controller/common-controller.php');
include('../function.inc.php');


$conn = _connectodb();
$getsetting = getsetting($conn);
$getsetting = json_decode($getsetting, true);
foreach ($getsetting as $getsinglesetting) {
    extract($getsinglesetting);
    // print_r($getsetting);
}
include('../admin/controller/constant.inc.php');


$get_dish_Attibutes = get_dish_Attibutes($conn, $_POST['id']);
foreach ($get_dish_Attibutes as $getsinglesetting) {

?>
    <label class="attribute-box">
        <input type="checkbox" name="attribute_<?php echo $_POST['dish']; ?>" value="<?php echo $getsinglesetting['attribute']; ?>" id="attribute_>">
        <span class="attribute-label"><?php echo $getsinglesetting['attribute']; ?>
            <div class="quantity-controls smallControl">
                <!-- Quantity increment and decrement elements -->
                <button class="quantity-decrement">-</button>
                <input type="text" class="quantity-input" value="1">
                <button class="quantity-increment">+</button>
            </div>
        </span>
    </label>
<?php }




?>