<?php
/**
* 
*/
class JnImage
{
	private $Source; //String
	function __construct($src)
	{
		# code...
		$this->Source = $src;

	}
	public function render()
	{
		$tmpImage = "
			<img src=$this->Source />
		";
		return $tmpImage;
	}
}

?>