/* ------------------------------------------------------------------------
 * 	Class: screener
 * 	Use: Lightbox clone for jQuery
 * 	Author: Tapmates (http://www.tapmates.com)
 * 	Version: 1.0.0
 ------------------------------------------------------------------------- */

(function($) {
	$.screener = {version: '1.0.0'};
	
	$.fn.screener = function(settings) {
		settings = jQuery.extend({
			contentAnimationSpeed: 800,
			holderAnimationSpeed: 500,
			overlayAnimationSpeed: 500,
			overlayOpacity: 0.6,
			defaultWidth: 683,
			defaultHeight: 468,
			showImageLabels: false,
			showVideoLabels: false,
			imageSkin: 'screener-image',
			flashSkin: 'screener-flash',
			iframeSkin: 'screener-iframe',			
			youtubeSkin: 'screener-flash',
			mainMarkup: ' \
<div id="screener-holder"> \
	<div class="in"> \
		<div id="screener-loader"></div> \
		<div id="screener-content"></div> \
		<div id="screener-description"></div> \
		<a id="screener-control-close" href="#" title="Close"></a> \
		<a id="screener-control-prev" href="#" title="Previous"></a> \
		<a id="screener-control-next" href="#" title="Next"></a> \
	</div> \
</div> \
<div id="screener-overlay"></div>',
		imageMarkup: '<img id="screener-image" src="" alt="" />',
		flashMarkup: ' \
<object id="screener-flash" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="{width}" height="{height}"> \
	<param name="wmode" value="opaque" /> \
	<param name="allowfullscreen" value="true" /> \
	<param name="allowscriptaccess" value="always" /> \
	<param name="menu" value="false" /> \
	<param name="movie" value="{path}" /> \
	<embed src="{path}" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" menu="false" \
		width="{width}" height="{height}" wmode="opaque"> \
	</embed> \
</object>',
		iframeMarkup: ' \
	<iframe width="100%" height="100%"  frameborder="0" allowTransparency="true" marginwidth="0" marginheight="0" style="visibility:hidden" onload="this.style.visibility=\'visible\'" src="{path}" ></iframe>',
		youtubeMarkup: ' \
	<iframe width="100%" height="100%"  frameborder="0" marginwidth="0" marginheight="0" style="visibility:hidden" onload="this.style.visibility=\'visible\'" src="{path}" ></iframe>'
		}, settings);
		
		var $screener_overlay, $screener_holder, $screener_content, $screener_description,
		$screener_loader, $screener_control_prev, $screener_control_next,
		
		windowHeight = $(window).height(), windowWidth = $(window).width(),
		scrollPos = _getScroll(),
		galleryItems = new Array(), galleryItemsDescriptions = new Array(),
		activeGalleryIndex = 0;
		
		_buildScreener();
	
		$(window).scroll(function(){
				scrollPos = _getScroll();
				_centerOverlay();
		});
		$(window).resize(function() {
			  _centerOverlay();
		});

		$(document).keydown(function(event){
			if ($screener_holder.is(':visible')) {
				switch(event.keyCode){
					case 37:
						$.screener.changePage('previous');
						break;
					case 39:
						$.screener.changePage('next');
						break;
					case 27:
						$.screener.close();
						break;
				}
			}
	    });
		$('#screener-control-close').click(function(event){
			$.screener.close();
			event.preventDefault();
		});
		$('#screener-control-prev').click(function(event){
			$.screener.changePage('previous');
			event.preventDefault();
		});
		$('#screener-control-next').click(function(event){
			$.screener.changePage('next');
			event.preventDefault();
		});
		
		$(this).each(function(){
			$(this).click(function(event){
				var _self = this;
				
				var galleryRegExp = /\[(?:.*)\]/;
				var galleryIdentifier = galleryRegExp.exec($(this).attr('rel'));
				
				galleryItems = [];
				galleryItemsDescriptions = [];
				if (galleryIdentifier){
					$('a[rel*=' + galleryIdentifier + ']').each(function(index){
						if ($(this)[0] === $(_self)[0]) {
							activeGalleryIndex = index;
						}
							
						galleryItems.push($(this).attr('href'));
						galleryItemsDescriptions.push($(this).attr('title'));
					});
				} else {
					activeGalleryIndex = 0;
					galleryItems.push($(this).attr('href'));
					galleryItemsDescriptions.push($(this).attr('title'));
				}
				
				$.screener.open(galleryItems, galleryItemsDescriptions);
				event.preventDefault();
			});
		});
		
		
		$.screener.open = function(galleryItems, galleryItemsDescriptions){
			var activeItem = galleryItems[activeGalleryIndex];
			var activeItemDescription = galleryItemsDescriptions[activeGalleryIndex];
			var activeItemContentType = _getContentType(activeItem);
			
			$screener_holder.toggleClass(settings.imageSkin, activeItemContentType == 'image');
			$screener_holder.toggleClass(settings.flashSkin, activeItemContentType == 'flash');
			$screener_holder.toggleClass(settings.iframeSkin, activeItemContentType == 'iframe');			
			$screener_holder.toggleClass(settings.youtubeSkin, activeItemContentType == 'youtube');			
			_centerOverlay();
			
			$screener_overlay
				.show()
				.fadeTo(settings.overlayAnimationSpeed, settings.overlayOpacity);
			
			$screener_holder
				.fadeIn(settings.holderAnimationSpeed, function(){
					$screener_loader.show();
					
					switch (activeItemContentType) {
						case 'image':
							$screener_content.html(settings.imageMarkup);
							$screener_content.find('#screener-image').attr('src', activeItem);
							$screener_description.text(settings.showImageLabels ? activeItemDescription : '');
						
							var imagePreloader = new Image();
							imagePreloader.onload = function(){
								_showContent();
							};
							imagePreloader.onerror = function(){
								$.screener.close();
							};

							imagePreloader.src = activeItem;
							
							if (galleryItems.length > 1) {
								if (activeGalleryIndex > 0 &&
									_getContentType(galleryItems[activeGalleryIndex - 1]) == 'image') {
									var previousImagePreloader = new Image();
									previousImagePreloader.src = galleryItems[activeGalleryIndex - 1];
								}
								
								if (activeGalleryIndex + 1 < galleryItems.length &&
									_getContentType(galleryItems[activeGalleryIndex + 1]) == 'image') {
									var nextImagePreloader = new Image();
									nextImagePreloader.src = galleryItems[activeGalleryIndex + 1];
								}
							}
							break;
						case 'flash':
							$screener_description.text(settings.showVideoLabels ? activeItemDescription : '');
							
							var movieWidth = (parseFloat(_grabParam('width', activeItem))) ?
								_grabParam('width', activeItem) : settings.defaultWidth.toString();
							var movieHeight = (parseFloat(_grabParam('height', activeItem))) ?
								_grabParam('height', activeItem) : settings.defaultHeight.toString();
						
							var flashVars = activeItem
								.substring(
									activeItem.indexOf('flashvars') + 10,
									activeItem.length
								);

							var movieFile = activeItem
								.substring(0, activeItem.indexOf('?'));
								
							$screener_content.html(
								settings.flashMarkup
									.replace(/{width}/g, movieWidth)
									.replace(/{height}/g, movieHeight)
									.replace(/{path}/g, movieFile + '?' + flashVars)
							);
							_showContent();
							break;
						case 'iframe':			
							$screener_content.html(
								settings.iframeMarkup
									.replace(/{path}/g,activeItem )
							);
							_showContent();
							break;
						case 'youtube':			
							$screener_content.html(
								settings.youtubeMarkup
									.replace(/{path}/g,activeItem )
							);
							_showContent();
							break;							
					}
				});
		};
		
		$.screener.changePage = function(direction){
			if (direction == 'previous'){
				if (activeGalleryIndex > 0){
					activeGalleryIndex--;
				} else { 
					return;
				}
			} else if (direction == 'next'){
				if (activeGalleryIndex + 1 < galleryItems.length) {
					activeGalleryIndex++;
				} else {
					return;
				}
			}

			_hideContent(function(){
				$.screener.open(galleryItems, galleryItemsDescriptions);
			});
		};
		
		$.screener.close = function(){
			_hideContent();
			
			$screener_holder.fadeOut(settings.holderAnimationSpeed, function(){
				$screener_loader.hide();
				$screener_control_prev.hide();
				$screener_control_next.hide();
				$screener_content.html('').hide();
			});
			$screener_overlay.fadeOut(settings.overlayAnimationSpeed);
			activeGalleryIndex = 0;
		};
		
		function _showContent(){
			$screener_loader.hide();
			
			$screener_content.fadeIn(settings.contentAnimationSpeed);
			
			if ($screener_description.text().length != 0) {
				var descriptionPosition = ($screener_holder.width() / 2) - ($screener_description.width() / 2);
				$screener_description
					.animate({
						left: descriptionPosition,
						opacity: 1
					}, {
						duration: settings.contentAnimationSpeed,
						easing: 'easeOutBounce'
					});
			}
			
			if (activeGalleryIndex > 0) {
				$screener_control_prev.fadeIn(settings.contentAnimationSpeed);
			} else {
				$screener_control_prev.fadeOut(settings.contentAnimationSpeed);
			}
				
			if (activeGalleryIndex + 1 < galleryItems.length) {
				$screener_control_next.fadeIn(settings.contentAnimationSpeed);
			} else {
				$screener_control_next.fadeOut(settings.contentAnimationSpeed);
			}
		};
		
		function _hideContent(callback){
			$screener_content.find('object,embed').css('visibility','hidden');
			$screener_content.fadeOut(settings.contentAnimationSpeed, function(){
				if(callback) callback();
			});
			
			$screener_description.fadeTo(settings.contentAnimationSpeed, 0, function(){
				$(this).css({left: '100px'});
			});
		}
		
		function _getContentType(itemSrc){			
			if (itemSrc.indexOf('.swf') != -1){
				return 'flash';
			} else if (itemSrc.indexOf('youtube') != -1) {
				return 'youtube';
			} else if (itemSrc.indexOf('.php') != -1) {
				return 'iframe';				
			} else {
				return 'image';
			}
		};
		
		function _centerOverlay(){
			//alert((windowHeight / 2) + scrollPos['scrollTop'] - ($screener_holder.height() / 2));
			$screener_holder.css({
				top: ($(window).height() / 2) + scrollPos['scrollTop'] - ($screener_holder.height() / 2),
				left: ($(window).width() / 2) + scrollPos['scrollLeft'] - ($screener_holder.width() / 2)
			});
		};
		
		function _getScroll(){
			if (self.pageYOffset){
				return {
					scrollTop: self.pageYOffset,
					scrollLeft: self.pageXOffset
				};
			} else if (document.documentElement && document.documentElement.scrollTop){ // Explorer 6 Strict
				return {
					scrollTop: document.documentElement.scrollTop,
					scrollLeft: document.documentElement.scrollLeft
				};
			} else if (document.body){ // all other Explorers
				return {
					scrollTop: document.body.scrollTop,
					scrollLeft: document.body.scrollLeft
				};
			}
		};
		
		function _buildScreener(){
			$('body').append(settings.mainMarkup);
			
			$screener_overlay = $('#screener-overlay');
			$screener_holder = $('#screener-holder');
			$screener_content = $('#screener-content');
			$screener_description = $('#screener-description');
			$screener_loader = $('#screener-loader');
			$screener_control_prev = $('#screener-control-prev');
			$screener_control_next = $('#screener-control-next');
			
			$screener_overlay
				.height($(document).height())
				.click(function(event){
					$.screener.close();
				});
		};
		
		function _grabParam(name, url){
			name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
			
			var regexS = "[\\?&]" + name + "=([^&#]*)";
			var regex = new RegExp(regexS);
			var results = regex.exec(url);
			
			if (results == null) {
				return "";
			} else {
				return results[1];
			}
		};
	};
})(jQuery);