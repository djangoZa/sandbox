<?php
abstract class CloudQuant_GA_Allele_Abstract
{
    private $_name;

    abstract public function mutate();

    public function getName()
    {
        return $this->_name;
    }
}