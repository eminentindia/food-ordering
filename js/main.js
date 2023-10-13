(function ($) {
  // Start of use strict
  "use strict";

  /*-----------------------------------------
	  1. Preloader Loading ----------------------- 
	  -----------------------------------------*/
  function pre_loader() {
    $("#load").fadeOut();
    $("#pre-loader").delay(0).fadeOut("slow");
  }
  pre_loader();

  /*-----------------------------------------
	 2. Promotional Bar Header ------------------
	  -----------------------------------------*/
  function promotional_bar() {
    $(".closeHeader").on("click", function () {
      $(".promotion-header").slideUp();
      Cookies.set("promotion", "true", { expires: 1 });
      return false;
    });
  }
  promotional_bar();

  /*-----------------------------------------
	  5. Top Links Show/Hide dropdown ---------
	  -----------------------------------------*/
  function userlink_dropdown() {
    $(".top-header .user-menu").on("click", function () {
      if ($(window).width() < 990) {
        $(this).next().slideToggle(300);
        $(this).parent().toggleClass("active");
      }
    });
  }
  userlink_dropdown();

  /*-----------------------------------------
	  6. Minicart Dropdown ---------------------
	  ------------------------------------------ */
  function minicart_dropdown() {
    $(".site-header__cart").on("click", function (i) {
      i.preventDefault();
      $("#header-cart").slideToggle();
    });
    // Hide Cart on document click
    $("body").on("click", function (event) {
      var $target = $(event.target);
      if (!$target.parents().is(".site-cart") && !$target.is(".site-cart")) {
        $("body").find("#header-cart").slideUp();
      }
    });
  }
  minicart_dropdown();

  /*-----------------------------------------
	  7. Sticky Header ------------------------
	  -----------------------------------------*/
  window.onscroll = function () {
    myFunction();
  };
  function myFunction() {
    if ($(window).width() > 1199) {
      if ($(window).scrollTop() > 145) {
        $(".header-wrap").addClass("stickyNav animated fadeInDown");
      } else {
        $(".header-wrap").removeClass("stickyNav fadeInDown");
      }
    }
  }

  /*-----------------------------------------
	  8. Search Trigger -----------------------
	  ----------------------------------------- */
  function search_bar() {
    $(".search-trigger").on("click", function () {
      const search = $(".search");

      if (search.is(".search--opened")) {
        search.removeClass("search--opened");
      } else {
        search.addClass("search--opened");
        $(".search__input")[0].focus();
      }
    });
  }
  search_bar();
  $(document).on("click", function (event) {
    if (!$(event.target).closest(".search, .search-trigger").length) {
      $(".search").removeClass("search--opened");
    }
  });

  /*-----------------------------------------
	  9. Mobile Menu --------------------------
	  -----------------------------------------*/
  var selectors = {
    body: "body",
    sitenav: "#siteNav",
    navLinks: "#siteNav .lvl1 > a",
    menuToggle: ".js-mobile-nav-toggle",
    mobilenav: ".mobile-nav-wrapper",
    menuLinks: "#MobileNav .anm",
    closemenu: ".closemobileMenu",
  };

  $(selectors.navLinks).each(function () {
    if ($(this).attr("href") == window.location.pathname)
      $(this).addClass("active");
  });

  $(selectors.menuToggle).on("click", function () {
    body: "body", $(selectors.mobilenav).toggleClass("active");
    $(selectors.body).toggleClass("menuOn");
    $(selectors.menuToggle).toggleClass("mobile-nav--open mobile-nav--close");
  });

  $(selectors.closemenu).on("click", function () {
    body: "body", $(selectors.mobilenav).toggleClass("active");
    $(selectors.body).toggleClass("menuOn");
    $(selectors.menuToggle).toggleClass("mobile-nav--open mobile-nav--close");
  });
  $("body").on("click", function (event) {
    var $target = $(event.target);
    if (
      !$target.parents().is(selectors.mobilenav) &&
      !$target.parents().is(selectors.menuToggle) &&
      !$target.is(selectors.menuToggle)
    ) {
      $(selectors.mobilenav).removeClass("active");
      $(selectors.body).removeClass("menuOn");
      $(selectors.menuToggle)
        .removeClass("mobile-nav--close")
        .addClass("mobile-nav--open");
    }
  });
  $(selectors.menuLinks).on("click", function (e) {
    e.preventDefault();
    $(this).toggleClass("anm-plus-l anm-minus-l");
    $(this).parent().next().slideToggle();
  });

  /*-----------------------------------------
	  10.7 Collection Slider Slick ------------
	  ----------------------------------------- */
  function collection_slider() {
    $(".collection-grid").slick({
      dots: false,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 1000,
      slidesToShow: 5,
      slidesToScroll: 1,
      arrows: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          },
        },
      ],
    });
  }
  collection_slider();

  /*-----------------------------------
	  11. Tabs With Accordian Responsive
	-------------------------------------*/
  $(".tab_content").hide();
  $(".tab_content:first").show();

  /* if in tab mode */
  $("ul.tabs li").on("click", function () {
    $(".tab_content").hide();
    var activeTab = $(this).attr("rel");
    $("#" + activeTab).fadeIn();

    $("ul.tabs li").removeClass("active");
    $(this).addClass("active");

    $(".tab_drawer_heading").removeClass("d_active");
    $(".tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");

    $(".productSlider").slick("refresh");
  });
  /* if in drawer mode */
  $(".tab_drawer_heading").on("click", function () {
    $(".tab_content").hide();
    var d_activeTab = $(this).attr("rel");
    $("#" + d_activeTab).fadeIn();

    $(".tab_drawer_heading").removeClass("d_active");
    $(this).addClass("d_active");

    $("ul.tabs li").removeClass("active");
    $("ul.tabs li[rel^='" + d_activeTab + "']").addClass("active");

    $(".productSlider").slick("refresh");
  });

  $("ul.tabs li").last().addClass("tab_last");

  /*-----------------------------------
	  End Tabs With Accordian Responsive
	-------------------------------------*/

  /*-----------------------------------
	  12. Sidebar Categories Level links
	-------------------------------------*/
  function categories_level() {
    $(".sidebar_categories .sub-level a").on("click", function () {
      $(this).toggleClass("active");
      $(this).next(".sublinks").slideToggle("slow");
    });
  }
  categories_level();

  $(".filter-widget .widget-title").on("click", function () {
    $(this).next().slideToggle("300");
    $(this).toggleClass("active");
  });

  // mobile filter
  $(".mobfilterdiv").click(function (e) {
    e.preventDefault();
    $(".filterbar").css({
      padding: "20px",
      background: "white",
      opacity: "1",
      left: "0",
      visibility: "visible",
    });
    $(".sidebar_tags").css({
      top: "40px",
    });
    $(".anm-times-l").addClass("closeposition");
  });

  /*-----------------------------------
	 13. Price Range Slider
	-------------------------------------*/
  function price_slider() {
    $("#slider-range").slider({
      range: true,
      min: 12,
      max: 200,
      values: [0, 100],
      slide: function (event, ui) {
        $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
      },
    });
    $("#amount").val(
      "$" +
        $("#slider-range").slider("values", 0) +
        " - $" +
        $("#slider-range").slider("values", 1)
    );
  }
  price_slider();

  /*-----------------------------------
	  15. Footer links for mobiles
	-------------------------------------*/
  function footer_dropdown() {
    $(".footer-links .h4").on("click", function () {
      if ($(window).width() < 766) {
        $(this).next().slideToggle();
        $(this).toggleClass("active");
      }
    });
  }
  footer_dropdown();

  //Resize Function
  var resizeTimer;
  $(window).resize(function (e) {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function () {
      $(window).trigger("delayed-resize", e);
    }, 250);
  });
  $(window).on("load resize", function (e) {
    if ($(window).width() > 766) {
      $(".footer-links ul").show();
    } else {
      $(".footer-links ul").hide();
    }
  });

  /*-------------------------------
	  16. Site Animation
	----------------------------------*/
  // if ($(window).width() < 771) {
  //   $(".wow").removeClass("wow");
  // }
  // var wow = new WOW({
  //   boxClass: "wow", // animated element css class (default is wow)
  //   animateClass: "animated", // animation css class (default is animated)
  //   offset: 0, // distance to the element when triggering the animation (default is 0)
  //   mobile: false, // trigger animations on mobile devices (default is true)
  //   live: true, // act on asynchronously loaded content (default is true)
  //   callback: function (box) {
  //     // the callback is fired every time an animation is started
  //     // the argument that is passed in is the DOM node being animated
  //   },
  //   scrollContainer: null, // optional scroll container selector, otherwise use window
  // });
  // wow.init();

  /*-------------------------------
	 20.Scroll Top ------------------
	---------------------------------*/
  function scroll_top() {
    $("#site-scroll").on("click", function () {
      $("html, body").animate({ scrollTop: 0 }, 1000);
      return false;
    });
  }
  scroll_top();

  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $("#site-scroll").fadeIn();
    } else {
      $("#site-scroll").fadeOut();
    }
  });

  /*----------------------------------
	  26. Quantity Plus Minus
	------------------------------------*/
  function qnt_incre() {
    $(".qtyBtn").on("click", function () {
      var qtyField = $(this).parent(".qtyField"),
        oldValue = $(qtyField).find(".qty").val(),
        newVal = 1;

      if ($(this).is(".plus")) {
        newVal = parseInt(oldValue) + 1;
      } else if (oldValue > 1) {
        newVal = parseInt(oldValue) - 1;
      }
      $(qtyField).find(".qty").val(newVal);
    });
  }
  qnt_incre();

  /*----------------------------------
	  28. Product Tabs
	------------------------------------*/
  $(".tab-content").hide();
  $(".tab-content:first").show();
  /* if in tab mode */
  $(".product-tabs li").on("click", function () {
    $(".tab-content").hide();
    var activeTab = $(this).attr("rel");
    $("#" + activeTab).fadeIn();

    $(".product-tabs li").removeClass("active");
    $(this).addClass("active");

    $(this).fadeIn();
    if ($(window).width() < 767) {
      var tabposition = $(this).offset();
      $("html, body").animate({ scrollTop: tabposition.top }, 700);
    }
  });

  $(".product-tabs li:first-child").addClass("active");
  $(".tab-container h3:first-child + .tab-content").show();

  /* if in drawer mode */
  $(".acor-ttl").on("click", function () {
    $(".tab-content").hide();
    var activeTab = $(this).attr("rel");
    $("#" + activeTab).fadeIn();

    $(".acor-ttl").removeClass("active");
    $(this).addClass("active");
  });

  $(".reviewLink").on("click", function (e) {
    e.preventDefault();
    $(".product-tabs li").removeClass("active");
    $(".reviewtab").addClass("active");
    var tab = $(this).attr("href");
    $(".tab-content").not(tab).css("display", "none");
    $(tab).fadeIn();
    var tabposition = $("#tab2").offset();
    if ($(window).width() < 767) {
      $("html, body").animate({ scrollTop: tabposition.top - 50 }, 700);
    } else {
      $("html, body").animate({ scrollTop: tabposition.top - 80 }, 700);
    }
  });
})(jQuery);

const closeFilterElement = document.querySelector(".closeFilter");

if (closeFilterElement) {
  closeFilterElement.addEventListener("click", function (e) {
    e.preventDefault();
    const filterbar = document.querySelector(".filterbar");
    if (filterbar) {
      filterbar.style.background = "white";
      filterbar.style.opacity = "0";
      filterbar.style.left = "-255px"; // Make sure to specify "px" for left property
      filterbar.style.visibility = "hidden";
    }
  });
}
