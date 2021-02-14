<?php
get_header();
?>

<!-- NOTE Paso 1 -->
<div id="paso-1" class="container container_gray">
	<div class="wrapper wrapper_sm air air_horz">
		<span class="steper">1/4</span>
		<h3 class="stepTitle primary">
			¿Para quién es?
		</h3>
		<div class="card__container">
			<div class="card card_md">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/illustrations/illus-1.png" alt="Ilustración de mujer colgando sus Quadritos">
				<span class="card__text">
					<span class="title primary">Para mí</span>
					<p class="text">Estoy decorando mis paredes.</p>
				</span>
			</div>
			<div class="card card_md">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/illustrations/illus-2.png" alt="Ilustración de mujer colgando sus Quadritos">
				<span class="card__text">
					<span class="title primary">Para otra persona</span>
					<p class="text">Quiero hacer un regalo.</p>
				</span>
			</div>
		</div>
	</div>
</div>

<!-- NOTE Paso 2 -->
<div id="paso-2" class="container container_gray">
	<div class="wrapper wrapper_sm air air_horz">
		<span class="steper">2/4</span>
		<h3 class="stepTitle primary">
			Contanos un poco de vos
		</h3>
		<div class="card__container">
			<div class="card card_desktop">
				<?php echo do_shortcode('[contact-form-7 id="401" title="Quadritos form" html_class="form"]'); ?>
			</div>
		</div>
	</div>
</div>

<!-- NOTE Paso 3 -->
<div id="paso-3" class="container container_gray container_alt">
	<div class="wrapper wrapper_sm air air_horz">
		<span class="steper">3/4</span>
		<h3 class="stepTitle primary">
			Elegí tus fotos
		</h3>
		<p class="text">
			Recordá que el mínimo son 3.
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

	<div id="testModal" class="modal__container style_dubai" data-type="">
    <div class="modal">
      <div class="modal__header">
        <span class="modal__action modal__action_close"><i class="icon-close"></i></span>
        <h4>Ajustes</h4>
				<button type="button" id="cropImageBtn" class="modal__action modal__action_ok" data-img=""><i class="icon-ok"></i></button>
      </div>
      <div class="modal__body">
				<div class="modal__content">
        	<div id="modal-croppie" class="center-block">
					<button type="button" class="image__action image__action_rotate" data-img="img-output-0"><i class="icon-rotate"></i></button>
			</div>
			<p>Podés girar, hacer zoom o arrastrar la imagen para encuadrar</p>
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
					<p>3 cuadros x $2490</p>
				</div>
			</div>
			<div class="fixedActions__col">
				<a href="<?php echo wc_get_checkout_url().'?regalo='.$regalo; ?>" class="cta cta_toChekout">Confirmar</a>
			</div>
		</div>
	</div>
</div>

<!-- NOTE Paso 4 -->
<div class="checkout_results">
</div>

<?php
get_footer();
