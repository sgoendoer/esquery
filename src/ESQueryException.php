<?php namespace sgoendoer\esquery;

/**
 * Elastic Search query exception
 * version 20160419
 *
 * author: Sebastian Goendoer
 * copyright: Sebastian Goendoer <sebastian.goendoer@rwth-aachen.de>
 */
class ESQueryException extends \Exception
{
	public function __construct($message = null, $code = 0, \Exception $previous = null)
	{
		parent::__construct($message, $code, $previous);
	}
}

?>