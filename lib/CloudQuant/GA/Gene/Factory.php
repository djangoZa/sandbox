<?php
class CloudQuant_GA_Gene_Factory
{
	public function make($type)
	{
		$out = null;

		switch ($type) {
			case 'neuralNetworkInputLayer':
				$out = new CloudQuant_GA_Gene_NeuralNetworkInputLayer(
				range(rand(0,50), 100, rand(5,10))
				);
				break;
			case 'neuralNetworkHiddenLayer':
				$out = new CloudQuant_GA_Gene_NeuralNetworkHiddenLayer(
				range(rand(0,50), 100, rand(5,10))
				);
				break;
			case 'neuralNetworkOutputLayer':
				$out = new CloudQuant_GA_Gene_NeuralNetworkOutputLayer(
				range(rand(0,50), 100, rand(5,10))
				);
				break;
		}

		return $out;
	}
}