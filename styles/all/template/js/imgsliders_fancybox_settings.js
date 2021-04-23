function imgsliders_add_class($elem) {
	$elem.addClass("fancybox").attr("data-fancybox", "gallery");

	// Fix for External Links Open in New Window
	if ($elem.hasClass('elonw')) {
		elonw_title = $elem.attr('title');
		elonw_target = $elem.attr('target');
		$elem.attr('data-elonw', 'elonw').removeClass('elonw').removeAttr('title').removeAttr('target');
	}
}

function imgsliders_remove_class($elem) {
	$elem.removeClass("fancybox").removeAttr("data-fancybox", "gallery");

	// Fix for External Links Open in New Window
	var elonw_attr = $elem.attr('data-elonw');
	if ("undefined" !== typeof elonw_attr && elonw_attr !== false) {
		$elem.addClass('elonw').attr('title', elonw_title).attr('target', elonw_target);
	}

	fancybox_attr = $elem.attr('data-wrap')
	if ("undefined" !== typeof fancybox_attr && fancybox_attr == 'fancybox') {
		$elem.find('img').unwrap();
	}
}

function imgsliders_wrap($elems) {
	$elems.each(function() {
		var i = $(this).attr("src");
		if (!$(this).parent().hasClass('fancybox')) {
			$(this).wrap('<a class="fancybox" data-fancybox="gallery" data-wrap="fancybox" href="' + i + '"></a>');
		}
	});
}

function imgsliders_start() {
	translate_fancybox();
};
