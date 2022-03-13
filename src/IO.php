<?php

/**
 * @author Arkdevnoder
 * 
 * Simple factory creator instance.
 */

declare(strict_types = 1);

namespace Arknet;

use Arknet\Predictor;
use Arknet\PredictionModel; 
use Arknet\ImageContainer;

class IO {

    /**
     * Prediction model creator class
     * 
     * @return PredictionModel
     */
    public static function getPredictionModel(): PredictionModel
    {
        return new PredictionModel;
    }
    

    /**
     * Image handler class
     * 
     * @return ImageContainer
     */
    public static function getImageContainer(): ImageContainer
    {
        return new ImageContainer;
    }

    /**
     * Dumper class
     * 
     * @return Dumper
     */
    public static function getDumper(): Dumper
    {
        return new Dumper;
    }

}
