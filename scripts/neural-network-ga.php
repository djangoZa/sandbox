<?php
require_once(dirname(__FILE__) . '/../lib/bootstrap.php');

$gaAlleleInstanceConstraintsFactory = new CloudQuant_GA_Allele_Instance_Constraints_Factory();
$gaAlleleMutationService = new CloudQuant_GA_Allele_Mutation_Service($gaAlleleInstanceConstraintsFactory);
$gaAlleleInstanceFactory = new CloudQuant_GA_Allele_Instance_Factory($gaAlleleInstanceConstraintsFactory);
$gaGeneFactory = new CloudQuant_GA_Gene_NeuralNetwork_Factory($gaAlleleInstanceFactory);
$gaChromosomeStrategy = new CloudQuant_Ga_Chromosome_Strategy_NeuralNetwork($gaGeneFactory, $gaAlleleMutationService);
$gaServiceStrategy = new CloudQuant_GA_Service_Strategy_Basic($gaChromosomeStrategy);
$gaService = new CloudQuant_GA_Service($gaServiceStrategy);
$gaService->run();