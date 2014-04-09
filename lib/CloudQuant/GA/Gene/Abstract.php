<?php
abstract class CloudQuant_GA_Gene_Abstract
{
    protected $_alleles = array();

    public function __construct (Array $alleles)
    {
        $this->_alleles = $alleles;
    }

    abstract public function mutate();
}