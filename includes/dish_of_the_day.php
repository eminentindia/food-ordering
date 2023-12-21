<!-- <div id="mySlideInModal">
    <div class="dishdaytitle">Dish Of The Day</div>
    <div class="item-containerday d-flex align-items-center">
        <div class="details-containerday">
            <div class="dishtitileday " >
                <img src="images/veg.png" alt="" class="typeicon">
                <h3 class="item-name-textday mb-0">Chole Rice</h3>
            </div>

            <div class="item-priceday-containerday">
                <span class="priceday" style="justify-content: space-between;">
                   <div>
                   <i class="fa fa-inr"></i>
                    <span id="priceday_lunch12" data-priceday="99" data-sku="RICE-3">99</span>
                   </div>
                    <div>
                        <button class=" badge-success bg-success badge badge-sm">View</button>
                    </div>
                </span>
            </div>
        </div>
        <div class="image-containerday">
            <div>
                <button class="image-buttonday" aria-label="chole-rice">
                    <img alt="chole-rice" class="item-imageday" loading="lazy" src="http://localhost/food-ordering/admin/media/dish/chole-rice2023-9472.png">
                </button>
            </div>
        </div>
    </div>
</div> -->
<style>
    #mySlideInModal {
        height: max-content;
        box-shadow: 0 0 20px 2px #729a1bb5;
        width: max-content;
        background: white;
        position: fixed;
        top: 50%;
        left: -400px;
        /* Center horizontally */
        transform: translate(0, -50%);
        /* Center vertically and horizontally */
        z-index: 9999;
        transition: left 1s ease-in-out;
    }

    .item-containerday {
        display: flex;
        align-items: center;
        gap: 20px;
        flex-direction: column-reverse;
        margin-bottom: 2px;
        width: 100%;
        /* padding-right: 30px; */
        justify-content: start;
        align-items: flex-start !important;
        ;
    }

    .dishtitileday {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .details-containerday {
        flex: 1;
        padding: 0 15px;
        width: 100%;
    }

    .details-containerday img.typeicon {
        width: 25px;
    }

    .item-name-textday {
        margin-bottom: 0;
        white-space: nowrap !important;
    }

    .item-priceday-containerday {
        font-size: 1.3rem;
        margin-top: 10px;
        color: #0c800c;
    }

    .priceday {
        display: flex;
        align-items: center;
        gap: 6px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .image-containerday {
        flex: 1;
    }

    .image-buttonday {
        background: rgb(246, 246, 246);
        width: 200px;
        padding: 0;
    }

    .item-imageday {
        width: 256px;
    }

    .dishdaytitle {
        position: absolute;
        top: -20px;
        white-space: nowrap;
        left: 50%;
        transform: translate(-50%, 0);
        background: #729a1b;
        padding: 10px;
        color: white;
        font-weight: 700;
        border-radius: 10px
    }
</style>
 <!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Trigger the animation after the page has loaded
        var modal = document.getElementById('mySlideInModal');
        modal.style.left = '0'; // Slide into the viewport
    });
</script> -->