<?php

namespace Arknet;

use Arknet\Traits\PredictionModelTrait;

class PredictionModel {

	/**
	 * Prepairing handler.
	 */
	use PredictionModelTrait;

	/**
	 * @var string
	 */
	protected $directory = '';

	/**
	 * @var array
	 */
	protected $model = [];

	/**
	 * @var string
	 */
	protected $modelPath = './model';

	/**
	 * @var int|null
	 */
	protected $chunkSizeX = 30;

	/**
	 * @var int|null
	 */
	protected $chunkSizeY = 30;

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
	 * @return PredictionModel
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

	/**
	 * @return string
	 */
	public function getModelPath(): string
	{
		return $this->modelPath;
	}

	/**
	 * @param string $path
	 * @return PredictionModel
	 */
	public function setModelPath($path): self
	{
		$this->modelPath = $path;
		return $this;
	}

}
