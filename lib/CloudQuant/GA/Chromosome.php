<?php
class CloudQuant_GA_Chromosome
{
	private $_genes = array();
	private $_geneCount;
	private $_fitness;

	public function __construct(Array $genes)
	{
		$this->_genes = $genes;
		$this->_geneCount = count($this->_genes);
	}

	public function mutate()
	{
		$index = floor((mt_rand() / mt_getrandmax()) * $this->_geneCount);
		$this->_genes[$index]->mutate();
	}

	public function setFitness($fitness)
	{
		$this->_fitness = $fitness;
	}

	public function getFitness()
	{
		return $this->_fitness;
	}

	public function getGenes()
	{
		return $this->_genes;
	}

	public function getGene($index)
	{
		return $this->_genes[$index];
	}
}