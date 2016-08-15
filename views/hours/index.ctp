<?php
$soldehsup=0;
	$solde="17"; //past year remains
	$soldeVac="0"; //past year holidays remains
	$heuresparjour=8; //hours of work pro day
	$holidaysforyear=5*32; //paied holidays weeks * hours2job
	$hourstogain=32;
	$delai = mktime(0,0,0,6,30,2016); //30 juin 2016
	setlocale (LC_TIME, 'fr_FR.utf8','fra');
	$delailib=(strftime("%A %d %B %Y",$delai));
	$today=mktime(0, 0, 0, date("m"), date("d"), date("Y"));
	$weektoday  = (int)date('W', $today);
	$weekdelai  = (int)date('W', $delai);
	$start_count_id=24;

/* openssl_digest
$solde="17"; //past year remains
$soldeVac="0"; //past year holidays remains
$heuresparjour=8; //hours of work pro day
$holidaysforyear=5*32; //paied holidays weeks * hours2job
$hourstogain=32;
$delai = mktime(0,0,0,6,30,2016); //30 juin 2016
setlocale (LC_TIME, 'fr_FR.utf8','fra');
$delailib=(strftime("%A %d %B %Y",$delai));
$today=mktime(0, 0, 0, date("m"), date("d"), date("Y"));
$weektoday  = (int)date('W', $today);
$weekdelai  = (int)date('W', $delai);
*/
?>
<div class="hours index">
	<h2><?php __('Hours');?></h2>
	<h3>Last year report: <?php echo $solde;?></h3>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('year');?></th>
			<th><?php echo $this->Paginator->sort('week_nb');?></th>
			<th><?php echo $this->Paginator->sort('hours_to_do');?></th>
			<th><?php echo $this->Paginator->sort('hours_done');?></th>
			<th><?php echo $this->Paginator->sort('days_holidays');?></th>
			<th><?php echo $this->Paginator->sort('note');?></th>
			<th>dif</th>
			<th>solde</th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;


	foreach ($hours as $hour):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $hour['Hour']['id']; ?>&nbsp;</td>
		<td><?php echo $hour['Hour']['year']; ?>&nbsp;</td>
		<td><?php echo $hour['Hour']['week_nb']; ?>&nbsp;</td>
		<td><?php echo $hour['Hour']['hours_to_do']; ?>&nbsp;</td>
		<td><?php echo $hour['Hour']['hours_done']; ?>&nbsp;</td>
		<td><?php echo $hour['Hour']['days_holidays']; ?>&nbsp;</td>
		<td><?php echo $hour['Hour']['note']; ?>&nbsp;</td>
		<td><?php
		$dif=($hour['Hour']['hours_done']-$hour['Hour']['hours_to_do']);
		echo $dif;
		?>&nbsp;
		</td>

				<td>
				<?php
		$solde=$solde+($hour['Hour']['hours_done']-$hour['Hour']['hours_to_do']);
		$soldeVac=$soldeVac+(($hour['Hour']['days_holidays'])*8);
		echo $solde;

if($hour['Hour']['id']>$start_count_id) {
	//echo "yo!";
$soldehsup=$soldehsup+($hour['Hour']['hours_done']-$hour['Hour']['hours_to_do']);
}

		?>&nbsp;
		</td>

				<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $hour['Hour']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $hour['Hour']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $hour['Hour']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $hour['Hour']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<table>
<!-- Calcul heures sup -->
<tr><th colspan="3"><h1>Heures à rattraper: <?php echo $soldehsup ?>h</h1></th></tr>

<!--<tr><th colspan="3"><h1>Vacances</h1></th></tr>-->
<!--
<tr><td>Solde initial</td><td><?php echo $holidaysforyear;?>h</td><td><?php echo intval($holidaysforyear/8);?>j</td></tr>
<tr><td>Vacances</td><td><?php echo $soldeVac;?>h</td><td><?php echo intval($soldeVac/8);?>j</td></tr>
<tr><td>Solde final</td><td><?php echo $holidaysforyear-$soldeVac;?>h</td><td><?php echo intval(($holidaysforyear-$soldeVac)/8);?>j</td></tr>
<tr><td>
<?php
$nsem=($weekdelai-$weektoday);
$soldeheures=($hourstogain-$solde);
$soldeheuresparsemaine=($soldeheures/$nsem);
//$soldeheuresparsemaine=intval($soldeheuresparsemaine);
$soldeheuresparsemaine=round($soldeheuresparsemaine,1);
?>
Heures à gagner d'ici au <?php echo $delailib;?>, soit <?php echo $nsem;?> semaines,
soit <?php echo $soldeheuresparsemaine;?> h par semaine
</td><td><?php echo $soldeheures;?>h</td><td><?php echo intval(($hourstogain-$solde)/8);?>j</td></tr>
-->
</table>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Hour', true), array('action' => 'add')); ?></li>
	</ul>
</div>
