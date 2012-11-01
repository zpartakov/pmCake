<?
/* BEGIN MOD leresume.ctp Frederic.Radeff@unige.ch  23.02.2011 14:52:33 CET */

writefunctionvars();
echo $foo; // displays "something"
exit;
App::import('Vendor', 'jpgraph/jpgraph');
App::import('Vendor','jpgraph/jpgraph_pie');

graphiquedo();

				$total=$yes+$no;

				echo "total: " .$total ." no: " .$no ." yes: " .$yes;

				$data=array($no,$yes);


$graph  = new PieGraph (300,200);
$graph->SetShadow();

$graph->title-> Set("Résumé migrations");

$p1  = new PiePlot($data);
$graph->Add( $p1);
$graph->Stroke(); 
?>
