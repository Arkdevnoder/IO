<?php

namespace Arknet\Traits;

use Exception;

trait ImageHandlerTrait {

	function prepare(){
		try {
			$im = imagecreatefromstring($data);
			if ($im === false) {
				throw new Exception('Malformed data');
			}
			$this->width = imagesx($im);
			$this->height = imagesy($im);
		} catch(Exception $e) {
			print $e->getMessage();
		}
	}

}
