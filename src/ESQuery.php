<?php namespace sgoendoer\esquery;

use sgoendoer\esquery\ESQueryBuilder;
use sgoendoer\esquery\ESQueryException;

use sgoendoer\json\JSONObject;

/**
 * Elastic Search query
 * version 20160419
 *
 * author: Sebastian Goendoer
 * copyright: Sebastian Goendoer <sebastian.goendoer@rwth-aachen.de>
 */
class ESQuery
{
	protected $query			= NULL;
	protected $type				= NULL;
	protected $index			= NULL;
	
	public function __construct(ESQueryBuilder $builder)
	{
		$this->index = $builder->getIndex();
		$this->type = $builder->getType();
		$this->query = $builder->getQuery();
	}
	
	public function setIndex($index = 'default')
	{
		$this->index = $index;
		return $this;
	}
	
	public function getIndex()
	{
		return $this->index;
	}
	
	public function setType($type)
	{
		$this->type = $type;
		return $this;
	}
	
	public function getType()
	{
		return $this->type;
	}
	
	public function setQuery(JSONObject $query)
	{
		$this->query = $query;
		return $this;
	}
	
	public function getQuery()
	{
		$query = new JSONObject($this->query);
		return $query;
	}
	
	public function setMatch($column, $value)
	{
		$this->query = new JSONObject('{"match":{"' . $column . '":"' . $value . '"}}');
		return $this;
	}
	
	public function getJSONString()
	{
		$json = '{'
			. '"index":"' . $this->index . '",'
			. '"type":"' . $this->type . '",'
			. '"query":' . $this->query->write() . ''
			. '}';
		
		return $json;
	}
}

?>