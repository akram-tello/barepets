<?php 
  $hero = $fields['hero'];
?>

<?php if( $hero ): ?>
<section class="module module-hero <?= !empty( $attributes['className'] ) ? $attributes['className'] : '' ?>">
  <div class="hero js-hero-slider">
    <?php foreach( $hero as $item ): ?>
      <div class="hero--item">
        <?php 
          $desktop = $item['desktop'];
          $mobile  = $item['mobile'];

          responsive_image( $mobile, $desktop, 'absolute' );
        ?>
        <div class="hero--wrapper wrapper <?= $item['valign'] ?>">
          <div class="hero--content <?= $item['halign'] ?>">
            <h2 class="hero--heading"><?= esc_html( $item['title'] ) ?></h2>
            <?= $item['intro'] ?>
            <?php foreach( $item['cta'] as $cta ): ?>
              <a href="<?= esc_url( $cta['link'] ) ?>" class="btn btn--primary"><?= esc_html( $cta['label'] ) ?></a>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>