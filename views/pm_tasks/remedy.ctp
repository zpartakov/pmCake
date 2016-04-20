<?php 
/*
 * point to ticket desk remedy ticket id
 * 
 * for configuring url edit config/core.php REMEDY_URL_BEGIN && REMEDY_URL_END
 * 
 * */
		$url=REMEDY_URL_BEGIN.$_GET["remedy"].REMEDY_URL_END;
		//echo $url; exit;
		header("Location: ".$url);
?>
