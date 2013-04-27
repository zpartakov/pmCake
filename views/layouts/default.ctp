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
	
	echo $html->css('pmcake');
	echo $html->css('hiermenu');
	echo $html->script('jquery/jquery');
	?>
	<script type="text/javascript">
//<![CDATA[
var date_format = "d.m.y";
//]]>

</script>
<script type="text/javascript">
//<![CDATA[
var application_root = "<? echo CHEMIN;?>";
//]]>
</script>	
	<?php
	echo $html->script('scrolltopcontrol');
	
?>

<script type="text/javascript">
	function lookup(inputString) {
		if(inputString.length <2) {
			// Hide the suggestion box.
			$('#suggestions').hide();
		} else {
			$.post("<? echo CHEMIN;?>pages/rpc", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').show();
					$('#autoSuggestionsList').html(data);
				}
			});
		}
	} // lookup
	
	function fill(thisValue) {
		$('#inputString').val(thisValue);
		setTimeout("$('#suggestions').hide();", 200);
	}
</script>
<?


	echo $html->script('pmcake');
	//echo $html->script('jquery/jquery_no_conflict');

	echo $scripts_for_layout;
?>

<?=$html->css(array('print'), 'stylesheet', array('media' => 'print'));?>


</head>
<body>
<!-- new with cake 1.3 for dump MySQL - to activate setConfigure::write('debug', 2); in config/core.php -->
<?php echo $this->element('sql_dump'); ?>

<a name="top"></a>
<div id="container"><!-- BEGIN CONTAINER HTML BODY-->

<?
#echo $this->element('navigation');
echo $this->element('menu');

//echo $this->element('navbar');

?>  



<!-- ########################### GLOBAL SEARCH ENGINE ######################## -->

	<div class="globalsearch">
	<!-- begin search form -->
	<form action="<? echo CHEMIN; ?>pages/search/">
				<input type="text" size="10" value="" name="q" id="inputString" onkeyup="lookup(this.value);" onblur="fill();" value="<?php echo $_GET['q'];?>"/>	
				<input type="checkbox" style="position: relative; top: 12px;" name="boolean" id="boolean" /><span style="position: relative; top: 1px; left: -150px">boolean&nbsp;</span>
				<input style="position: relative; top: 5px; left: -10px" type="image" src="<? echo CHEMIN; ?>img/toolbar/loupe.png" title="Chercher" />
			<div class="suggestionsBox" id="suggestions" style="display: none;">
				<img src="<? echo CHEMIN?>img/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="autoSuggestionsList">
					&amp;nbsp;
				</div>
			</div>				
	</form>
	<!-- end search form -->
	</div>
	
	
		<div id="content">

			<?php echo $content_for_layout;  ?>

		</div>


</div><!-- END CONTAINER HTML BODY-->

<div id="footer">
<!-- footer -->
<div class="help">
<table>
	<tr>
		<td class="tablepied"><?
echo "<a target=\"_blank\" href=\"/dokuwiki/info:pmcake:\">";
echo $html->image('help.png', array("alt"=>"Documentation","title"=>"Documentation","width"=>"50","height"=>"50"));
echo "</a>";
?>
 </td>

<td class="tablepied">
<?php 
//print page
echo "<a class=\"logoprint\" href=\"javascript:window.print();\">";
echo $html->image('icon-print.jpg', array("alt"=>"Imprimer","title"=>"Imprimer"));
echo "</a>"; 
?>
</td>
<!-- about -->
<td class="tablepied">
<?php
echo '<a target="_blank" class="contact" href="/dokuwiki/fred_radeff" title="Fred Radeff">'.$html->image('linux/tux_che.jpg', array("alt"=>"Fred Radeff")).'</a>';
?>
<br />			<?php 
		echo $html->image("cake.power.gif", array('url' => 'http://www.cakephp.org/', 'alt' => 'CakePHP', 'title' => 'CakePHP'));
			?>
</td>
<!-- contact -->
<td class="tablepied">
<?php
echo '<a target="_blank" class="contact" href="/writemail.php" title="Contact">'.$html->image('ico-contact.gif', array("alt"=>"Contact")).'</a>';
?>
</td>

<td class="tablepied">
<?
//license
echo '<a target="_blank" href="http://www.gnu.org/licenses/gpl-3.0.txt">'.$html->image('copyleft.jpg', array("alt"=>"GPL License / CopyLeft","title"=>"GPL License / CopyLeft","width"=>"45","height"=>"45")).'</a>';
?>
</td></tr>
</table>
 

</div>
  
</body>
</html>
