(function($){

  function modalTrigger() {
    $('.modal__trigger').on('click', function(e) {
      e.preventDefault();
      var modal = $(this).data('modal');

      $('#'+modal).addClass('is-open');
      $('#'+modal).trigger('classChanged');
    })
    $('.modal__action_close').on('click', function() {
      $('.modal__container').removeClass('is-open');
    })
    $('.modal__action_ok').on('click', function() {
      var id = $('.modal__container.is-open').attr('id');

      $('.modal__container').removeClass('is-open');

      if($(this).parent().parent().find('#billing_address_1') && id == 'addressForm'){
        var address = $('#billing_address_1').val();

        if(address !== ''){
          $('#addressCard .card__value').addClass('is-loaded');
          $('#addressCard .card__value .value').html(address);
        } else {
          $('#addressCard .card__value').removeClass('is-loaded');
        }
      }

      if($(this).parent().parent().find('.wc_payment_method input.input-radio[name=payment_method]') && id == 'paymentForm'){
        var payment = $('.wc_payment_method input.input-radio[name=payment_method]:checked').attr('id'),
            paymentLabel = $('.wc_payment_method>label[for="'+payment+'"]').text();

        if(payment !== ''){
          $('#paymentCard .card__value').addClass('is-loaded');
          $('#paymentCard .card__value .value').html(paymentLabel);
        } else {
          $('#paymentCard .card__value').removeClass('is-loaded');
        }
      }
    })
  }
  
  var $links_send = "";
  
  relation_now = Date.now();

	$(document).on('click','.cta_toChekout_preparar',function(e){
	    
	    relation_now = Date.now();
	    
	    //relation_now = getRandomInt(0, 99999);
	    
	 	e.preventDefault();
	 	
	 	console.log($(this).hasClass( "is-disabled" ));
	 	
	 	
	 	// Remove temporal
	 	$('.frame_extra.invisible').remove();
	 	
	 	
	 	console.log('ok clickeado cantidad ' + $('.frame:not(.frame_add)').length);

	 	console.log('ok clickeado marco ' + $('.selector__option.is-selected').attr('data-marco'));
	 	
	 	console.log('reset ' + $('.reset').length)
	 	
	 	if (!($(this).hasClass( "is-disabled"))) {

    	 	// Si hay 3 agregados como minimo
    	 	if($('.reset').length === 0) {
    	 	    
    	 	    $(this).addClass('is_active');
    	 	    
    	 	    $('.cta_toChekout_preparar').text('Subiendo...');
    	 	 
    	 	 $('.loader').removeClass('is-shown');
    	 	 if (!($('.loader').hasClass('is-shown'))) {
				    	$('.loader').addClass('is-shown');
				}
    	 	
    	 	// Send images
    	 	
    	 	
    	 	let images_array = [];
    	 	
    	 	$('.frame:not(.frame_add) .img-result').each(function() {
    		    image_send = $(this).attr('src');
    		    saveImage(image_send, relation_now);
    		});

    		
    	 	}
    
		
	 	}

	});
	
	var counter = 0;
	
	
	
	
	
	function saveImage(parImage, parRelation) {
	    $.ajax({
			url : ajax_vars.ajax_url,
			type: 'post',
			data: {
				action : 'quadritos_save_image',
				id_post: '444',
				image: parImage,
				title: getUrlParameter('nombre'),
				relation: parRelation
			},
			beforeSend: function(){
				console.log('enviando...');
			},
			success: function(resultado){
			    
			    console.log(resultado);
			    
			    counter = counter + 1;
				$links_send = $links_send + resultado.slice(0, -1) + ',';
		
				$("body" ).data( "links", $links_send );
				console.log('resultado ' + $("body" ).data( "links"));
				
			    $("body").attr('data-links', $links_send);
				
				console.log(counter);
				
				if(counter == $('.frame:not(.frame_add)').length ) {
				    
				    $links_send = $links_send.slice(0, -1);
				    
				    console.log('formateado - ' + $links_send);
				    
				    $('.cta_toChekout_preparar').text('Se subieron...');
				    
				    sendParams(relation_now);
				}
			
			}

		});
	}
	
	
	 	
	function sendParams(parRelation) {
	
	cantidad_quadritos = $('.frame:not(.frame_add)').length;
	marco_quadritos = $('.selector__option.is-selected').attr('data-marco');
	
	console.log(getUrlParameter('nombre'));
	
	
	console.log("En params" + $("body" ).data( "links"));
	
	    	// Ajax add to cart
		$.ajax({
			url : ajax_vars.ajax_url,
			type: 'post',
			data: {
				action : 'quadritos_enviar_params',
				id_post: '444',
				marco: marco_quadritos,
				regalo: getUrlParameter('regalo'),
				cantidad: cantidad_quadritos,
				images: $links_send,
				nombre_inicial: getUrlParameter('nombre'),
				email_inicial: getUrlParameter('email'),
				relation: parRelation
			},
			beforeSend: function(){
				console.log('enviando');
			},
			success: function(resultado){
				 console.log('llego lo enviado: ' + resultado);

			     //$(".checkout_results").html(resultado);
			     modalTrigger();
			     
			     window.location.href = "https://quadritos.com.ar/checkout/?regalo="+ getUrlParameter('regalo') + "&nombre=" + getUrlParameter('nombre') + "&email=" + getUrlParameter('email');
			      

			}

		});
	}
	
	
	
function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min) + min); //The maximum is exclusive and the minimum is inclusive
}

})(jQuery);
