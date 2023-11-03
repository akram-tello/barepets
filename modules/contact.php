<?php 
  $heading = $fields['heading'];
  $content = $fields['content'];
  $code    = $fields['code'];
?>

<section class="module module-contact <?= !empty( $attributes['className'] ) ? $attributes['className'] : '' ?>">
  <div class="wrapper">
    <h2 class="module-title"><?= esc_html( $heading ) ?></h2>
    <?= $content ?>

    <p>Email: <a href="mailto:<?= carbon_get_theme_option('email') ?>"><?= carbon_get_theme_option('email') ?></a></p>
    <p>Contact#: <a href="tel:<?= carbon_get_theme_option('contact') ?>"><?= carbon_get_theme_option('contact') ?></a></p>
    <?= do_shortcode( $code ) ?>
  </div>
</section>