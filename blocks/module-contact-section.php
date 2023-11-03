<?php 
    $className = !empty($block['className']) ? $block['className'] : null;
    $contact_form = get_field('contact_form');
    $contact_information = get_field('contact_information');
    $social_media = $contact_information['social_links'];
?>


<section class="module module--contact-section <?= $className ?>">
    <div class="wrapper">
        <div class="contact-left">
            <div class="contact-form">
                <h2><?= $contact_form['heading'] ?></h2>
                <p><?= $contact_form['description'] ?></p>
                <div class="form-wrapper">
                    <?= do_shortcode( $contact_form['form_shortcode'] ) ?>
                </div>
            </div>
        </div>
        <div class="contact-information">
            <div class="information-wrapper">
                <h2><?= $contact_information['heading'] ?></h2>
                <?php if($contact_information['availability']) : ?>
                <div class="information-group">
                    <div class="information-icon">
                        <img data-src="<?= get_template_directory_uri() ?>/img/availability-icon.png" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="">
                    </div>
                    <div class="title">
                        <h4>Availability</h4>
                    </div>
                    <div class="information-content">
                        <p><?= $contact_information['availability'] ?></p>
                    </div>
                </div>
                <?php endif; ?>
                <?php if($contact_information['email']) : ?>
                <div class="information-group">
                    <div class="information-icon">
                        <img data-src="<?= get_template_directory_uri() ?>/img/email-icon.png" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="">
                    </div>
                    <div class="title">
                        <h4>Email</h4>
                    </div>
                    <div class="information-content">
                        <p><a href="mailto:<?= $contact_information['email'] ?>"><?= $contact_information['email'] ?></a></p>
                    </div>
                </div>
                <?php endif; ?>
                <?php if($contact_information['phone']) : ?>
                <div class="information-group">
                    <div class="information-icon">
                        <img data-src="<?= get_template_directory_uri() ?>/img/phone-icon.png" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="">
                    </div>
                    <div class="title">
                        <h4>Phone</h4>
                    </div>
                    <div class="information-content">
                        <p><a href="tel:<?= $contact_information['phone'] ?>"><?= $contact_information['phone'] ?></a></p>
                    </div>
                </div>
                <?php endif; ?>
                <hr>
                <div class="information-group">
                    <div class="information-icon">
                        <img data-src="<?= get_template_directory_uri() ?>/img/social-media-image.png" src="<?= get_template_directory_uri() ?>/img/placeholder.png" alt="">
                    </div>
                    <div class="title">
                        <h4>GET IN TOUCH</h4>
                    </div>
                    <div class="information-content social-media">
                        <?php while( have_rows('social_media', 'option') ): the_row(); ?>
                            <div class="social-link">
                                <a href="<?= get_sub_field('link') ?>" target="_blank"><?= get_template_part('img/icon-' . get_sub_field('platform') . '-white.svg') ?></a>
                            </div>
                        <?php endwhile ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

