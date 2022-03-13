<?php

namespace Arknet;

class Dumper {

	/**
	 * @param string $path
	 * @param string $index
	 * @param float $probability
	 * @param boolean $isDebug
	 * @return void
	 */

	public function dumpPredictedImage(
		string $path,
		string $index,
		float $probability,
		bool $isDebug = false
	){
		$data = file_get_contents($path);
		$image = @imagecreatefromstring($data);
		$green = imagecolorallocate($image, 100, 255, 100);

		$picture = \Arknet\IO::getImageContainer();
		$resultArray = \Arknet\IO::getPredictionModel()->predict(
			$picture->setImagePath($path)->prepare()->getChunks(),
			$isDebug
		);

		foreach($resultArray as $chunk){
			if($chunk["result"]["red-tomato"] > $probability){
				imagefilledrectangle(
					$image,
					$chunk['x1'],
					$chunk['y1'],
					$chunk['x2'],
					$chunk['y2'],
					$green
				);
			}
		}
		$path = explode('.', $path);
		$path[0] = $path[0].'-predicted';
		$path = implode('.', $path);
		imagepng($image, $path);
	}

	/**
	 * @param string $imageChunk
	 * @return void
	 */
	public function drawChunk(string $imageChunk): void
	{
		imagepng($imageChunk['image'], './raw/testt.png');
	}

}
