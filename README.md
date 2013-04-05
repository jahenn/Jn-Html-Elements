Jn-Html-Elements
================

Create html elements with PHP

## Ejemplo de Implementacion ##

	require_once("jn-html-elements/JnHtmlElements.php");
	$Graph = new Graph;
	$Graph->addItem("label1","22");
	$graphPath = $Graph->render();

	$GraphImage = new JnImage($graphPath);
	echo $GraphImage->render();