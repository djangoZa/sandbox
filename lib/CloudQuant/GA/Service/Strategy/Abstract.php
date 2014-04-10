<?php
abstract class CloudQuant_GA_Service_Strategy_Abstract
{
	abstract public function __construct (CloudQuant_GA_Chromosome_Strategy $chromosomeStrategy);
	abstract public function getInitialChromosomePopulation();
	abstract public function setFitnessToChromosomePopulation(Array $chromosomes);
	abstract public function getFittestChromosomes(Array $chromosomes);
	abstract public function crossOverChromosomes(Array $chromosomes);
	abstract public function mutateRandomChromosomes(Array $chromosomes);
    abstract public function isAboveDesiredAverageFitness(Array $chromosomes);
}