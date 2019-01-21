jQuery(document).ready(function( $ ) {

	/**
	 * Background Image
	 */
	var bg = $('[data-bg]');
	$(bg).each(function () { 
		var bg_desk = $(this).attr('data-bg');
		$(this).css({
			'background-image': 'url('+ bg_desk +')'
		});
	});

	$('.slick-executives').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		arrows: true
	});

	$('.btn-menu').click(function(e) {
		e.preventDefault();
		$(this).toggleClass('active');
		$('#first-menu').slideToggle();
	});

	$('.placeholder').click(function(e) {
		e.preventDefault();
		$(this).parent().find('ul').slideToggle();
	});

	$('#second-menu a').click(function() {
		var title = $(this).text();
		$('.placeholder p').html(title);
		$(this).parent().parent().slideUp();
	});

	// $('.menu-modules a').click(function(e) {
	// 	e.preventDefault();
	// 	link = $(this).attr('href');
	// 	// $('')
	// });

	$('.menu-modules a').click(function(e) {
		var page = $(this).attr('href').replace('#','/#/')
		// window.history.pushState("object or string", "Title", page); 
		// window.history.replaceState("object or string", "Title", page);

		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			$(this).parent().parent().find('a').removeClass('current');
			$(this).addClass('current');
			var target = $(this.hash); 
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');  
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top}, 800);
				return false;
			}
		}
	});

	$('.anchor').click(function(e) {
		var page = $(this).attr('href').replace('#','/#/')
		// window.history.pushState("object or string", "Title", page); 
		// window.history.replaceState("object or string", "Title", page);

		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash); 
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');  
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top}, 800);
				return false;
			}
		}
	});


	$(window).on('scroll', function() {
		var scroll = $(window).scrollTop();
		if (scroll < 1300) {
			$("#voltar").removeClass("show");
		} else {
			$("#voltar").addClass("show");
		}

		if (scroll > 56) {
			$("#modules").addClass('fixed');
		} else {
			$("#modules").removeClass('fixed');
		}
	});

	$('.especificacoes a').click(function(e) {
		e.preventDefault();
		const especificacao = $(this).attr('data-filter');
		$(this).parent().parent().find('li').removeClass('active');
		$(this).parent().addClass('active');

		$(this).parent().parent().parent().parent().find('.especificacao .item:not(.'+ especificacao +')').removeClass('active').hide();
		$(this).parent().parent().parent().parent().find('.especificacao .item.'+especificacao).fadeIn();
	});

	$('.especificacao .fechar').click(function(){
		$(this).parent().fadeOut();
		$(this).parent().parent().parent().find('li').removeClass('active');
	});

});