var load = true;

$(window).load(function() {
    // Преаолдер;
    $('.loader-icon').removeClass('spinning-cog').addClass('shrinking-cog');
    $('.loader-background').delay(1300).fadeOut();

    var navFix = $('#header-section-1 .header-menu-stuck');
    var hero = $("#hero-section-1")
    navFix.affix({
        offset: {
            top: function () {
                return (this.top = (navFix.offset().top + hero.height() - 100));
            }
        },
    });

    navFix.on( 'affixed-top.bs.affix', function () {
        console.log('Out');
        navFix.addClass('fadeOutUp top animated');
    });

    navFix.on( 'affix.bs.affix', function () {
        console.log('show');
        navFix.addClass('fadeInDown animated');

    });
    // События анимация;
    navFix.on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
        if(navFix.filter('.fadeInDown').length) {
            navFix.removeClass('fadeInDown animated');
        }
        if(navFix.filter('.fadeOutUp').length) {
            navFix.removeClass('fadeOutUp top animated');
        }
    });

    jQuery('#up-button a').on('click', function () {
        jQuery('html, body').animate({scrollTop: '0'}, 800);
        return false;
    });
    jQuery(window).scroll(function () {
        currentPosition = jQuery(window).scrollTop();
        if (currentPosition >= 300) {
            jQuery('#up-button').addClass('correct-position');
        } else {
            jQuery('#up-button').removeClass('correct-position');
        }
    });


    load = false;
});

//
jQuery(document).ready(function () {

    jQuery('.navbar-toggle').on('click', function () {
        jQuery('.navbar-toggle').toggleClass('lpbuilder-toggle');
    });
    /* =========================================================================
     Parallax Effect
     ========================================================================= */
    /* Main Function
     ------------------------------------------------------------------------- */
    var parallaxEffect = true;
    function parallaxEffectfn(parallaxEffect) {
        jQuery('.parallax-effect').each(function () {

            var el = jQuery(this),
                elImage = jQuery('> img', el),
                elHeight = el.outerHeight(true),
                scrollTop = jQuery(window).scrollTop(),
                elOffsetBottom = el.offset().top + elHeight,
                windowHeight = jQuery(window).outerHeight(true),
                parallaxPixel = (el.offset().top - scrollTop) * 0.30,
                differenceHeight = elImage.outerHeight(true) - elHeight;

            if (parallaxEffect !== false) {
                elImage.css({top: -differenceHeight / 2});
            }

            if ((elOffsetBottom > scrollTop) && (el.offset().top < (scrollTop + windowHeight))) {
                elImage.css({transform: 'translate(-50%,' + -parallaxPixel + 'px)'});
            }

        });
    }

    if (parallaxEffect === true) {
        jQuery(window).scroll(function () {
            parallaxEffectfn(false);
        });
        parallaxEffectfn();
    }

        //Initialize filterizr with default options
        $('.filtr-container').filterizr();


        //Simple filter controls
        $('.simplefilter li').click(function() {
            $('.simplefilter li').removeClass('active');
            $(this).addClass('active');
        });
        //Multifilter controls
        $('.multifilter li').click(function() {
            $(this).toggleClass('active');
        });
        //Shuffle control
        $('.shuffle-btn').click(function() {
            $('.sort-btn').removeClass('active');
        });
        //Sort controls
        $('.sort-btn').click(function() {
            $('.sort-btn').removeClass('active');
            $(this).addClass('active');
        });



    // Якорь;
    $(".js-anchor").on("click","a", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 1500);
    });

    // Scroll menu;
    $('body').scrollspy({
        target: '.navbar-collapse',
        offset: 200,
    });

    if(load) {
        setTimeout(function() {

            printText(
            "printText",
            [
                "Добро пожаловать в мой цифровой дом, меня зовут - Руслан."
            ],
            80
        );
        }, 3000);
    }

    var wow = new WOW(
        {
            boxClass:     'wow',      // класс, скрывающий элемент до момента отображения на экране (по умолчанию, wow)
            animateClass: 'animated', // класс для анимации элемента (по умолчанию, animated)
            offset:       0,          // расстояние в пикселях от нижнего края браузера до верхней границы элемента, необходимое для начала анимации (по умолчанию, 0)
            mobile:       false,       // включение/отключение WOW.js на мобильных устройствах (по умолчанию, включено)
            live:         true,       // поддержка асинхронно загруженных элементов (по умолчанию, включена)
            callback:     function(box) {
                // функция срабатывает каждый раз при старте анимации
                // аргумент box — элемент, для которого была запущена анимация
            },
            scrollContainer: null // селектор прокручивающегося контейнера (опционально, по умолчанию, window)
        }
    );
    wow.init();



});

// Функция печатание;
function printText(id, text, speed){

    var ele = document.getElementById(id),
        txt = text.join("").split("");
    // Интервал букв;
    var interval = setInterval(function(){
        if(!txt[0]){return clearInterval(interval);};
        ele.innerHTML += txt.shift();
    }, speed != undefined ? speed : 100);

    return false;
};

//
$(window).on('load', function () {
    setTimeout(function() {
        $('#loader').remove();
    },2000);
});


console.info('global--OK');