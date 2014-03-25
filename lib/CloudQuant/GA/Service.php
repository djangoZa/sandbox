<?php
class CloudQuant_GA_Service
{
	private $_chromosomeStrategy;

	public function __construct(CloudQuant_GA_Chromosome_Strategy_Abstract $chromosomeStrategy) {
		$this->_chromosomeStrategy = $chromosomeStrategy;
	}

	public function run() {
		$generation = 1;
		echo "Generation: $generation\n";

		$chromosomes = $this->_getInitialChromosomePopulation();
		$chromosomes = $this->_setFitnessToChromosomePopulation($chromosomes);

		while ($this->_notAboveDesiredAverageFitness($chromosomes)) {

var_dump($chromosomes);

			$generation += 1;
			echo "Generation: $generation\n";

			$chromosomes = $this->_getTheFittestChromosomes($chromosomes);
			$chromosomes = $this->_crossOverChromosomes($chromosomes);
			$chromosomes = $this->_mutateRandomChromosomes($chromosomes);
			$chromosomes = $this->_setFitnessToChromosomePopulation($chromosomes);
		}
	}

	private function _getInitialChromosomePopulation() {
		$out = array();
		for ($i = 0; $i < $this->_chromosomeStrategy->getMaxPopulationCount(); $i++) {
			$out[] = $this->_chromosomeStrategy->makeRandomChromosome();
		}
		return $out;
	}

	private function _breedChromosomePopulation(Array $chromosomes) {
		return array();
	}

	private function _setFitnessToChromosomePopulation(Array $chromosomes) {
		foreach ($chromosomes as $chromosome) {
			$chromosome = $this->_chromosomeStrategy->setFitness($chromosome);
		}
		sleep(1);
		return $chromosomes;
	}

	private function _getTheFittestChromosomes(Array $chromosomes) {
		return $chromosomes;
	}

	private function _crossOverChromosomes(Array $chromosomes) {
		return $chromosomes;
	}

	private function _mutateRandomChromosomes(Array $chromosomes) {
		return $chromosomes;
	}

	private function _notAboveDesiredAverageFitness(Array $chromosomes) {
		return true;
	}
}