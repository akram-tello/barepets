<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $heading        = get_field('heading');
    $code           = get_field('shortcode');
?>


<section class="module module--contact-form <?= $className ?>">
    <div class="wrapper">
        <h2 class="module--title"><?= $heading ?></h2>
        <p><?= get_phone(); ?></p>
        <p><?= get_email(); ?></p>
        <p><?= get_address(); ?></p>
        <?= do_shortcode( $code ) ?>
    </div>
</section>

