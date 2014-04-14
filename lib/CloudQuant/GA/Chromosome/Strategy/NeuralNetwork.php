<?php
class CloudQuant_GA_Chromosome_Strategy_NeuralNetwork extends CloudQuant_GA_Chromosome_Strategy_Abstract
{
    private $_geneFactory;

    public function __construct(CloudQuant_GA_Gene_NeuralNetwork_Factory $geneFactory)
    {
        $this->_geneFactory = $geneFactory;
    }

    public function getRandomChromosome()
    {
        return new CloudQuant_GA_Chromosome(
            array(
                $this->_geneFactory->makeRandom('InputLayer'),
                $this->_geneFactory->makeRandom('HiddenLayer'),
                $this->_geneFactory->makeRandom('OutputLayer')
            )
        );
    }
}