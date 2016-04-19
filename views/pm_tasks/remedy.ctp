<?php 
/*
 * point to ticket desk remedy ticket id
 * */
		$url=REMEDY_URL_BEGIN.$_GET["remedy"].REMEDY_URL_END;
		//echo $url; exit;
		header("Location: ".$url);
?>
