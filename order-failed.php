<?php include('includes/header.php'); ?>
<body class="template-index  home2-default ">
    <?php include('includes/navbar.php') ?>
    <div id="page-content">
      <?php
  $orderid = mysqli_real_escape_string($conn, $_SESSION['order_id']);
  if ($orderid == '') {
      echo '<script>window.location = "checkout.php";</script>';
  } else if ($orderid !== $_SESSION['order_id']) {
      echo '<script>window.location = "checkout.php";</script>';
  }
      ?>
        <section>
                <div class="container-fluid" style="display: flex;
    padding-top: 54px;
    margin: 0 auto;
    justify-content: center; margin-bottom: 35px;">
                    <div class="row bg-white p-5" style="
    box-shadow: 10px 0 75px rgb(114 154 27 / 10%);">
                        <div class="col-md-12 thanks">
                            <img loading="lazy" src="img/Error.webp" width="280px" style="    display: flex;
    justify-content: center;
    margin: 0 auto; " class="mb-3" alt="">
                            <h4 class="text-center" style="    color: #fd7d16;
    font-size: 16px;
    letter-spacing: 1px;">Order Failed !!</h4>
                            <p class="text-center" style="    line-height: 30px; color: #f1493d;">Payment For your Order has been failed due to some technical issues.<br> Kindly retry the payment for your order.</p>
                            
                        </div>
                    </div>
                </div>
            </section>
    </div>
    <!--End Body Content-->
    <?php include('includes/footer.php');  ?>
    <?php include('includes/scripts.php');  ?>
   
 
</body>

</html>