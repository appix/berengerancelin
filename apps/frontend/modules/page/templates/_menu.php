<ul>
    <?php foreach($menus as $menu) : ?>
	<li><?php echo link_to($menu->getName(), "page/show?slug=" . $menu->getSlug()) ?></li>
    <?php endforeach ?>
    <li><?php echo link_to("Contact", "@contact") ?></li>
</ul>