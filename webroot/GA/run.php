<?php
class Chromosome
{
    private $_genes = array();

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
}

class Gene
{
	private $_name;
    private $_value;

    public function __construct(Array $options)
    {
    	$this->_name = $options['name'];
    	$this->_value = $options['value'];
    }
}

class GeneOptions
{
	private $_name;
	private $_options = array();

	public function __construct($name, Array $options)
	{
		$this->_name = $name;
		$this->_options = $options;
	}

	public function getName()
	{
		return $this->_name;
	}

	public function getOptions()
	{
		return $this->_options;
	}
}

class GAService
{
	private $_minimumSymbols = 2;
	private $_maxPopulationSize = 1;
	private $_geneOptions;

	public function __construct(Array $geneOptions)
	{
		$this->_geneOptions = $geneOptions;
	}

	public function run()
	{
		$chromosomes = $this->_getInitialChromosomePopulation();
		
		var_dump($chromosomes);
	}

	private function _getInitialChromosomePopulation()
	{
		$chromosomes = array();

		for ($i = 0; $i < $this->_maxPopulationSize; $i++)
		{
			$genes = array();
			$symbols = array();
			$barsPerSymbol = array();
			$hiddenLayers = 1;
			$nodesPerHiddenLayers = 1;

			foreach($this->_geneOptions as $geneOption)
			{
				$name = $geneOption->getName();
				$options = $geneOption->getOptions();

				switch ($name)
				{
					case "symbol":

						$randomEntries = rand($this->_minimumSymbols, count($options));
						$randomKeys = array_rand($options, $randomEntries);

						//POPULATE THE SYMBOLS
						if (is_array($randomKeys))
						{
							foreach($randomKeys as $key)
							{
								$symbols[] = $options[$key];
							}
						} else {
							$symbols[] = $options[$randomKeys];
						}
						
						//CREATE THE GENE
						$genes[] = new Gene(array(
							'name' => $name,
							'value' => $symbols
						));

						break;

					case "barsPerSymbol":

						$barsPerSymbol = array();

						//POPULATE THE BARS PER SYMBOL
						foreach($symbols as $symbol)
						{
							$randomKey = array_rand($options);
							$barsPerSymbol[$symbol] = $options[$randomKey];
						}

						//CREATE THE GENE
						$genes[] = new Gene(array(
							'name' => $name,
							'value' => $barsPerSymbol
						));

					    break;

					case "hiddenLayers":

						//POPULATE THE HIDDEN LAYERS
						$randomKey = array_rand($options);
						$hiddenLayers = $options[$randomKey];

						//CREATE THE GENE
						$genes[] = new Gene(array(
							'name' => $name,
							'value' => $hiddenLayers
						));

						break;

					case "nodesPerHiddenLayer":

						$nodesPerHiddenLayer = array();

						//POPULATE THE NODES PER HIDDEN LAYER
						for($l = 0; $l < $hiddenLayers; $l++)
						{
							$randomKey = array_rand($options);
							$nodes = $options[$randomKey];
							$nodesPerHiddenLayer[$l] = $nodes;
						}

						//CREATE THE GENE
						$genes[] = new Gene(array(
							'name' => $name,
							'value' => $nodesPerHiddenLayer
						));

					    break;
				}
			}

			//CREATE THE CHROMOSOME
		    $chromosomes[] = new Chromosome($genes);

			//UNSET
			unset($genes);
			unset($symbols);
			unset($barsPerSymbol);
			unset($hiddenLayers);
			unset($nodesPerHiddenLayers);
		}

		return $chromosomes;
	}
}

$gaService = new GAService(array(
	new GeneOptions('symbol', array('usd','zar','gbp')),
	new GeneOptions('barsPerSymbol', array(2,3,5,8,13,21)),
	new GeneOptions('hiddenLayers', array(1,2,3,5)),
	new GeneOptions('nodesPerHiddenLayer', array(1,2,3,5,8,13,21))
));
$gaService->run();