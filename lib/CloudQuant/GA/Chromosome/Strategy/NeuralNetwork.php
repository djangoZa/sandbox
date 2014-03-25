<?php
class CloudQuant_GA_Chromosome_Strategy_NeuralNetwork extends CloudQuant_GA_Chromosome_Strategy_Abstract
{
	private $_maxPopulationCount = 10;
	
	public function makeRandomChromosome() {
		return new CloudQuant_GA_Chromosome (
			array(
				$this->_geneFactory->make('input'),
				$this->_geneFactory->make('output')
			)
		);
	}

	public function setFitness (CloudQuant_GA_Chromosome $chromosome) {
		$fitness = rand(1,100);
		$chromosome->setFitness($fitness);
		return $chromosome;
	}

	public function getMaxPopulationCount() {
		return $this->_maxPopulationCount;
	}
}