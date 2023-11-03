<?php 
    $type = get_field('food_type');
?>

<?php if( have_rows('badges_icons') ): ?>
<section class="module module--badges <?= $type ?>">
    <div class="wrapper">
        <div class="badges">   
            <?php while( have_rows('badges_icons') ): the_row(); ?>
                <div class="badges-icon">
                    <img src="<?= get_template_directory_uri() ?>/img/placeholder.png" data-src="<?= get_sub_field('icons') ?>" alt="">
                </div>
            <?php endwhile ?>
        </div>
    </div>
</section>
<?php endif ?>