<?php
abstract class CloudQuant_GA_Chromosome_Repository_Abstract
{
	protected $_geneFactory;
	
	public function __construct (CloudQuant_GA_Gene_Factory $geneFactory) {
		$this->_geneFactory = $geneFactory;
	}

	abstract public function getChromosome();
}