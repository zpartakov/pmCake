<?php 
#Configure::write('debug', 2);
App::import('Vendor', 'jpgraph/jpgraph');
App::import('Vendor', 'jpgraph/pie');
App::import('Vendor', 'jpgraph/pie3d');
  $array = array(3, 4, 5, 6, 2, 1, 2);

  $graph = new PieGraph(500,350);

  $graph->SetShadow();

  $graph->title->Set("Pie charts");
  $graph->subtitle->Set("Changing from one graph style to another couldn't be easier!");

  $graph->SetScale('textint');
  $plot = new PiePlot3D($array);

  $graph->Add($plot);

#$graph->Stroke();                      //pour afficher seulement
$graph->Stroke(CHEMIN.'files/test.png');       //pour enregistrer

?> 
