jQuery(document).ready(function ($) {
    // Start upload preview image
    let $image__base = "https://quadritos.com.ar/wp-content/themes/Quadritos/img/frames/back.png";
    let price_base = round($('#count__quadrito').attr('data-base'), 2);
    let price_extra = round($('#count__quadrito').attr('data-extra'), 2);

    $(".image__action_edit").hide();
    $(".image__action_delete").hide();
    $(".cuadro").hide();

    $('#count__quadrito').text('3');
    $('#total__quadrito').text(3 * price_base);

    // Si vuelve el history
    window.onhashchange = function () {

        $('#testModal').removeClass('is-open');
        $('.image__action_delete_base').click();
        $('.image__action_delete_extra').click();

    }

    var $uploadCrop,
        rawImg,
        imageId;

    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.img-result.active').data('value', e.target.result);

                console.log('leyendop.....')
                //Test Size
                let image_test = new Image();

                image_test.src = e.target.result;

                image_test.onload = function () {
                    //console.log(image_test.height + ' / ' + image_test.width);
                    
                    if (image_test.width < 1000 || image_test.height < 1000) {
                            $('.cr-slider-wrap').hide();
                            $('p.quality__normal').addClass('is-opacity');
                    }
                    
                    if (image_test.width < 800 || image_test.height < 800) {
                        $('.quality__normal').addClass('is-hide');
                        $('.quality__low').removeClass('is-hide');
                        $('.cr-slider-wrap').hide();
                    } else {
                        $('.quality__normal').removeClass('is-hide');
                        $('.quality__low').addClass('is-hide');
                        
                        if (image_test.width >= 1000 && image_test.height >= 1000) {
                            $('p.quality__normal').removeClass('is-opacity');
                            $('.cr-slider-wrap').show();
                        }
                        
                    }
                };

                var modal = $(".modal__trigger").data('modal');
                $('#' + modal).addClass('is-open');
                $('#' + modal).attr('data-type', $('.img-result.active').attr('data-type'));
                $('#' + modal).trigger('classChanged');
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            swal("Sorry - you're browser doesn't support the FileReader API");
        }
    }


    // Remove Frame
    function removeFrame(ob) {

        $('.frame_extra.invisible').remove();

        // si ya hay cargados extras
        if ($('.frame:not(.frame_add)').length > 3) {
            $('.frame[data-img="' + $(ob).attr("data-img") + '"]').remove();
        } else {
            // solo para las 3 primeras queda como al inicio
            $('.file-img[data-img="' + $(ob).attr("data-img") + '"]').removeAttr('disabled');
            $('#' + $(ob).attr("data-img")).addClass('reset');
            $('#' + $(ob).attr("data-img")).attr("src", $image__base);

            $('.image__action_edit[data-img="' + $(ob).attr("data-img") + '"]').hide();
            $('.image__action_delete[data-img="' + $(ob).attr("data-img") + '"]').hide()

            // Control de minimo 3
            $('.cta_toChekout_preparar').removeClass('is-disabled');
            $('.cta_toChekout_preparar').addClass('is-disabled');

        }

        console.log($('.frame:not(.frame_add)').length);

    }


    function add_more(ob) {
        id_num = Math.floor((Math.random() * 1000000) + 1);

        $('<div class="frame frame_extra invisible" data-img="img-output-extra-' + id_num + '"><label><figure><img src="" data-type="img-extra" class="img-result img-extra img-responsive img-thumbnail" id="img-output-extra-' + id_num + '" /><a href="#" class="image__action image__action_edit image__action_edit_extra" data-img="img-output-extra-' + id_num + '"><i class="icon-edit"></i></a><a href="#" class="image__action image__action_delete image__action_delete_extra" data-img="img-output-extra-' + id_num + '"><i class="icon-delete"></i></a></figure><input type="file" class="file-img-extra file-img file center-block" name="file_photo" data-img="img-output-extra-' + id_num + '" accept="image/x-png,image/jpeg"/></label></div>').insertBefore($(ob));
    }



    // Change del input file base
    $('.file-img').on('change', function () {
        $('.img-result').removeClass('active');
        $('#' + $(this).attr('data-img')).addClass('active');
        readFile(this);
    });


    $uploadCrop = $('#modal-croppie').croppie({
        viewport: {
            width: 227,
            height: 227,
            type: 'square'
        },
        enableOrientation: true,
        enforceBoundary: true,
        enableExif: true
    });


    /* Class Changed modal True */
    $("#testModal").on("classChanged", function () {

        rawImg = $('.img-result.active').data('value');

        // Croppie en Modal
        $uploadCrop.croppie('bind', {
            url: rawImg,
            /*points: [77,469,280,739],*/
        }).then(function () {
            console.log('jQuery bind complete');
            $('#modal-croppie .cr-image').attr('style', $('.img-result.active').attr('data-crop'));

            // Cover Boundary Style
            if (!$(".cover-cr-boundary").length) {
                $(".cr-boundary").wrap("<div class='cover-cr-boundary'></div>");
            }

            if ($('.img-result.active').hasClass('reset') || ($('.img-result.active').attr('data-deg') != '0')) {
                $uploadCrop.croppie('setZoom', $('.cr-slider').attr('min'));
                $('.img-result.active').attr('data-deg', '0');
            } else {
                $uploadCrop.croppie('setZoom', $('.img-result.active').attr('data-zoom'));

            }

        });


        // Setea los valores del zoom
        $('.cr-slider').on('change', function () {

        });


        $('#cropImageBtn').attr('data-img', $('.img-result.active').attr('id'));



    });


    /* Boton de Crop */
    $('#cropImageBtn').on('click', function (ev) {

        let realWidth = 2500;
        let realHeight = 2500;

        if ($('canvas.cr-image').attr('width') <= $('canvas.cr-image').attr('height')) {
            realWidth = $('canvas.cr-image').attr('width');
            realHeight = $('canvas.cr-image').attr('width');
        }

        if ($('canvas.cr-image').attr('width') > $('canvas.cr-image').attr('height')) {
            realWidth = $('canvas.cr-image').attr('height');
            realHeight = $('canvas.cr-image').attr('height');
        }

        if (($('canvas.cr-image').attr('width') >= 2500) && ($('canvas.cr-image').attr('height') >= 2500)) {
            realWidth = 2500;
            realHeight = 2500;
        }



        console.log('canvas =' + $('canvas.cr-image').attr('width') + '/' + $('canvas.cr-image').attr('height'));

        $uploadCrop.croppie('result', {
            type: 'base64',
            format: 'jpeg',
            //size: 'original',
            size: {
                width: realWidth,
                height: realHeight
            },
            quality: 0.8
            //{width: 300, height: 300} Resultado con imagen original
        }).then(function (res) {

            // Asigna a la imagen debajo
            $('.img-result.active').attr('src', res);
            console.log($('.img-result.active').attr('id'));

            type_frame = $('.selector__option.is-selected').attr('data-style');

            // Agrega estilo de frame
            $('.frame[data-img="' + $('.img-result.active').attr('id') + '"]').addClass('frame_' + type_frame);
            //$('.selector__option.is-selected').attr('data-style');

            // Guarda valores del crop y zoom
            $('.img-result.active').attr('data-crop', $('#modal-croppie .cr-image').attr('style'));
            $('.img-result.active').attr('data-overlay', $('#modal-croppie .cr-overlay').attr('style'));
            $('.img-result.active').attr('data-zoom', $('.cr-slider').attr('aria-valuenow'));

            $('.frame_extra').removeClass('invisible');

            $('.modal__action_close').trigger('click');

            // Control de minimo 3
            if ($('.reset').length === 0) {
                $('.cta_toChekout_preparar').removeClass('is-disabled');
            } else {
                $('.cta_toChekout_preparar').removeClass('is-disabled');
                $('.cta_toChekout_preparar').addClass('is-disabled');
            }



        });



        // Setea los valores del zoom
        $('.cr-slider').one('change', function () {
            $uploadCrop.croppie('setZoom', $('.img-result.active').attr('data-zoom'));
        });


        // Deshabilita el input file
        $('.file-img[data-img="' + $(this).attr("data-img") + '"]').attr('disabled', 'disabled');

        // Imagen activa, luego de vacio
        $('#' + $(this).attr("data-img")).removeClass('reset');


        // Muestra edit y delete
        $('.image__action_edit[data-img="' + $(this).attr("data-img") + '"]').show();
        $('.image__action_delete[data-img="' + $(this).attr("data-img") + '"]').show();


        // Si es extra muestra el add more
        if ($('#testModal').attr('data-type') == "img-extra") {
            $('.frame_add').show();

            $(".frame_extra").not(':eq(0)').removeClass('invisible');
            $('.image__action_edit_extra').show();
            $('.image__action_delete_extra').show();
        }



        // Count quadrito
        let total = getTotalPrice(
            price_base,
            price_extra,
            $('.frame .img-result').not('.reset').length);

        $('#count__quadrito').text('3');
        if ($('.frame .img-result').not('.reset').length > 3) {
            $('#count__quadrito').text($('.frame .img-result').not('.reset').length);
        }
        $('#total__quadrito').text(total);


    });


    // Click del input file
    $('.file-img.file').on('click', function (ev) {
        $(this).val('');
        $('.img-result').removeClass('active');
        $('#' + $(this).attr('data-img')).addClass('active');
        $(this).attr('value', '');
    });


    // Editar imagen
    $('.image__action_edit').on('click', function (ev) {
        ev.preventDefault();
        $('.img-result.active').removeClass('active');
        $('#' + $(this).attr('data-img')).addClass('active');

        $(".modal__trigger").trigger('click');
    });


    // Borrar imagen base
    $('.frame_base .image__action_delete').on('click', function (ev) {
        ev.preventDefault();
        removeFrame(this);

        // Count quadrito
        $('#count__quadrito').text('3');
        if ($('.frame .img-result').not('.reset').length > 3) {
            $('#count__quadrito').text($('.frame .img-result').not('.reset').length);
        }
        $('#total__quadrito').text(
            getTotalPrice(price_base, price_extra, $('.frame .img-result').not('.reset').length));
    });


    // Rotate
    $count__deg = 0;

    $('.image__action_rotate').on('click', function (ev) {
        $uploadCrop.croppie('rotate', -90);

        $count__deg += -90;
        $('.img-result.active').attr('data-deg', $count__deg);

        $('.img-result.active').addClass('reset');


        if ($count__deg == -360) {
            $count__deg = 0;
            $('.img-result.active').attr('data-deg', '0');
        }

    });


    // Click Add More

    $last_index = 0;

    $(".frame_add").on("click", function () {

        // Si las 3 imagenes base estan cargadas
        if ($('.reset').length === 0) {

            $('.frame_extra.invisible').remove();

            // Clona
            add_more(this);


            // Index del último
            $last_index = $('.frame_extra').length - 1;


            $('.frame_extra:eq(' + $last_index + ') input').trigger('click');


            // Change del input file extra
            $('.file-img-extra').on('change', function () {
                $('.img-result').removeClass('active');
                $('#' + $(this).attr('data-img')).addClass('active');

                console.log('cambio trigger' + $('.img-extra').length + $(this).attr('data-img'));
                readFile(this);
            });

            // edit extra
            $('.image__action_edit_extra').on('click', function (ev) {
                $('.img-result.active').removeClass('active');

                $(".modal__trigger").trigger('click');
            });


            // Borrar imagen extra
            $('.frame_extra .image__action_delete').on('click', function (ev) {
                ev.preventDefault();
                removeFrame(this);

                // Count quadrito
                $('#count__quadrito').text('3');
                if ($('.frame .img-result').not('.reset').length > 3) {
                    $('#count__quadrito').text($('.frame .img-result').not('.reset').length);
                }

                $('#total__quadrito').text(
                    getTotalPrice(price_base, price_extra, $('.frame .img-result').not('.reset').length));


            });



        }

    });


    // Binding Remove All after Ajax
    $(document).on("click", '#remove__all', function (event) {
        event.preventDefault();

        $.ajax({
            url: ajax_vars.ajax_url,
            type: 'post',
            data: {
                action: 'quadritos_remove_cart'
            },
            beforeSend: function () {
                console.log('send action delete cart');
            },
            success: function (resultado) {
                console.log('se ha eliminado' + resultado);
                /*$('.modal__action_close').click();
                $('.image__action_delete_base').click();
                $('.image__action_delete_extra').click();*/

            }

        });

        window.location.href = window.location.href = "https://quadritos.com.ar/paso-3/?regalo=" + getUrlParameter('regalo') + "&nombre=" + getUrlParameter('nombre') + "&email=" + getUrlParameter('email');

    });



    // Quality
    $('.quality__low .cta_remove').on('click', function (ev) {
        ev.preventDefault();
        $('.modal__action_close').trigger('click');
    });

    $('.quality__low .cta_ok').on('click', function (ev) {
        ev.preventDefault();
        $('.quality__low').addClass('is-hide');
        $('.quality__normal').removeClass('is-hide');
        $('.cr-slider-wrap').show();
    });


    var wpcf7Elm = document.querySelector('#wpcf7-f401-o1');

    // Redirect luego de enviar el formulario
    if (wpcf7Elm) {
        wpcf7Elm.addEventListener('wpcf7mailsent', function (event) {

            $('.form__group').addClass('is-label-down');
            let inputs = event.detail.inputs;

            location = 'https://quadritos.com.ar/paso-3/?regalo=' + getUrlParameter('regalo') + '&nombre=' + inputs[0].value + '&email=' + inputs[1].value;
        }, false);
    } else if (document.querySelector('.wpcf7')) {
        document.querySelector('.wpcf7').addEventListener('wpcf7mailsent', function () {
            $('.form__group').addClass('is-label-down');
        })
    }



    // Checkout replace
    $('#additional_name').attr('value', $('.temp-name').html());
    $('#additional_email').attr('value', $('.temp-email').html());
    $('#additional_images').html($('.temp-images').html());
    $('#additional_regalo').attr('value', $('.temp-regalo').html());
    $('#additional_relation').attr('value', $('.temp-relation').html());


});



// Lee prametros en la URL
function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};


function getTotalPrice(price_base, price_extra, count) {
    let pbase = 3 * price_base;
    let pextra = 0;

    if (count > 3) {
        //pbase = 3 * price_base;
        pextra = price_extra * (count - 3);
    }

    let total = pbase + pextra;
    total = round(total, 2);

    return total;
}

function round(value, decimals) {
    return Number(Math.round(value + 'e' + decimals) + 'e-' + decimals);
}