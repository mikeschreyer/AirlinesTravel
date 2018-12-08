<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<header>420-267 MO Développer un site Web et une application pour Internet.<br/>Automne 2018, Collège Montmorency.</header>
<body>
<h1>Automne 2018, Collège Montmorency.</h1>
<h1>Michel Schreyer</h1>
<h2>L'intérêt de mon prototype d'application web:</h2>
<h3>L'objectif est de fournir une application qui reponds au besoin et au bon fonctionnement demander pour mes TP. Le but final est d'obtenir un application fonctionnel et utilisable en tenant contes des specificites demander respectant les conditions fixees.
De plus, L'objet principal de la phase de conception est d'analyser l'ensemble des besoins, puis d'imaginer des contextes d'utilisation. L'analyse des besoins comporte ainsi deux volets:
celui de recenser l'ensemble des objectifs du site web et d'y associer des critères opérationnels, quantifiables, qui permettront de mesure si l'objectif visé a bien été atteint
et celui qui determine pour quel genre de clientele notre application web est realiser.
Cette étape peut être faite avec l'aide de la personne pour qui nous realisons cette application web.</h3>
<div>
    <h2>Section du TP3:</h2>
    <h3><font color="blue"><B>1. Fonctionnement du démarrage de session et du changement de mot de passe (incluant captcha):</B></font><h3>
            <h4>
                Lorsque de le user se connect a la page modele (monopage) on retient son token et on verifie le user.
                Si le user est bon on le signale a l'usager et sinon un message d'erreur apparait.
                    De plus, pour que la connexion soit reussi,
                le user doit cocher la verification captcha qui permet de valider que c'est bien une personne reel
                    qui essaie de se connecter et non un robot.
                Une fois le user connecter et valider le bouton login se change en logout
                    et le bouton changer le mot de passe apparait pour permettre a l'usager de changer son mot de passe
                dans le section qui apparaitra en dessous du bouton.
                    Le bouton login permet de se deconnecter du token de l'usager et de remettre le bouton login
                    et d'enlever le bouton logout et changer mot de passe.
            </h4>
    <h3><font color="blue"><B>2. Procédure pour tester le fonctionnement de l'interface AngularJS des listes liées et du modèle "CRUD" monopage:</B></font><h3>
            <h4>1. Pour les listes liees:</h4>
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Connecter vous avec username: 123 password: 123</h5>
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Cliquez sur le menu <a href="http://localhost/AirlinesTravel/flights/add">Liste dynamique</a> en haut a droite (le lien vous amene directement)</h5>
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. Selectionner un modele (ATTENTION: seul les 4 premiers modele possede des couleurs).
            Si aucun modele nest selectionner la selection d'une couleur est impossible</h5>
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. Rentrer ensuite le reste des informations et valider le tout</h5>

            <h4>2. modèle "CRUD" monopage:</h4>
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Connecter vous avec username: 123 password: 123</h5>
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Cliquez sur le lien list modele monopage disponible depuis la vue aeroport sur la gouche ou sur le lien suivant:  <a href="http://localhost/AirlinesTravel/modele">CRUD angularJS</a></h5>
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. Pour ajouter un modele rentrer le nom du modele et cliquer sur add (le bouton add modele permet de fermer la section d'ajout)</h5>
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. Pour editer un modele cliquer le bouton edit disponible au bout de chaque modele</h5>
                <h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Rentrer les infos dans la section edit et valider avec le bouton update</h6>
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5. Pour supprimer un modele cliquez sur le bouton supprimer disponible au bout de chaque modele</h5>

    <h3><font color="blue"><B>3. Le fonctionnement du cliquer-glisser pour ajouter une image à l'application:</B></font><h3>
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Connecter vous avec username: 123 password: 123</h5>
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Cliquez sur le lien List files disponible depuis la vue aeroport sur la gouche ou sur le lien suivant:  <a href="http://localhost/AirlinesTravel/files">List files (cliquer-glisser )</a></h5>
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. Glisser une image et attendre qu'elle soit uploader. Au moment ou l'on glisse une image elle est ajouter depuis Files/add </h5>



</div>
<div>
<h3><a href="https://github.com/mikeschreyer/AirlinesTravel"> Lien vers mon depot github AirlinesTravel</a></h3>
<h3><a href="http://localhost/AirlinesTravel/webroot/coverage/index.html"> Lien vers le rapport coverage</a></h3>
<h3><a href="http://localhost/AirlinesTravel/webroot/coverage/dashboard.html"> Lien vers le dashbord des test</a></h3>
<h4>Pour tester l'application vous pouvez vous connecter avec admin@administrateur avec mot de passe: admin</h4>

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
</div>

<h1><a href="http://www.databaseanswers.org/data_models/travel_routes/index.htm"> Lien vers le site de la base de donées</a></h1>
<? echo $this->Html->image('bd.png', ['alt' => 'Base de données.']); ?><br/>
</body>
</html>
