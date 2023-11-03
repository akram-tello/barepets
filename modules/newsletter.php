<?php 
  $heading = $fields['heading'];
  $content = $fields['content'];
  $code    = $fields['code'];
  $desktop = isset( $fields['desktop'] ) ? $fields['desktop'] : null;
  $mobile  = isset( $fields['mobile'] ) ? $fields['mobile'] : null;
?>

<section class="module module-newsletter <?= !empty( $attributes['className'] ) ? $attributes['className'] : '' ?>">
  <?php 
    if( $desktop && $mobile ) {
      responsive_image( $mobile, $desktop, 'absolute' );
    }
  ?>
  <div class="wrapper">
    <h2 class="module-title"><?= esc_html( $heading ) ?></h2>
    <?= $content ?>
    <?= do_shortcode( $code ) ?>
  </div>
</section>