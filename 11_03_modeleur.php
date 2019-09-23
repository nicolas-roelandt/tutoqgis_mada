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
			<h2>XI.3  Construire et utiliser un modèle</h2>
				<ul class="listetitres">
					<li><a href="#XI31">Création d'un modèle</a>
						<ul class="listesoustitres">
							<li><a href="#XI31a">Création du premier paramètre en entrée : couche à découper</a>
							<li><a href="#XI31b">Création du deuxième paramètre en entrée : masque de découpe</a></li>
							<li><a href="#XI31c">Création du premier algorithme : découpage</a></li>
							<li><a href="#XI31d">Création du second algorithme : modification du SCR</a></li>
						</ul>
					</li>
					<li><a href="#XI32">Enregistrement et documentation d'un modèle</a>
					    <ul class="listesoustitres">
							<li><a href="#XI32a">Enregistrer un modèle</a></li>
							<li><a href="#XI32b">Documenter un modèle</a></li>
						</ul>
					</li>
					<li><a href="#XI33">Application</a>
						<ul class="listesoustitres">
							<li><a href="#XI33a">Découpage et reprojection d'une couche</a></li>
							<li><a href="#XI33b">Découpage et reprojection de plusieurs couches (utilisation &#171; par lot &#187;)</a></li>
						</ul>
					</li>
				</ul>
				<br>
				
				<p>Les modèles sont surtout utiles pour chaîner plusieurs traitements. Par exemple, imaginons que notre but soit non seulement de découper une couche par une autre, mais ensuite de changer le SCR de la couche découpée pour la passer en WGS84 par exemple.</p>
				<p>Il est possible de <b>créer un modèle enchaînant les deux outils</b>, qui pourra être lancé facilement sur plusieurs couches, et même être exécuté <a href="11_02_par_lot.php">par lot</a>.</p>
				<div class="manip">
					<p>Dans la boîte à outils Traitements, cliquez sur l'icône <b>Modèles</b> tout en haut à gauche et choisissez <b>Créer un nouveau modèle</b>.</p>
					<figure>
						<a href="illustrations/tous/11_03_creer_modele.png" >
							<img src="illustrations/tous/11_03_creer_modele.png" alt="Emplacement de l'outil de création de modèles dans la boîte à outils Traitements" width="90%">
						</a>
					</figure>
				</div>
				<p>La fenêtre qui s'ouvre comporte une partie à gauche avec 2 onglets, Entrées et Algorithmes, qui vont vous servir à créer le modèle, et une partie vide à droite où votre modèle sera représenté.</p>
				<p>Notre modèle comportera 2 paramètres en entrée : une couche vecteur qui sera découpée et une couche vecteur qui servira de masque de découpe. L'outil de découpage va utiliser ces deux paramètres en entrée pour créer une nouvelle couche temporaire. Cette couche temporaire sera utilisée comme paramètre d'entrée pour l'outil de reprojection, qui produira la couche finale.</p>
				<figure>
				    <a href="illustrations/tous/11_03_organigramme.svg" >
						<img src="illustrations/tous/11_03_organigramme.svg" alt="Organigramme du modèle qui sera créé" width="100%">
					</a>
				</figure>
				
				<h3><a class="titre" id="XI31">Création d'un modèle</a></h3>
					<h4><a class="titre" id="XI31a">Création du premier paramètre en entrée : couche à découper</a></h4>
					
						<div class="manip">
							<p>Cliquez sur l'onglet <b>Entrées</b> en bas à gauche de la fenêtre, puis double-cliquez sur <b>Couche vecteur</b>&nbsp;:</p>
							<figure>
    							<a href="illustrations/tous/11_03_modeleur_fenetre.png" >
    								<img src="illustrations/tous/11_03_modeleur_fenetre.png" alt="Fenêtre du modeleur de traitement" width="100%">
    							</a>
							</figure>
							<figure>
    							<a href="illustrations/tous/11_03_def_parametre_fenetre.png" >
    								<img src="illustrations/tous/11_03_def_parametre_fenetre.png" alt="Fenêtre de définition d'un paramètre" width="90%">
    							</a>
							</figure>
							<ul>
								<li class="espace">Nom du paramètre : <b>couche source</b></li>
								<li class="espace">Type de géométrie : <b>Tout type de géométrie</b>, puisque cette couche peut aussi bien être de type point, ligne ou polygone</li>
								<li class="espace"><b>Obligatoire</b> : cochez la case, il ne s'agit pas d'un paramètre optionnel</li>
							</ul>	
						</div>
						<p>Le paramètre est ajouté au modèle sous forme d'une boîte jaune. Vous pouvez éditer ses caractéristiques en double-cliquant sur cette boîte.</p>
						<figure>
							<a href="illustrations/tous/11_03_modele_01.png" >
								<img src="illustrations/tous/11_03_modele_01.png" alt="Boîte pour la couche source" width="100%">
							</a>
						</figure>
						<div class="manip">
						  <p><img class="icone" src="illustrations/tous/11_03_zoom_icone.png" alt="icône zoom complet" >Si à un moment donné vous ne voyez plus votre modèle dans la partir droite de la fenêtre, cliquez sur l'icône <b>Zoom complet</b>.</p>
						</div>
						
						
						
					<h4><a class="titre" id="XI31b">Création du deuxième paramètre en entrée : masque de découpe</a></h4>
						
						<div class="manip">
							<p>Dans l'onglet Entrées, double-cliquez à nouveau sur <b>Couche vecteur</b> :</p>
							<figure>
								<a href="illustrations/tous/11_03_def_parametre2_fenetre.png" >
									<img src="illustrations/tous/11_03_def_parametre2_fenetre.png" alt="Fenêtre de définition d'un paramètre" width="90%">
								</a>
								</figure>
							<ul>
								<li class="espace">Nom du paramètre : <b>couche masque</b></li>
								<li class="espace">Type de géométrie : <b>polygone</b></li>
								<li class="espace"><b>Obligatoire</b></li>
							</ul>
						</div>
						<a href="illustrations/tous/11_03_modele_02.png" >
							<img src="illustrations/tous/11_03_modele_02.png" alt="Les 2 boîtes pour la couche source et la couche masque" width="70%">
						</a>
					
					<h4><a class="titre" id="XI31c">Création du premier algorithme : découpage</a></h4>
						
						<div class="manip">
							<p>Dans l'onglet <b>Algorithmes</b>, rubrique <b>Recouvrement de vecteur</b> &#8594; double-cliquez sur l'outil <b>Couper</b> :</p>
							<figure>
								<a href="illustrations/tous/11_03_modeleur_fenetre_algos.png" >
									<img src="illustrations/tous/11_03_modeleur_fenetre_algos.png" alt="Fenêtre du modeleur, onglet algorithmes" width="100%">
								</a>
							</figure>
							<figure>
								<a href="illustrations/tous/11_03_def_algo_fenetre.png" >
									<img src="illustrations/tous/11_03_def_algo_fenetre.png" alt="Fenêtre de définition d'un algo" width="500">
								</a>
							</figure>
							<ul>
								<li>Description : <b>Couper</b></li>
								<li>Couche en entrée : <b>couche source</b></li>
								<li>Couche de découpage : <b>couche masque</b></li>
								<li>Découpé : ne rentrez rien dans cette partie, pour que la couche créée soit temporaire</li>
							</ul>
						</div>
						<p>L'algorithme apparaît sous forme d'une boîte blanche reliée aux 2 couches en entrée&nbsp;; de même, vous pouvez éditer ses caractéristiques en cliquant sur l'icône de crayon de cette boîte.</p>
						<figure>
							<a href="illustrations/tous/11_03_modele_03.png" >
								<img src="illustrations/tous/11_03_modele_03.png" alt="Modèle avec les 3 boîtes pour les 2 couches en entrée et l'algo couper" width="100%">
							</a>
						</figure>
						
					
					<h4><a class="titre" id="XI31d">Création du second algorithme : modification du SCR</a></h4>
						
						<div class="manip">
							<p>Toujours dans la fenêtre du modeleur de traitement, 
							<a class="thumbnail_bottom" href="#thumb">onglet Algorithmes &#8594; Outils généraux pour les vecteur&#8594; Reprojeter une couche
                            	<span>
                            		<img src="illustrations/tous/11_03_reprojeter.png" alt="Emplacement de l'outil 'Reprojeter une couche'" width="90%" >
                            	</span>
                            </a>  :</p>
							<figure>
								<a href="illustrations/tous/11_03_def_algo2_fenetre.png" >
									<img src="illustrations/tous/11_03_def_algo2_fenetre.png" alt="Fenêtre de définition d'un algo" width="500">
								</a>
							</figure>
							<ul>
								<li>Description : <b>Reprojeter une couche</b></li>
								<li>Couche en entrée : <b>'Découpé' créé par l'algorithme 'Couper'</b></li>
								<li>Target CRS : laissez EPSG:4326, ce qui correspond au WGS84 (l'idée étant de passer du Lambert 93 au WGS84)</li>
								<li>Reprojecté : tapez le nom de votre choix, par exemple <b>reprojeté+découpé</b></li>
							</ul>
						</div>
						
						<p>Votre modèle est maintenant fini&nbsp;! Il doit ressembler à ceci&nbsp;:</p>
						<figure>
							<a href="illustrations/tous/11_03_modele_fini.png" >
								<img src="illustrations/tous/11_03_modele_fini.png" alt="Modèle fini, avec les 2 boîtes pour les couches en entrée, les 2 boîte pour les algos et la boîte pour la couche en sortie" width="90%">
							</a>
						</figure>
				
				<h3><a class="titre" id="XI32">Enregistrement et documentation d'un modèle</a></h3>
				
				    <h4><a class="titre" id="XI32a">Enregistrer un modèle</a></h4>
				    
    					<p>Comment faire maintenant pour sauvegarder notre modèle&nbsp;?</p>
    					
    					<div class="manip">
        					<figure>
        						<a href="illustrations/tous/11_03_enregistrer_modele_fenetre.png" >
        							<img src="illustrations/tous/11_03_enregistrer_modele_fenetre.png" alt="Fenêtre du modeleur, choix du nom du modèle et du groupe et icône de sauvegarde entourés en rouge" width="100%">
        						</a>
        					</figure>
    						<p>Tapez d'abord son nom en haut à gauche de la fenêtre, <b>couper et modifier SCR</b> par exemple, et le nom de son groupe, <b>tests</b> par exemple.</p>
    					</div>
    					
    					<p>Le groupe correspond à la rubrique dans laquelle votre modèle apparaîtra au sein de la boîte à outils. S'il n'existe pas déjà, il sera créé.</p>
    					
    					<div class="manip">
    						<p><img class="icone" src="illustrations/tous/11_03_enregistrer_modele_icone.png" alt="icône Enregistrer" >Cliquez ensuite sur l'icône <b>Enregistrer le modèle sous</b>. Dans la fenêtre qui s'ouvre alors, choisissez un nom pour votre modèle, par exemple <b>couper_modifSCR</b>.</p>
    						<p>Notez qu'il va être enregistré dans le répertoire par défaut des modèles : processing/models dans le dossier qgis, et qu'il possède l'extension <em>.model3</em> (pour QGIS 3).</p>
    					</div>
    						
    				<h4><a class="titre" id="XI32b">Documenter un modèle</a></h4>
    				
    				    <p>Si ce modèle est destiné à être utilisé par d'autres personnes, ou tout simplement si vous comptez vous en servir régulièrement, documenter un peu ce modèle sera très pratique. Il s'agit en fait de <b>rédiger l'aide de l'outil</b>, telle qu'on peut la voir dans la partie droite de la fenêtre pour les outils QGIS.</p>
    				    <figure>
    						<a href="illustrations/tous/11_03_aide_exemple.png" >
    							<img src="illustrations/tous/11_03_aide_exemple.png" alt="Fenêtre de l'outil Couper, avec la partie Aide à droite entourée en rouge" width="80%">
    						</a>
    						<figcaption>Exemple d'aide&nbsp;: l'outil Couper.</figcaption>
    					</figure>
    					
    					<div class="manip">
    					   <p>Si vous avez fermé la fenêtre d'édition du modèle, vous pouvez y accéder à nouveau : <b>boîte à outils &#8594; modèles &#8594; tests (ou le nom de votre groupe) &#8594; clic droit sur le nom de votre outil, Editer le modèle...</b></p>
    					   <figure>
        						<a href="illustrations/tous/11_03_emplacement_modele.png" >
        							<img src="illustrations/tous/11_03_emplacement_modele.png" alt="Emplacement du modèle dans la boîte à outils" width="80%">
        						</a>
        				   </figure>
        				   <p>Dans la barre d'outils en haut de la fenêtre d'édition du modèle, cliquez sur l'icône <b>Editeur d'aide du modèle</b>.</p>
                           <figure>
        						<a href="illustrations/tous/11_03_modele_aide_icone.png" >
        							<img src="illustrations/tous/11_03_modele_aide_icone.png" alt="Barre d'outils de la fenêtr d'édition du modèle, icône Aide entourée en rouge" width="90%">
        						</a>
        				   </figure>
        				   <p>La fenêtre de l'éditeur d'aide s'ouvre&nbsp;:</p>
        				   <figure>
        						<a href="illustrations/tous/11_03_aide_fenetre.png" >
        							<img src="illustrations/tous/11_03_aide_fenetre.png" alt="Fenêtre de l'éditeur d'aide du modèle" width="90%">
        						</a>
        				   </figure>
        				   <p>Cliquez par exemple sur <b>Description de l'algorithme</b> à gauche, puis rédigez le texte correspondant à droite.</p>
        				   <p>L'aide doit être courte et claire&nbsp;!</p>
        				   <p>Vous pouvez également rédiger l'aide pour d'autres parties, par exemple pour les 2 paramètres en entrée et le rendu.</p>
    					</div>
    					
    					<p>Votre modèle est fini et possède même une aide... C'est le moment de le tester&nbsp;!</p>
						
				
				<h3><a class="titre" id="XI33">Application</a></h3>
				
					<h4><a class="titre" id="XI33a">Découpage et reprojection d'une couche</a></h4>
					
						<p>L'objectif est de découper la couche de routes par la commune, pour ne garder que les routes à l'intérieur de cette commune, la couche obtenue devant être en WGS84.</p>
						
						<div class="manip">
							<p>Si elles ne sont pas déjà chargées, ajoutez à QGIS les couches <em class='data'>OSM_routes</em> et <em class="data">SAINTE_RADEGONDE</em> situées dans le dossier <b>TutoQGIS_11_Automatisation/donnees</b>.</p>
							<div class="question">
								<input type="checkbox" id="faq-1">
								<p><label for="faq-1">Dans quel SCR sont ces deux couches ?</label></p>
								<p class="reponse">Les 2 couches sont en RGF93 Lambert 93, code EPSG 2154 (cf. <a href="02_03_couches_projets.php#II32">SCR d'une couche</a> )</b>.</p>
							</div>
							<p>Lancez votre modèle&nbsp;: <b>boîte à outils &#8594; modèles &#8594; tests (ou le nom de votre groupe) &#8594; double clic sur le nom de votre outil</b>.</p>
							<figure>
								<a href="illustrations/tous/11_03_test_modele.png" >
									<img src="illustrations/tous/11_03_test_modele.png" alt="fenêtre du modele clip and project, paramètres remplis" width="100%">
								</a>
							</figure>
							<ul>
								<li class="espace">couche source&nbsp;: <em class="data">OSM_routes</em></li>
								<li class="espace">couche masque&nbsp;: <em class="data">SAINTE_RADEGONDE</em></li>
								<li class="espace">découpé+reprojeté&nbsp;: ne tapez rien, pour que le résultat soit une couche temporaire</li>
							</ul>
							<p><b>Exécutez</b>, vérifiez le SCR de la couche obtenue, ainsi que son contenu : elle ne doit comporter que les routes à l'intérieur de la commune de Sainte-Radégonde (en gris foncé dans la figure ci-dessous).</p>
							<figure>
								<a href="illustrations/tous/11_03_resultat_decoupe.png" >
									<img src="illustrations/tous/11_03_resultat_decoupe.png" alt="résultat de la découpe : les 2 couches de route et la couche de commune" width="350">
								</a>
							</figure>
						</div>
						
					<h4><a class="titre" id="XI33b">Découpage et reprojection de plusieurs couches (utilisation &#171; par lot &#187;)</a></h4>
				
						<p>Le but est ici de découper et reprojeter plusieurs couches, sans avoir à lancer plusieurs fois le modèle.</p>
						<div class="manip">
							<p>A partir de la boîte à outils de traitements, clic droit sur le modèle, <b>Exécuter comme processus de lot...</b>. Remplissez les différents paramètres, en vous aidant éventuellement de la <a href="11_02_par_lot.php">partie XI.2</a>.</p>
							<figure>
								<a href="illustrations/tous/11_03_test_modele_lot.png" >
									<img src="illustrations/tous/11_03_test_modele_lot.png" alt="remplissage des paramètres de l'outil clip and project en mode par lot" width="620">
								</a>
							</figure>
							<p>Exécutez et vérifiez les couches obtenues.</p>
						</div>
						
						<p>Les modèles permettent de créer une chaîne de traitement, en enchaînant autant d'algorithmes que vous le souhaitez, et <b>sont donc très pratiques si vous êtes amenés à répéter souvent la même séquence d'opérations</b>.</p>
						<p>Au-delà de la création du modèle, il peut être utile quand vous réfléchissez à une manipulation de dessiner au papier et crayon l'enchaînement des étapes. Et une fois finalisé de noter le tout dans un fichier texte, pour vous aider à comprendre ce que vous avez fait quand vous reprendrez ce dossier dans 6 mois&nbsp;!</p>
						<p>Dans le chapitre suivant, nous allons voir une autre méthode pour automatiser des tâches dans QGIS, plus puissante mais avec un coup d'entrée plus important, en utilisant le langage de programmation Python.</p>
						
				<br>
				<a class="prec" href="11_02_par_lot.php">chapitre précédent</a>
				<a class="suiv" href="11_04_python.php">chapitre suivant</a>
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
