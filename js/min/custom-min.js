jQuery(document).ready(function(){jQuery("#searchicon").click(function(){jQuery("#jumbosearch").fadeIn(),jQuery("#jumbosearch input").focus()}),jQuery("#jumbosearch .closeicon").click(function(){jQuery("#jumbosearch").fadeOut()}),jQuery("body").keydown(function(e){27==e.keyCode&&jQuery("#jumbosearch").fadeOut()})}),jQuery(function(){var e=jQuery(".swiper-container").swiper({pagination:".swiper-pagination",effect:"coverflow",grabCursor:!0,centeredSlides:!0,slidesPerView:"auto",slideToClickedSlide:!0,paginationClickable:!0,loop:!0,coverflow:{rotate:50,stretch:0,depth:100,modifier:1,slideShadows:!0}})}),jQuery(function(){var e=jQuery(".swiper-container-posts").swiper({pagination:".swiper-pagination",effect:"coverflow",grabCursor:!0,centeredSlides:!0,slidesPerView:"auto",slideToClickedSlide:!0,paginationClickable:!0,loop:!0,coverflow:{rotate:50,stretch:0,depth:100,modifier:1,slideShadows:!0}})}),jQuery(function(){var e=jQuery(".fp-container").swiper({pagination:".swiper-pagination",effect:"cube",grabCursor:!0,paginationClickable:!0,loop:!0,pagination:!1,nextButton:".sbnc",prevButton:".sbpc",cube:{shadow:!1,slideShadows:!0,shadowOffset:12,shadowScale:.64}})}),jQuery(function(){var e=jQuery(".fposts-container").swiper({pagination:".swiper-pagination",effect:"cube",grabCursor:!0,paginationClickable:!0,loop:!0,pagination:!1,nextButton:".sbncp",prevButton:".sbpcp",cube:{shadow:!1,slideShadows:!0,shadowOffset:12,shadowScale:.64}})}),jQuery(function(){var e=jQuery(".slider-container").swiper({pagination:".swiper-pagination",paginationClickable:".swiper-pagination",nextButton:".slidernext",prevButton:".sliderprev",spaceBetween:30,autoplayDisableOnInteraction:!1,autoplay:parseInt(slider_object.autoplay),speed:parseInt(slider_object.speed),effect:"fade",fade:{crossFade:!1}})});