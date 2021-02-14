<?php
get_header();
$regalo = $_GET['regalo'];
?>

<div class="container container_gray container_alt">
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

	<div id="testModal" class="modal__container" data-type="">
    <div class="modal">
      <div class="modal__header">
        <span class="modal__action modal__action_close"><i class="icon-close"></i></span>
        <h4>Titulo del modal</h4>
				<button type="button" id="cropImageBtn" class="modal__action modal__action_ok" data-img=""><i class="icon-ok"></i></button>
      </div>
      <div class="modal__body">
				<div class="modal__content">
        	<div id="modal-croppie" class="center-block"></div>
      	</div>
				<div class="modal__buttons">
					<button type="button" class="image__action image__action_rotate" data-img="img-output-0"><i class="icon-rotate"></i></button>
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

<?php
get_footer();
