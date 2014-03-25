<?php
require_once(dirname(__FILE__) . '/../lib/bootstrap.php');

$chromosomeRepository = CloudQuant_GA_Chromosome_Repository_Factory::make('NeuralNetwork');
$gaService = new CloudQuant_GA_Service($chromosomeRepository);
$gaService->run();