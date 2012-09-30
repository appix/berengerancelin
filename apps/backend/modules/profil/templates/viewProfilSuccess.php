<div>
    <div>
	<label for="firstname">Prénom :</label>
	<?php echo $profil->getFirstname() ?>
    </div>
    <div>
	<label for="lastname">Nom :</label>
	<?php echo $profil->getLastname() ?>
    </div>
    <div>
	<label for="email">eMail :</label>
	<?php echo $profil->getEmail() ?>
    </div>
    <div>
	<label for="phone">Téléphone :</label>
	<?php echo $profil->getPhone() ?>
    </div>
    <div>
	<label for="birthdate">Date de naissance :</label>
	<?php echo $profil->getBirthdate() ?>
    </div>
    <?php echo link_to('Editer', 'profil/editProfil') ?>
</div>