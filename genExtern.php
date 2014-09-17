<?php

$fileToParse = $argv[1];
$outputDir = $argv[2];
$package = $argv[3];


echo `phpdoc -f $fileToParse -t phpdocOut --template="xml"`;
$xml = file_get_contents('phpdocOut/structure.xml');

$node = new SimpleXMLElement($xml);

$classes = $node->xpath("//class");
mkdir($outputDir);
foreach($classes as $clss){
	$className = $clss->name;

	$buffer = 
"package $package;
/**
 * ".$clss->docblock->description."
 */
extern class $className";
	if(!empty($clss->extends)){
		$buffer.=" extends ".str_replace('\\', '', $clss->extends);
	}
	$buffer.=" {\n";
	$methods = $clss->xpath(".//method");
	foreach ($methods as $method){
		$name = $method->name;
		if($name == '__construct')$name='new';

		$buffer.="\n\n";
		$buffer.=
"    /**
     * ".$method->docblock->description."\n     *";
		foreach($method->xpath(".//tag") as $tag){
			$buffer.="\n     * @".$tag->attributes()->name." ".$tag->attributes()->type." ".str_replace(array("<p>","</p>"),"",$tag->attributes()->description);
		}
    	$buffer.="\n     */\n    ";
		if($method->static)$buffer.="static ";
		$buffer.="function $name (";

		$params = $method->xpath(".//argument");
		$c=0;
		foreach($params as $param){
			if($c++>0)$buffer.=", ";
			
			$buffer.=' '.str_replace('$', '', $param->name).":".typeify($param->type);
		}
		$buffer.=" )";
		if($name!='new'){
			$retval = $method->xpath(".//tag[@name='return']");
			//var_dump($retval);
			$buffer.=':'.typeify($retval[0]->type);
		}
		$buffer.=";";


	}
	$buffer.="\n\n}\n";

	file_put_contents($outputDir."/".$className.".hx", $buffer);
	echo $buffer;

}


function typeify($type){
	$type = ucwords($type);
	if(strpos($type, "|")!==false){
		$type="Dynamic";
	}
	switch($type){
		case "Array": return "Array<Dynamic>";
		break;
		case "Integer": return "Int";
		break;
		case "Boolean": return "Bool";
		break;
		case "Object": return "Dynamic";
		break;
		case "": return "Dynamic";
		break;
		case "Callable": return "Void->Void";
		break;
		default: return $type;
		break;
	}
}






