<?php
class CloudQuant_GA_Chromosome_Strategy_Factory
{
	public static function make($type)
	{
		$out = null;

		switch ($type) {
			case 'NeuralNetwork':
				$geneFactory = new CloudQuant_GA_Gene_Factory();
				$out = new CloudQuant_GA_Chromosome_Strategy_NeuralNetwork($geneFactory);
			    break;
		}

		return $out;
	}
}