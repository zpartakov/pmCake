<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php #echo $title_for_layout; ?>
		<?php echo $this->pageTitle; ?>
	</title>



	<?php
	echo $html->meta('icon');
	echo $html->css('printable');
	echo $html->script('pmcake');
	//echo $html->script('jquery/jquery_no_conflict');

	echo $scripts_for_layout;
?>

<?=$html->css(array('printable'), 'stylesheet', array('media' => 'print'));?>


</head>
<body>

			<?php echo $content_for_layout;  ?>

  <div class="noprint">
<?php 
//print page
echo "<a class=\"logoprint\" href=\"javascript:window.print();\">";
echo $html->image('icon-print.jpg', array("alt"=>"Imprimer","title"=>"Imprimer"));
echo "</a>"; 
?>
</div>
</body>
</html>
