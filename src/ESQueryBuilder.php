<?php namespace sgoendoer\esquery;

use sgoendoer\esquery\ESQueryException;
use sgoendoer\esquery\ESQuery;

/**
 * Elastic Search query object builder
 * version 20160415
 *
 * author: Sebastian Goendoer
 * copyright: Sebastian Goendoer <sebastian.goendoer@rwth-aachen.de>
 */
class ESQueryBuilder
{
	protected $query			= NULL;
	protected $type				= NULL;
	protected $index			= NULL;
	
	public function __construct()
	{}
	
	public static function buildFromJSON($json)
	{
		$jsonObject = json_decode($json);
		
		$builder = (new ESQueryBuilder())
			->index($jsonObject->index)
			->type($jsonObject->type)
			->query($jsonObject->query);
		
		return $builder->build();
	}
	
	public function index($index)
	{
		$this->index = $index;
		return $this;
	}
	
	public function getIndex()
	{
		return $this->index;
	}
	
	public function type($type)
	{
		$this->type = $type;
		return $this;
	}
	
	public function getType()
	{
		return $this->type;
	}
	
	public function query($query)
	{
		$this->query = $query;
		return $this;
	}
	
	public function getQuery()
	{
		return $this->query;
	}
	
	public function build()
	{
		if ($this->index == NULL)
			$this->index = 'default';
		if ($this->type == NULL)
			throw new ESQueryException('Query type must not be null');
		if ($this->query == NULL)
			$this->query = '{"match_all": {}}';
		
		return new ESQuery($this);
	}
}

?>