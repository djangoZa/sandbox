<?php
class CloudQuant_GA_Service
{
	private $_gaServiceStrategy;

	public function __construct(CloudQuant_GA_Service_Strategy_Abstract $gaServiceStrategy)
	{
		$this->_gaServiceStrategy = $gaServiceStrategy;
	}

	public function run()
	{
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

	private function _getInitialChromosomePopulation()
	{
		$chromosomes = $this->_gaServiceStrategy->getInitialChromosomePopulation();
		return $chromosomes;
	}

	private function _setFitnessToChromosomePopulation(Array $chromosomes)
	{
		$chromosomes = $this->_gaServiceStrategy->setFitnessToChromosomePopulation($chromosomes);
		return $chromosomes;
	}

	private function _getTheFittestChromosomes(Array $chromosomes)
	{
		$chromosomes = $this->_gaServiceStrategy->getFittestChromosomes($chromosomes);
		return $chromosomes;
	}

	private function _crossOverChromosomes(Array $chromosomes)
	{
		$chromosomes = $this->_gaServiceStrategy->crossOverChromosomes($chromosomes);
		return $chromosomes;
	}

	private function _mutateRandomChromosomes(Array $chromosomes)
	{
		$chromosomes = $this->_gaServiceStrategy->mutateRandomChromosomes($chromosomes);
		return $chromosomes;
	}

	private function _isAboveDesiredAverageFitness(Array $chromosomes)
	{
		return false;
	}
}