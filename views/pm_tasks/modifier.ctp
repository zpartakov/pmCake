<?
//Configure::write('debug', 2);
//debug($_GET['data']);
#exit;
//data[description]
//echo phpinfo(); 
/*http://129.194.18.197/pmcake/pm_tasks/modifier?data[id]=2401&data[PmTask][project]=74&data[PmTask][priority]=0&status=3&data[owner]=3&data[assigned_to]=3&data[name]=coordinateur+croix-rouge+GE+print+offre&data[description]=tel+Katia+mazzocut-meyer+jdkm%40sunrise.ch+022.700.36.92+et+mon+nom+%28%C3%A0+part+femme+de+J-D+Meyer%29+%3A+Katia+Mazzocut%0D%0A%0D%0Adir+croix+rouge+%28anc.+dir+CO%29+sur+le+d%C3%A9part%0D%0A%3E%0D%0AM.+Pascal+BONZON%2C+co-responsable+du+secteur+Migration+et+Int%C3%A9gration%2C+t%C3%A9l.+022+304+04+89+%28ancien+CICR%3F%29%0D%0A%3E%0D%0Acoordinateur%0D%0Aactuellement%3A+Mme+Mireille+Barras%2C+a+contacter+de+la+part+de+Katia+pour+tuyau+%28sans+doute+ok+pour+discuter%2Fse+voir+1%2F2h%29%0D%0A%3E%0D%0Acuistot+%28vieux+caract%C3%A9riel+sympa%29+qui+g%C3%A8re+le+restau%0D%0A%26%0D%0Aserveur+%28%3F%29+qui+g%C3%A8re+le+service%0D%0A%0D%0Aserres+%3C%3E+botanique%2C+vers+Belle+Id%C3%A9e+%28check%29%0D%0A%0D%0Ahoraires+%3C+17h%2C+pas+les+WE+%3B-%29%2C+classe+sans+doute+%3E17%0D%0A%0D%0Ach%C3%B4meurs+en+fin+de+droit%2C+jeunes+du+SEMO+%28semestre+de+motivation%29%0D%0A%0D%0Asuperviser+plut%C3%B4t+que+de+faire+le+boulot%0D%0A%0D%0Asoir%C3%A9es+%C3%A0+th%C3%A8me%2C+acti.+cultu.+%C3%A0+proposer+si+coutent+pas%2C+aligner+aux+offices+de+placement+%28r%C3%A9alit%C3%A9%3Ddirectives+du+ch%C3%B4mage%29%0D%0A%0D%0Apossibilit%C3%A9+de+formations+compl%C3%A9mentaire%2C+mobilit%C3%A9+dans+le+boulot%0D%0A%0D%0A%0D%0A&data[start_date]=2011-10-13&data[due_date]=2011-10-13&data[completion]=0&data[estimated_time]=&data[actual_time]=&data[comments]=aaaaaaaa&data[assigned]=2011-10-13+01%3A07&data[published]=1&data[parent_phase]=0&data[complete_date]=&data[service]=0&data[milestone]=0&data[PmTasksTime]=*/
//echo "desc: ".$_GET['data']['description']; 
//exit;
$sql="
UPDATE `pm_tasks` SET `project` = '".$_GET['data']['PmTask']['project']
."', `priority` = '".$_GET['data']['PmTask']['priority']
."', `status` = '".
$_GET['status']
."', `owner` = '".
$_GET['data']['owner']
."', `assigned_to` = '".
$_GET['data']['assigned_to']
."', `name` = '"
.normaliser($_GET['data']['name'])
."', `description` = '"
.normaliser($_GET['data']['description'])
."', `start_date` = '"
.$_GET['data']['start_date']
."', `due_date` = '"
.$_GET['data']['due_date']
."', `estimated_time` = '"
.$_GET['data']['estimated_time']
."', `actual_time` = '"
.$_GET['data']['actual_time']
."', `comments` = '"
.normaliser($_GET['data']['comments'])
."', `completion` = '"
.$_GET['data']['completion']
."', `assigned` = '"
.$_GET['data']['assigned']
."', `published` = '"
.$_GET['data']['published']
."', `parent_phase` = '"
.$_GET['data']['parent_phase']
."', `complete_date` = '"
.$_GET['data']['complete_date']
."', `service` = '"
.$_GET['data']['service']
."', `milestone` = '"
.$_GET['data']['milestone']
."' WHERE `pm_tasks`.`id` = ".$_GET['data']['id'];
//echo "<pre>".nl2br($sql)."</pre>";
//exit;
#do and check sql
$sql=mysql_query($sql);
if(!$sql) {
	echo "SQL error: " .mysql_error(); exit;
}
header("Location: ".$_SERVER["HTTP_REFERER"]);
?>
