var $window = $(window),
    $document = $(document),
    $body = $('body');

var WINDOW_TOP = 0,
    WINDOW_WIDTH = window.innerWidth;

    function resumo_close($cursoSelecionado) {
        var cursoAltura = $cursoSelecionado.attr('data-altura'),
            $resumo = $cursoSelecionado.find('.resumo'),
            $cursos = $cursoSelecionado.parents('.trail-courses').find('.trail-course');

        // Cursos.
        $cursos.removeClass('is-disabled');

        // Ativo.
        $cursoSelecionado
            .removeClass('is-active')
            .css('height', cursoAltura);

        // Seta.
        $cursoSelecionado
            .parents('.trail')
            .find('.slick-arrow')
            .removeClass('slick-hidden');

        // Resumo.
        $resumo.removeClass('is-active');

        setTimeout(function () {
            $resumo.css({
                'max-height': 0,
                'overflow': 'hidden'
            });
        }, 400);
    }


/**
 * Trilha.
 */
function set_trail($trail) {
    var $curso = $trail.find('.trail-course'),
        quantidade = 0,
        quantidadeMaxima = 4;

    $curso.each(function () {
        quantidade++;
    });

    if (WINDOW_WIDTH <= 1080) {
        quantidadeMaxima = 3;
    } else if (WINDOW_WIDTH <= 850) {
        quantidadeMaxima = 2;
    }

    if (quantidade <= quantidadeMaxima) {
        $trail.parents('.trail').find('.trail-header-menu').hide();
    } else {
        $trail.parents('.trail').find('.trail-header-menu').show();
    }
}


/**
 * Slider.
 */
function set_slider($trail) {
    $trail.on('init', function () {
        var $this = $(this),
            $curso = $this.find('.trail-course'),
            cursoNumber = 1;

        $curso.each(function () {
            var $this = $(this);

            if ($this.hasClass('slick-active')) {
                $this.addClass('slick-index-' + cursoNumber);

                cursoNumber++;
            }
        });

        $this.find('img').load(function () {
            set_cursos($this);
        });
    });

    $trail.slick({
        adaptiveHeight: false,
        dots: false,
        infinite: false,
        slidesToShow: 4,
        slidesToScroll: 4,
        speed: 400,
        variableWidth: false,
        responsive: [
            {
                breakpoint: 1081,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 851,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
        ]
    });

    $trail.on('beforeChange', function () {
        var $this = $(this);

        $this.find('.slick-arrow').addClass('slick-hidden');
    });

    $trail.on('afterChange', function () {
        var $this = $(this);

        resumo_close($this.find('.trail-course.is-active'));

        $this.find('.slick-arrow').removeClass('slick-hidden');
    });

    $trail.on('setPosition', function () {
        var $this = $(this),
            $curso = $this.find('.trail-course'),
            cursoNumber = 1,
            offsetLeft = $trail.offset().left - 100;

        $curso.each(function () {
            var $this = $(this);

            if ($this.hasClass('slick-active')) {
                $this
                    .removeClass('slick-index-1 slick-index-2 slick-index-3 slick-index-4')
                    .addClass('slick-index-' + cursoNumber);

                cursoNumber++;
            }

            if ($this.offset().left < offsetLeft) {
                $this.removeClass('slick-active');
            }
        });
    });
}

/* Depoimentos */

function set_testimonials($testimonials) {
    $testimonials.slick({
        autoplay: true,
        arrows: false,
        adaptiveHeight: false,
        dots: true,
        infinite: true,
        fade: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 800,
        variableWidth: false,
        responsive: [
            {
                breakpoint: 1081,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 851,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
}

$document.on('ready', function () {

    /**
     * Trilhas.
     */
    set_slider($('.trail-courses'));

    $document.on('click', '.trail-course-media', function (e) {
        location.href = $(this).find('.trail-course-hover-btn').attr('href');
    });

    $document.on('click', '.js-trail-open', function () {
        var $this = $(this),
            $trail = $this.parents().filter('.trail'),
            $cursos = $trail.find('.trail-courses'),
            $curso = $cursos.find('.trail-course'),
            $close = $trail.find('.trail-header-btn-close');

        $this.removeClass('is-active');

        $close.addClass('is-active');

        $cursos.slick('unslick').queue(set_cursos($cursos));

        resumo_close($('.trail-course.is-active'));

        $curso.removeClass('slick-index-1 slick-index-2 slick-index-3 slick-index-4 slick-index-5 slick-index-6');
    });

    $document.on('click', '.js-trail-close', function () {
        var $this = $(this),
            $trail = $this.parents().filter('.trail'),
            $cursos = $trail.find('.trail-courses'),
            $open = $trail.find('.trail-header-btn-open');

        $this.removeClass('is-active');

        $open.addClass('is-active');

        resumo_close($('.trail-course.is-active'));

        set_slider($cursos);
    });

    set_testimonials($('.testimonials'));

});
