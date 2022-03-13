<?php

namespace Arknet;

use Arknet\Traits\ImageContainerTrait;

class ImageContainer {

	/**
	 * Prepairing handler.
	 */
	use ImageContainerTrait;

	/**
	 * @var string
	 */
	protected $imagePath = '';

	/**
	 * @var int|null
	 */
	protected $width = null;

	/**
	 * @var int|null
	 */
	protected $height = null;

	/**
	 * @var array
	 */
	protected $chunks = [];

	/**
	 * @var int|null
	 */
	protected $chunkSizeX = 30;

	/**
	 * @var int|null
	 */
	protected $chunkSizeY = 30;

	/**
	 * @param string $imageSPath
	 * @return ImageHandler
	 */
	public function setImagePath(string $imagePath): self
	{
		$this->imagePath = $imagePath;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getImagePath(): string
	{
		return $this->imagePath;
	}

	/**
	 * @param string $chunkSizeX
	 * @return ImageHandler
	 */
	public function setChunkSizeX(?int $chunkSizeX): self
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
	public function setChunkSizeY(?int $chunkSizeY): self
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

	/**
	 * @return array
	 */
	public function getChunks(): array
	{
		return $this->chunks;
	}

}