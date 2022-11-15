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
			<h2>XII.3  Classification non supervisée</h2>
			
			<ul class="listetitres">
				<li><a href="#XII31">Qu'est-ce qu'une classification non supervisée ?</a></li>
				<li><a href="#XII32">Prise en main des données</a></li>
				<li><a href="#XII33">Extraction des signatures spectrales</a></li>
				<li><a href="#XII34">Classification non supervisée au moyen de la méthodes des K-Means</a>
				  <ul class="listesoustitres">
				    <li><a href="#XII34a">K-Means : comment ça marche&nbsp;?</a></li>
				    <li><a href="#XII34b">Mise en pratique sur l'image Sentinel-2</a></li>
				  </ul>
				</li>
			</ul>
			<br>
				
				<p>L'objectif de ce chapitre est de réaliser une <b>classification</b>, c'est-à-dire de partir d'une image satellite pour obtenir une couche d'occupation du sol avec différentes catégories.</p>
				
				<p>Pour cela, nous allons utiliser une image Sentinel-2 du Sud de l'Inde. Nous commencerons par explorer cette image et ses signature spectrales, comme vu <a href="12_01_intro_teledec.php" >ici</a> et <a href="12_02_info_spectrale.php" >là</a>, avant d'effectuer une classification non supervisée par la méthode des K-Means pour en extraire l'occupation du sol.</p>
				
				<h3>Qu'est-ce qu'une classification non supervisée ?<a class="headerlink" id="XII31" href="#XII31"></a></h3>
				
          <p>Un peu de théorie avant de commencer&nbsp;! <b>Une classification a pour but de partir d'une image pour en regrouper les pixels sous forme de catégories.</b> Typiquement, on va partir d'une image satellite pour arriver à une couche d'occupation du sol avec par exemple 4 catégories&nbsp;: surface en eau, sol nu, forêt, cultures. Bien sûr, les catégories vont varier suivant l'image et l'objectif.</p>
          
          <p>On va distinguer 2 grands types de classification : <b>supervisée</b> ou <b>non supervisée</b>. Nous allons voir dans ce chapitre un exemple de classification non supervisée, c'est-à-dire uniquement basée sur les traitements statistiques de l'image, sans recours à un échantillonnage terrain. En gros c'est le logiciel qui fait tout le travail, ce qui a comme vous vous en doutez des avantages et des inconvénients&nbsp;!</p>
          
          <p>L'hypothèse de travail est que les objets de l'image ayant une signature spectrale identique ou similaire appartiennent à la même classe d'occupation du sol.</p>
          
          <p>Il existe plusieurs algorithmes de classification non supervisée&nbsp;:</p>
          <ul>
            <li>le regroupement par moyenne-K (K-Means, que nous allons voir ici)</li>
            <li>le regroupement par ISODATA</li>
            <li>...</li>
          </ul>
          
          <p>Pour en savoir plus sur les classifications, vous pouvez vous rendre sur le <a class="ext" target="_blank" href="https://www.rncan.gc.ca/cartes-outils-et-publications/imagerie-satellitaire-et-photos-aeriennes/tutoriel-notions-fondamentales-teledetection/9310" >tutoriel du Centre canadien de cartographie et d’observation de la Terre</a>.</p>
				
				<h3>Prise en main des données<a class="headerlink" id="XII32" href="#XII32"></a></h3>
				
          <p>L'image que nous allons utiliser est une image Sentinel-2 su Sud de l'Inde d'avril 2020.</p>
          
          <div class="manip">
            <p>Ouvrez un nouveau projet QGIS et ajoutez-y l'image geotiff <em class="data">S2A_20200401</em>.</p>
            <p>Pour voir où se situe la zone, <a href="03_04_fonds_carte.php#III42a">ajoutez par exemple un fonds OpenStreetMap</a>.</p>
            <figure>
  						<a href="illustrations/tous/12_03_imagesat.png" >
  							<img src="illustrations/tous/12_03_imagesat.png" alt="Vue générale et zoom de l'image satellite" width="600">
  						</a>
  					</figure>
  					
  					<p class="keskonfai">Il n'y a que 10 bandes sur cette image et non 13 ?</p>
  					
  					<p>Pour explorer cette image, nous pouvons tester différentes <a href="12_01_intro_teledec.php#XII14b">compositions colorées</a>.</p>
  					<p>Commençons par une composition colorée "en vraie couleur", avec les bandes rouge, vert et bleu, soit les bandes 4, 3 et 2&nbsp;:</p>
  					<figure>
  						<a href="illustrations/tous/12_03_compocol_432.png" >
  							<img src="illustrations/tous/12_03_compocol_432.png" alt="Composition colorée en vraie couleur de l'image Sentinel-2" width="600">
  						</a>
  					</figure>
  					<p>On peut aussi tester des compositions en fausse couleur&nbsp;:</p>
  					<p class="keskonfai">Lesquelles ?</p>
          </div>
          
          <p class="keskonfai">Interprétation ?</p>
				
				<h3>Extraction des signatures spectrales<a class="headerlink" id="XII33" href="#XII33"></a></h3>
				
				  <p>Nous allons maintenant extraire les signatures spectrales des 4 types d'occupation du sol suivants&nbsp;:</p>
				  
				  <ol>
				    <li>Surface en eau</li>
				    <li>Surface en forêt</li>
				    <li>Surface en sol nu</li>
				    <li>Surface en cultures</li>
				  </ol>
				  
				  <p class="keskonfai">Ce serait bien de fournir un couche scp exemple avec les ROI, ou de montrer des captures d'écran. Je ne sais pas trop quoi choisir pour les cultures par exemple !</p>
				  
				  <p>Pour cela, vous pouvez vous référer <a href="12_02_info_spectrale.php#XII21">ici</a>.</p>
				  
				  <p>N'oubliez pas de <a href="12_02_info_spectrale.php#XII21a">définir le jeu de bandes</a> comme l'image S2A_20200401&nbsp;!</p>
				  
				  <p class="keskonfai">Interprétation des signatures spectrales ?</p>
				
				<h3>Classification au moyen de la méthodes des K-Means<a class="headerlink" id="XII34" href="#XII34"></a></h3>
				
  				<h4>K-Means : comment ça marche&nbsp;?<a class="headerlink" id="XII34a" href="#XII34a"></a></h4>
  				
  				  <p>La méthode des <a class="ext" target="_blank" href="https://fr.wikipedia.org/wiki/K-moyennes" >K-Means ou K-moyennes</a> est une méthode de clustering utilisé pour regrouper des individus (dans notre cas, des pixels), de manière à ce qu'au sein de chaque groupe les individus se ressemblent le plus possible, et que les groupes soient le plus différents possibles les uns des autres.</p>
  				  
  				  <figure>
  						<a href="illustrations/tous/12_03_kmeans_principe.png" >
  							<img src="illustrations/tous/12_03_kmeans_principe.png" alt="Nuage de points à gauche, le même nuage de points avec 3 groupes déterminés avec la méthode des K-Means à droite" width="600">
  						</a>
  						<figcaption>A gauche, nuage de pixels à classe, à droite, classification des pixels par la méthode des K-Means.</figcaption>
  					</figure>
  				  
  				  <p>Cette méthode est utilisée en télédétection mais également dans beaucoup d'autres domaines&nbsp;!</p>
  				  
  				  <p><b>Cette méthode nécessite que l'utilisateur détermine au préalable un nombre de classes.</b> Elle se déroule en plusieurs étapes :</p>
  				  
  				  <ul>
  				    <li class="espace">Choix au hasard d'un point par classe (si l'utilisateur a choisi d'utiliser 4 classes, 4 points seront tirés au sort). Ces points constitueront le centre des classes.</li>
  				    <li class="espace">Chacun des autres points sont affectés au centre le plus proche&nbsp;: on constitue ainsi par exemple 4 classes.</li>
  				    <li class="espace">Les barycentres de chacune de ces classes sont calculés</li>
  				    <li class="espace">Et on recommence&nbsp;! Chaque point est affecté au centre le plus proche, et ainsi de suite. On arrête quand les points ne changent plus de classe (en théorie tout au moins, en pratique on peut être obligé d'arrêter avant pour limiter le temps de calcul).</li>
  				  </ul>
  				  
  				  <p>Au final, la méthode des K-Means est rapide et son principe est simple. Cependant, elle nécessite de fixer à l'avance un nombre de classes, et ne donnera pas 2 fois le même résultat si on la lance avec les mêmes paramètres, les centres de chaque classe étant déterminés de manière aléatoire lors de la première itération.</p>
  				  
  				  <p>Une manière de contourner la première de ces limitations est de définir un grand nombre de classes, pour les regrouper ensuite manuellement. C'est ce que nous allons faire ici&nbsp;!</p>
  				  
  				 <h4>Mise en pratique sur l'image Sentinel-2<a class="headerlink" id="XII34b" href="#XII34b"></a></h4>
  				  
  				  <div class="manip">
  				    <p><em>Le jeu de bande doit bien être <a href="12_02_info_spectrale.php#XII21a">défini</a> au préalable dans l'extension SCP.</em></p>
  				    <p><a class="thumbnail_top" href="#thumb">Menu SCP &#8594; Traitement de bande &#8594; Clustering
              	<span>
              		<img src="illustrations/tous/12_03_clustering_menu.png" alt="Menu SCP, Traitement de bande, Clustering" height="300" >
              	</span>
              </a>&nbsp;:</p>
              <figure>
    						<a href="illustrations/tous/12_03_clustering_fenetre.png" >
    							<img src="illustrations/tous/12_03_clustering_fenetre.png" alt="Paramétrage de l'outil de clustering dans l'extension SCP" width="600">
    						</a>
    					</figure>
    					
    					<p>Les principaux paramètres à définir ici sont les suivants&nbsp;:</p>
    					<ul>
    					 <li class="espace">Méthode : <b>K-Means</b> (la méthode <a class="ext" target="_blank" href="https://semiautomaticclassificationmanual.readthedocs.io/fr/latest/remote_sensing.html#isodata">ISODATA</a> est une autre méthode de classification non supervisée basée sur celle des K-Means)</li>
    					 <li class="espace"><b>Nombre de classes&nbsp;: choisir 20</b>, nous procéderons ensuite à des regroupements pour arriver à 4 classes finales</li>
    					 <li class="espace"><b>Nombre max d'itérations</b>&nbsp;: il s'agit du nombre d'itérations de la méthode (voir <a href="12_03_classif.php#XII34a" >plus haut</a>). L'idéal est de fixer un nombre d'itérations assez élevé, 50 par exemple, mais le temps de calcul peut être assez important. Vous pouvez tester avec par exemple 10 itérations, et relancer avec un nombre plus important si le temps de calcul n'est pas trop élevé, en fonction de votre ordinateur&nbsp;!</li>
    					</ul>
    				</div>
    				
  					<p>D'autres paramètres peuvent également être définis (pour rappel, vous pouvez vous référer à la <a class="ext" target="_blank" href="https://fromgistors.blogspot.com/p/user-manual.html" >documentation de SCP</a> pour aller plus loin)&nbsp;:</p>
  					<ul>
  					 <li class="espace"><b>Seuil de distance</b>&nbsp;: si les points ne sont plus déplacés qu'à une distance inférieure à ce seuil, l'algorithme prendra fin sans autre itération. Si ce seuil n'est jamais atteint, l'algorithme effectuera le nombre d'itérations choisi</li>
  					 <li class="espace"><b>ISODATA écart-type maximum</b> et <b>ISODATA taille maximum de classe en pixels</b>&nbsp;: ces 2 paramètres sont uniquement utilisés pour une classification ISODATA</li>
  					 <li class="espace"><b>Use value as NoData</b>&nbsp;: permet de spécifier une valeur de pixel qui sera ignorée lors des calculs</li>
  					 <li class="espace"><b>Seed signatures from band values / Use signature list as seed signature / Use random seed signatures</b>&nbsp;: il faut choisir une de ces 3 options afin de déterminer la manière dont seront choisis les centres de classes lors de la première itération.</li>
  					 <li class="espace"><b>Distance algorithm</b>&nbsp;: cet algorithme définit comment la distance entre les points est calculée, il peut s'agir simplement de la distance euclidienne avec <em>plus proche voisin</em>, ou de la distance spectrale avec <em>Spectral Angle Mapping</em></li>
  					 <li class="espace"><b>Sauvegarder les résultats à la liste des signatures</b>&nbsp;: si cette case est cochée, les signatures spectrales des futures classes seront ajoutées à celles des ROI</li>
  					</ul>
  					<p class="keskonfai">Pas trop sûre de l'explication sur les 3 options pour choisir la manière dont seront déterminées les centres des classes la 1ère fois !</p>
				  
				    <div class="manip">
				      <p>Une fois vos paramètres choisis, cliquez sur le bouton <b>Lancer</b> en bas de la fenêtre. Choisissez le nom et l'emplacement de l'image GeoTIFF qui sera créée en sortie, et patientez...</p>
				      <p>Dans la fenêtre SCP s'affiche maintenant un tableau comportant une ligne par classe, et 3 colonnes&nbsp;:</p>
				      <ul>
				        <li>La première colonne correspond à l'identifiant de la classe</li>
				        <li>La deuxième colonne indique la signature spectrale de chaque classe, avec une valeur par bande</li>
				        <li>La troisième colonne indique la distance</li>
				      </ul>
				      <p class="keskonfai">Je ne sais pas à quoi correspond la distance dans la 3ème colonne ?</p>
				      <p>L'image en sortie est automatiquement ajoutée à QGIS.</p>
				    </div>
				  
				
				  
				
				  

				
				<br>
				<a class="prec" href="12_02_info_spectrale.php">chapitre précédent</a>
				<a class="suiv" href="12_04_teledec_recap.php">chapitre suivant</a>
				<br>
				<a class="hautpage" href="#wrap">haut de page</a>

		</div>
		<div class="sidebar">
			<?php include('logos_menus_verticaux.inc.php'); ?>
			<?php include('menus_verticaux_12.inc.php'); ?>
		</div>
		
		<div id="notforprint" style="clear:both;"></div>
		
	</div>

	<?php include('footer.inc.php'); ?>

</div>
</body>
</html>
