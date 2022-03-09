<?php

namespace Arknet\Traits;

use Exception;

trait PredictionModelTrait {

	function prepare(){
		$directory = $this->getDirectory();
		$scannedDirectory = array_diff(scandir($directory), array('..', '.'));	
		var_dump($scannedDirectory);
	}

}
