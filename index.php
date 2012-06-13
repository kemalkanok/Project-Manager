<?php
include 'libs/dbOperations.php';
$db= new dbOperations();
$query=$db->Sql("SELECT projects.id, projects.name, projects.url, projects.endtime,
		 		 CONVERT( (SUM( state ) / COUNT( state ) *100 ) , SIGNED) AS ratio
				 FROM projects
				 INNER JOIN tasks ON projects.id = tasks.project_id
				 GROUP BY projects.name
				 LIMIT 0 , 30");
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