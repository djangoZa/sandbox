<?php
abstract class CloudQuant_GA_Chromosome_Strategy_Abstract
{
	protected $_geneFactory;
	
	public function __construct (CloudQuant_GA_Gene_Factory $geneFactory) {
		$this->_geneFactory = $geneFactory;
	}

	abstract public function makeRandomChromosome();
	abstract public function setFitness(CloudQuant_GA_Chromosome $chromosome);
	abstract public function getMaxPopulationCount();
}