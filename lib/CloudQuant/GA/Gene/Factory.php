<?php
class CloudQuant_GA_Gene_Factory
{
	public function make($type)
	{
		$out = null;

		switch ($type) {
			case 'input':
				$out = new CloudQuant_GA_Gene_Input(range(rand(0,50), 100, rand(5,10)));
				break;
		    case 'hidden':
		    	$out = new CloudQuant_GA_Gene_Hidden(range(rand(0,50), 100, rand(5,10)));
				break;
			case 'output':
				$out = new CloudQuant_GA_Gene_Output(range(rand(0,50), 100, rand(5,10)));
				break;
		}

		return $out;
	}
}