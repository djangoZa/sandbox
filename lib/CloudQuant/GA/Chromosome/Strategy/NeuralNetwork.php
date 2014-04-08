<?php
class CloudQuant_GA_Chromosome_Strategy_NeuralNetwork extends CloudQuant_GA_Chromosome_Strategy_Abstract
{
	private $_geneFactory;
	private $_mutationRate = 0.3;
	private $_maxPopulationCount = 10;
	private $_fittestPopulationMultiplier = 0.3;
	private $_fittestPopulationSize;

	public function __construct (CloudQuant_GA_Gene_Factory $geneFactory) {
		$this->_geneFactory = $geneFactory;
		$this->_fittestPopulationSize = floor($this->_maxPopulationCount  * $this->_fittestPopulationMultiplier);
	}

	public function getInitialChromosomePopulation() {
		$chromosomes = array();
		for ($i = 0; $i < $this->_maxPopulationCount; $i++) {
			$chromosomes[] = $this->_makeRandomChromosome();
		}
		return $chromosomes;
	}

	public function setFitnessToChromosomePopulation(Array $chromosomes) {
		foreach ($chromosomes as $chromosome) {
			$chromosome = $this->_setFitness($chromosome);
		}
		return $chromosomes;
	}

	public function getFittestChromosomes(Array $chromosomes) {
		//We are implementing a simple selection process here
		//However we should implement something more sophisticated from http://en.wikipedia.org/wiki/Selection_(genetic_algorithm)
		$chromosomes = $this->_sortChromosomesByFitness($chromosomes);
		return array_slice($chromosomes, 0, $this->_fittestPopulationSize);
	}

	public function crossOverChromosomes(Array $chromosomes) {
		//We are simply choosing random chromosomes from the population
		//However, we should be doing something more sophisticated
		$resultantChromosomes = array();
		while (count($resultantChromosomes) < $this->_maxPopulationCount) {
			$chromosomeA = $chromosomes[array_rand($chromosomes)];
			$chromosomeB = $chromosomes[array_rand($chromosomes)];
			$resultantChromosomes[] = $this->_crossOver($chromosomeA, $chromosomeB);
		}
		return $resultantChromosomes;
	}

	public function mutateRandomChromosomes(Array $chromosomes) {
		foreach ($chromosomes as $chromosome) {
			if ((mt_rand() / mt_getrandmax()) < $this->_mutationRate) {
				die('MUTATE');
				$chromosome->mutate();
			}
		}
		return $chromosomes;
	}

	private function _setFitness (CloudQuant_GA_Chromosome $chromosome) {
		//In production this should be sourced to a cluster of neural net training algorithms
		//For now we just set a random value
		$fitness = mt_rand() / mt_getrandmax();
		$chromosome->setFitness($fitness);
		return $chromosome;
	}

	private function _crossOver(CloudQuant_GA_Chromosome $chromosomeA, CloudQuant_GA_Chromosome $chromosomeB) {
		//We should implement something more sophisticated from http://en.wikipedia.org/wiki/Crossover_(genetic_algorithm)
		$newGenes = array();
		$geneCount = count($chromosomeA->getGenes());

		for ($i = 0; $i < $geneCount; $i++) {
			$rand = rand(0,1);
            if ($rand) {
                $newGenes[$i] = $chromosomeA->getGene($i);
            } else {
                $newGenes[$i] = $chromosomeB->getGene($i);
            }
		}
		
		$chromosome = new CloudQuant_GA_Chromosome($newGenes);
		return $chromosome;
	}

	private function _makeRandomChromosome() {
		return new CloudQuant_GA_Chromosome (
			array(
				$this->_geneFactory->make('input'),
				$this->_geneFactory->make('hidden'),
				$this->_geneFactory->make('output')
			)
		);
	}

	private function _sortChromosomesByFitness(Array $chromosomes) {
		usort($chromosomes, array($this,  '_compare'));
		return $chromosomes;
	}

	private function _compare($a, $b) { 
	  	if($a->getFitness() == $b->getFitness()){ return 0 ; } 
	  	return ($a->getFitness() > $b->getFitness()) ? -1 : 1;
	}
}