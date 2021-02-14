<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
		if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

// END ENQUEUE PARENT ACTION



// Custom quadritos Add to cart
//

function quadritos_Add_To_Cart($cantidad_par, $marco_par, $regalo_par, $images, $nombre, $email, $relation) {

	    // Quadrito Base y variantes
		$product_id0 = 19;
		$marco_id1 = 42;
		$marco_id2 = 44;
		$marco_id3 = 43;
		$marco_id4 = 45;

		// Quadrito Extra y variantes
		$product_id1 = 48;
		$marco_id5 = 49;
		$marco_id6 = 51;
		$marco_id7 = 50;
		$marco_id8 = 52;

		// Parametros de la compra
		$marco = 1;
		$variante_0 = 0;
		$variante_1 = 0;
		$quantity = 0;
		$regalo = 0;

		// Parametros de la compra
		$marco = $marco_par;

		//Marco Quadrito Base
		switch ($marco) {
			case 1:
				$variante_0 = $marco_id1;
				break;
			case 2:
				$variante_0 = $marco_id2;
				break;
			case 3:
				$variante_0 = $marco_id3;
				break;
			case 4:
				$variante_0 = $marco_id4;
				break;
		}

		$quantity = $cantidad_par;

		// Asigna marco al quadrito extra == al quadrit base
		if ( $quantity > 3 ) {
			switch ($marco) {
				case 1:
					$variante_1 = $marco_id5;
					break;
				case 2:
					$variante_1 = $marco_id6;
					break;
				case 3:
					$variante_1 = $marco_id7;
					break;
				case 4:
					$variante_1 = $marco_id8;
					break;
			}
		}


		WC()->cart->empty_cart();

        // Agrega al carrito 3 Quadrito Base
		WC()->cart->add_to_cart( $product_id0, 3, $variante_0);

        // Agrega al carrito $quantity Quadrito Extra (Resta 3)
		if ( $quantity > 3 ) {
			$quantity_1 = $quantity - 3;
			WC()->cart->add_to_cart( $product_id, $quantity_1, $variante_1 );
		}

		// Guardar valor del regalo en Session de Woocommerce
		$regalo = $regalo_par;

		       // Guardar valor del regalo en Session de Woocommerce
		WC()->session->set('sess_gift', $regalo);


		$image_list = $images;


        // Guardar las URL de las imágenes en Session de Woocommerce
		WC()->session->set('sess_images', $image_list);

		WC()->session->set('sess_nombre', $nombre);

		WC()->session->set('sess_email', $email);
		
		WC()->session->set('sess_relation', $relation);

}



// Add Ajax
add_action('wp_enqueue_scripts', 'quadritos_insertar_ajax');

function quadritos_insertar_ajax(){
	wp_register_script('quadritos_ajaxscript',get_stylesheet_directory_uri(). '/js/ajax-script.js', array('jquery'), '1', true );
	wp_enqueue_script('quadritos_ajaxscript');

	wp_localize_script('quadritos_ajaxscript','ajax_vars',['ajax_url'=>admin_url('admin-ajax.php')]);
}


//Devolver datos a archivo js
add_action('wp_ajax_nopriv_quadritos_enviar_params','quadritos_enviar_params');
add_action('wp_ajax_quadritos_enviar_params','quadritos_enviar_params');

function quadritos_enviar_params()
{

	$cantidad = absint($_POST['cantidad']);
	$marco = absint($_POST['marco']);
	$regalo = $_POST['regalo'];
	$images = $_POST['images'];
	$nombre = $_POST['nombre_inicial'];
	$email = $_POST['email_inicial'];
	$relation = $_POST['relation'];

	quadritos_Add_To_Cart($cantidad, $marco, $regalo, $images, $nombre, $email, $relation);

	echo $_POST['cantidad'].' - '. $_POST['marco'].' - '. $_POST['regalo'] . ' - '. $_POST['nombre_inicial'] . ' - '. $_POST['email_inicial'];

	echo $images;

    die();
}


