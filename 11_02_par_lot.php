<?php include('head.inc.php'); ?>

<body>
<div id="wrap">
	<?php include('menus_horizontaux.inc.php'); ?>
	
	<div id="container_main_sidebar">

		<div class="backgrounds">
			<div class="main"></div>
			<div class="sidebar"></div>
		</div>
		
		<div class="main">
			<h2>XI.2  Exécuter un outil &#171; par lot &#187;</h2>
				
				<p>L'outil de découpage est accessible via la boîte à outils&nbsp;; tous les outils de cette boîte peuvent être exécutés <b>par lot</b>.</p>
				
				<div class="manip">
					<p>Pour lancer l'outil de découpage en mode &#171;&nbsp;par lot&nbsp;&#187;&nbsp;: dans la boîte à outils, <b>clic droit sur Couper &#8594; Exécuter comme processus de lot...</b></p>
					<p>Il est également possible d'utiliser l'outil en mode &#171; par lot &#187; : <b>clic droit sur Couper, Exécuter par lot</b>. Dans la fenêtre qui s'ouvre, <b>chaque ligne correspond à une instance de l'outil</b>. Chaque colonne correspond à un paramètre : la 1ère colonne à la couche en entrée, la 2ème à la couche de découpage (masque), la 3ème à la couche qui sera créée.</p>
					<p>Pour remplir chacune des colonnes :</p>
					<ul>
						<li class="espace"><b>Couche source:</b> cliquer sur les <b>…</b> de la première ligne &#8594; <b>Select from open layers</b> et cochez les 4 couches OSM à découper (si ces couches n'étaient pas chargées 	dans QGIS, utiliser l'option Select from file system).</li>
						<li class="espace"><b>Couche de superposition :</b> comme précédemment, cliquer sur les <b>…</b> de la première ligne &#8594; <b>Select from open layers</b> et cocher <b>SAINTE_RADEGONDE</b>. La première ligne est maintenant remplie. Pour remplir toutes les lignes de manière identique : double-cliquez sur l'en-tête de colonne <b>Couche de superposition</b>.</li>
						<li class="espace"><b>Découpé :</b> cliquer sur les <b>…</b>, rendez-vous dans le dossier où vous voulez créer les nouvelles couches, tapez <b>decoupe_</b> et cliquez sur <b>Enregistrer</b>. Dans la fenêtre suivante : choisir 
						<a class="thumbnail_bottom" href="#thumb">Remplir avec les valeurs du paramètre, Couche source
                        	<span>
                        		<img src="illustrations/tous/11_02_remplir_val_parametre.png" alt="Fenêtre pour choisir de compléter le nom de chaque couche résultat en fonction de la couche en entrée" width="100%" >
                        	</span>
                        </a>, afin que le nom de chaque couche qui sera créée soit complété par le nom de la couche OSM de départ.</li>
					</ul>
					<p>Au final, vous devez obtenir quelque chose de similaire à ceci (cliquez sur l'image pour la voir en plus grand) :</p>
					<figure>
						<a href="illustrations/tous/11_02_lot_complet.png" >
							<img src="illustrations/tous/11_02_lot_complet.png" alt="Traitement par lot : fenêtre avec paramètres complétés" width="600">
						</a>
					</figure>
					<p>N'oubliez pas de cocher la case <b>Charger les couches</b> pour que les couches résultat soient automatiquement ajoutées à QGIS.</p>
					<p>Cliquer sur <b>Exécuter</b>, patienter… Les 4 couches sont créées et ajoutées à QGIS. Il est possible qu'elles soient toute nommées &#171; Découpé &#187;. Dans ce cas, vous pouvez les supprimer et les rajouter pour qu'elles apparaissent avec le bon nom.</p>
				</div>
				
				<p>Tous les outils de la boîte Traitements sont exécutables par lot.</p>
				<p>Mais comment faire maintenant si on doit répéter plusieurs fois une chaîne de traitement, par exemple découper une couche par une autre puis modifier son SCR&nbsp;?</p>
				
				<br>
				<a class="prec" href="11_01_traitement_de_base.php">chapitre précédent</a>
				<a class="suiv" href="11_03_modeleur.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>

		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_11.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
		
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
