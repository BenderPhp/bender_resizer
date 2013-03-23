<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Bender Resizer
|--------------------------------------------------------------------------
|
| @author Jeremie
| @date_version : 21/03/2013
| @version 0.1
| 
| Bender resizer resize your pictures in the fly
| Infos : Bender Resizer it's an hybrid controller/library
| 
| Example : http://www.example.com/utilities/bender_resizer?src=bender.jpg&h=150&w=250
|
| 
*/

class Bender_resizer extends CI_Controller {


	public function __construct() {
		parent::__Construct();

		// Load image lib
		$this->load->library('image_lib');

	}

	public function index() {

		// Get values
		$src 	= trim( $this->input->get('src') 	);
		$height = trim( $this->input->get('height') );
		$width 	= trim( $this->input->get('width') 	);

		// Delete "/" at left (if exist)
		$src = ltrim($src, '/');

		// Block script
		if (!$src OR !is_file($src)) return false;

		// Default config
		$config = array(

			'image_library' 	=> 	'gd2',
			'source_image' 		=> 	$src,
			'maintain_ratio'	=> 	TRUE,
			'width' 			=> 	150,
			'height'			=> 	150,

			);


		if ($height) $config['height'] 	= $height;
		if ($width)	 $config['width'] 	= $width;

		$path_info = pathinfo($src);

		// Create cache name 
		$new_image =  md5($src . '-' . $config['width'] . '-' . $config['height']) . '.' . $path_info['extension'];
		$path = APPPATH . 'cache/bender_resizer/';

		// Add to config
		$config['new_image'] = $path . $new_image;


		if (! is_file($path . $new_image)) {

			// Init config
			$this->image_lib->initialize($config);

			// Resize !
			$this->image_lib->resize();

		} 

		// Open the file in a binary mode
		$name = $path . $new_image;
		$fp = fopen($name, 'rb');

		// Send the right headers
		header("Content-Type: image/png");
		header("Content-Length: " . filesize($name));

		// Dump the picture and stop the script
		fpassthru($fp);
		exit;


	}






}
