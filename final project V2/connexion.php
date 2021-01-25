<?php
 
 require('fonctions.php');
  
 $nom = '';
 $prenom = '';
 $email = '';
 $mot_de_passe = '';
  
 if (!empty($_POST)) {
   if ($_POST['nom'] != ''
   && $_POST['prenom'] != ''
   && $_POST['email'] != ''
   && $_POST['mot_de_passe'] != '') {
     $nom = securisation($_POST['nom']);
     $prenom = securisation($_POST['prenom']);
     $email = securisation($_POST['email']);
     $choix_film = $_POST['mot_de_passe'];
     $nom = mb_strtoupper($nom); 
     $prenom = ucfirst($prenom); 
     $email = mb_strtolower($email); 
     $valid_email = filter_var($email, FILTER_VALIDATE_EMAIL);
     ajout($nom, $prenom, $email, $mot_de_passe);
     $message = 'Merci de votre inscription';
   }
   else {
     $erreur = 'Veuillez entrer tous les champs obligatoires';
   }
 }
  
 $inscriptions = lecture();
 ?>
    
    <!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Connexion</title>
	<meta name="viewport" content="width=device-width, user-scalable=no">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans">
  <link rel="stylesheet" href="./connexion.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="./home.html"><img src="./img/ledias.png" alt="logo" ></a>
            </div>
            <div class="title">Ledias-streetwear </div>
            <div class="links">
                <div class="link">
                    <a href="./home.html" >home</a>
                </div>
                
                <div class="link">
                    <a href="./collection.html">
                        Collection
                    </a>
                    <div class="dropdown">
                        <a href="./hoodies.html" class="dropdown-item">Hoodies</a>
                        <a href="./t-shirt.html" class="dropdown-item">T-shirts</a>
                        <a href="./chaussure.html" class="dropdown-item">Chaussures</a>
                        <a href="./pantalon.html" class="dropdown-item">Pantalons</a>
                        <a href="./acc.html" class="dropdown-item">Accessoires</a>
                    </div>
                </div>
                <div class="link">
                    <a href="./contact.html">contact</a>
                </div>
                <div class="link">
                    <a href="./connexion.php">connexion</a> 
                </div>
            </div>
         </nav>
    </header>


	<main class="flex">
    <h1>Connectez-vous</h1>
    <section class="left">
      <p class="erreur"><?php echo $message; ?></p>
      <form method="post" action="connexion.php">
        <fieldset>
	       	<legend>Connectez-vous</legend>
	       	<p class="flexrow">
	          <label for="nom">Nom (*)</label>
	          <input id="nom" name="nom" type="text" value="<?php echo $nom; ?>" required>
	       	</p>
	       	<p class="flexrow">
	          <label for="prenom">Prénom (*)</label>
	          <input id="prenom" name="prenom" type="text" value="<?php echo $prenom; ?>" required>
	       	</p>
	       	<p class="flexrow">
	          <label for="email">Email (*)</label>
	          <input id="email" name="email" type="email" value="<?php echo $email; ?>" required>
	       	</p>
	       	<p class="flexrow">
	          <label for="mot_de_passe">Mot de passe</label>
	          <input id="mot_de_passe" name="mot_de_passe" type="mdp" value="<?php echo $mot_de_passe; ?>" >
	       	</p>
            <p>
              <button type="submit" value="inscription" title="Inscription">Connexion</button>
            </p>
          </fieldset>
        </form>
    </section>

    </main>

    <footer>
        <a href="./home.html"> <button class="button-footer" >^</button> </a>

        <a href="./contact.html" class="bas-contact">Contactez-nous</a>
    </footer>
    
</body>
</html>