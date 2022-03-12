<?php

namespace Arknet\Traits;

use Exception;

trait PredictionModelTrait {

	/**
	 * @return PredictionModelTrait
	 */
	function train(): self
	{
		$directory = $this->getDirectory();
		$scannedDirectory = array_diff(scandir($directory), array('..', '.'));
		$container = Arknet\IO::getImageContainer();
		foreach($scannedDirectory as $image){
			$picture->setImage($directory.$image)
		   		->setChunkSizeX($this->getChunkSizeX())
		   		->setChunkSizeY($this->getChunkSizeY())
		   		->prepare();
		}
		return $this;
	}

}
