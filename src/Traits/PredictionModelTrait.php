<?php

namespace Arknet\Traits;

use Exception;
use Arknet\Dumper;
use Phpml\ModelManager;
use Phpml\Classification\MLPClassifier;
use Phpml\NeuralNetwork\ActivationFunction\PReLU;
use Phpml\NeuralNetwork\ActivationFunction\Sigmoid;

trait PredictionModelTrait {

	/**
	 *  @param PredictionModelTrait
	 *  @return $this
	 */
	function saveModel(MLPClassifier $mlp): self
	{
		@unlink($this->getModelPath());
		$modelManager = new ModelManager();
		$modelManager->saveToFile($mlp, $this->getModelPath());
		return $this;
	}

	/**
	 *  @param array $imageChunks
	 * 	@param bool $isDebug
	 *  @return array $resultChunks
	 */
	function predict(array $imageChunks, bool $isDebug = false): array
	{
		$modelManager = new ModelManager();
		$restoredClassifier = $modelManager->restoreFromFile(
			$this->getModelPath()
		);
		$chunk = $imageChunks[29];
		foreach($imageChunks as $chunk){
			$resultChunk = $restoredClassifier->setInput(
				$chunk['content']
			)->getOutput();
			$result[] = [
				'x1' => $chunk['x1'],
				'x2' => $chunk['x2'],
				'y1' => $chunk['y1'],
				'y2' => $chunk['y2'],
				'result' => $resultChunk,
			];
		}
		if($isDebug){
			var_dump($result);
		}
		return $result;
	}

	/**
	 * @param object|null $classifier
	 * @return PredictionModelTrait
	 */
	function train(?object $classifier): self
	{
		$directory = $this->getDirectory();
		$scannedDirectory = array_diff(scandir($directory), array('..', '.'));
		$container = \Arknet\IO::getImageContainer();
		foreach($scannedDirectory as $imageName){
			$container->setImagePath($directory.$imageName)
		   		->setChunkSizeX($this->getChunkSizeX())
		   		->setChunkSizeY($this->getChunkSizeY())
		   		->prepare();
		   	$label = explode("_", $imageName);
			foreach($container->getChunks() as $chunk){
				if($chunk['whiteFlag'] == true){
					continue;
				}
				$samples[] = $chunk['content'];
				$labels[] = $label[0];
				$rand = mt_rand(1, 100);
				imagepng($chunk['image'], './raw/'.$label[0].$rand.'.png');
			}
		}

		$pictureSize = $this->getChunkSizeX()*$this->getChunkSizeY();
		$rgbPixelPictureSize = $pictureSize*3;
		$countLabels = count(array_values(array_unique($labels)));
		$uniqueLabels = array_values(array_unique($labels));

		if($classifier !== null){
			[$countNeurons, $epochs] = $classifier($countLabels);
		} else {
			[$countNeurons, $epochs] = [$countLabels*2, 30];
		}

		$mlp = new MLPClassifier(
			$rgbPixelPictureSize,
			[
				[$countNeurons, new Sigmoid],
			],
			$uniqueLabels,
			$epochs
		);
		$mlp->train($samples, $labels);

		self::saveModel($mlp);

		return $this;
	}

}
