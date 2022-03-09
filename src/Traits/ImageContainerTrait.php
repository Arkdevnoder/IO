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
		try {
			$image = @imagecreatefromstring($this->getImage());
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
		$fragment = imagecrop(
			$image,
			[
				'x' => $startX,
				'y' => $startY,
				'width' => $this->getChunkSizeX(),
				'height' => $this->getChunkSizeY()
			]
		);
		ob_start();
		imagepng($fragment);
		$chunkedPicture = ob_get_contents();
		ob_end_clean();
		$this->chunks[] = [
			'x1' => $startX,
			'y1' => $startY,
			'x2' => $aimX,
			'y2' => $aimY,
			'content' => $chunkedPicture,
		];
	}

}
