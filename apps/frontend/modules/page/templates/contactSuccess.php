<h1>Formulaire</h1>
<div id="contactd1txt1">
    <form method="post" action="/contact">
	<div id="formleft">
	    <label for="lastname">Nom :</label>
	    <input type="text" name="lastname" id="lastname" value="<?php if(isset($lastname)) echo $lastname; ?>"/>
	    <span class="error-message"><?php if(isset($errorlastname)) echo $errorlastname; ?></span>
	</div>
	<div id="formleft">
	    <label for="address">Adresse :</label>
	    <input type="text" name="address" id="address" value="<?php if(isset($address)) echo $address; ?>"/>
	    <span class="error-message"><?php if(isset($erroraddress)) echo $erroraddress; ?></span>
	</div>
	<div id="formleft">
	    <label for="firstname">Prénom :</label>
	    <input type="text" name="firstname" id="firstname" value="<?php if(isset($firstname)) echo $firstname; ?>"/>
	    <span class="error-message"><?php if(isset($errorfirstname)) echo $errorfirstname; ?></span>
	</div>
	<div id="formleft">
	    <label for="phone">Téléphone :</label>
	    <input type="text" name="phone" id="phone" value="<?php if(isset($phone)) echo $phone; ?>"/>
	    <span class="error-message"><?php if(isset($errorphone)) echo $errorphone; ?></span>
	</div>
	<div id="formleft">
	    <label for="email">Email :</label>
	    <input type="text" name="email" id="email" value="<?php if(isset($email)) echo $email; ?>"/>
	    <span class="error-message"><?php if(isset($erroremail)) echo $erroremail; ?></span>
	</div>
	<div id="formleft">
	    <label for="content">Message : </label>
	    <textarea name="content" rows="15" cols="100" id="content"><?php if(isset($content)) echo $content; ?></textarea>
	    <span class="error-message2"><?php if(isset($errorcontent)) echo $errorcontent; ?></span>
	    <div id="erreur"><?php if(isset($erreur)) echo "<p>$erreur</p>"; ?></div>
	    <input type="submit" value="Envoyer" id="envoyer"/>
	</div>
    </form>
</div>