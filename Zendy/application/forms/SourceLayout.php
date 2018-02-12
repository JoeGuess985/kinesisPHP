<?php

class Application_Form_SourceLayout extends Zend_Form
{
	public function init()
	{
		$this->setAttrib('action', 'index');
	
	//dropdown
		$this->setAttrib('id', 'Update');
		$this->setAttrib('onChange', 'document.forms["Update"].submit()'); 

		$this->addElement('select', 'Source', array('label' => 'Source', 'multiOptions' => array('c_qwerty' => 'Qwerty', 'c_dvorak' => 'Dvorak', 'c_colemak' => 'Colemak', 'c_workmans' => 'Workmans',),));



	//radio
		$this->addElement('radio', 'Destination', array('value' => 'c_qwerty', 'label' => 'Destination', 'multiOptions' => array('c_qwerty' => 'Qwerty', 'c_dvorak' => 'Dvorak',),));

	//submit button
		$this->addElement('submit', '💾');


	//preserve values on form submission
		if(isset($_POST['Destination']))
		{
			$this->getElement('Destination')->setValue($_POST['Destination']);
		}

		if(isset($_POST['Source']))
		{
			$this->getElement('Source')->setValue($_POST['Source']);
		}
	}
}
