<?php
include 'libs/dbOperations.php';
$db= new dbOperations();
$query=$db->Sql("Select * from projects");
include 'libs/parser.php';
$parser = new parser();
$sqldatas=$query->fetchAll();
foreach ($sqldatas as $key => $value) {
	$sqldatas[$key]["title"]=$sqldatas[$key]["name"];
	$sqldatas[$key]["name"]=substr($sqldatas[$key]["name"], 0, 10);
}

$data=array(
		'projects'=>$sqldatas
);
$parser->parse($data,"views/home.html");
?>