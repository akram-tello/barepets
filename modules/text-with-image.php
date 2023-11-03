<?php 
  $heading = $fields['heading'];
  $content = $fields['content'];
  $cta     = $fields['cta'];
  $photo   = $fields['photo'];
  $align   = $fields['img_align'];
?>

<section class="module module-text-with-image <?= !empty( $attributes['className'] ) ? $attributes['className'] : '' ?>">
  <div class="wrapper">
    <div class="text-with-image <?= $align ?>">
      <div class="text-image">
        <?php image( $photo, 'a4x3' ); ?>
      </div>
      <div class="text-content">
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
    </div>
  </div>
</section>