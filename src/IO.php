<?php

/**
 * @author Arkdevnoder
 * 
 * Simple factory creator instance.
 */

declare(strict_types = 1);

namespace Arknet;

use PredictionModel, ImageHandler, Dumper;

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
	public static function getImageHandler(): ImageHandler
	{
		return new ImageHandler;
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
