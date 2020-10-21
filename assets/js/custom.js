(function($) {
    "use strict";
	
	/* ..............................................
	   Loader 
	   ................................................. */
	$(window).on('load', function() {
		$('.preloader').fadeOut();
		$('#preloader').delay(550).fadeOut('slow');
		$('body').delay(450).css({
			'overflow': 'visible'
		});
	});

	/* ..............................................
	   Fixed Menu
	   ................................................. */

	$(window).on('scroll', function() {
		if ($(window).scrollTop() > 50) {
			$('.main-header').addClass('fixed-menu');
		} else {
			$('.main-header').removeClass('fixed-menu');
		}
	});

	/* ..............................................
	   Gallery
	   ................................................. */

	$('#slides-shop').superslides({
		inherit_width_from: '.cover-slides',
		inherit_height_from: '.cover-slides',
		play: 5000,
		animation: 'fade',
	});

	$(".cover-slides ul li").append("<div class='overlay-background'></div>");

	/* ..............................................
	   Map Full
	   ................................................. */

	$(document).ready(function() {
		$(window).on('scroll', function() {
			if ($(this).scrollTop() > 100) {
				$('#back-to-top').fadeIn();
			} else {
				$('#back-to-top').fadeOut();
			}
		});
		$('#back-to-top').click(function() {
			$("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
		});
	});

	/* ..............................................
	   Special Menu
	   ................................................. */

	var Container = $('.container');
	Container.imagesLoaded(function() {
		var portfolio = $('.special-menu');
		portfolio.on('click', 'button', function() {
			$(this).addClass('active').siblings().removeClass('active');
			var filterValue = $(this).attr('data-filter');
			$grid.isotope({
				filter: filterValue
			});
		});
		var $grid = $('.special-list').isotope({
			itemSelector: '.special-grid'
		});
	});

	/* ..............................................
	   BaguetteBox
	   ................................................. */

	baguetteBox.run('.tz-gallery', {
		animation: 'fadeIn',
		noScrollbars: true
	});

	/* ..............................................
	   Offer Box
	   ................................................. */

	$('.offer-box').inewsticker({
		speed: 3000,
		effect: 'fade',
		dir: 'ltr',
		font_size: 13,
		color: '#ffffff',
		font_family: 'Montserrat, sans-serif',
		delay_after: 1000
	});

	/* ..............................................
	   Tooltip
	   ................................................. */

	$(document).ready(function() {
		$('[data-toggle="tooltip"]').tooltip();
	});

	/* ..............................................
	   Owl Carousel Instagram Feed
	   ................................................. */

	$('.main-instagram').owlCarousel({
		loop: true,
		margin: 0,
		dots: false,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
		responsive: {
			0: {
				items: 2,
				nav: true
			},
			600: {
				items: 3,
				nav: true
			},
			1000: {
				items: 5,
				nav: true,
				loop: true
			}
		}
	});

	/* ..............................................
	   Featured Products
	   ................................................. */

	$('.featured-products-box').owlCarousel({
		loop: true,
		margin: 15,
		dots: false,
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true,
		navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
		responsive: {
			0: {
				items: 1,
				nav: true
			},
			600: {
				items: 3,
				nav: true
			},
			1000: {
				items: 4,
				nav: true,
				loop: true
			}
		}
	});

	/* ..............................................
	   Scroll
	   ................................................. */

	$(document).ready(function() {
		$(window).on('scroll', function() {
			if ($(this).scrollTop() > 100) {
				$('#back-to-top').fadeIn();
			} else {
				$('#back-to-top').fadeOut();
			}
		});
		$('#back-to-top').click(function() {
			$("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
		});
	});


	/* ..............................................
	   Slider Range
	   ................................................. */
    $('.add-to-cart').click(function (e) {
        e.preventDefault();
        //nhớ xóa cache trình duyệt: ctrl + Shift + R
        // alert('clicked');
        // LẤy giá trị của thuộc tính data-id đã khai báo trong
        // class hiện tại, data-id chính là product_id của sản
        //phẩm
        // + Sử dụng $(this) để tham chiếu đến chính selector
        // hiện tại
        var product_id = $(this).attr('data-id');
        console.log(product_id);
        // + Gọi ajax, truyền vào 1 đối tượng
        $.ajax({
            method: 'GET',
            // + Url theo mô hình MVC sẽ xử lý ajax
            url: 'index.php?controller=cart&action=add',
            // + Dữ liệu gửi lên, là 1 object
            data: {
                product_id: product_id
            },
            // + Nơi đón kết quả trả về từ url, biến data chứa toàn
            //bộ kết quả trả về
            success: function (data) {
                //Set message hiển thị cho class ajax-message
                $('.ajax-message').html('Thêm vào giỏ hàng thành công');
                //add class này dể set opacity = 1, vì mặc định ban đầu
                //message đang có opacity = 0 -> ẩn
                $('.ajax-message').addClass('ajax-message-active');
                //Sau khi hiển thị message thì sẽ xóa message này đi
                //, chờ khoảng 5s r mới xóa, sử dụng hàm setTimeout
                setTimeout(function () {
                    // Remove class ajax-message-active đi
                    $('.ajax-message').removeClass('ajax-message-active');
                }, 3000);

                var cart_total = $('.cart-amount').text();
                cart_total++;
                $('.cart-amount').text(cart_total);
                $('.cart-amount-mobile').text(cart_total);
            }
            // + Xem thông tin ajax: xem trong tab Network của
            // trình duyệt
        });
    });
    var ratedIndex = -1;
        resetStarColors();
        $('.star-rate').click( function () {
            ratedIndex = $(this).attr('data-index');
            console.log(ratedIndex);
            $.ajax({
                method: 'GET',
                url: 'index.php?controller=home&action=ratestar',
                data: {
                    ratedIndex: ratedIndex
                },
				success : function (data) {
						$('#showpopup').html(data);
                }

            });
        });

        $('.star-rate').mouseover(function () {
            resetStarColors();
            var currentIndex = parseInt($(this).data('index'));
            setStars(currentIndex);
        });

        $('.star-rate').mouseleave(function () {
            resetStarColors();

            if (ratedIndex != -1)
                setStars(ratedIndex);
        });


    function setStars(max) {
        for (var i=0; i <= max; i++)
            $('.star-rate:eq('+i+')').css('color', 'red');
    }

    function resetStarColors() {
        $('.star-rate').css('color', 'black');
    }

    $('.sale').change(function () {
    	var sale = $(this).val();
		$.ajax({
			method: 'GET',
			url: 'index.php?controller=discount&action=check',
			data: {
				sale: sale
			},
		success: function (data) {
			$('.sale-info').html(data);
        }
		});
    });
    $('#about-us').stop().animate({
        scrollTop: $('#about-us')[0].scrollHeight
    }, 800);
	/* ..............................................
	   NiceScroll
	   ................................................. */

	$(".brand-box").niceScroll({
		cursorcolor: "#9b9b9c",
	});
}(jQuery));

