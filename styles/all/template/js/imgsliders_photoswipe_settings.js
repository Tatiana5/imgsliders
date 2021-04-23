function imgsliders_add_class($elem) {
	var $img = $("<img>").attr("src", $elem.attr('href'));
	$img.bindImageLoad(function() {
		$elem.addClass("photoswipe").attr('data-w', $img.get(0).naturalWidth).attr('data-h', $img.get(0).naturalHeight);

		// Fix for External Links Open in New Window
		if ($elem.hasClass('elonw')) {
			elonw_title = $elem.attr('title');
			elonw_target = $elem.attr('target');
			$elem.attr('data-elonw', 'elonw').removeClass('elonw').removeAttr('title').removeAttr('target');
		}
	});
}

function imgsliders_remove_class($elem) {
	$elem.removeClass("photoswipe").removeAttr('data-w').removeAttr('data-h');

	// Fix for External Links Open in New Window
	var elonw_attr = $elem.attr('data-elonw');
	if ("undefined" !== typeof elonw_attr && elonw_attr !== false ) {
		$elem.addClass('elonw').attr('title', elonw_title).attr('target', elonw_target);
	}

	var photoswipe_attr = $elem.attr('data-wrap');
	if ("undefined" !== typeof fancybox_attr && photoswipe_attr == 'photoswipe') {
		$elem.find('img').unwrap();
	}
}

function imgsliders_wrap($elems) {
	$elems.each(function() {
		var i = $(this).attr("src");
		if (!$(this).parent().hasClass('photoswipe')) {
			$(this).bindImageLoad(function() {
				$(this).wrap('<a class="photoswipe" data-wrap="photoswipe" href="' + i + '" data-w="' + $(this).get(0).naturalWidth + '" data-h="' + $(this).get(0).naturalHeight + '"></a>');
			});
		}
	});
}

function imgsliders_start() {};

$('.page-body').on('click', '.photoswipe', function(e) {
	// Make sure that PhotoSwipe and PhotoSwipeUI_Default exists
	if (!PhotoSwipe || !PhotoSwipeUI_Default) {
		e.preventDefault();
		console.log('PhotoSwipe');
		return;
	}

	e.preventDefault();

	// Get the html container
	var pswp = document.querySelector('.pswp');

	var i = 0;
	var items = [];

	$('.photoswipe').each(function() {
		$(this).removeAttr('data-pswp-index').attr('data-pswp-index', i);
		i++;

		items.push({
			src: $(this).attr('href'),
			w: $(this).attr('data-w'),
			h: $(this).attr('data-h'),
			//title: imgs[i].getAttribute('title') !== null ? imgs[i].getAttribute('title') : ''
		});
	});

	console.log(items);

	// Create options
	var options = {
		index: parseInt($(this).attr('data-pswp-index')),
		//shareButtons: share_buttons,
		closeOnScroll: false,
		closeOnVerticalDrag: false,
		clickToCloseNonZoomable: false
	};

	// Create a gallery
	var gallery = new PhotoSwipe(pswp, PhotoSwipeUI_Default, items, options);

	// Open the gallery
	gallery.init();
})
