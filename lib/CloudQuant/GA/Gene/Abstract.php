<?php
abstract class CloudQuant_GA_Gene_Abstract
{
    protected $_alleles = array();

    public function __construct (Array $alleles)
    {
        $this->_alleles = $alleles;
    }

    public function getAlleles()
    {
        return $this->_alleles;
    }
}