
  <?php
	App::import('Lib', 'functions'); //imports app/libs/functions
//Configure::write('debug', 2);
$this->pageTitle = 'GTD ' .dateen2fr(date("D d-M-Y, H\hi"));
$datenow = date("Y-m-d");



/* currents tasks */

?>
<script language="JavaScript" type="text/javascript">
function task_detail(id) {
	id='detail'+id;
				document.getElementById(id).style.display="block";
}
</script>


<h1><?php echo $this->pageTitle; ?></h1>


<a href="#prof">Prof</a> |
<a href="#perso">Perso</a> |
<a href="#demain" onclick="montrecache1();">Demain</a> |
<a href="#A venir" onclick="montrecache2();">A venir</a> |
<a href="#random_list_todos">Liste aléatoire (unige)</a> |
<a href="#random_list_todosp">Liste aléatoire (perso)</a> |
<a href="/intranet/pmcake/contacts/birthday">Anniversaires</a> |
<a href="/intranet/pmcake/pm_tasks/push_all_currents">Tout repousser</a>
<?php echo $this->element('birthdays'); ?>
		<?
$sql="";
global $sql;
print_tasks("prof","auj"); //PROF TASKS
print_tasks("perso","auj"); //PERSONAL TASKS
print_tasks("demain","demain"); //TOMORROW TASKS
print_tasks("A venir","futur"); //TOMORROW TASKS

/*
 *  random list of tasks (todos, wishlist, reference) for home suggestions
 */
random_list_todos(15,'');
random_list_todos(15,'p');//private
?>
 <?php
//echo '<a name="Anniversaires">Anniversaires</a>';

//  echo $this->render('/contacts/birthday');
  ?>
