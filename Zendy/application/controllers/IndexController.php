<?php

class IndexController extends Zend_Controller_Action
{
	public function init()
	{
		/* Initialize action controller here */
	}

	public function indexAction()
	{
		$objIndex = new Application_Model_Index();

//globals
		$this->view->srcLayout = $objIndex->getLayout(isset($_POST['Source']) ? $_POST['Source'] : 'c_qwerty');
		$this->view->destLayout = $objIndex->getLayout(isset($_POST['Destination']) ? $_POST['Destination'] : 'c_qwerty');
		$this->view->pos = $objIndex->getPositions();


//trigger download request if form submit button populated post data	
		if(isset($_POST['💾']))
		{
			$this->downloadLayout();
		}


//FORMS
		$srcForm = new Application_Form_SourceLayout();
		$this->view->srcForm = $srcForm;

	}

	public function mapKey($src_layout, $targ_layout)
	{
		return ('[' . $src_layout . ']>[' . $targ_layout . ']');
	}

	public function generateLayout()
	{	
		$strOut = '';
		foreach(array_map([$this, 'mapKey'], $this->view->srcLayout, $this->view->destLayout) as &$value) 
		{
			$strOut = $strOut . $value . '\n'; 
		}	

		return $strOut;
	}

	public function downloadLayout()
	{
		echo "<script type='text/javascript'> 
			var dlLink = document.createElement('a'); 
			dlLink.href = 'data:text/plain;charset=utf-8,' + encodeURIComponent('" . $this->generateLayout() . "'); 
			dlLink.style.display = 'none'; dlLink.download = '" . $_POST['Destination'] . ".txt'; 
			document.body.appendChild(dlLink); dlLink.click(); 
		</script>";
	} 
}
