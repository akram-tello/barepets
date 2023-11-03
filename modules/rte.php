<?php 
  $heading = $fields['heading'];
  $content = $fields['content'];
  $cta     = $fields['cta'];
  $desktop = isset( $fields['desktop'] ) ? $fields['desktop'] : null;
  $mobile  = isset( $fields['mobile'] ) ? $fields['mobile'] : null;
?>

<section class="module module-rte <?= !empty( $attributes['className'] ) ? $attributes['className'] : '' ?>">
  <?php 
    if( $desktop && $mobile ) {
      responsive_image( $mobile, $desktop, 'absolute' );
    }
  ?>
  <div class="wrapper">
    <h2 class="module-title"><?= esc_html( $heading ) ?></h2>
    <?= $content ?>
    <?php if( $cta ): ?>
      <div class="text-cta">
        <?php foreach( $cta as $cta ): ?>
          <a href="<?= esc_url( $cta['link'] ) ?>" class="btn btn--primary"><?= esc_html( $cta['label'] ) ?></a>
        <?php endforeach ?>
      </div>  
    <?php endif ?>
  </div>
</section>