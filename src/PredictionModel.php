<?php

namespace Arknet;

use Arknet\Traits\PredictionModelTrait;

class PredictionModel {

	/**
	 * Prepairing handler.
	 */
	use PredictionModelTrait;

	/**
	 * @var int|null
	 */
	protected $chunkSizeX = null;

	/**
	 * @var int|null
	 */
	protected $chunkSizeY = null;

	/**
	 * @var string
	 */
	protected $directory = '';

	/**
	 * @var array
	 */
	protected $model = [];

	/**
	 * @param string $directory
	 * @return ImageHandler
	 */
	public function setDirectory(string $directory): self
	{
		$this->directory = $directory;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getDirectory(): string
	{
		return $this->directory;
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
	 * @return array
	 */
	public function getModel(): array
	{
		return $this->model;
	}

}
