<?php

namespace Arknet;

class ImageHandler {

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

}