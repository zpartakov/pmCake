<script language="JavaScript" type="text/javascript">
	function montre_ou_cache1() {
		if(document.getElementById("1").style.display=="none"){
			document.getElementById("1").style.display="block";
			document.getElementById("2").style.display="block";
			document.getElementById("2oui").style.display="block";
			document.getElementById("2non").style.display="block";
		} else {
			document.getElementById("1").style.display="none";
			document.getElementById("2").style.display="none";
			document.getElementById("2oui").style.display="none";
			document.getElementById("2non").style.display="none";
		}
	}

	function montre_ou_cache2() {
		if(document.getElementById("2non1").style.display=="none"){
			document.getElementById("2non1").style.display="block";
		} else {
			document.getElementById("2non1").style.display="none";
		}
	}

	function montre_ou_cache3() {
		if(document.getElementById("actions").style.display=="none"){
			document.getElementById("actions").style.display="block";
		} else {
			document.getElementById("actions").style.display="none";
		}
	}

	function montre_ou_cache4() {
		if(document.getElementById("task").style.display=="none"){
			document.getElementById("task").style.display="block";
		} else {
			document.getElementById("task").style.display="none";
		}
	}
</script>
<style>
div .a0 {
	font-size: 400%;
}

.a1 {
	font-size: 200%;
	position: absolute;
	top: 10%;
	left: 30%;
}
</style>
<div id="a0" class="a0" onclick="montre_ou_cache1()">
<? 
		echo $html->image("inbox.jpg", array('alt' => 'Boîte d\'entrée', 'title' => 'Boîte d\'entrée', 'style'=>'width: 200px;'));
		?>
</div>
<div id="1" class="a1" style="display: none" onclick="montre_ou_cache1()">
	Une action est-elle nécessaire?
	<div id="2" style="display: none" onclick="montre_ou_cache1()">
<table>
	<tr>
		<td> 		<div id="2non" style="display: none" onclick="montre_ou_cache2()">
		<? 
		echo $html->image("hamac.jpg", array('alt' => 'Sieste', 'title' => 'Sieste', 'style'=>'width: 200px'));
		?>
			<div id="2non1" style="display: none">
			<a href="<? echo CHEMIN;?>pages/help">A jeter</a><br/>
			<?php echo $html->link(__('A faire un jour / incubateur', true), '/pm_tasks/add?tasktype=incub'); ?><br/>
			<?php echo $html->link(__('A garder - Référence', true), '/pm_tasks/add?tasktype=ref'); ?><br/>
			</div>
		</div></td>
		<td> 		<div id="2oui" style="display: none;" onclick="montre_ou_cache3()">
		<? 
		echo $html->image("sauteuse.jpg", array('alt' => 'Action', 'title' => 'Action', 'style'=>'width: 200px'));
		?>
				<div id="actions" style="display: none">
				Projet à étape multiples (projet)
					<? 
		echo $html->image("toolbar/add.png", array('url' => '/pm_tasks/add', 'alt' => 'oui ->  - planification', 'title' => 'oui ->  - planification'));

		?>
					<span onclick="montre_ou_cache4()">non</span>
					<div id="task" style="display: none">	
				<pre>
					Tâche
					Moins de deux minutes?
					oui 
						exécuter tout de suite
					non 
						déléguer
							attendre et vérifier
						reporter
							calendier (exécuter à une date donnée)
							1ère action à exécuter dès que je pourrais
				</pre>
				</div>
				</div>
		</div></td>
	</tr>
</table>


		</div>
	</div>
</div>
