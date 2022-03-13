# IO - php ai image prediction composer library.
Installation:
```json
{
	"repositories": [
		{
			"type": "path",
			"url": "/path/to/this/lib"
		}
	],
	"require": {
		"arknet/io": "^0.0.1"
	}
}
```
Example usage (server.php):
```php
<?php

require_once('vendor/autoload.php');

$argv[1] ?? null
? Arknet\IO::getDumper()->dumpPredictedImage($argv[1], 'red-tomato', 0.9, true)
: Arknet\IO::getPredictionModel()->setDirectory(__DIR__.'\\models\\')->train(
	function($nNeuronsFromLabels) { return [ $nNeuronsFromLabels*30,  30]; }
);
```
## Commands:
Training:
```bash
php server.php
```
Predicting:
```bash
php server.php path/to/image.png
```
