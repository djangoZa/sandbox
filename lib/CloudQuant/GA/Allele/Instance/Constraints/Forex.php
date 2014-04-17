<?php
class CloudQuant_GA_Allele_Instance_Constraints_Forex extends CloudQuant_GA_Allele_Instance_Constraints_Abstract
{
    private $currencyPair = array('GBP/USD', 'GBP/JPY');
    private $metric = array('open', 'high', 'low', 'close', 'volume');
    private $bars = array(2,3,5,8,13,21,34,55,89);
    private $resolution = array(2,3,5,8,13,21,34,55,89);

    public function getConstraints()
    {
        $className = get_class($this);
        $constraints = get_class_vars($className);
        return $constraints;
    }
}