var galleryThumbs = null;
var Widget_DCE_Dynamicposts_dualcarousel_Handler = function ($scope, $) {
    var smsc = null;
	var elementSettings = dceGetElementSettings($scope);
	var elementSwiper = $scope.find('.dce-dualcarousel-gallery-thumbs');
	var slidesPerView = Number(elementSettings[dceDynamicPostsSkinPrefix+'thumbnails_slidesPerView']);
	var elementorBreakpoints = elementorFrontend.config.breakpoints;
	var dceSwiperOptions = {
		spaceBetween: Number(elementSettings[dceDynamicPostsSkinPrefix+'dualcarousel_gap']) || 0,
		slidesPerView: slidesPerView || 'auto',
	    autoHeight: true,
	    watchOverflow: true,
	    watchSlidesProgress: true,
	    centeredSlides: true,
	    loop: true,
	};

    dceSwiperOptions.breakpoints = dynamicooo.makeSwiperBreakpoints({
		slidesPerView: {
			elementor_key: 'thumbnails_slidesPerView',
			default_value: 'auto'
		},
		spaceBetween: {
			elementor_key: 'dualcarousel_gap',
			default_value: 0,
		},
	}, elementSettings, dceDynamicPostsSkinPrefix);

    if(smsc) {
		smsc.remove();
	}
    if(galleryThumbs) {
		galleryThumbs.destroy();
	}

	if ( 'undefined' === typeof Swiper ) {
		const asyncSwiper = elementorFrontend.utils.swiper;

		new asyncSwiper(jQuery( elementSwiper[0] ), dceSwiperOptions ).then( ( newSwiperInstance ) => {
			galleryThumbs = newSwiperInstance;
		} );
	  } else {
		galleryThumbs = new Swiper( jQuery( elementSwiper[0] ), dceSwiperOptions );
	  }

    Widget_DCE_Dynamicposts_carousel_Handler($scope, $);


};

jQuery(window).on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/dce-dynamicposts-v2.dualcarousel', Widget_DCE_Dynamicposts_dualcarousel_Handler);
	elementorFrontend.hooks.addAction('frontend/element_ready/dce-woo-products-cart.dualcarousel', Widget_DCE_Dynamicposts_dualcarousel_Handler);
	elementorFrontend.hooks.addAction('frontend/element_ready/dce-woo-products-cart-on-sale.dualcarousel', Widget_DCE_Dynamicposts_dualcarousel_Handler);
	elementorFrontend.hooks.addAction('frontend/element_ready/dce-dynamic-woo-products.dualcarousel', Widget_DCE_Dynamicposts_dualcarousel_Handler);
	elementorFrontend.hooks.addAction('frontend/element_ready/dce-woo-product-upsells.dualcarousel', Widget_DCE_Dynamicposts_dualcarousel_Handler);
	elementorFrontend.hooks.addAction('frontend/element_ready/dce-woo-product-crosssells.dualcarousel', Widget_DCE_Dynamicposts_dualcarousel_Handler);
	elementorFrontend.hooks.addAction('frontend/element_ready/dce-dynamic-show-favorites.dualcarousel', Widget_DCE_Dynamicposts_dualcarousel_Handler);
	elementorFrontend.hooks.addAction('frontend/element_ready/dce-my-posts.dualcarousel', Widget_DCE_Dynamicposts_dualcarousel_Handler);
	elementorFrontend.hooks.addAction('frontend/element_ready/dce-sticky-posts.dualcarousel', Widget_DCE_Dynamicposts_dualcarousel_Handler);
	elementorFrontend.hooks.addAction('frontend/element_ready/dce-search-results.dualcarousel', Widget_DCE_Dynamicposts_dualcarousel_Handler);
});