// Remove All Cart
add_action('wp_ajax_nopriv_quadritos_remove_cart','quadritos_remove_cart');
add_action('wp_ajax_quadritos_remove_cart','quadritos_remove_cart');

function quadritos_remove_cart()
{
    echo 'carrito: ' . WC()->cart->get_cart_contents_count();

    quadritos_remove_files();

    WC()->cart->empty_cart();

    WC()->session->set( 'sess_images', null );
    WC()->session->set( 'sess_gift', null );

    echo 'carrito: ' . WC()->cart->get_cart_contents_count();
    die();
}


function quadritos_remove_files() {
    
    $relation = trim(getSessionRelation());
    
    $args = array(
        'post_type' => 'attachment',
        'numberposts' => -1,
        'post_status' => null,
        'post_parent' => 0
    ); 
        
        
    $attachments = get_posts($args);
         
    if ($attachments) {
        foreach ($attachments as $post) {
            $filename = basename ( get_attached_file( $post->ID ) );
                
            if (substr($filename, 0, strlen($relation)) === $relation ) {
                wp_delete_attachment( $post->ID );
            }
        }
    }
    /*$links = trim(getSessionImages());

    echo $links;

    $links_arr = explode(",", $links);
			foreach ($links_arr as $id_result) {
			wp_delete_attachment( $id_result );
	}

	print_r($links_arr);

    die;*/
}




//Croppie
function quadritos_croppie() {
  wp_enqueue_script( 'quadritos-croppie-js', get_stylesheet_directory_uri() . '/js/croppie.js', null, null, true );
  wp_enqueue_style( 'quadritos-croppie-css', get_stylesheet_directory_uri() . '/css/croppie.css' );
}
add_action( 'wp_enqueue_scripts', 'quadritos_croppie' );


// Custom JS
function quadritos_custom_script() {
    wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/script.js', array ( 'jquery' ), 1.1, true);
}
add_action( 'wp_enqueue_scripts', 'quadritos_custom_script' );


// Dequeue styles
function quadritos_dequeue_unnecessary_styles() {
    wp_dequeue_style( 'twentynineteen-style' );
    wp_deregister_style( 'twentynineteen-style' );
    wp_dequeue_style( 'twentynineteen-print-style' );
    wp_deregister_style( 'twentynineteen-print-style' );
}
add_action( 'wp_print_styles', 'quadritos_dequeue_unnecessary_styles' );

//Dequeue scripts
function quadritos_dequeue_unnecessary_scripts() {
    wp_dequeue_script( 'twentynineteen-priority-menu' );
    wp_deregister_script( 'twentynineteen-priority-menu' );
    wp_dequeue_script( 'twentynineteen-touch-navigation' );
    wp_deregister_script( 'twentynineteen-touch-navigation' );
    wp_dequeue_script( 'comment-reply' );
    wp_deregister_script( 'comment-reply' );
}
add_action( 'wp_print_scripts', 'quadritos_dequeue_unnecessary_scripts' );

//Deshabilitar las llamadas Ajax WooCommerce
add_action( 'wp_enqueue_scripts', 'dequeue_woocommerce_cart_fragments', 11);
function dequeue_woocommerce_cart_fragments() {
  wp_dequeue_script('wc-cart-fragments');
}

// Custom styles
function quadritos_scripts() {
  /*wp_enqueue_style( 'quadritos-libs', get_stylesheet_directory_uri() . '/css/libs.css', array(), _S_VERSION );
  wp_enqueue_style( 'quadritos-app', get_stylesheet_directory_uri() . '/css/app.css', array(), _S_VERSION );
  wp_enqueue_script( 'quadritos-js-libs', get_stylesheet_directory_uri() . '/js/libs.js', array(), _S_VERSION, true );
  wp_enqueue_script( 'quadritos-js-app', get_stylesheet_directory_uri() . '/js/app.js', array(), _S_VERSION, true );*/

  wp_enqueue_style( 'quadritos-libs', get_stylesheet_directory_uri() . '/css/libs.css' );
  wp_enqueue_style( 'quadritos-app', get_stylesheet_directory_uri() . '/css/app.css' );
  wp_enqueue_script( 'quadritos-js-libs', get_stylesheet_directory_uri() . '/js/libs.js',   null, null, true );
  wp_enqueue_script( 'quadritos-js-app', get_stylesheet_directory_uri() . '/js/app.js',   null, null, true );


}
add_action( 'wp_enqueue_scripts', 'quadritos_scripts' );

