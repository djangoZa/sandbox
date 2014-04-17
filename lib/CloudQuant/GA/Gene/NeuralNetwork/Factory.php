<?php
class CloudQuant_GA_Gene_NeuralNetwork_Factory
{
	private $_alleleInstanceFactory;

	public function __construct(CloudQuant_GA_Allele_Instance_Factory $alleleInstanceFactory)
	{
		$this->_alleleInstanceFactory = $alleleInstanceFactory;
	}

	public function makeRandom($type)
	{
		$out = null;
		switch ($type) {
			case 'InputLayer':
				$out = new CloudQuant_GA_Gene_NeuralNetwork_InputLayer(
				    array(
				    	$this->_alleleInstanceFactory->makeRandom('CloudQuant_GA_Allele_Instance_Forex')
				    )
				);
				break;
			case 'HiddenLayer':
				$out = new CloudQuant_GA_Gene_NeuralNetwork_HiddenLayer(
				    array(
				    	$this->_alleleInstanceFactory->makeRandom('CloudQuant_GA_Allele_Instance_Forex')
				    )
				);
				break;
			case 'OutputLayer':
				$out = new CloudQuant_GA_Gene_NeuralNetwork_OutputLayer(
				    array(
				    	$this->_alleleInstanceFactory->makeRandom('CloudQuant_GA_Allele_Instance_Forex')
				    )
				);
				break;
		}

		return $out;
	}
}