function imgsliders_check_photo_hostings($elem) {
	var add_class = false;

	//img-fotki.yandex.ru
	if (~$elem.attr('href').toLowerCase().indexOf('//img-fotki.yandex.ru')) {
		add_class = true;
	//fotki.yandex.ru
	} else if (~$elem.attr('href').toLowerCase().indexOf('//fotki.yandex.ru')) {
		var img_url = $elem.children('img').attr('src');
		var img_reg = /(.*)_([a-zA-Z]*)(\.[a-zA-Z]*)$/;
		var new_url_arr;

		if (new_url_arr = img_reg.exec(img_url)) {
			$elem.attr('href', new_url_arr[1] + '_orig' + new_url_arr[3]);
			add_class = true;
		} else {
			img_reg = /(.*)_([a-zA-Z]*)$/;

			if (new_url_arr = img_reg.exec(img_url)) {
				$elem.attr('href', new_url_arr[1] + '_orig');
				add_class = true;
			}
		}
	//i-fotki.info
	} else if (~$elem.attr('href').toLowerCase().indexOf('//i-fotki.info')) {
		var img_url = $elem.children('img').attr('src');
		var new_url = img_url.replace('/thumb/', '/org/');

		$elem.attr('href', new_url);
		add_class = true;
	//radikal.ru
	} else if (~$elem.attr('href').toLowerCase().indexOf('//radikal.ru')) {
		var img_url = $elem.children('img').attr('src');
		var img_reg = /(.*)(\.[a-zA-Z]*)$/;
		var new_url_arr;

		if (new_url_arr = img_reg.exec(img_url)) {
			$elem.attr('href', new_url_arr[1].slice(0, -1) + new_url_arr[2]);
			add_class = true;
		}
	//vfl.ru
	} else if (~$elem.attr('href').toLowerCase().indexOf('//vfl.ru')) {
		var img_url = $elem.children('img').attr('src');
		var img_reg = /(.*)_([a-zA-Z]*)(\.[a-zA-Z]*)$/;
		var new_url_arr;

		if (new_url_arr = img_reg.exec(img_url)) {
			$elem.attr('href', new_url_arr[1] + new_url_arr[3]);
			add_class = true;
		}
	}

	return add_class;
}

function imgsliders_check_pixs($elem) {
	if (~$elem.attr('href').toLowerCase().indexOf('//pixs.ru')) {
		var img_url = $elem.children('img').attr('src');
		var new_url = img_url.replace('/thumbs/', '/storage/');

		$elem.attr('href', new_url);
	}
}

;(function ($) {
		$.fn.bindImageLoad = function (callback) {
			function isImageLoaded(img) {
				// Во время события load IE и другие браузеры правильно
				// определяют состояние картинки через атрибут complete.
				// Исключение составляют Gecko-based браузеры.
				if (!img.complete) {
					return false;
				}
				// Тем не менее, у них есть два очень полезных свойства: naturalWidth и naturalHeight.
				// Они дают истинный размер изображения. Если какртинка еще не загрузилась,
				// то они должны быть равны нулю.
				if (typeof img.naturalWidth !== "undefined" && img.naturalWidth === 0) {
					return false;
				}
				// Картинка загружена.
				return true;
			}
			return this.each(function () {
				var ele = $(this);
				if (ele.is("img") && $.isFunction(callback)) {
					ele.one("load", callback);
					if (isImageLoaded(this)) {
						ele.trigger("load");
					}
				}
			});
		};
	})(jQuery);


function imgsliders_resize(elements) {
	

	elements.find('a' + imgsliders_class +' img').not('dl.thumbnail a img').not('.attach-image a img').bindImageLoad(function() {
		if ($(this).width() > imgsliders_min_size || $(this).height() > imgsliders_min_size) {
			if (imgsliders_max_size > 0) {
				$(this).removeAttr("width")
				$(this).removeAttr("height")
				$(this).css({ width: "", height: "" });
				var h = $(this).height();
				var w = $(this).width();
				var size = imgsliders_max_size; // Img tag max width
				if (w > size || h > size) {
					if (w > h) {
						//h = h*(size/w);
						w = size;
					} else {
						w = w*(size/h);
						//h = size;
					}
					$(this).width(w);
					//$(this).height(h);
				}
			}
		} else {
			imgsliders_remove_class($(this).parent('a' + imgsliders_class));
		}
	});
}

function imgsliders_add(e, elements) {
	// attachments
	imgsliders_add_class(elements.find("dl.thumbnail a"));
	imgsliders_wrap(elements.find(".attach-image img"));

	// [img]
	elements.find('a').not(imgsliders_class).has('img').each(function() {
		if ($.inArray( $(this).attr( 'href' ).toLowerCase().split( '.' ).pop().split( '?' )[ 0 ], [ 'jpg', 'jpe', 'jpeg', 'gif', 'png', 'bmp' ] ) > -1 && $(this).children('img').not('.smilies').length > 0)
		{
			imgsliders_add_class($(this));

			imgsliders_check_pixs($(this));
		} else if (imgsliders_check_photo_hostings($(this)) || ($(this).find('img').hasClass('postimage') && ~$(this).attr( 'href' ).toLowerCase().indexOf('/download/file.php'))) {
			imgsliders_add_class($(this));
		}
	});

	imgsliders_wrap(elements.find('img').not('a img').not('.smilies'));
	
	imgsliders_resize(elements);

	imgsliders_start();
}

$(document).ready(function (e) {
	imgsliders_add(e, $('.post .content, .post .file'));
});

//QuickReply Reloaded
$('#qr_posts').on('qr_completed', function (e) {
	imgsliders_add(e, $('.post .content, .post .file'));
});
$('#qr_postform').on('ajax_submit_preview', function (e) {
	imgsliders_add(e, $('#preview'));
});

// Simple spoiler
$('.page-body').on('click', '.spoiler-header', function(e) {
	setTimeout(() => { imgsliders_add(e, $(e.target.closest('.spoiler'))), 1});
});
