<?php
abstract class Allele
{
    private $_name;

    abstract public function mutate();

    public function getName()
    {
        return $this->_name;
    }
}