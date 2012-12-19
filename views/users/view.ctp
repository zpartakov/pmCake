<?php 
	$this->pageTitle = "Voir utilisateur";
?>
<div class="users view">
<h2><?php  __('User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Shortname'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['shortname']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Phone'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['phone']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['date_created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['date_modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date Deleted'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['date_deleted']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['notes']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User', true), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete User', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Basesmysqls', true), array('controller' => 'basesmysqls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Basesmysql', true), array('controller' => 'basesmysqls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lesmigrations', true), array('controller' => 'lesmigrations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lesmigration', true), array('controller' => 'lesmigrations', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Basesmysqls');?></h3>
	<?php if (!empty($user['Basesmysql'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Db'); ?></th>
		<th><?php __('User'); ?></th>
		<th><?php __('Server Id'); ?></th>
		<th><?php __('Migration Id'); ?></th>
		<th><?php __('Datemod'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Statut Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Basesmysql'] as $basesmysql):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $basesmysql['id'];?></td>
			<td><?php echo $basesmysql['db'];?></td>
			<td><?php echo $basesmysql['user'];?></td>
			<td><?php echo $basesmysql['server_id'];?></td>
			<td><?php echo $basesmysql['migration_id'];?></td>
			<td><?php echo $basesmysql['datemod'];?></td>
			<td><?php echo $basesmysql['user_id'];?></td>
			<td><?php echo $basesmysql['statut_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'basesmysqls', 'action' => 'view', $basesmysql['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'basesmysqls', 'action' => 'edit', $basesmysql['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'basesmysqls', 'action' => 'delete', $basesmysql['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $basesmysql['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Basesmysql', true), array('controller' => 'basesmysqls', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Lesmigrations');?></h3>
	<?php if (!empty($user['Lesmigration'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Serveursource'); ?></th>
		<th><?php __('Serveurcible'); ?></th>
		<th><?php __('Type Id'); ?></th>
		<th><?php __('Urlsource'); ?></th>
		<th><?php __('Urlcible'); ?></th>
		<th><?php __('Pathsrc'); ?></th>
		<th><?php __('Pathcible'); ?></th>
		<th><?php __('Datedebut'); ?></th>
		<th><?php __('Datefin'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Loginresp'); ?></th>
		<th><?php __('Emailscc'); ?></th>
		<th><?php __('Loginscc'); ?></th>
		<th><?php __('Ticket'); ?></th>
		<th><?php __('Vhost'); ?></th>
		<th><?php __('Unix'); ?></th>
		<th><?php __('Mysql'); ?></th>
		<th><?php __('Limesurvey'); ?></th>
		<th><?php __('Limesrc'); ?></th>
		<th><?php __('Limecible'); ?></th>
		<th><?php __('Cms'); ?></th>
		<th><?php __('Statut Id'); ?></th>
		<th><?php __('Temps Prevu'); ?></th>
		<th><?php __('Temps Reel'); ?></th>
		<th><?php __('Parent'); ?></th>
		<th><?php __('Difficulte'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Lesmigration'] as $lesmigration):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $lesmigration['id'];?></td>
			<td><?php echo $lesmigration['serveursource'];?></td>
			<td><?php echo $lesmigration['serveurcible'];?></td>
			<td><?php echo $lesmigration['type_id'];?></td>
			<td><?php echo $lesmigration['urlsource'];?></td>
			<td><?php echo $lesmigration['urlcible'];?></td>
			<td><?php echo $lesmigration['pathsrc'];?></td>
			<td><?php echo $lesmigration['pathcible'];?></td>
			<td><?php echo $lesmigration['datedebut'];?></td>
			<td><?php echo $lesmigration['datefin'];?></td>
			<td><?php echo $lesmigration['user_id'];?></td>
			<td><?php echo $lesmigration['loginresp'];?></td>
			<td><?php echo $lesmigration['emailscc'];?></td>
			<td><?php echo $lesmigration['loginscc'];?></td>
			<td><?php echo $lesmigration['ticket'];?></td>
			<td><?php echo $lesmigration['vhost'];?></td>
			<td><?php echo $lesmigration['unix'];?></td>
			<td><?php echo $lesmigration['mysql'];?></td>
			<td><?php echo $lesmigration['limesurvey'];?></td>
			<td><?php echo $lesmigration['limesrc'];?></td>
			<td><?php echo $lesmigration['limecible'];?></td>
			<td><?php echo $lesmigration['cms'];?></td>
			<td><?php echo $lesmigration['statut_id'];?></td>
			<td><?php echo $lesmigration['temps_prevu'];?></td>
			<td><?php echo $lesmigration['temps_reel'];?></td>
			<td><?php echo $lesmigration['parent'];?></td>
			<td><?php echo $lesmigration['difficulte'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'lesmigrations', 'action' => 'view', $lesmigration['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'lesmigrations', 'action' => 'edit', $lesmigration['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'lesmigrations', 'action' => 'delete', $lesmigration['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $lesmigration['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Lesmigration', true), array('controller' => 'lesmigrations', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
