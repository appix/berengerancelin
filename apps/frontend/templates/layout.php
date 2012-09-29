<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php $menu = get_component("page", "menu") ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
	<?php include_http_metas() ?>
	<?php include_metas() ?>
	<?php include_title() ?>
	<link rel="shortcut icon" href="/favicon.ico" />
	<?php include_stylesheets() ?>
	<?php include_javascripts() ?>
    </head>
    <body>
	<div id="background">
	    <div id="conteneur">
		<div id="header">
		    <?php link_to(image_tag("logo.jpg", array('height' => 80, 'border' => 0, 'alt' => "Bérenger Ancelin")), "@homepage") ?>
		    <a href=""><img src="images/logo.jpg" height="80" border="0" alt="Berenger Ancelin"/></a>
		    <?php include_component('page', 'changeLanguage') ?>
		</div>
		<div id="menuh">
		    <?php echo $menu ?>
		</div>
		<div id="contenu1">
		    <?php echo $sf_content ?>
		</div>
		<div id="footer">
		    <div id="lien">
			Copyright © 2012 - Bérenger Ancelin - Tous droits réservés - Design &amp; Développement: <a href="http://appix.fr/" target="_blank">Appix.fr</a>
		    </div>
		    <div id="menubas">
			<?php echo $menu ?>
		    </div>
		</div>
	    </div>
	</div>
    </body>
</html>
