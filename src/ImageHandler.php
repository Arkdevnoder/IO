<?php

namespace Arknet;

use Arknet\Traits\ImageHandlerTrait;

class ImageHandler {

	/**
	 * Prepairing handler.
	 */
	use ImageHandlerTrait;

	/**
	 * @var string
	 */
	protected $imageString = '';

	/**
	 * @var int|null
	 */
	protected $chunkSizeX = null;

	/**
	 * @var int|null
	 */
	protected $chunkSizeY = null;

	/**
	 * @var int|null
	 */
	protected $width = null;

	/**
	 * @var int|null
	 */
	protected $height = null;

	/**
	 * @param string $imageString
	 * @return ImageHandler
	 */
	public function setImage(string $imageString): self
	{
		$this->imageString = $imageString;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getImage(): string
	{
		return $this->imageString;
	}

	/**
	 * @param string $chunkSizeX
	 * @return ImageHandler
	 */
	public function setChunkSizeX(?int $chunkSizeX): void
	{
		$this->chunkSizeX = $chunkSizeX;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getChunkSizeX(): ?int
	{
		return $this->chunkSizeX;
	}

	/**
	 * @param string $chunkSizeY
	 * @return ImageHandler
	 */
	public function setChunkSizeY(?int $chunkSizeY): void
	{
		$this->chunkSizeY = $chunkSizeY;
		return $this;
	}

	/**
	 * @return int|null
	 */
	public function getChunkSizeY(): ?int
	{
		return $this->chunkSizeY;
	}

	/**
	 * @return int|null
	 */
	public function getWidth(): ?int
	{
		return $this->width;
	}

	/**
	 * @return int|null
	 */
	public function getHeight(): ?int
	{
		return $this->height;
	}

}