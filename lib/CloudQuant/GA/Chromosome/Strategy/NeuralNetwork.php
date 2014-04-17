<?php
class CloudQuant_GA_Chromosome_Strategy_NeuralNetwork extends CloudQuant_GA_Chromosome_Strategy_Abstract
{
    private $_geneFactory;
    private $_alleleMutationService;

    public function __construct(
        CloudQuant_GA_Gene_NeuralNetwork_Factory $geneFactory,
        CloudQuant_GA_Allele_Mutation_Service $alleleMutationService
    )
    {
        $this->_geneFactory = $geneFactory;
        $this->_alleleMutationService = $alleleMutationService;
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

    public function mutateAllele(CloudQuant_GA_Allele_Instance_Abstract $allele)
    {
        $this->_alleleMutationService->mutate($allele);
    }
}