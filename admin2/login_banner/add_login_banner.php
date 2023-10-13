<?php require("../includes/top.php"); ?>
<?php
include('../controller/common-controller.php');
include('controller/login_banner-controller.php');
include('../subcategory/controller/subcategory-controller.php');
$conn = _connectodb();

$subcategorydata = getsubcategory($conn);
$subcategorydata = json_decode($subcategorydata,true);
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>
<div class="page-wrapper">

    <!-- Bread crumb and right sidebar toggle -->

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Add Login_banner</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo $backendURL; ?>admin-dashboard.php"><i class="mdi mdi-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo $backendURL; ?>login_banner/view-login_banner.php">View Login_banners</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Add Login_banner</li>
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
                <form class="form-horizontal" action="action/add-login_banner.php" method="POST" enctype="multipart/form-data" onsubmit="return Addlogin_banner()">
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 control-label col-form-label">Login_banner Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title" id="title" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 control-label col-form-label">Description</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" name="description" id="description" ></textarea>
                            </div>
                        </div>
                     
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 control-label col-form-label">Image</label>
                            <div class="col-sm-9">
                             <input type="file" class="form-control"  name="image" id="image">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 control-label col-form-label">Type</label>
                            <div class="col-sm-9">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="type" id="customControlValidation1" name="radio-stacked" required="" value="home">
                                <label class="form-check-label mb-0" for="customControlValidation1">Home</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="type" id="customControlValidation1" name="radio-stacked" required="" value="pomotional" checked>
                                <label class="form-check-label mb-0" for="customControlValidation1">Promotional</label>
                            </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 control-label col-form-label">Slug</label>
                            <div class="col-sm-9">
                             <input type="text" class="form-control"  name="slug" id="slug">
                            </div>
                        </div>
                       
                       
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" name="submit" class="btn btn-primary waves-effect waves-dark shadow-none">Add</button>
                        </div>
                    </div>
                </form>
            </div>
       
        <!-- ------------------------------------------------>
    </div>

<!-- uncomment below code for validation------------------------------------------------------ -->

    <!-- <script>
		function Addlogin_banner()
		{
			var name = document.getElementById("name").value;	
				
			var description = document.getElementById("description").value;	
		
			var image = document.getElementById("image").value;	
            if(name == "")
            {
                Swal.fire({
                        title: 'Opps',
                        text: "Please Enter Login_banner Name!",
                        icon: 'warning',
                        
                    })
                return false;
            }
          
            if(description == "")
            {
                Swal.fire({
                        title: 'Opps',
                        text: "Please Enter Login_banner Description!",
                        icon: 'warning',
                        
                    })
                return false;
            }
          
            if(image == "")
            {
                Swal.fire({
                        title: 'Opps',
                        text: "Please Choose Image!",
                        icon: 'warning',
                        
                    })
                return false;
            }

        }
		</script> -->
 <?php

if(isset($_SESSION["login_bannerexist"]))
{
    echo "<script>Swal.fire({
        title: 'Opps',
        text: 'Login_banner Name Already Exist',
        icon: 'warning',
        
    })</script>";         
    unset($_SESSION["login_bannerexist"]);
}

?>

	    
    <?php include('../includes/footer.php'); ?>