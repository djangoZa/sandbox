<?php
class CloudQuant_GA_Chromosome_Repository_NeuralNetwork extends CloudQuant_GA_Chromosome_Repository_Abstract
{
	public function getChromosome() {
		return new CloudQuant_GA_Chromosome (
			array(
				$this->_geneFactory->make('input'),
				$this->_geneFactory->make('output')
			)
		);
	}
}