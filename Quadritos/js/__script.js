jQuery(document).ready(function( $ ) {


// Start upload preview image
 var $image__base = "https://quadritos.com.ar/wp-content/themes/Quadritos/img/frames/back.png";

 //$(".img-result").attr("src", $image__base);
 $(".image__action_edit").hide();
 $(".image__action_delete").hide();
 $(".cuadro").hide();

						var $uploadCrop,
						rawImg,
						imageId;


						function readFile(input) {
				 			if (input.files && input.files[0]) {
				              var reader = new FileReader();
					            reader.onload = function (e) {
									$('.img-result.active').data('value', e.target.result);
									var modal = $(".modal__trigger").data('modal');
									$('#'+modal).addClass('is-open');
									$('#'+modal).attr('data-type', $('.img-result.active').attr('data-type'));
									$('#'+modal).trigger('classChanged');
					            }
					            reader.readAsDataURL(input.files[0]);
					        }
					        else {
						        swal("Sorry - you're browser doesn't support the FileReader API");
						    }
						}

	 					// Change del input file base
	 					$('.file-img').on('change', function () {
							$('.img-result').removeClass('active');
							$('#' + $(this).attr('data-img')).addClass('active');
							
							if($('.img-base.reset').length == 0) {

							}
							readFile(this);
						});

	 					// Croppie General
						$uploadCrop = $('#modal-croppie').croppie({
							viewport: {
								width: 250,
								height: 250,
							},
							enableOrientation: true,
							enforceBoundary: true,
							enableExif: true
						});


	 					/* Class Changed modal True */
	 					$("#testModal").on( "classChanged", function () {

						rawImg = $('.img-result.active').data('value');

						// Croppie en Modal
						$uploadCrop.croppie('bind', {
				        		url: rawImg,
							    /*points: [77,469,280,739],*/
				        	}).then(function(){
				        		console.log('jQuery bind complete');
							   // console.log( $('.img-result.active').attr('data-deg'));
								$('#modal-croppie .cr-image').attr('style', $('.img-result.active').attr('data-crop'));



							   // Setea los valores del zoom
							//$('.cr-slider').on('change', function(){
								//$uploadCrop.croppie('setZoom', $('.img-result.active').attr('data-zoom'));

								if ($('.img-result.active').hasClass('reset') ||  ($('.img-result.active').attr('data-deg') != '0') ) {
									$uploadCrop.croppie('setZoom', $('.cr-slider').attr('min'));
									$('.img-result.active').attr('data-deg', '0');
								}
								else {
									$uploadCrop.croppie('setZoom', $('.img-result.active').attr('data-zoom'));
									//$uploadCrop.croppie('rotate', $('.img-result.active').attr('data-deg'));
								}


    						//});


				        	});


							// Setea los valores del zoom
							$('.cr-slider').on('change', function(){
								//$uploadCrop.croppie('setZoom', $('.img-result.active').attr('data-zoom'));
								//$uploadCrop.croppie('setZoom', $('.cr-slider').attr('min'));
    						});


							$('#cropImageBtn').attr('data-img', $('.img-result.active').attr('id'));

						});


	 					/* Boton de Crop */
						$('#cropImageBtn').on('click', function (ev) {

							$uploadCrop.croppie('result', {
								type: 'base64',
								format: 'jpeg',
								size: 'original'//{width: 300, height: 300} Resultado con imagen original
							}).then(function (res) {

								// Asigna a la imagen debajo
								$('.img-result.active').attr('src', res);

								// Guarda valores del crop y zoom
								$('.img-result.active').attr('data-crop', $('#modal-croppie .cr-image').attr('style'));
								$('.img-result.active').attr('data-overlay', $('#modal-croppie .cr-overlay').attr('style'));
								$('.img-result.active').attr('data-zoom', $('.cr-slider').attr('aria-valuenow'));

								//Guarda el giro
								//$('.img-result.active').attr('data-deg', $('.cr-slider').attr('aria-valuenow'));

								$('.modal__action_close').trigger('click');
							});



							// Setea los valores del zoom
							$('.cr-slider').one('change', function(){
        						$uploadCrop.croppie('setZoom', $('.img-result.active').attr('data-zoom'));
    						});

							//$('.img-result.active').attr('data-crop', $('#modal-croppie .cr-image').attr('style'));

							//$('.cr-slider').attr({'min':0.5000, 'max':1.5000});

							// Deshabilita el input file
							$('.file-img[data-img="'+ $(this).attr("data-img") + '"]').attr('disabled', 'disabled');

							// Imagen activa, luego de vacio
							$('#' + $(this).attr("data-img")).removeClass('reset');

							// Muestra edit y delete
							$('.image__action_edit[data-img="'+ $(this).attr("data-img") + '"]').show();
							$('.image__action_delete[data-img="'+ $(this).attr("data-img") + '"]').show();
							
							
							// Si es extra muestra el add more
							if ( $('#testModal').attr('data-type') == "img-extra" ) {
								$('.frame_add').show();
								
								$(".frame_extra").not(':eq(0)').removeClass('invisible');
								$('.image__action_edit_extra').show();
								$('.image__action_delete_extra').show();
							}


						});


						// Click del input file
						$('.file-img.file').on('click', function (ev) {
							$('.img-result').removeClass('active');
							$('#' + $(this).attr('data-img')).addClass('active');

							console.log('kion-da');
						});


	 					// Editar imagen
						$('.image__action_edit').on('click', function (ev) {
						   $('.img-result.active').removeClass('active');
						   $('#' + $(this).attr('data-img')).addClass('active');

						   $(".modal__trigger").trigger('click');
						});


	 					// Borrar imagen Base
	 					$('.image__action_delete.image__action_delete_base').on('click', function (ev) {
							$('.file-img[data-img="'+ $(this).attr("data-img") + '"]').removeAttr('disabled');
							
							$(".img-result.active").addClass('reset');
							
							$('#' + $(this).attr("data-img") ).attr("src", $image__base);
							

							$('.image__action_edit[data-img="'+ $(this).attr("data-img") + '"]').hide();
							$('.image__action_delete[data-img="'+ $(this).attr("data-img") + '"]').hide();
							
							console.log($('#' + $(this).attr("data-img") ));
							console.log($('.frame_extra').length);
							
							// Si hay extras
							if($('.frame_extra').length > 1) {	
								
								// Primero 
								if($(this).attr('data-img') == 'img-output-0') {
									console.log('primero');
									
									// asigna los valores del id:1 al 0
									$('#img-output-0').data('value', $('#img-output-1').data('value'));
									$('#img-output-0').attr('src', $('#img-output-1').attr('src'));
									$('#img-output-0').attr('data-crop', $('#img-output-1').attr('data-crop'));
									$('#img-output-0').attr('data-overlay', $('#img-output-1').attr('data-ovelay'));
									$('#img-output-0').attr('data-zoom', $('#img-output-1').attr('data-zoom'));
									
									$('#img-output-0').removeClass('reset');
									$('#img-output-0').removeClass('active');
									$('.file-img[data-img="img-output-0"]').attr('disabled', 'disabled');

									
									$('.image__action_edit[data-img="img-output-0"]').show();
									$('.image__action_delete[data-img="img-output-0"]').show();
									
									// asigna los valores del id:2 al 1
									$('#img-output-1').data('value', $('#img-output-2').data('value'));
									$('#img-output-1').attr('src', $('#img-output-2').attr('src'));
									$('#img-output-1').attr('data-crop', $('#img-output-2').attr('data-crop'));
									$('#img-output-1').attr('data-overlay', $('#img-output-2').attr('data-ovelay'));
									$('#img-output-1').attr('data-zoom', $('#img-output-2').attr('data-zoom'));
									
									$('#img-output-1').removeClass('reset');
									$('#img-output-1').removeClass('active');
									$('.file-img[data-img="img-output-1"]').attr('disabled', 'disabled');

									
									$('.image__action_edit[data-img="img-output-1"]').show();
									$('.image__action_delete[data-img="img-output-1"]').show();
									
									// asigna los valores del extra frame 0 al 2 del base
									$('#img-output-2').data('value', $('.frame_extra:eq(1) img').data('value'));
									$('#img-output-2').attr('src', $('.frame_extra:eq(1) img').attr('src'));
									$('#img-output-2').attr('data-crop', $('.frame_extra:eq(1) img').attr('data-crop'));
									$('#img-output-2').attr('data-overlay', $('.frame_extra:eq(1) img').attr('data-ovelay'));
									$('#img-output-2').attr('data-zoom', $('.frame_extra:eq(1) img').attr('data-zoom'));
									
									$('#img-output-2').removeClass('reset');
									$('#img-output-2').removeClass('active');
									$('.file-img[data-img="img-output-2"]').attr('disabled', 'disabled');

									
									$('.image__action_edit[data-img="img-output-2"]').show();
									$('.image__action_delete[data-img="img-output-2"]').show();
									
									// Delete first extra
									$('.frame_extra:eq(1)').remove();


								}
								
								// Segundo
								if($(this).attr('data-img') == 'img-output-1') {
									// asigna los valores del id:2 al 1
									$('#img-output-1').data('value', $('#img-output-2').data('value'));
									$('#img-output-1').attr('src', $('#img-output-2').attr('src'));
									$('#img-output-1').attr('data-crop', $('#img-output-2').attr('data-crop'));
									$('#img-output-1').attr('data-overlay', $('#img-output-2').attr('data-ovelay'));
									$('#img-output-1').attr('data-zoom', $('#img-output-2').attr('data-zoom'));
									
									$('#img-output-1').removeClass('reset');
									$('#img-output-1').removeClass('active');
									$('.file-img[data-img="img-output-1"]').attr('disabled', 'disabled');

									
									$('.image__action_edit[data-img="img-output-1"]').show();
									$('.image__action_delete[data-img="img-output-1"]').show();
									
									// asigna los valores del extra frame 0 al 2 del base
									$('#img-output-2').data('value', $('.frame_extra:eq(1) img').data('value'));
									$('#img-output-2').attr('src', $('.frame_extra:eq(1) img').attr('src'));
									$('#img-output-2').attr('data-crop', $('.frame_extra:eq(1) img').attr('data-crop'));
									$('#img-output-2').attr('data-overlay', $('.frame_extra:eq(1) img').attr('data-ovelay'));
									$('#img-output-2').attr('data-zoom', $('.frame_extra:eq(1) img').attr('data-zoom'));
									
									$('#img-output-2').removeClass('reset');
									$('#img-output-2').removeClass('active');
									$('.file-img[data-img="img-output-2"]').attr('disabled', 'disabled');

									
									$('.image__action_edit[data-img="img-output-2"]').show();
									$('.image__action_delete[data-img="img-output-2"]').show();
									
									// Delete first extra
									$('.frame_extra:eq(1)').remove();

								}
								
								// Tercero
								if($(this).attr('data-img') == 'img-output-2') {
									// asigna los valores del extra frame 0 al 2 del base
									$('#img-output-2').data('value', $('.frame_extra:eq(1) img').data('value'));
									$('#img-output-2').attr('src', $('.frame_extra:eq(1) img').attr('src'));
									$('#img-output-2').attr('data-crop', $('.frame_extra:eq(1) img').attr('data-crop'));
									$('#img-output-2').attr('data-overlay', $('.frame_extra:eq(1) img').attr('data-ovelay'));
									$('#img-output-2').attr('data-zoom', $('.frame_extra:eq(1) img').attr('data-zoom'));
									
									$('#img-output-2').removeClass('reset');
									$('#img-output-2').removeClass('active');
									$('.file-img[data-img="img-output-2"]').attr('disabled', 'disabled');

									
									$('.image__action_edit[data-img="img-output-2"]').show();
									$('.image__action_delete[data-img="img-output-2"]').show();
									
									// Delete first extra
									$('.frame_extra:eq(1)').remove();
								}
								
							}
						});


	 					// Rotate
	 					$count__deg = 0;

						$('.image__action_rotate').on('click', function(ev) {
							    console.log('click');
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

						$(".frame_add").on("click", function(){
							// Si las 3 imagenes base estan cargadas
							
							console.log($('.img-base.reset').length);
							
  							if($('.img-base.reset').length == 0) {

								// Index del último
								$last_index = $('.frame_extra').length - 1;

								// Clona el primero
								$(".frame_extra:eq(0)").clone().insertBefore($(this));
								$last_index_id = parseInt($('.frame_extra:eq(' + $last_index + ') img').attr('id').slice(-1)) + 1;

								console.log('corte del ultimo' + $last_index_id);


								// Configure new clone
								$last_index = $('.frame_extra').length - 1;
								$('.frame_extra:eq(' + $last_index + ')').attr('data-img', 'img-output-extra-' + $last_index_id);
								$('.frame_extra:eq(' + $last_index + ') img').attr('id', 'img-output-extra-' + $last_index_id);
								$('.frame_extra:eq(' + $last_index + ') a').attr('data-img', 'img-output-extra-' + $last_index_id);
								$('.frame_extra:eq(' + $last_index + ') input').attr('data-img', 'img-output-extra-' + $last_index_id);

								
								// Click del input file
								//$('.frame_extra:eq(' + $last_index + ') input').on('click', function (ev) {
								//	$('.img-result').removeClass('active');
								//	$('#' + $(this).attr('data-img')).addClass('active');
								//});

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
								   $('#' + $(this).attr('data-img')).addClass('active');

								   $(".modal__trigger").trigger('click');
								});
								
								// edit extra
								$('.image__action_delete_extra').on('click', function (ev) {
								   $('.img-result.active').removeClass('active');
								   $('.frame_extra[data-img="'+ $(this).attr("data-img") + '"]').remove();
								});


							}
						});



	// Redirect luego de enviar el formulario
	document.addEventListener( 'wpcf7mailsent', function( event ) {
	  location = 'https://quadritos.com.ar/paso-3/?regalo='+getUrlParameter('regalo');
	}, false );

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
