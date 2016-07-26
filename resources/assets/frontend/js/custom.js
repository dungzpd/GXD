$(document).ready(function () {
    $.smoothScroll();
    /*$(window).scroll(function () {
        if ($(this).scrollTop() > 0) {
            $('.header').addClass("fixed");
        } else {
            $('.header').removeClass("fixed");
        }
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });*/
    $('.icon_menu').click(function () {
        if ($(this).hasClass('open')) {
            $('.main-menu ul').removeClass('open');
            $(this).removeClass('open');
            $(this).clearQueue();
        } else {
            $(this).addClass('open');
            $('.main-menu ul').addClass('open');
            $(this).clearQueue();
        }
    });
    $('.scrollToTop').click(function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });
    $(document).bind('scroll', function () {
        var toTop = $(window).scrollTop();
        $('.paralax').each(function () {
            para_bg($(this));
        });
    });
    function para_bg(elem) {
        var e_pos = elem.offset().top,
            w_top = $(window).scrollTop(),
            winh = $(window).height();
        var newbg = (w_top - e_pos) / 1.2;
        if (w_top - e_pos <= 0) {
            elem.addClass('active');
        }
        elem.css('background-position', '50%' + ' ' + newbg + 'px');
    }

    $('.rate').raty({
        path: '/frontend/images',
        readOnly: true,
        score: function () {
            return $(this).attr('data-score');
        }
    });
    /*$(".list-teacher-item").owlCarousel({
     itemsCustom : [
     [0, 1],
     [450, 2],
     [600, 3],
     [1000, 4],
     ],
     autoPlay : 5000,
     navigation : true,
     navigationText : ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
     });*/

})
$(window).load(function () {

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=1727763097478848";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
})
