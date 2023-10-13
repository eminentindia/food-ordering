<input type="hidden" id="add_more" value="1">
<div id="add_dish_drawer" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat" data-kt-drawer-activate="true" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'90%', 'md': '80%'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#add_dish_drawer_toggle" data-kt-drawer-close="#add_dish_drawer_close">
    <div class="card w-100 rounded-0" id="add_dish_drawer_messenger">
        <form method="POST" enctype="multipart/form-data" action="controller/dish/action/add-dish.php" id="add_dish_form" onsubmit="return AdddishValidate()">
            <div class="card-header pe-5 themebg" id="add_dish_drawer_messenger_header ">
                <div class="card-title">
                    <div class="d-flex justify-content-center flex-column me-3">
                        <span href="#" class="fs-4 fw-bolder drawer_head me-1 text-white lh-1 text-white">Add dish</span>
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex flex-stack me-4">
                        <button class="submitbtn" id="submit_form" type="submit" data-kt-element="send">Submit <i class="fa-regular fa-square-check"></i></button>

                    </div>
                    <div class="btn btn-sm btn-icon btn-active-light-primary closebtn" id="add_dish_drawer_close">
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body" id="add_dish_drawer_messenger_body">
                <div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-dependencies="#add_dish_drawer_messenger_header, #add_dish_drawer_messenger_footer" data-kt-scroll-wrappers="#add_dish_drawer_messenger_body" data-kt-scroll-offset="0px">
                    <div class="card-body">
                        <div class="form-group row mb-3">
                            <label for="is_available" class="col-sm-3 control-label col-form-label">Is Available</label>
                            <div class="col-sm-3 radiocenter">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="is_available" id="is_available" name="radio-stacked" value="1" checked>
                                    <label class="form-check-label mb-0" for="is_available">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="is_available" id="is_available" name="radio-stacked" value="0">
                                    <label class="form-check-label mb-0" for="is_available">No</label>
                                </div>
                            </div>

                            <label for="is_detailed_dish" class="col-sm-3 control-label col-form-label">Is Detailed Dish</label>
                            <div class="col-sm-3 radiocenter">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="is_detailed_dish" id="is_detailed_dish" name="radio-stacked" value="1" checked>
                                    <label class="form-check-label mb-0" for="is_detailed_dish">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="is_detailed_dish" id="is_detailed_dish" name="radio-stacked" value="0">
                                    <label class="form-check-label mb-0" for="is_detailed_dish">No</label>
                                </div>
                            </div>


                        </div>
                        <div class="form-group row mb-3">
                            <label for="is_attribute_product" class="col-sm-3 control-label col-form-label">Is Attribute Product</label>
                            <div class="col-sm-3 radiocenter">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="is_attribute_product" id="is_attribute_product" name="radio-stacked" value="1" checked>
                                    <label class="form-check-label mb-0" for="is_attribute_product">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="is_attribute_product" id="is_attribute_product" name="radio-stacked" value="0">
                                    <label class="form-check-label mb-0" for="is_attribute_product">No</label>
                                </div>
                            </div>

                            <label for="type" class="col-sm-3 control-label col-form-label">Type</label>
                            <div class="col-sm-3 radiocenter">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="type" id="type" value="veg" checked>
                                    <label class="form-check-label mb-0" for="type">Veg</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="type" id="type" value="non-veg">
                                    <label class="form-check-label mb-0" for="type">Non-Veg</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-3" id="mainpricediv" style="background: #f7f7f7;padding: 20px;border: 1px solid #d9d9d9;">
                            <label for="is_available" class="col-sm-3 control-label col-form-label">Price</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" name="mrp" id="mrp">
                                        <label class="form-check-label mb-0" for="mrp">MRP <span class="text-danger">*</span> </label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" name="selling_price" id="selling_price">
                                        <label class="form-check-label mb-0" for="selling_price">Selling Price</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="main_sku" class="col-sm-3 control-label col-form-label">SKU <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="main_sku" id="main_sku">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="slug" class="col-sm-3 control-label col-form-label">Slug <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="slug" id="slug">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="price_tagline" class="col-sm-3 control-label col-form-label">Price Tagline</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="price_tagline" id="price_tagline">
                            </div>
                        </div>
                        <div class="form-group row mb-3 ">
                            <label for="is_available" class="col-sm-3 control-label col-form-label">Meal</label>
                            <div class="col-sm-6 radiocenter">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="meal[]" id="breakfast" value="breakfast">
                                    <label class="form-check-label mb-0" for="breakfast">Breakfast</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="meal[]" id="lunch" value="lunch">
                                    <label class="form-check-label mb-0" for="lunch">Lunch</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="meal[]" id="dinner" value="dinner">
                                    <label class="form-check-label mb-0" for="dinner">Dinner</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="meal[]" id="beverages" value="beverages">
                                    <label class="form-check-label mb-0" for="beverages">Beverages</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="meal[]" id="noodles" value="noodles">
                                    <label class="form-check-label mb-0" for="noodles">Noodles</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="meal[]" id="other" value="other">
                                    <label class="form-check-label mb-0" for="other">Other</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-3">

                            <label for="category" class="col-sm-3 control-label col-form-label">Category <span class="text-danger">*</span></label>
                            <div class="col-sm-3">
                                <select name="category_id" id="category_id" class="form-control select2">
                                    <option value="0" selected disabled>Select Category</option>
                                    <?php
                                    foreach ($categorydata as $category) {
                                    ?>
                                        <option value="<?php echo $category['ID'] ?>"><?php echo $category['category'] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-3" style="background: #fff8d8; padding: 5px;">
                            <label for="dish" class="col-sm-3 control-label col-form-label">Dish Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="dish" id="dish">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="image" class="col-sm-3 control-label col-form-label">Dish Image <span class="text-danger">*</span></label>
                            <div class="col-sm-9  col-11">
                                <input type="file" name="myimg" id="myimg" class="myimg form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-3" id="dropzonediv">
                            <label for="image" class="col-sm-3 control-label col-form-label">Image</label>
                            <div class="col-sm-9 div-center col-11">
                                <div class="dropzone mt-3" id="myDropzone"></div>
                            </div>
                        </div>
                        <div class="form-group row mb-3" id="dish_box1">
                            <label for="Attributes" class="col-sm-3 mb-2 control-label col-form-label">Attributes <span class="text-danger">*</span></label>
                            <div class="col-sm-2"><input type="text" class="form-control attribute" name="attribute[]" placeholder="ATTRIBUTE" id="attribute"></div>
                            <div class="col-sm-2"><input type="number" class="form-control price" name="price[]" placeholder="PRICE" id="price"></div>
                            <div class="col-sm-2"><input type="text" class="form-control sku" name="sku[]" placeholder="SKU" id="sku"></div>
                            <div class="col-sm-1"><div class="adddivposition"><i title="Add More" class="fa fa-plus" style="cursor: pointer;" onclick="add_more()"></i></div>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="short_description" class="col-sm-3 control-label col-form-label">Short Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="short_description" id="short_description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-3" id="dishDetailID">
                            <label for="dish_detail" class="col-sm-3 control-label col-form-label">Dish Detail <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="dish_detail" id="dish_detail"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="meta_title" class="col-sm-3 control-label col-form-label">Meta Title <span class="text-danger">*</span></label>
                            <div class="col-sm-9">

                                <input type="text" class="form-control" name="meta_title" id="meta_title">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="meta_description" class="col-sm-3 control-label col-form-label">Meta Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea class="form-control " name="meta_description" id="meta_description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="meta_keywords" class="col-sm-3 control-label col-form-label">Meta Keywords <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="meta_keywords" id="meta_keywords">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>