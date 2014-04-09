<?php
require_once(dirname(__FILE__) . '/../lib/bootstrap.php');

$gaGeneFactory = new CloudQuant_GA_Gene_Factory();
$gaChromosomeStrategy = new CloudQuant_Ga_Chromosome_Strategy_NeuralNetwork($gaGeneFactory);
$gaServiceStrategy = new CloudQuant_GA_Service_Strategy_Basic($gaChromosomeStrategy);
$gaService = new CloudQuant_GA_Service($gaServiceStrategy);
$gaService->run();