add_filter( 'woocommerce_shipping_package_name' , 'woocommerce_replace_text_shipping', 10, 3);

/**
 * Reemplaza el texto Envio en el checkout
 *
 * @param $package_name
 * @param $i
 * @param $package
 *
 * @return string
 */
function woocommerce_replace_text_shipping($package_name, $i, $package){
    return sprintf( _nx( 'Dónde queres recibir tu envío:', 'Envío %d', ( $i + 1 ), 'shipping packages', 'quadritos-i18n' ), ( $i + 1 ) );
}



// Save images
add_action('wp_ajax_nopriv_quadritos_save_image','quadritos_save_image');
add_action('wp_ajax_quadritos_save_image','quadritos_save_image');

function quadritos_save_image() {

    $base64_img = $_POST['image'];
    $title = $_POST['title'];
    $relation = $_POST['relation'];

	// Upload dir.
	$upload_dir  = wp_upload_dir();
	$upload_path = str_replace( '/', DIRECTORY_SEPARATOR, $upload_dir['path'] ) . DIRECTORY_SEPARATOR;

	// Decode base64 Image
	$img             = str_replace( 'data:image/jpeg;base64,', '', $base64_img );
	$img             = str_replace( ' ', '+', $img );
	$decoded         = base64_decode( $img );
	$filename        = $title . '.jpg';
	$file_type       = 'image/jpeg';
	$hashed_filename = md5( $filename . microtime() ) . '_' . $filename;
	$hashed_filename = str_replace("_", " ", $hashed_filename);
	$hashed_filename = $relation . '-' . $hashed_filename;
	

	// Save the image in the uploads directory.
	$upload_file = file_put_contents( $upload_path . $hashed_filename, $decoded );

	$attachment = array(
		'post_mime_type' => $file_type,
		'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $hashed_filename ) ),
		'post_content'   => '',
		'post_status'    => 'inherit',
		'guid'           => $upload_dir['url'] . '/' . basename( $hashed_filename )
	);

	$attach_id = wp_insert_attachment( $attachment, $upload_dir['path'] . '/' . $hashed_filename, $parent_post_id );


	//if (!is_wp_error($attach_id)) {
	require_once( ABSPATH . 'wp-admin/includes/image.php' );

	//Genera la meta data
    $attach_data = wp_generate_attachment_metadata( $attach_id, $upload_dir['path'] . '/' . $hashed_filename );
    wp_update_attachment_metadata( $attach_id, $attach_data );


	//}
	//else {
	//   return false;
	//}

	echo $attach_id;

}




// Save images
add_action('wp_ajax_nopriv_quadritos_save_images','quadritos_save_images_all');
add_action('wp_ajax_quadritos_save_images','quadritos_save_image_all');

function quadritos_save_images_all() {

    $images = json_decode($_POST['images']);
    $relation = json_decode($_POST['relation']);
    echo $images . $relation;

}



function getSessionGift() {
    	return WC()->session->get('sess_gift');
}


function getSessionImages() {
    	return WC()->session->get('sess_images');
}

function getSessionRelation() {
    	return WC()->session->get('sess_relation');
}


