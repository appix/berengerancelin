<?php use_helper('Form') ?>
<div>
    <?php echo form_tag('profil/editProfil') ?>
    <div>
	<?php echo input_hidden_tag('profil[id]', $profil->getId()) ?>
    </div>
    <div>
	<label for="firstname">Prénom :</label>
	<?php echo input_tag('profil[firstname]', $profil->getFirstname()) ?>
    </div>
    <div>
	<label for="lastname">Nom :</label>
	<?php echo input_tag('profil[lastname]', $profil->getLastname()) ?>
    </div>
    <div>
	<label for="email">eMail :</label>
	<?php echo input_tag('profil[email]', $profil->getEmail()) ?>
    </div>
    <div>
	<label for="phone">Téléphone :</label>
	<?php echo input_tag('profil[phone]', $profil->getPhone()) ?>
    </div>
    <div>
	<label for="birthdate">Date de naissance :</label>
	<?php echo input_tag('profil[birthdate]', $profil->getBirthdate()) ?>
    </div>
    <?php echo submit_tag('Sauvegarder') ?>
    <?php echo link_to('Annuler', 'profil/viewProfil') ?>
    </form>
</div>