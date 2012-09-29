<?php
if(!empty($_POST)){
	extract($_POST);
	$valid = true;
	if($adresse != ""){
	}
	else{
	
	if(empty($nom)){
		$valid=false;
		$erreurnom="Vous n'avez pas saisi votre nom.";
	}
	if(empty($prenom)){
		$valid=false;
		$erreurprenom="Vous n'avez pas saisi votre prénom.";
	}
	if(!preg_match("/^[0-9]{10}$/i" ,$telephone)){
		$valid=false;
		$erreurtelephone = "Votre téléphone n'est pas valide.";
	}
	if(empty($telephone)){
		$valid=false;
		$erreurtelephone="Vous n'avez pas saisi votre téléphone.";
	}
	if(!preg_match("/^[a-z0-9\-_.]+@[a-z0-9\-_.]+\.[a-z]{2,3}$/i" ,$email)){
		$valid=false;
		$erreuremail = "Votre email n'est pas valide.";
	}
	if(empty($email)){
		$valid=false;
		$erreuremail="Vous n'avez pas saisi votre email.";
	}
	if(empty($message)){
		$valid=false;
		$erreurmessage="Vous n'avez pas saisi votre message.";
	}
	
	if($valid){
		$to = "berenger.coach@gmail.com";
		$sujet = $nom." vous a contacté via votre site";
		$header = "From: contact@berengerancelin.fr \n";
		$header .= "Reply-To: $nom <$email>";
		$message= "De la part de $nom $prenom \n Telephone: $telephone \n \n Message: $message";
		$message = stripslashes($message);
		$nom = stripslashes($nom);
		$prenom = stripslashes($prenom);
		if(mail($to,$sujet,$message,$header)){
			$erreur = "Votre message nous est bien parvenu.";
			unset($nom);
			unset($prenom);
			unset($telephone);
			unset($email);
			unset($message);
		}
		else{
			$erreur = "Une erreur est survenue et votre mail n'est pas parti.";
		}
	}
}
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bérenger Ancelin : Coach Sportif</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="jquery.js"></script>
<script type="text/javascript">
	$(function() {
		$("#adresse").hide();
		$("#envoyer").click(function(){
			
			valid=true;
			if($("#nom").val()==""){
				$("#nom").css("background-color","#fdd2d2");
				$("#nom").next(".error-message").text("Veuillez saisir votre nom");
				valid=false;
			}
			else{
				$("#nom").css("background-color","#fff");
				$("#nom").next(".error-message").text("");
			}
			
			if($("#prenom").val()==""){
				$("#prenom").css("background-color","#fdd2d2");
				$("#prenom").next(".error-message").text("Veuillez saisir votre prénom");
				valid=false;
			}
			else{
				$("#prenom").css("background-color","#fff");
				$("#prenom").next(".error-message").text("");
			}
			
			if($("#telephone").val()==""){
				$("#telephone").css("background-color","#fdd2d2");
				$("#telephone").next(".error-message").text("Veuillez saisir votre téléphone");
				valid=false;
			}
			else{
				if(!$("#telephone").val().match(/^[0-9]{10}$/i)){
					$("#telephone").css("background-color","#fdd2d2");
					$("#telephone").next(".error-message").text("Veuillez saisir un telephone valide");
					valid=false;
					}
				else{
				$("#telephone").css("background-color","#fff");
				$("#telephone").next(".error-message").text("");
				}
			}
		if($("#email").val()==""){
			$("#email").css("background-color","#fdd2d2");
			$("#email").next(".error-message").text("Veuillez saisir votre email");
			valid=false;
			}
			else{
				if(!$("#email").val().match(/^[a-z0-9\-_.]+@[a-z0-9\-_.]+\.[a-z]{2,3}$/i)){
				$("#email").css("background-color","#fdd2d2");
				$("#email").next(".error-message").text("Veuillez saisir un email valide");
				valid=false;
				}
				else{
					$("#email").css("background-color","#fff");
					$("#email").next(".error-message").text("");
				}
			}
			if($("#message").val()==""){
				$("#message").css("background-color","#fdd2d2");
				$("#message").next(".error-message2").text("Veuillez saisir votre message");
				valid=false;
			}
			else{
				$("#message").css("background-color","#fff");
				$("#message").next(".error-message2").text("");
			}			
			return valid;
		});
	});
</script>

</head>

<body>

<div id="background">
<div id="conteneur">
	<div id="header">
    <a href="#"><img src="images/logo.jpg" height="80" border="0" alt="Berenger Ancelin" /></a>
 	</div>
    
    <div id="menuh">
       	  <ul >
  			<li><a href="index.html">Prestations</a></li>
            <li><a href="coach.html">Coach</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
    </div>

    <div id="contenu3">
    
    	<div id="contactd1">
        	<h1>Formulaire</h1>
            <div id="contactd1txt1">

     
      <form method="post" action="contact.php">
      <div id="formleft"><label for="nom">Nom :</label>
      <input type="text" name="nom" id="nom" value="<?php if(isset($nom)) echo $nom; ?>"/>
      <span class="error-message"><?php if(isset($erreurnom)) echo $erreurnom; ?></span></div>
      
      <input type="text" name="adresse" id="adresse"/>
      
      <div id="formleft"><label for="prenom">Prénom :</label>
      <input type="text" name="prenom" id="prenom" value="<?php if(isset($prenom)) echo $prenom; ?>"/>
      <span class="error-message"><?php if(isset($erreurprenom)) echo $erreurprenom; ?></span></div>
      
      <div id="formleft"><label for="telephone">Téléphone :</label>
      <input type="text" name="telephone" id="telephone" value="<?php if(isset($telephone)) echo $telephone; ?>"/>
      <span class="error-message"><?php if(isset($erreurtelephone)) echo $erreurtelephone; ?></span></div>
      
      <div id="formleft"><label for="email">Email :</label>
      <input type="text" name="email" id="email" value="<?php if(isset($email)) echo $email; ?>"/>
       <span class="error-message"><?php if(isset($erreuremail)) echo $erreuremail; ?></span></div>
      
      <div id="formleft"><label for="message">Message : </label>
      <textarea name="message" rows="15" cols="100" id="message"><?php if(isset($message)) echo $message; ?></textarea>
      <span class="error-message2"><?php if(isset($erreurmessage)) echo $erreurmessage; ?></span>
     
      <div id="erreur"> <?php 
	  if(isset($erreur)){ echo "<p>$erreur</p>"; }
	  ?></div>
      <input type="submit" value="Envoyer" id="envoyer"/></div>
      </form>
      
      </div></div>
     
       
         
         <div id="contactg1">
        	<h2>Bérenger Ancelin Coach sportif</h2>
            <p>Tél. : +33 (0)6 44 12 14 26<br />
            contact@berengerancelin.fr</p>
		</div>
        
        <div id="contactg2"><p>Pour toutes demandes d'informations, n'hésitez<br />pas à me contacter<br />par téléphone, par mail<br />ou via le formulaire.</p>
		</div>
		
        
         
     </div>
    
    <div id="footer">
    <div id="lien">Copyright © 2012 - Bérenger Ancelin - Tous droits réservés - Design &amp; Développement: <a href="http://appix.fr/" target="_blank">Appix.fr</a></div>
    <div id="menubas">
<a href="index.html">Prestations</a><br />
<a href="coach.html">Coach</a><br />
<a href="contact.php">Contact</a>
    </div>
        
    </div>

    
   
    
</div>
</div>






</body>
</html>