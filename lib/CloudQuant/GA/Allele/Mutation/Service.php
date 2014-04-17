<?php
class CloudQuant_GA_Allele_Mutation_Service
{
    private $_alleleInstanceConstraintsFactory;

    public function __construct(CloudQuant_GA_Allele_Instance_Constraints_Factory $alleleInstanceConstraintsFactory)
    {
        $this->_alleleInstanceConstraintsFactory = $alleleInstanceConstraintsFactory;
    }

    public function mutate(CloudQuant_GA_Allele_Instance_Abstract $allele)
    {
        $alleleClassName = get_class($allele);
        $alleleConstraintsClass = $this->_alleleInstanceConstraintsFactory->get($alleleClassName);
        $alleleConstraints = $alleleConstraintsClass->getConstraints();
        $alleleConstraintKeys = array_keys($alleleConstraints);
        
        $randomAlleleConstraintKey = $alleleConstraintKeys[array_rand($alleleConstraintKeys)];
        $alleleConstrainValues = $alleleConstraints[$randomAlleleConstraintKey];
        $randomAlleleConstrainValue = $alleleConstrainValues[array_rand($alleleConstrainValues)];

        $allele->setProperty($randomAlleleConstraintKey, $randomAlleleConstrainValue);
    }
}