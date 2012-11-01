<?php
#cake title of the page
$this->pageTitle = 'Voir client/usager'; 
?>
<div class="pmOrganizations view">
<h2><?php  echo $this->pageTitle;?></h2>
<p><a href="#projet">Projets</a> | <a href="#taches">Tâches</a></p>
	<dl><?php $i = 0; $class = ' class="altrow"';?>

<table>
	<tr>
		<td colspan="2">
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmOrganization['PmOrganization']['name']; ?>
			&nbsp;
		</dd>
		</td>
	</tr>
	<tr>
	<td>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Address1'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmOrganization['PmOrganization']['address1']; ?>
			&nbsp;
		</dd>
	</td>
	<td>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Address2'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmOrganization['PmOrganization']['address2']; ?>
			&nbsp;
		</dd>
	</td>
	</tr>
	<tr>
	<td>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Zip Code'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmOrganization['PmOrganization']['zip_code']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('City'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmOrganization['PmOrganization']['city']; ?>
			&nbsp;
		</dd>
	</td>
	<td>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Country'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmOrganization['PmOrganization']['country']; ?>
			&nbsp;
		</dd>
	</td>
	</tr>
	<tr>
	<td>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Phone'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmOrganization['PmOrganization']['phone']; ?>
			&nbsp;
		</dd>
	</td>
	<td>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fax'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmOrganization['PmOrganization']['fax']; ?>
			&nbsp;
		</dd>
	</td>
	</tr>
	<tr>
	<td>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
			if(strlen($pmOrganization['PmOrganization']['url'])>1) {
				echo "<a href=\"".$pmOrganization['PmOrganization']['url']."\">" .$pmOrganization['PmOrganization']['url'] ."</a>"; 
			} 
			?>
			&nbsp;
		</dd>
	</td>
	<td>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
						if(strlen($pmOrganization['PmOrganization']['email'])>1) {
				echo "<a href=\"mailto:".$pmOrganization['PmOrganization']['email']."\">" .$pmOrganization['PmOrganization']['email'] ."</a>"; 
			} 
			?>
			&nbsp;
		</dd>

	</td>
	</tr>
	<tr>
	<td colspan="2">
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Comments'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmOrganization['PmOrganization']['comments']; ?>
			&nbsp;
		</dd>
	</td>
	</tr>
	<tr>
	<td>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
		<?php 
			echo strftime("%A %d %B %Y", $pmOrganization['PmOrganization']['created']);
		?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Extension Logo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pmOrganization['PmOrganization']['extension_logo']; ?>
			&nbsp;
		</dd>
	</td>
	<td>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Owner'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php membres($pmOrganization['PmOrganization']['owner']); ?>
			&nbsp;
		</dd>
	</td>
	</tr>
</table>

	</dl>
</div>
<?
	#Configure::write('debug', 2);
	

	echo "<hr /><br /><a name=\"projet\"></a><h2>Projets</h2>";

client_projets($pmOrganization['PmOrganization']['id']);

echo "<br /><a name=\"taches\"></a><h2>Tâches</h2>";

client_tasks($pmOrganization['PmOrganization']['id']);
?>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pm Organization', true), array('action' => 'edit', $pmOrganization['PmOrganization']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Pm Organization', true), array('action' => 'delete', $pmOrganization['PmOrganization']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pmOrganization['PmOrganization']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pm Organizations', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pm Organization', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
