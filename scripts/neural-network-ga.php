<?php
require_once(dirname(__FILE__) . '/../lib/bootstrap.php');

$chromosomeStrategy = CloudQuant_GA_Chromosome_Strategy_Factory::make('NeuralNetwork');
$gaService = new CloudQuant_GA_Service($chromosomeStrategy);
$gaService->run();