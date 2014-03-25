<?php
class CloudQuant_GA_Service
{
	private $_maxPopulationSize = 100;
	private $_chromosomeRepository;

	public function __construct(CloudQuant_GA_Chromosome_Repository_Abstract $chromosomeRepository) {
		$this->_chromosomeRepository = $chromosomeRepository;
	}

	public function run() {

		$generation = 1;

		$chromosomes = $this->_getInitialChromosomePopulation();
		var_dump($chromosomes); die();
		$chromosomes = $this->_setFitnessToChromosomePopulation($chromosomes);

		while ($this->_notAboveDesiredAverageFitness($chromosomes)) {

			$generation += 1;

			echo "Generation: " . $generation . "\n";
			
			$chromosomes = $this->_getTheFittestChromosomes($chromosomes);
			$chromosomes = $this->_crossOverChromosomes($chromosomes);
			$chromosomes = $this->_mutateRandomChromosomes($chromosomes);
			$chromosomes = $this->_setFitnessToChromosomePopulation($chromosomes);

		}

	}

	private function _getInitialChromosomePopulation() {
		$out = array();

		for ($i = 0; $i < $this->_maxPopulationSize; $i++) {
			$out[] = $this->_chromosomeRepository->getChromosome();
		}

		return $out;
	}

	private function _breedChromosomePopulation(Array $chromosomes) {
		return array();
	}

	private function _setFitnessToChromosomePopulation(Array $chromosomes) {
		return array();
	}

	private function _getTheFittestChromosomes() {
		return array();
	}

	private function _crossOverChromosomes(Array $chromosomes) {
		return array();
	}

	private function _mutateRandomChromosomes(Array $chromosomes) {
		return array();
	}

	private function _notAboveDesiredAverageFitness(Array $chromosomes) {
		return true;
	}
}