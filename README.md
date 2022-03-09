# IO - php ai image prediction composer library.
---
Example usage:
```
<?php

require_once('vendor/autoload.php');

$modelsDirectory = __DIR__."/models/";

$data = isset($argv[1]) 
	  ? file_get_contents($argv[1])
	  : (string) null;

if($data !== null){

	$picture = Arknet\IO::getImageContainer();
	$picture->setImage($data)
	   		->setChunkSizeX(100)
	   		->setChunkSizeY(100)
	   		->prepare();

} else {

	$model = Arknet\IO::getPredictionModel();
	$model->setDirectory($modelsDirectory)
		  ->setChunkSizeX(100)
		  ->setChunkSizeY(100)
		  ->prepare();

}
```
