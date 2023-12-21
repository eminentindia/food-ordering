<script src="<?php echo SITE_PATH ?>js/plugins.js"></script>
<script src="<?php echo SITE_PATH ?>js/wow.js"></script>
<script src="<?php echo SITE_PATH ?>js/lazysizes.js"></script>
<script src="<?php echo SITE_PATH ?>js/functions.js"></script>
<script src="<?php echo SITE_PATH ?>js/main.js"></script>
<script>
    var SITE_PATH = "<?php echo SITE_PATH ?>";
</script>
<?php
$requestUri = $_SERVER['REQUEST_URI'];
$pageName = basename($requestUri);
if ($pageName == 'cart' || $pageName == 'checkout') {
} else {
?>
    <script src="<?php echo SITE_PATH ?>js/cart.js"></script>
<?php }
?>