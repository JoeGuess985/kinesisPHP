<?php

class Application_Model_Index
{
	public $_data, $_pos;

	public function __construct()
	{
		$f = file_get_contents("data.txt", "r");

		$this->_data = Zend_Json::decode($f, Zend_Json::TYPE_OBJECT);
		$this->_pos = $this->_data->layouts->positions;
	}

	public function getPositions()
	{
		return $this->_pos;
	}

	public function getLayout($selected_layout)
	{
		return $this->_data->layouts->{$selected_layout};
	}
}

