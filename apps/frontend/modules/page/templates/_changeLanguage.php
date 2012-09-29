<ul>
    <?php foreach($languages as $language => $options) : ?>
    <li><?php echo link_to(image_tag($options['image'], array('title' => $language, 'alt' => $language)), "page/changeLanguage?language=" . $language) ?></li>
    <?php endforeach ?>
</ul>