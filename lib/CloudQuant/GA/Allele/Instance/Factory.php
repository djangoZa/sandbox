<?php
class CloudQuant_GA_Allele_Instance_Factory
{
    private $_instanceConstraintsFactory;

    public function __construct(CloudQuant_GA_Allele_Instance_Constraints_Factory $instanceConstraintsFactory)
    {
        $this->_instanceConstraintsFactory = $instanceConstraintsFactory;
    }

    public function makeRandom($alleleClassName)
    {   
        $out = null;

        switch ($alleleClassName) {
            case 'CloudQuant_GA_Allele_Instance_Forex':
                $options = array();
                $alleleInstanceConstraints = $this->_instanceConstraintsFactory->get($alleleClassName);
                $constraints = $alleleInstanceConstraints->getConstraints();

                foreach ($constraints as $key => $values) {
                    $options[$key] = $values[array_rand($values)];
                }

                $out = new CloudQuant_GA_Allele_Instance_Forex($options);

                break;
            default:
                throw new Exception("Cannot find allele instance of type ($alleleClassName)");
        }

        return $out;
    }
}