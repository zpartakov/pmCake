<?
$serveurcible=$_GET['serveurcible'];
if(!$serveurcible) {
	$serveurcible=2;
}

if($serveurcible=="2") {
$this->pageTitle="Résumé de toutes les migrations -> lipari2";	
} elseif($serveurcible=="6"){
		$this->pageTitle="Résumé de toutes les migrations -> asinara";

} else{
	$this->pageTitle="Résumé de toutes les migrations";

}


?>
<h1><? echo $this->pageTitle ;?></h1>
<?
if($serveurcible=="2") {
?>
<h2>Répertoires à migrer au 6.10.2010: 28160</h2>
<?
}
?>
<?


resumer($serveurcible); //see lesmigrations_controller.php
//others after see /app_controller.php
mysqls();
vhosts();
#calcul_heures();




/*$total=4;
$data1=array(1,2,3,4);
$data2=array(1,2,3,4);
$data3=array(1,2,3,4);
$data4=array(1,2,3,4);
// Create the Pie Graph.
$graph = new PieGraph(1000,950,"auto");
$graph->SetShadow();
$graph ->legend->Pos( 0.25,0.8,"right" ,"bottom");
$graph->legend->SetFont(FF_VERDANA,FS_BOLD,12);
$graph->title->SetMargin (20); 

// Set A title for the plot
$graph->title->Set("Full Report");
$graph->title->SetFont(FF_VERDANA,FS_BOLD,24);
//students
$graph->subtitle->Set("(n=$total)");
$graph->subtitle->SetFont(FF_VERDANA,FS_BOLD,8);


// Create plots
$size=0.13;
$p1 = new PiePlot($data1);
$p1->SetLegends(array("1 - Not Yet","2","3 - Emerging","4","5 - Somewhat","6","7 - Completely","Blank (No Answer)"));
$p1->SetSize($size);
$p1->SetGuideLines(true,false);
$p1->SetGuideLinesAdjust(1.1,3);
$p1->SetCenter(0.25,0.32);
$p1->value->SetFont(FF_VERDANA);
$p1->title->Set("Positive Social Emotional Skills");
$p1->title->SetMargin(45);
$p1->SetSliceColors(array('red','orange','yellow','green','purple','blue','brown','black')); 


$p2 = new PiePlot($data2);
$p2->SetSize($size);
$p2->SetGuideLines(true,false);
$p2->SetGuideLinesAdjust(1.1,3);
$p2->SetCenter(0.65,0.32);
$p2->value->SetFont(FF_VERDANA);
$p2->title->Set("Acquisition and Use of Knowledge and Skills");
$p2->title->SetMargin(45);
$p2->SetSliceColors(array('red','orange','yellow','green','purple','blue','brown','black')); 


$p3 = new PiePlot($data3);
$p3->SetSize($size);
$p3->SetGuideLines(true,false);
$p3->SetGuideLinesAdjust(1.1,3);
$p3->SetCenter(0.25,0.75);
$p3->value->SetFont(FF_VERDANA);
$p3->title->Set("Use of Appropriate Behaviors to Meet Needs");
$p3->title->SetMargin(45);
$p3->SetSliceColors(array('red','orange','yellow','green','purple','blue','brown','black')); 



$graph->Add($p1);
$graph->Add($p2);
$graph->Add($p3);

$graph->Stroke(); */
?>
