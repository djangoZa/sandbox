<?php
class CloudQuant_GA_Allele_Instance_Constraints_Factory
{
    public function get($alleleClassName)
    {
        $out = null;

        switch ($alleleClassName) {
            case 'CloudQuant_GA_Allele_Instance_Forex':
                $out = new CloudQuant_GA_Allele_Instance_Constraints_Forex();
                break;
            default:
                throw new Exception("Cannot find constraints for allele of type ($alleleClassName)");
        }

        return $out;
    }
}