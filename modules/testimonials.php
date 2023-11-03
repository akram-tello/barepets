<?php 
  $heading = $fields['heading'];
  $testimonials = $fields['testimonials'];
?>

<div class="module module-testimonials <?= !empty( $attributes['className'] ) ? $attributes['className'] : '' ?>">
  <div class="wrapper">
    <h2 class="module-title"><?= esc_html( $heading ) ?></h2>
    <?php if( $testimonials ): ?>
      <div class="testimonials">
        <?php foreach( $testimonials as $testimonial ): ?>
          <div class="testimonials--item">
            <div class="testimonials--photo"><?php image( $testimonial['photo'], 'a1x1' ) ?></div>
            <?= $testimonial['title'] ?>
            <h4><?= esc_html( $testimonial['author'] ) ?></h4>
            <p><?= esc_html( $testimonial['position'] ) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif ?>
  </div>
</div>