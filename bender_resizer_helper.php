<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| Bender Resizer Helper
|--------------------------------------------------------------------------
|
| @author Jeremie
| @date_version : 22/03/2013
| @version 0.1
|
| Helper deal with hybrid controller/library Bender_Resizer
*/

/*
|--------------------------------------------------------------------------
| resizer
|--------------------------------------------------------------------------
|
| $msg - Display msg
|
| A simple shortcut 
*/
if ( ! function_exists('resizer')) {

	function resizer($src, $width=90, $height=90) {

		return base_url('utilities/bender_resizer/?width=' . $width . '&height=' . $height . '&src=' . $src);

	}

}
