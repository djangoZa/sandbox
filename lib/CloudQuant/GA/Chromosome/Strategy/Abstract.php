<?php
abstract class CloudQuant_GA_Chromosome_Strategy_Abstract
{
    protected $_geneFactory;

    public function __construct(CloudQuant_GA_Gene_Factory $geneFactory)
    {
        $this->_geneFactory = $geneFactory;
    }

    public function getChromosomeByGenes(Array $genes)
    {
        return new CloudQuant_GA_Chromosome($genes);
    }

    abstract public function getRandomChromosome();
}