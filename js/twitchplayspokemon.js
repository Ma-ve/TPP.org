function alertType(s) {
	var alertType = '';
	if(s.indexOf('Success') !== -1) {
		alertType = 'success';
	} else {
		alertType = 'danger';
	}
	return alertType;
}

var others = ['show-feedback', 'show-about'];

function toggleIcon(s) {
	var selector = '.' + s + ' i';
	if($(selector).hasClass('fa-caret-right')) {
		$(selector).removeClass('fa-caret-right');
		$(selector).addClass('fa-caret-down');
		for(var i = 0; i < others.length; i++) {
			if(others[i] !== s) {
				$('.' + others[i] + ' i').removeClass('fa-caret-down');
				$('.' + others[i] + ' i').addClass('fa-caret-right');
			}
		}
	} else {
		$(selector).removeClass('fa-caret-down');
		$(selector).addClass('fa-caret-right');
	}
}

$(function() {
	setTimeout(function() {

		$('.js-items-height').each(function() {
			if($(this).height() > 300) {
				$(this).addClass('items-height relative');
				$(this).append('<span class="js-items-show-more items-show-more">Show more&hellip;</span>');
			}
		});
	}, 500);

	$('body').on('click', '.js-items-show-more', function() {
		$(this).parent().removeClass('items-height');
		$(this).remove();
	});

	if($.cookie('more_info') == 1) {
		$('.pokemon-more-info').show();
		$('.pokemon-more-info-click').text('-');
	}
	if($.cookie('more_info_badges') == 1) {
		$('.badges-more-info').show();
		$('.badges-more-info-click').text('-');
	}
	if($.cookie('rematch_more_info_badges') == 1) {
		$('.rematch-badges-more-info').show();
		$('.rematch-badges-more-info-click').text('-');
	}
	$('.tpp-options').on('click', function(e) {
		e.preventDefault();
		$('#dialog-modal').dialog({
			modal: true,
			draggable: false,
			resizable: false,
			width: 300,
			open: function(event, ui) {
				$(".ui-dialog-titlebar-close", ui.dialog || ui).hide();
				$('.ui-widget-overlay').bind('click', function() {
					$('#dialog-modal').dialog('close');
				});
			}
		});
	});
//	$(function() {
//		$("img.lazy").lazyload({
//			treshold: 250
//		});
//	});
	$('.tpp-tooltip').popover({placement: 'top', trigger: 'hover', title: ''});

	var moreInfo = $('.pokemon-more-info-click');
	moreInfo.on('click', function(e) {
		e.preventDefault();
		if(moreInfo.text() === '+') {
			moreInfo.text('-');
			$('.pokemon-more-info').show(300);
			document.cookie = 'more_info=1; expires=Tue, 19 Jan 2038 03:14:07 GMT; path=/';
		} else {
			moreInfo.text('+');
			$('.pokemon-more-info').hide(300);
			document.cookie = 'more_info=0; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';
		}
	});

	var moreInfoBox = $('.pokemon-box-more-info-click');
	moreInfoBox.on('click', function(e) {
		e.preventDefault();
		if(moreInfoBox.text() === '+') {
			moreInfoBox.text('-');
			$('.pokemon-box-more-info').show(300);
			document.cookie = 'more_info_box=1; expires=Tue, 19 Jan 2038 03:14:07 GMT; path=/';
		} else {
			moreInfoBox.text('+');
			$('.pokemon-box-more-info').hide(300);
			document.cookie = 'more_info_box=0; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';
		}
	});

	var moreInfoE4 = $('.e4-more-info-click');
	moreInfoE4.on('click', function(e) {
		e.preventDefault();
		if(moreInfoE4.text() === '+') {
			moreInfoE4.text('-');
			$('.e4-more-info').show(300);
			document.cookie = 'more_info_e4=1; expires=Tue, 19 Jan 2038 03:14:07 GMT; path=/';
		} else {
			moreInfoE4.text('+');
			$('.e4-more-info').hide(300);
			document.cookie = 'more_info_e4=0; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';
		}
	});

	var moreInfoE4 = $('.e4-rematch-more-info-click');
	moreInfoE4.on('click', function(e) {
		e.preventDefault();
		if(moreInfoE4.text() === '+') {
			moreInfoE4.text('-');
			$('.e4-rematch-more-info').show(300);
			document.cookie = 'more_info_e4_rematch=1; expires=Tue, 19 Jan 2038 03:14:07 GMT; path=/';
		} else {
			moreInfoE4.text('+');
			$('.e4-rematch-more-info').hide(300);
			document.cookie = 'more_info_e4_rematch=0; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';
		}
	});

	var moreInfoBadge = $('.badges-more-info-click');
	moreInfoBadge.on('click', function(e) {
		e.preventDefault();
		if(moreInfoBadge.text() === '+') {
			moreInfoBadge.text('-');
			$('.badges-more-info').show(300);
			document.cookie = 'more_info_badges=1; expires=Tue, 19 Jan 2038 03:14:07 GMT; path=/';
		} else {
			moreInfoBadge.text('+');
			$('.badges-more-info').hide(300);
			document.cookie = 'more_info_badges=0; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';
		}
	});

	var moreInfoRematchBadge = $('.rematch-badges-more-info-click');
	moreInfoRematchBadge.on('click', function(e) {
		e.preventDefault();
		if(moreInfoRematchBadge.text() === '+') {
			moreInfoRematchBadge.text('-');
			$('.rematch-badges-more-info').show(300);
			document.cookie = 'rematch_more_info_badges=1; expires=Tue, 19 Jan 2038 03:14:07 GMT; path=/';
		} else {
			moreInfoRematchBadge.text('+');
			$('.rematch-badges-more-info').hide(300);
			document.cookie = 'rematch_more_info_badges=0; expires=Thu, 01 Jan 1970 00:00:01 GMT; path=/';
		}
	});

	$('.feedback-button').on('click', function(e) {
		e.preventDefault();
		$.post("feedback.php", {
			feedback: $('.feedback-form').val()
		})
				.done(function(data) {
					$('.feedback').empty();
					$('.feedback').append('<div class="alert alert-' + alertType(data) + ' feedback-alert">' + data + '</div>');
				});
	});

	$('.join-button').on('click', function(e) {
		e.preventDefault();
		$.post("join_us.php", {
			join: $('.join-form').val()
		})
				.done(function(data) {
					$('.join').empty();
					$('.join').append('<div class="alert alert-' + alertType(data) + ' feedback-alert">' + data + '</div>');
				});
	});

	$('.alert-recruit').on('click', function() {
		document.cookie = 'recruitment_ar=1; expires=Tue, 19 Jan 2038 03:14:07 GMT; path=/';
	});

	$('.scroll-recruit').on('click', function() {
		$('div.join').show('fast');
		$('div.join').addClass('show-recruitment');
		toggleIcon('show-join');
	});

	$('.show-feedback').on('click', function(e) {
		e.preventDefault();
		toggleIcon('show-feedback');
		$('div.feedback').slideToggle(200, 'linear');
		$('div.about').hide(200);
	});

	$('.show-about').on('click', function(e) {
		e.preventDefault();
		toggleIcon('show-about');
		$('div.about').slideToggle(200, 'linear');
		$('div.feedback').hide(200);
	});

	$('.show-join').on('click', function(e) {
		e.preventDefault();
		toggleIcon('show-join');
		$('div.join').slideToggle(200, 'linear');
	});

//	$('a[href*=#]').on('click', function(event) {
//		$('html,body').animate({scrollTop: $(this.hash).offset().top}, 200);
//	});

	$('.pop-out').on('click', function(e) {
		e.preventDefault();
		window.open('embed', 'Twitch.tv | Twitch Plays Pokémon', 'height=400,width=640');
	});

	$('.pop-pokedex').on('click', function(e) {
		e.preventDefault();
		window.open('pokedex', 'Twitch Plays Pok&eacute;mon - Pok&eacute;dex', 'height=600,width=500,resizable=yes,scrollbars=yes');
	});

	$('.mave-history').on('click', function() {
		$('.mave-history').removeClass('mave-history-hover');
		$('.mave-history-' + $(this).attr('data-id')).addClass('mave-history-hover');
	});
//	if(window.location.href != window.top.location.href) {
//		window.top.location.href = 'http://twitchplayspokemon.org/';
//	}

	$("#timeline-click").on('click', function(data) {
		$.post('timeline_click.php', {uniqid: $("#timeline-identifier").val()});
	});

	if($(window).width() > 1400) {
		$('.tpp-app').removeClass('tpp-app-hidden');
	}

	if($(window).width() <= 1400) {
		$('#table-pokemon').after('<div class="tpp-app-table-div" id="tpp-app-table-div-pokemon"></div>');
		for(var i = 1; i <= 6; i++) {
			$('<div class="tpp-app-table-div-pokemon-pokemon-' + i + '"></div>').appendTo('#tpp-app-table-div-pokemon');
		}
		$('#table-pokemon tr').each(function() {
			var k = 0;
			$('td', $(this)).each(function() {
				k++;
				$(this).appendTo('.tpp-app-table-div-pokemon-pokemon-' + k);
			});
		});
		
		$('#tpp-app-table-div-pokemon td').each(function() {
			$(this).changeElementType('div');
		});
	}
	$('.tpp-app-nav a').on('click', function(e) {
		e.preventDefault();
		window.scrollTo(0,0);
		$(".navbar-toggle").click();
		$('.tpp-app').addClass('tpp-app-hidden');
		$('.' + $(this).attr('data-show')).removeClass('tpp-app-hidden');
	});


});

$.fn.changeElementType = function(newType) {
	var attrs = {};

	$.each(this[0].attributes, function(idx, attr) {
		attrs[attr.nodeName] = attr.nodeValue;
	});

	this.replaceWith(function() {
		return $("<" + newType + "/>", attrs).append($(this).contents());
	});
}