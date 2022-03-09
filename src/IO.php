<?php

/**
 * @author Arkdevnoder
 * 
 * Simple factory creator instance.
 */

declare(strict_types = 1);

namespace Arknet;

use Arknet\PredictionModel; 
use Arknet\ImageContainer;
use Arknet\Dumper;

class IO {

	/**
	 * Prediction model creator class
	 * 
	 * @return void
	 */
	public static function getPredictionModel(): PredictionModel
	{
		return new PredictionModel;
	}
	

	/**
	 * Image handler class
	 * 
	 * @return void
	 */
	public static function getImageContainer(): ImageContainer
	{
		return new ImageContainer;
	}

	/**
	 * Dumper class
	 * 
	 * @return void
	 */
	public static function getDumper(): Dumper
	{
		return new Dumper;
	}

}
