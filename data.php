<?php

// require_once("vendor/jpgraph/jpgraph/lib/JpGraph/src")

//require_once ("function.php");

function parseUrl(){
// print_r ($_GET);
    switch ($_GET['graph']) {
	case 'graph1': {
	  drawGraph1();
	  break;
	}
	//default: {echo "error"; break; }
    }


    switch ($_GET['data']) {
	case 'insertGraphics': {
	  insertGraphics();
	  break;
	}
	//default: {echo "error"; break; }
    }
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

 
$datax = array(3.5,3.7,3,4,6.2,6,3.5,8,14,8,11.1,13.7);
$datay = array(20,22,12,13,17,20,16,19,30,31,40,43);
 
$graph = new Graph(500,300);
$graph->SetScale("linlin");
 
$graph->img->SetMargin(20,20,20,20);        
$graph->SetShadow();
 
$graph->title->Set("Тестовий графік");
//$graph->title->SetFont(DejaVuSans);
 
$sp1 = new ScatterPlot($datay,$datax);
 
$graph->Add($sp1);
$graph->Stroke();
  
}

function insertGraphics() {

$graphics = <<<'EOT'

<div class="panel panel-default col-md-6">
  <div class="panel-body">
    <h3 class="panel-title">Graph 1</h3>
    <img src="data.php?graph=graph1" alt="Graphic 1" class="img-responsive" />
  </div>
</div>

EOT;

  echo $graphics;

}


parseUrl();

?>
