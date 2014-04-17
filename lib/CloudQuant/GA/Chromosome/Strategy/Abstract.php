<?php
abstract class CloudQuant_GA_Chromosome_Strategy_Abstract
{
    public function getChromosomeByGenes(Array $genes)
    {
        return new CloudQuant_GA_Chromosome($genes);
    }

    abstract public function getRandomChromosome();
    abstract public function mutateAllele(CloudQuant_GA_Allele_Instance_Abstract $allele);
}