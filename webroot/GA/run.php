<?php
$gaService = new GAService(
	array(
		new GeneOption($name = 'symbols', $limit = 0, $value = array('usd','zar','gbp')),
		new GeneOption($name = 'barsPerSymbol', $limit = 1, array(2,3,5,8,13,21), 'symbols'),
		new GeneOption($name = 'hiddenLayers', $limit = 1, array(1,2,3,5)),
		new GeneOption($name = 'nodesPerHiddenLayer', $limit = 1, array(1,2,3,5,8,13,21), 'hiddenLayers')
	)
);

$gaService->run();


class Chromosome
{
    private $_genes = array();
    private $_fitness = 0;

    public function __construct(Array $genes)
    {
    	foreach ($genes as $gene)
    	{
    		if($gene instanceof Gene)
    		{
    			$this->_genes[] = $gene;
    		}
    	}
    }

    public function setFitness($value)
    {
    	$this->_fitness = $value;
    }

    public function getFitness()
    {
    	return $this->_fitness;
    }
}

class Gene
{
	private $_name;
    private $_values;

    public function __construct($name, $values)
    {
    	$this->_name = $name;
    	$this->_values = $values;
    }

    public function getName()
    {
    	return $this->_name;
    }

    public function getValues()
    {
    	return $this->_values;
    }
}

class GeneOption
{
	private $_name;
	private $_limit;
	private $_options = array();
	private $_parentGeneName = array();

	public function __construct($name, $limit, Array $options, $parentGeneName = '')
	{
		$this->_name = $name;
		$this->_limit = $limit;
		$this->_options = $options;
		$this->_parentGeneName = $parentGeneName;
	}

	public function getName()
	{
		return $this->_name;
	}

	public function getOptions()
	{
		return $this->_options;
	}

	public function getParentGeneName()
	{
		return $this->_parentGeneName;
	}

	public function getLimit()
	{
		return $this->_limit;
	}
}

class GAService
{
	private $_maxPopulationSize = 100;
	private $_geneOptions;

	public function __construct(Array $geneOptions)
	{
		$this->_geneOptions = $geneOptions;
	}

	public function run()
	{
		$continue = true;
		$generation = 0;

		//Get the initial chromosome population
		$chromosomes = $this->_getInitialChromosomePopulation();

		while ($continue === true) 
		{
			$generation += 1;
			echo "Generation: $generation \n";

			//Calculate the fitness functions per chromsomes
			$chromosomes = $this->_calculateFitnessFunctionPerChromosome($chromosomes);

			if ($this->_isRunSufficient($chromosomes)) {
				//Stop Replication
				$continue = false;
			} else {
				//Replicate the chromosomes
				$chromosomes = $this->_getChromosomesForBreeding($chromosomes);
				$chromosomes = $this->_crossOverChromosomes($chromosomes);
				$chromosomes = $this->_mutateChromosomes($chromosomes);
			}	
		}
	}

	private function _isRunSufficient()
	{
		return false;
	}

	private function _mutateChromosomes(Array $chromosomes)
	{
		return $chromosomes;
	}

	private function _crossOverChromosomes(Array $chromosomes)
	{
		return $chromosomes;
	}

	private function _getChromosomesForBreeding(Array $chromosomes)
	{
		return $chromosomes;
	}

	private function _calculateFitnessFunctionPerChromosome(Array $chromosomes)
	{
		$out = array();

		foreach ($chromosomes as $chromosome) {
			$chromosome = $this->_setFitness($chromosome);
			$out[] = $chromosome;
		}

		return $out;
	}	

	private function _getRandomGeneOptionValues(GeneOption $geneOption, $limit)
	{
		$out = null;

		$geneOptions = $geneOption->getOptions();
		$limit = (empty($limit)) ? count($geneOptions) : $limit;
		$randomKeys = array_rand($geneOptions, rand(1, $limit));

		if (is_array($randomKeys)) {
			$out = array();
			foreach ($randomKeys as $key) {
				$out[] = $geneOptions[$key];
			}
		} else {
			$out = $geneOptions[$randomKeys];
		}

		return $out;
	}

	private function _setFitness(Chromosome $chromosome)
	{
		$fitness = rand(1, 100) / 100;
		$chromosome->setFitness($fitness);
		return $chromosome;
	}

	private function _getGene(Array $genes, $geneName)
	{
	    $out = array();

		foreach($genes as $gene) {
			if ($gene->getName() == $geneName) {
				$out = $gene;
				break;
			}
		}

		return $out;
	}

	private function _getInitialChromosomePopulation()
	{
		$chromosomes = array();

		//GENERATE INITIAL POPULATION OF CHROMOMES
		for ($c = 0; $c < $this->_maxPopulationSize; $c++) {

			//CREATE THE GENES FOR THE CHROMOSOME
			$genes = array();

			foreach ($this->_geneOptions as $geneOption) {

				//GET THE GENE OPTION ATTRIBUTES
				$parentGeneName = $geneOption->getParentGeneName();

				//CREATE THE GENE
				if (!empty($parentGeneName)) {

					$parentGene = $this->_getGene($genes, $parentGeneName);
					$parentGeneValues = $parentGene->getValues();
					$geneOptionValues = array();

					if (is_array($parentGeneValues))
					{
						foreach($parentGeneValues as $value) {
							$geneOptionValues[] = $this->_getRandomGeneOptionValues($geneOption, $geneOption->getLimit());
						}
					} else if (is_int($parentGeneValues)) {
						for ($pi = 0; $pi < $parentGeneValues; $pi++) {
							$geneOptionValues[] = $this->_getRandomGeneOptionValues($geneOption, $geneOption->getLimit());
						}
					} else {
						$geneOptionValues[] = $this->_getRandomGeneOptionValues($geneOption, $geneOption->getLimit());
					}
					

					$genes[] = new Gene($geneOption->getName(), $geneOptionValues);

				} else {

					$genes[] = new Gene($geneOption->getName(), $this->_getRandomGeneOptionValues($geneOption, $geneOption->getLimit()));

				}

			}

			//CREATE THE CHROMOSOME
	    	$chromosomes[] = new Chromosome($genes);
		}

		return $chromosomes;
	}
}