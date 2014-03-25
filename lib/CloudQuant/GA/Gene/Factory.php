<?php
class CloudQuant_GA_Gene_Factory
{
	public function make($type)
	{
		$out = null;

		switch ($type) {
			case 'input':
				$out = new CloudQuant_GA_Gene_Input(array(1,2,3));
				break;
			case 'output':
				$out = new CloudQuant_GA_Gene_Output(array(1,2,3));
				break;
		}

		return $out;
	}
}