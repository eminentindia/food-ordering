<?php
$page_title = "Dashboard";
include('connect/head.php'); ?>
<?php $active = 1;
include('connect/menu-nav.php'); ?>
<script src="https://cdn.tiny.cloud/1/7omt3b4517021mnd1q496sj7bas6wt2mrbiuki543gxlabl1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<div class="row g-5 g-xl-8">
	<div class="col-md-6">
		<form method="GET" action="search.php">
			<input type="text" id="search" name="query" placeholder="Search...">
			
		</form>
	</div>
</div>
<?php include('connect/footer-script.php'); ?>



<?php include('connect/footer-end.php'); ?>