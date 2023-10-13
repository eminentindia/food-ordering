<div class="collection-box section">
    <div class="container p-0">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="section-header text-center">
                    <h2 class="h2">What's on  <span> your mind?</span></h2>
                </div>
            </div>
        <div class="collection-grid">
            <?php
            foreach ($getactivecategory as $slidecategory) {
                $ID  = $slidecategory['ID'];
                $image  = $slidecategory['image'];
                $category  = $slidecategory['category'];
               $slug  = $slidecategory['slug'];
            ?>
                <div class="collection-grid-item">
                    <a href="<?php echo SITE_PATH ?>category/<?php echo $slug; ?>" class="collection-grid-item__link">
                        <img data-src="admin/media/category/<?php echo $image ?>" src="admin/media/category/<?php echo $image ?>" alt="Fashion" class="blur-up lazyload" />
                        <div class="collection-grid-item__title-wrapper">
                            <h3 class="collection-grid-item__title btn btn--secondary no-border"><?php echo $category ?></h3>
                        </div>
                    </a>
                </div>
            <?php } ?>


        </div>
    </div>
</div>