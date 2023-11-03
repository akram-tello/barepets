<?php 
  $heading = $fields['title'];
  $intro   = $fields['intro'];
  $cta     = $fields['cta'];
  $desktop = $fields['desktop'];
  $mobile  = $fields['mobile'];
  $halign  = $fields['halign'];
  $valign  = $fields['valign'];
?>

<section class="module module-page-header <?= !empty( $attributes['className'] ) ? $attributes['className'] : '' ?>">
  <div class="page-header">
    <?php 
      responsive_image( $mobile, $desktop, 'absolute' );
    ?>
    <div class="page-header--wrapper wrapper <?= $valign ?>">
      <div class="page-header--content <?= $halign ?>">
        <h2 class="page-header--heading"><?= esc_html( $heading ) ?></h2>
        <?= $intro ?>
        <?php foreach( $cta as $cta ): ?>
          <a href="<?= esc_url( $cta['link'] ) ?>" class="btn btn--primary"><?= esc_html( $cta['label'] ) ?></a>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</section>