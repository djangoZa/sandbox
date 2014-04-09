<?php
class CloudQuant_GA_Chromosome_Strategy_NeuralNetwork extends CloudQuant_GA_Chromosome_Strategy_Abstract
{
    public function getRandomChromosome()
    {
        return new CloudQuant_GA_Chromosome(
            array(
                $this->_geneFactory->make('neuralNetworkInputLayer'),
                $this->_geneFactory->make('neuralNetworkHiddenLayer'),
                $this->_geneFactory->make('neuralNetworkOutputLayer')
            )
        );
    }
}