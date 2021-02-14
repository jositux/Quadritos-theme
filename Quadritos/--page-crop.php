<div class="container">
	<div class="row">
		<div class="col col-lg-3">
			<label class="cabinet center-block">
				<figure>
					<img src="" class="gambar img-responsive img-thumbnail" id="item-img-output" />
					<figcaption><i class="fa fa-camera"></i></figcaption>
				</figure>
				<input type="file" class="item-img file center-block" name="file_photo" rel="item-img-output" />
			</label>
		</div>
		<div class="col col-lg-3">
			<label class="cabinet center-block">
				<figure>
					<img src="" class="gambar img-responsive img-thumbnail" id="item-img-output-2" />
					<figcaption><i class="fa fa-camera"></i></figcaption>
				</figure>
				<input type="file" class="item-img file center-block" name="file_photo" rel="item-img-output-2" />
			</label>
		</div>		
		<div class="col col-lg-3">
			<label class="cabinet center-block">
				<figure>
					<img src="" class="gambar img-responsive img-thumbnail" id="item-img-output-3" />
					<figcaption><i class="fa fa-camera"></i></figcaption>
				</figure>
				<input type="file" class="item-img file center-block" name="file_photo" rel="item-img-output-3" />
			</label>
		</div>						
	</div>
</div>

<div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
							<div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <h4 class="modal-title" id="myModalLabel">
							  	<?=multiLanguage( "Editar Foto" , "Edit Photo" )?></h4>
							</div>
							<div class="modal-body">
				            <div id="upload-demo" class="center-block"></div>
				      </div>
							 <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" id="cropImageBtn" class="btn btn-primary">Cortar</button>
      </div>
						    </div>
						  </div>
						</div>
						
						
<?php get_footer(); ?>