add_action( 'woocommerce_admin_order_data_after_billing_address', 'quadritos_order_meta_billing_images' );
function quadritos_order_meta_billing_images( $order ){
	$relation = get_post_meta( $order->get_id(), 'additional_relation', true );
	?>
	<div class="imagenes">
	    <?php  
        	$args = array(
            'post_type' => 'attachment',
            'numberposts' => -1,
            'post_status' => null,
            'post_parent' => 0
        ); 
        
        $count = 0;
        
        $attachments = get_posts($args);
         
         if ($attachments) {
            foreach ($attachments as $post) {
                
                
                $filename = basename ( get_attached_file( $post->ID ) );
                
                $link =  wp_get_attachment_url($post->ID);
                $thumb = wp_get_attachment_thumb_url($post->ID);
                
                
                if (substr($filename, 0, strlen($relation)) === $relation ) {
                    
                $count++;
                
                $links = $links = '<li style="width: 46%; float: left; margin-right: 10px;">
						<a style="width: 30%;" title="' . $link . '" href="' . $link . '">
						<img style="width: 100%;" src="' . $thumb .'"/>
						</a></li>' . $links ;
                }
            }
         }
         
         echo '<strong>' . $count . ' imágenes para Quadritos:</strong>';

         echo '<ul class="order-images">' . $links . '</ul>';
         
         ?>
         
	</div>
	<?php
}


/*
add_action( 'woocommerce_admin_order_data_after_billing_address', 'quadritos_order_meta_billing' );
function quadritos_order_meta_billing( $order ){
	$images = get_post_meta( $order->get_id(), 'additional_images', true );
	?>
	<div class="address">
		<p<?php if( $images ) {
		echo ' class="active"';
		} ?>>

			<?php

			$string = $images;
			$links_arr = explode (",", $string);

			echo '<strong>' . count($links_arr) . ' imágenes para Quadritos:</strong>';

					foreach ($links_arr as $id_result) {
					    $link = $id_result;
						$links = '<li style="width: 46%; float: left; margin-right: 10px;">
						<a style="width: 30%;" title="' . $link . '" href="' . $link . '">
						<img style="width: 100%;" src="' . $link .'"/>
						</a></li>' . $links ;
					}

			echo '<ul class="order-images">' . $links . '</ul>';


			?>
		</p>
	</div>
	<?php
}*/

/*
add_action( 'woocommerce_process_shop_order_meta', 'quadritos_save_billing_details' );

function quadritos_save_billing_details( $ord_id ){
	update_post_meta( $ord_id, 'additional_images', $_POST[ 'additional_images' ] );
}*/


add_filter( 'woocommerce_checkout_get_value', 'populating_checkout_fields', 10, 2 );
function populating_checkout_fields ( $value, $input ) {
    // Define your checkout fields  values below in this array (keep the ones you need)
    $first_name = WC()->session->get('sess_nombre');
    $mail = WC()->session->get('sess_email');
    $checkout_fields = array(
        'billing_first_name'    => $first_name,
        'billing_email'         => $mail,
    );
    foreach( $checkout_fields as $key_field => $field_value ){
        if( $input == $key_field && ! empty( $field_value ) ){
            $value = $field_value;
        }
    }
    return $value;
}

add_filter( 'woocommerce_default_address_fields', 'adjust_requirement_of_checkout_address_fields' );
function adjust_requirement_of_checkout_address_fields( $fields ) {
    $fields['address_1']['required']    = false;
    $fields['address_2']['required']    = false;
    $fields['city']['required']         = false;
    $fields['postcode']['required']     = false;

    return $fields;
}




/**
 * Filter the upload size limit for non-administrators.
 *
 * @param string $size Upload size limit (in bytes).
 * @return int (maybe) Filtered size limit.
 */
function filter_site_upload_size_limit( $size ) {
    // Set the upload size limit to 10 MB for users lacking the 'manage_options' capability.
    if ( ! current_user_can( 'manage_options' ) ) {
        // 10 MB.
        $size = 1024 * 200000;
    }
    return $size;
}
add_filter( 'upload_size_limit', 'filter_site_upload_size_limit', 20 );


