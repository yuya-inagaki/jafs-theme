$(document).ready(function(){
    $('.top-slider').slick({ //トップページ最上部スライダー
        centerMode: true,
        draggable: false,
        slidesToShow: 1,
        accessibility: true,
        autoplay: true,
        autoplaySpeed: 6000,
        dots: false,
        variableWidth: true,
        prevArrow: '<img src="/wordpress/wp-content/themes/JAFS-Theme/img/icon/slide_prev.png" class="slide-arrow prev-arrow">',
        nextArrow: '<img src="/wordpress/wp-content/themes/JAFS-Theme/img/icon/slide_next.png" class="slide-arrow next-arrow">',
        responsive: [{
            breakpoint: 1049,
            settings: {
                centerMode: false,
                variableWidth: false,
                arrows: false,
                slidesToShow: 1,
            }
        }]
    });
    
    $('.slick-current span').slideDown(); //最初のスライド用
    
    //スライドが切り替わる前に実行
    $('.top-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
      $('.slick-current span').slideUp("fast");
    });
    //スライドが切り替わった後に実行
    $('.top-slider').on('afterChange', function(event, slick, currentSlide, nextSlide){
      $('.slick-current span').slideDown();
    });
    
    //モバイルハンバーガーメニュー
    $('.menu-trigger').on('click', function() {
        $(this).toggleClass('active');
        
        if ($('#mobile_menu').is(':hidden')) $('#mobile_menu').slideDown();
        else $('#mobile_menu').slideUp();
        
        return false;
    });
    
    //スムーズスクロール
    $('a[href^="#"]').click(function(){
        var speed = 500;
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        $("html, body").animate({scrollTop:position}, speed, "swing");
        return false;
    });
    
});