<?php

namespace Arknet\Traits;

use Exception;

trait ImageContainerTrait {

	function prepare(){
		$this->chunks = [];
		try {
			$im = @imagecreatefromstring($this->getImage());
			if ($im === false) {
				throw new Exception('Malformed data');
			}
			$this->width = imagesx($im);
			$this->height = imagesy($im);
			self::grid();
		} catch(Exception $e) {
			print $e->getMessage();
		}
		return $this;
	}

	function grid($image, $width, $height){
		$iteratorPictureWidth = 0;
		$iteratorPictureHeight = 0;
		while($iteratorPictureWidth < $this->width){
			while($iteratorPictureHeight < $this->height){
				$aimX = $iteratorPictureWidth + $this->getChunkSizeX();
				$aimY = $iteratorPictureHeight + $this->getChunkSizeY();
				$fragment = imagecrop(
					$im,
					[
						'x' => $iteratorPictureWidth,
						'y' => $iteratorPictureHeight,
						'width' => $this->getChunkSizeX(),
						'height' => $this->getChunkSizeY()
					]
				);
				ob_start();
				imagepng($fragment);
				$chunkedPicture = ob_get_contents();
				ob_end_clean();
				$this->chunks[] = [
					'x1' => $iteratorPictureWidth,
					'y1' => $iteratorPictureHeight,
					'x2' => $aimX,
					'y2' => $aimY,
					'content' => $chunkedPicture,
				];
				$iteratorPictureHeight += $this->getChunkSizeY();
			}
			$iteratorPictureWidth += $this->getChunkSizeX();
			$iteratorPictureHeight = 0;
		}
	}

}
