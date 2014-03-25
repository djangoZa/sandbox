<?php
class CloudQuant_GA_Chromosome
{
	private $_genes = array();
	private $_fitness;

	public function __construct(Array $genes) {
		$this->_genes = $genes;
	}

	public function mutate($index) {
		$this->_genes[$index]->mutate();
	}

	public function setFitness ($fitness) {
		$this->_fitness = $fitness;
	}
}