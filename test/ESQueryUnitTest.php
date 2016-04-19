<?php

require_once(__DIR__ . '/../vendor/autoload.php');

use sgoendoer\esquery\ESQuery;
use sgoendoer\esquery\ESQueryBuilder;
use sgoendoer\esquery\ESQueryException;

class ESQueryUnitTest extends PHPUnit_Framework_TestCase
{
	public function test()
	{
		$esquery = (new ESQueryBuilder())
					->type('test')
					->build();
		
		$esquery->setMatch('a', 'b');
		
		// serialization // creation from string
		$this->assertEquals($esquery, ESQueryBuilder::buildFromJSON($esquery->getJSONString()));
	}
}

?>