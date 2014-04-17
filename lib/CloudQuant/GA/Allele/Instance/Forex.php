<?php
class CloudQuant_GA_Allele_Instance_Forex extends CloudQuant_GA_Allele_Instance_Abstract
{
    private $currencyPair;
    private $metric;
    private $bars;
    private $resolution;

    public function __construct(Array $options)
    {
        $this->currencyPair = $options['currencyPair'];
        $this->metric = $options['metric'];
        $this->bars = $options['bars'];
        $this->resolution = $options['resolution'];
    }

    public function setProperty($key, $value)
    {
        $this->$key = $value;
    }
}