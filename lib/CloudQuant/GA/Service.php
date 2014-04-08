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

		while ($this->_isAboveDesiredAverageFitness($chromosomes) == false) {

			$generation += 1;
			echo "Generation: $generation\n";

			$chromosomes = $this->_getTheFittestChromosomes($chromosomes);
			$chromosomes = $this->_crossOverChromosomes($chromosomes);
			$chromosomes = $this->_mutateRandomChromosomes($chromosomes);
			$chromosomes = $this->_setFitnessToChromosomePopulation($chromosomes);
		}
	}

	private function _getInitialChromosomePopulation() {
		$chromosomes = $this->_chromosomeStrategy->getInitialChromosomePopulation();
		return $chromosomes;
	}

	private function _setFitnessToChromosomePopulation(Array $chromosomes) {
		$chromosomes = $this->_chromosomeStrategy->setFitnessToChromosomePopulation($chromosomes);
		return $chromosomes;
	}

	private function _getTheFittestChromosomes(Array $chromosomes) {
		$chromosomes = $this->_chromosomeStrategy->getFittestChromosomes($chromosomes);
		return $chromosomes;
	}

	private function _crossOverChromosomes(Array $chromosomes) {
		$chromosomes = $this->_chromosomeStrategy->crossOverChromosomes($chromosomes);
		return $chromosomes;
	}

	private function _mutateRandomChromosomes(Array $chromosomes) {
		$chromosomes = $this->_chromosomeStrategy->mutateRandomChromosomes($chromosomes);
		return $chromosomes;
	}

	private function _isAboveDesiredAverageFitness(Array $chromosomes) {
		return false;
	}
}