<?php 
  $heading = $fields['heading'];
  $logos   = $fields['logos'];
?>

<div class="module module-logo-carousel <?= !empty( $attributes['className'] ) ? $attributes['className'] : '' ?>">
  <div class="wrapper">
    <h2 class="module-title"><?= esc_html( $heading ) ?></h2>
    <div class=" js-logo-carousel">
      <?php foreach( $logos as $logo ): ?>
        <div class="logos--item">
          <?php if( $logo['link'] ): ?><a href="<?= $logo['link'] ?>"><?php endif; ?>
            <?php image( $logo['logo'], 'a1x1' ) ?>
            <p><?= esc_html( $logo['title'] ) ?></p>
          <?php if( $logo['link'] ): ?></a><?php endif; ?>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>