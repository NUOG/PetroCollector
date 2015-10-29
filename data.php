<?php

// require_once("vendor/jpgraph/jpgraph/lib/JpGraph/src")

require_once ("function.php");

parseUrl();

function parseUrl(){
// print_r ($_GET);

//    $relation[] = checkRelation();
//    var_dump($relation);
  if (array_key_exists('graph', $_GET)) { 
    switch ($_GET['graph']) {
	case 'graph1': {
          //$_GET['research'] = 'stat-1';          
	  //drawGraph1();
	  drawGraph($_GET['tableName']);
	  break;
	}
	//default: {echo "error"; break; }
    }
  }


  if (array_key_exists('data', $_GET)) { 
    switch ($_GET['data']) {
	case 'insertGraphics': {
	  insertGraphics();
	  break;
	}
	case 'showTable': {
	  showTableDependings($_GET['research']);
	  break;
	}
	//default: {echo "error"; break; }
    }
  }
}

function checkRelation() {
  $rel['1']='';
 
  for ($i=1; $i <= 8; $i++) {
    $relName = 'dependence-chb-' . $i;
    if (array_key_exists($relName, $_GET)) {
      if ($_GET[$relName] == 'on') {
         $rel[$i] = 1;
      } else {
         $rel[$i] = 0;
      }
    }
  }
//var_dump($rel);
  return $rel;

}

function drawGraph1() {
//  echo "this is graph 1";
require_once ('vendor/jpgraph/jpgraph/lib/JpGraph/src/jpgraph.php');
require_once ('vendor/jpgraph/jpgraph/lib/JpGraph/src/jpgraph_scatter.php');

#include "vendor/jpgraph/jpgraph/lib/JpGraph/src/jpgraph.php";
#include 'vendor/jpgraph/jpgraph/lib/JpGraph/src/jpgraph_line.php';
#include "vendor/jpgraph/jpgraph/lib/JpGraph/src/jpgraph_scatter.php";
#require_once ('vendor/jpgraph/jpgraph/lib/JpGraph/src/jpgraph_utils.inc.php');
#require_once ('vendor/jpgraph/jpgraph/lib/JpGraph/src/jpgraph_scatter.php');
//echo $_GET['research'];
$GDT = getTableData('Вишнянське_стат_1');

//echo "<pre>";
//var_dump($GDT);
//echo "</pre>";
//settype($GDT['kp'], 'float');
//settype($GDT['kpe'], 'float');
//$GDT['kp']['0'] = 0;
//$GDT['kpe']['0'] = 0;

//for ($i = 1; $i <= count($GDT['kp']); $i++) {
//  $datax[$i-1] = (float)$GDT['kp'][$i];
//  $datay[$i-1] = (float)$GDT['kpe'][$i];
//}
$datax = $GDT['kp'];
$datay = $GDT['kpe'];

//$datax = array(3.5,3.7,3,4,6.2,6,3.5,8,14,8,11.1,13.7);
//$datay = array(20,22,12,13,17,20,16,19,30,31,40,43);
 
$graph = new Graph(400,400);
$graph->SetScale("linlin");
 
$graph->img->SetMargin(60,30,30,30);        
$graph->SetShadow();
 
$graph->title->Set("Залежність між Кп та Кпе");
//$graph->title->SetFont(DejaVuSans);

$graph->yaxis->title->Set('Кп');
$graph->xaxis->title->Set('Кпе');

$sp1 = new ScatterPlot($datay,$datax);
 
$graph->Add($sp1);
$graph->Stroke();
  
}

// 
function drawGraph($tableName) {

require_once ('vendor/jpgraph/jpgraph/lib/JpGraph/src/jpgraph.php');
require_once ('vendor/jpgraph/jpgraph/lib/JpGraph/src/jpgraph_scatter.php');
require_once ('vendor/jpgraph/jpgraph/lib/JpGraph/src/jpgraph_line.php');

$GDT = getTableData($tableName);

$datax = $GDT['kp'];
$datay = $GDT['kpe'];

  $x1 = array(0, 12);
  $y1 = array(6.58, 22.78);

$graph = new Graph(400,400);
$graph->SetScale("linlin");
 
$graph->img->SetMargin(60,30,30,30);
//$graph->img->SetPadding(10,10,10,10)
$graph->SetShadow();
 
$graph->title->Set("Залежність між Кп та Кпе");
//$graph->title->SetFont(DejaVuSans);

$graph->yaxis->title->Set('Кп');
$graph->xaxis->title->Set('Кпе');

$sp1 = new ScatterPlot($datay,$datax);

$sp2 = new LinePlot($x1,$y1);

$graph->Add($sp1);
$graph->Add($sp2);

$sp2->SetColor("#f00");
$sp2->SetWeight(2);

$graph->Stroke();
  
}

function insertGraphics() {

$relation = checkRelation();

  for ($i = 1; $i <= 8; $i++) {
   if (isset($relation[$i])) {
    if ($relation[$i] == 1) {
      insertGraphic($i);
    }
   }
  }


//var_dump (getTableData('stat-1'));

/*
 * echo '<pre>';
 * var_dump($_GET); 
 * echo '</pre>';
 */

}

function insertGraphic($chartNumber) {
 
  $chartTitle = 'Графік #' . $chartNumber;
  $tableName = $_GET['research'];

$graphics = <<<EOT

<div class="panel panel-default col-md-6">
  <div class="panel-body">
    <h3 class="panel-title"> $chartTitle </h3>
    <img src="data.php?graph=graph1&tableName=$tableName" alt="Graphic 1" class="img-responsive" />
  </div>
</div>

EOT;

  echo $graphics; 
/*
 * echo '<pre>';
 * var_dump($_GET); 
 * echo '</pre>';
 */
}


function insertTableRow() {

  $tableRow = <<<EOT
	<tr>
	  <td>...</td>
	  <td>...</td>
	  <td>...</td>
	  <td>...</td>
	  <td>...</td>
	  <td>...</td>
	</tr>
EOT;

  echo $tableRow;

}



?>
