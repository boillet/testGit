<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    
<pre> <?php print_r($_POST); ?> </pre>

<form method="POST"><!-- si pas action="..." les infos sont envoyées sur cette page-->
	
    <input type="text" name="nom" placeholder="nom" value=" <?php if(isset($_POST['nom']) ){ echo $_POST['nom']; } ?> "><br>
    <!-- je préremplis mon champ dans value si l'utilisateur a posté un nom -->
    
    <input type="text" name="prenom" placeholder="prenom" value=" <?php if(isset($_POST['prenom']) ){ echo $_POST['prenom']; } ?> "><br>
    
    <input type="text" name="email" placeholder="email" value=" <?php if(isset($_POST['prenom']) ){ echo $_POST['prenom']; } ?> " ><br>
    
    <input type="text" name="telephone" placeholder="telephone" value=" <?php if(isset($_POST['telephone']) ){ echo $_POST['telephone']; } ?> " ><br>
    
    <input type="text" name="url" placeholder="url"><br>
    
    <textarea name="message" placeholder="message" value=" <?php if(isset($_POST['message']) ){ echo $_POST['message']; } ?> "></textarea><br>
    
    
	<select name="categorie" placeholder="categorie">
		<option value="php">PHP</option>
		<option value="sql">SQL</option>
        <option value="js">JS</option>
        <option value="html">HTML</option>
        <option value="css">CSS</option>
	</select><br>
    
    <label><input type="checkbox" name="urgent">urgent</label> <br>
	
	<button type="submit">Valider</button>

    
</form>
    
    
    

<?php

    
if(!empty($_POST)){ // équivaut à empty($_POST) == false
    
    // tout le code de traitement du formulaire se trouve dans ce if
    
	//je crée une variable qui contiendra d'éventuelles erreurs
	$error = [];// tableau vide qui va comprendre les erreurs éventuelles de l'utilisateur

	// si mon champ nom a moins de 1 caractère, >> erreur
	if(strlen($_POST['nom']) < 1){
		$error['nom'] = 'Votre nom doit faire au moins 1 caractère';
	}

	if(strlen($_POST['prenom']) < 1){
		$error['prenom'] = 'Votre prénom doit faire au moins 1 caractère';
	}

    // filter_var vérifie que l'email est valide
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		$error['email'] = 'Votre email n\'est pas valide';
    }
    
    if(!is_numeric($_POST['telephone']) OR strlen($_POST['telephone']) !== 10){
		$error['telephone'] = 'Votre téléphone doit faire 10 caractères numériques';
	}
    
    if(strlen($_POST['message']) > 100){
		$error['message'] = 'Votre message ne doit pas faire plus de 100 caractères';
	}
    
    // vérif de la catégorie
    // on attend soit php soit JS soit CSS soit Sql...
    
    
    $categories = array ('php', 'sql', 'js', 'html', 'css');
    
    // j'affiche un message d'erreur si ce que je reçois n'est pas dans ce tableau
    
    if(!in_array($_POST['categorie'], $categories)){
        $error['categorie'] = 'categorie inconnue';
    }
    
    
    
    if(empty($error)){ //$error est vide (il n'y a pas d'erreur) donc on peut afficher le texte
		
        if (isset($_POST['urgent']) AND $_POST['urgent'] == on){        
            echo 'Votre message urgent a bien été envoyé.' ;
       
            }else{
                echo 'Votre formulaire a bien été envoyé.';
       
            }
		
	} else {
		//$error n'est pas vide, il y a au moins une erreur
		foreach($error as $message){
			echo $message.'<br>';
		}
    }

    
   
}

?>



</body>
</html>