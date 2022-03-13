<?php

namespace Arknet\Traits;

use GdImage, Exception;

trait ImageContainerTrait {

	/**
	 * @return ImageContainerTrait
	 */
	function prepare(): self
	{
		$this->chunks = [];
		if(trim($this->getImagePath()) == ""){
			throw new Exception('Empty image path');
		}
		try {
			$image = @imagecreatefromstring(
				file_get_contents($this->getImagePath())
			);
			if ($image === false) {
				throw new Exception('Malformed data');
			}
			$this->width = imagesx($image);
			$this->height = imagesy($image);
			self::grid($image);
		} catch(Exception $e) {
			print $e->getMessage();
		}
		return $this;
	}

	/**
	 * @param GdImage $image
	 * @return void
	 */
	function grid(GdImage $image): void
	{
		$iteratorPictureWidth = 0;
		$iteratorPictureHeight = 0;
		while($iteratorPictureWidth < $this->width){
			while($iteratorPictureHeight < $this->height){
				self::crop(
					$image,
					$iteratorPictureWidth,
					$iteratorPictureHeight
				);
				$iteratorPictureHeight += $this->getChunkSizeY();
			}
			$iteratorPictureWidth += $this->getChunkSizeX();
			$iteratorPictureHeight = 0;
		}
	}

	/**
	 * @param GdImage $image
	 * @param int $startX
	 * @param int $startY
	 * @return void
	 */
	function crop(GdImage $image, int $startX, int $startY): void
	{
		$aimX = $startX + $this->getChunkSizeX();
		$aimY = $startY + $this->getChunkSizeY();
		$crop = imagecrop(
			$image,
			[
				'x' => $startX,
				'y' => $startY,
				'width' => $this->getChunkSizeX(),
				'height' => $this->getChunkSizeY()
			]
		);
		$fragment = self::fragmentar($crop);
		$this->chunks[] = [
			'x1' => $startX,
			'y1' => $startY,
			'x2' => $aimX,
			'y2' => $aimY,
			'whiteFlag' => $fragment['whiteFlag'],
			'content' => $fragment['image'],
			'image' => $crop,
		];
	}

	/**
	 * @param GdImage $image
	 * @return string
	 */
	function fragmentar(GdImage $fragmentOfGD){
		ini_set('memory_limit', '-1');
		$width = imagesx($fragmentOfGD);
		$height = imagesy($fragmentOfGD);
		$whiteFlag = true;

		$edgeCount = 0;

		for($x=0; $x < $width; $x++) {
			for($y=0; $y < $height; $y++) {
				$rgb = imagecolorat($fragmentOfGD, $x, $y);
				$r = ($rgb >> 16) & 0xFF;
				$g = ($rgb >> 8) & 0xFF;
				$b = $rgb & 0xFF;
				$pixels[] = $r;
				$pixels[] = $g;
				$pixels[] = $b;
				if(!(($r == 255 && $g == 255 && $b == 255) ||
					($r == 0 && $g == 0 && $b == 0))){
					$whiteFlag = false;
				}

				if($r == 0 && $g == 0 && $b == 0){
					$edgeCount++;
				}
			}
		}

		if($edgeCount > $width*$height*0.01){
			$whiteFlag = true;
		}

		return [
			'image' => $pixels,
			'whiteFlag' => $whiteFlag,
			'time' => time(),
		];
	}

}
