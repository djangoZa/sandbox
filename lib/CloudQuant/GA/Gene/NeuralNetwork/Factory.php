<?php
class CloudQuant_GA_Gene_NeuralNetwork_Factory
{
	public function makeRandom($type)
	{
		$out = null;

		switch ($type) {
			case 'InputLayer':
				$out = new CloudQuant_GA_Gene_NeuralNetwork_InputLayer(
				    array(
				    	new CloudQuant_GA_Allele_Instance_Forex_CurrencyPair()
				    )
				);
				break;
			case 'HiddenLayer':
				$out = new CloudQuant_GA_Gene_NeuralNetwork_HiddenLayer(
				    array(
				    	new CloudQuant_GA_Allele_Instance_Forex_CurrencyPair()
				    )
				);
				break;
			case 'OutputLayer':
				$out = new CloudQuant_GA_Gene_NeuralNetwork_OutputLayer(
				    array(
				    	new CloudQuant_GA_Allele_Instance_Forex_CurrencyPair()
				    )
				);
				break;
		}

		return $out;
	}
}