<?php
get_header();
$regalo = $_GET['regalo'];

$price_base = round(wc_get_product( 19 )->get_price(), 2);
$price_extra = round(wc_get_product( 48 )->get_price(), 2);

?>

<div class="container container_gray container_alt">
	<div class="wrapper wrapper_sm air air_horz">
		<span class="steper">3/4</span>
		<h3 class="stepTitle primary">
			Elegí tus fotos
		</h3>
		<p class="text">
			Recordá que el mínimo son 3 y que podés elegir el diseño del marco.
		</p>
		<div class="selector">
			<div class="selector__option is-selected" data-style="dubai" data-marco="1">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/frames/thumb_dubai.png" alt="Marco Dubai">
				<span>Dubai</span>
			</div>
			<div class="selector__option" data-style="hawaii" data-marco="2">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/frames/thumb_hawaii.png" alt="Marco Hawaii">
				<span>Hawaii</span>
			</div>
			<div class="selector__option" data-style="london" data-marco="3">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/frames/thumb_london.png" alt="Marco London">
				<span>London</span>
			</div>
			<div class="selector__option" data-style="tokyo" data-marco="4">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/frames/thumb_tokyo.png" alt="Marco Tokyo">
				<span>Tokyo</span>
			</div>
		</div>
	</div>
	<div class="frames">
		<div class="frames__container">
			<!-- 3 Frame Base -->
			<div class="frame frame_base" data-img="img-output-0">
				<label>
					<figure>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/frames/back.png" data-type="img-base" class="img-result img-base img-responsive img-thumbnail reset" id="img-output-0" data-crop="" data-zoom="" data-overlay="" data-deg="0" data-width="" data-height=""/>
						<a href="#" class="image__action image__action_edit" data-img="img-output-0"><i class="icon-edit"></i></a>
						<a href="#" class="image__action image__action_delete image__action_delete_base" data-img="img-output-0"><i class="icon-delete"></i></a>
					</figure>
					<input type="file" class="file-img file center-block" name="file_photo" data-img="img-output-0" accept="image/x-png,image/jpeg" />
				</label>
			</div>
			<div class="frame frame_base" data-img="img-output-1">
				<label>
					<figure>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/frames/back.png" data-type="img-base" class="img-result img-base img-responsive img-thumbnail reset" id="img-output-1" />
						<a href="#" class="image__action image__action_edit" data-img="img-output-1"><i class="icon-edit"></i></a>
						<a href="#" class="image__action image__action_delete image__action_delete_base" data-img="img-output-1"><i class="icon-delete"></i></a>
					</figure>
					<input type="file" class="file-img file center-block" name="file_photo" data-img="img-output-1" accept="image/x-png,image/jpeg" />
				</label>
			</div>
			<div class="frame frame_base" data-img="img-output-2">
				<label>
					<figure>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/frames/back.png" data-type="img-base" class="img-result img-base img-responsive img-thumbnail reset" id="img-output-2" />
						<a href="#" class="image__action image__action_edit" data-img="img-output-2"><i class="icon-edit"></i></a>
						<a href="#" class="image__action image__action_delete image__action_delete_base" data-img="img-output-2"><i class="icon-delete"></i></a>
					</figure>
					<input type="file" class="file-img file center-block" name="file_photo" data-img="img-output-2" accept="image/x-png,image/jpeg"/>
				</label>
			</div>

			<div class="frame frame_add">
				<p><span>+</span> Sumá otro cuadro<br>por $690</p>
			</div>

		</div>
		<a href="#" class="modal__trigger" data-modal="testModal">test modal</a>
	</div>

	<div id="testModal" class="modal__container" data-type="">
    <div class="modal">
      <div class="modal__header">
        <span class="modal__action modal__action_close quality__normal"><i class="icon-close"></i></span>
        <h4 class="quality__normal">Ajustes</h4>
        <h4 class="quality__low is-hide">Esta imagen es de baja calidad</h4>
				<button type="button" id="cropImageBtn" class="modal__action modal__action_ok quality__normal" data-img=""><i class="icon-ok"></i></button>
      </div>
      <div class="modal__body">
				<div class="modal__content">
        	<div id="modal-croppie" class="center-block">
						<button type="button" class="image__action image__action_rotate quality__normal" data-img="img-output-0"><i class="icon-rotate"></i></button>
					</div>
					<p class="quality__normal">Podés girar, hacer zoom o arrastrar la imagen para encuadrar</p>
					<p class="quality__low is-hide">
		        Probablemente quede borrosa en el cuadro.<br>
		        Te recomendamos usar otra imagen de mayor calidad, por lo menos de 800px x 800px.
		      </p>
      	</div>
				<div class="modal__buttons quality__low is-hide">
					<a href="#" class="cta cta_icon cta_remove"><i class="icon-delete"></i> Quitar foto</a>
					<a href="#" class="cta cta_ok">Continuar</a>
				</div>
      </div>
    </div>
	</div>

	<div id="qualityAlert" class="modal__container">
    <div class="modal">
      <div class="modal__header">
        <h4>Esta imagen es de baja calidad</h4>
      </div>
      <div class="modal__body">
        <div class="modal__content">
          <div class="modal__preview">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/placeholder.png" alt="" class="bgImage">
          </div>
          <p>
            Probablemente quede borrosa en el cuadro.<br>
            Te recomendamos usar otra imagen de mayor calidad, por lo menos de 800px x 800px.
          </p>
        </div>
        <div class="modal__buttons">
          <a href="#" class="cta cta_icon"><i class="icon-delete"></i> Quitar foto</a>
          <a href="#" class="cta modal__action_ok">Continuar</a>
        </div>
      </div>
    </div>
  </div>

	<div class="fixedActions">
		<div class="fixedActions__wrapper wrapper wrapper_sm">
			<div class="fixedActions__col">
				<div class="fixedActions__order">
					<span>Tu pedido</span>
					<p><span id="count__quadrito" data-base="<?php echo $price_base; ?>" data-extra="<?php echo $price_extra; ?>">0</span> cuadros x $<span id="total__quadrito">0</span></p>
				</div>
			</div>
			<div class="fixedActions__col">
				<a href="<?php //echo wc_get_checkout_url().'?regalo='.$regalo; ?>" class="cta cta_toChekout cta_toChekout_preparar is-disabled">Confirmar</a>
			</div>
		</div>
	</div>

	<!-- Proceso de carga conla clase .is-shown se muestra-->
	<div class="loader air">
		<img src="<?php echo get_stylesheet_directory_uri() ?>/img/illustrations/loading.gif" alt="Estamos trabajando en ello">
		<p>Tus imágenes se estan subiendo...</p>
        <span>Esto puede demorar un poco si tus imágenes son muy grandes y tu conexión es lenta. Por favor aguardá unos instantes.</span>
	</div>

	<div class="checkout_results">
	</div>
</div>


<?php
get_footer();
