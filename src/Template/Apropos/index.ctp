<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<header>420-267 MO Développer un site Web et une application pour Internet.<br/>Automne 2018, Collège Montmorency.</header>
<body>
<h1>Automne 2018, Collège Montmorency.</h1>
<h1>Michel Schreyer</h1>
<h3><a href="https://github.com/mikeschreyer/AirlinesTravel"> Lien vers mon depot github AirlinesTravel</a></h3>
<h3><a href="http://localhost/AirlinesTravel/webroot/coverage/index.html"> Lien vers le rapport coverage</a></h3>
<h3><a href="http://localhost/AirlinesTravel/webroot/coverage/dashboard.html"> Lien vers le dashbord des test</a></h3>
<h4>Description des etapes du tp2:</h4>
<h5>1. Pour la lecture,l'ajout, la modification et la suppression en ajax:</h5>
<h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Il faut aller sur la page d'accueil et cliquer sur le lien "new modele monopage" qui va menez a cette adresse: http://localhost/AirlinesTravel/modele</h6>

<h5>2. Pour les test du modele et du controlleur:</h5>
<h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. En premier il faut ouvrir un invite de commande et ce deplacer a la racine du dossier AirlinesTravel</h6>
<h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Ensuite, il faut execute cette commande pour le test du modele passager : vendor\bin\phpunit tests\TestCase\Model\Table\PassengersTableTest  </h6>
<h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. Pour le test du controlleur airports c'est cette commande: vendor\bin\phpunit tests\TestCase\Controller\AirportsControllerTest</h6>

<h5>2. Pour les listes liees:</h5>
<h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Sur la page principal en haut il y a un lien qui permet d'arriver a l'ajout d'un vol lorsque l'on clique sur liste dynamique </h6>

<h5>3. Pour autocomplete:</h5>
<h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Pour arriver a la page d'autocomplete il faut clique sur le lien autocomplete en a droite de la page </h6>

<h5>4. Pour coverage:</h5>
<h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Pour acceder au coverage vous pouvez cliquez sur le lien coverage plus haut dans cette page</h6>

<h5>5. Pour interface a prefix admin:</h5>
<h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Pour acceder a l'interfcae au prexi admin il vous suffit de clique sur le lien "page admin modele" dans le menu principal de aeroport </h6>

<h5>6. Pour afficher un document pdf:</h5>
<h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Pour produire un fichier pdf d'aeroport il suffit de cliquer sur le lien pdf dans les actions des aeroports</h6>


<h1><a href="http://www.databaseanswers.org/data_models/travel_routes/index.htm"> Lien vers le site de la base de donées</a></h1>
<? echo $this->Html->image('bd.png', ['alt' => 'Base de données.']); ?><br/>
</body>
</html>
