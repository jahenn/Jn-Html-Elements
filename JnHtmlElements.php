<?php
/**
* 
*/
class JnImage
{
	private $Source; //String
	public $width = 400;
	function __construct($src)
	{
		# code...
		$this->Source = $src;
	}
	public function render()
	{
		$tmpImage = "
			<img src=$this->Source width=$this->width />
		";
		return $tmpImage;
	}
}
/**
* 
*/
class JnTable
{
	public $rows = array();
	public $header;
	public $border = 1;
	public $footer = array();
	public $tableFooter;
	function __construct()
	{
		# code...
	}
	public function addHeader($xItem, $grafica=null)
	{
		$tmpItem = "<tr>";
		foreach ($xItem as $key => $value) {
			$tmpItem .= "<th>".strtoupper($key)."</th>";
		}
		if($grafica)
		{
			$tmpItem .= "<th>&nbsp;</th>";
		}
		$tmpItem .= "</tr>";
		$this->header = $tmpItem;
	}
	public function addFooter($data, $omite = "")
	{
		foreach ($data as  $value) {
			foreach ($value as $k => $v) {
				if(strpos($v, ":") or $k == $omite)
				{
					$v=0;
				}
				if(isset($this->footer[$k]))
				{
					$this->footer[$k] += floatval($v);
				}else{
					$this->footer[$k] = floatval($v);
				}
			}
		}
		$tmpFooter = "<tfoot>";
		foreach ($this->footer as $key => $value) {
			if($value == 0)
			{
				$value ="&nbsp;";
			}else{
				$value = number_format($value,2);
			}
			$tmpFooter .= "<th>".$value."</th>";
		}
		$tmpFooter .= "</tfoot>";
		$this->tableFooter = $tmpFooter;
	}
	public function addItem($xItem, $rowspanRight = null, $rowspanRows = 0)
	{
		$tmpItem = "<tr>";
		foreach ($xItem as $key => $value) {
			if(floatval($value) == 0 or strpos($value, ":"))
			{
				$tmpItem .= "<td>".$value."</td>";
			}else{
				$tmpItem .= "<td>".number_format(floatval($value),2)."</td>";
			}
		}
		if(count($this->rows)==0){
			if($rowspanRight != null){
				$tmpItem .= "<td rowspan='".$rowspanRows."'>".$rowspanRight."</td>";
			}
		}
		$tmpItem .= "</tr>";
		$this->rows[] = $tmpItem;
	}
	public function initWithData($data, $grafica = null)
	{
		foreach ($data as $xItem) {
			if($grafica != null){
				$this->addHeader($xItem,true);
				$this->addItem($xItem,$grafica,count($data));
			}else{
				$this->addHeader($xItem);
				$this->addItem($xItem);
			}
		}
	}
	public function render()
	{
		$tmpTable = "<table border='".$this->border."' width='800'>";
		$tmpTable .= $this->header;
		foreach ($this->rows as $value) {
			$tmpTable .= $value;
		}
		$tmpTable .= $this->tableFooter;
		$tmpTable .= "</table>";
		return $tmpTable;
	}

}

function _P($value = null){
	if($value)
	{
		return "<p>".$value."</p>";
	}else{
		return "<p></p>";
	}
}
function _HR()
{
	return "<hr/>";
};
function _H1($value)
{
	return "<h1>$value</h1>";
};
function _H2($value)
{
	return "<h2>$value</h2>";
};
?>