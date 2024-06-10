<!-------------------------------------- CONTACT US ------------------------------------------->

<section class="contact-section" id="contact">
    <div class="container">
        <h2 class="section-title">Contact Us</h2>
        <?php
        $contact_address = get_theme_mod('contact_address');
        $contact_phone = get_theme_mod('contact_phone');
        $contact_email = get_theme_mod('contact_email');
        ?>

        <div class="contact-info">

            <div class="contact-item">
                <span><i class="fa fa-map-marker"></i></span>
                
                <?php if ($contact_address) : ?>
                    <span><?php echo esc_html($contact_address); ?></span>
                <?php endif; ?>
            </div>



            <div class="contact-item">
                <i class="fa fa-phone"></i>
                <?php if ($contact_phone) : ?>
                    <a href="tel:<?php echo esc_attr($contact_phone); ?>"><span><?php echo esc_html($contact_phone); ?></span></a>
                <?php endif; ?>
            </div>



            <div class="contact-item">
                <i class="fa fa-envelope"></i>
                <?php if ($contact_email) : ?>
                    <a href="mailto:<?php echo esc_attr($contact_email); ?>"><span><?php echo esc_html($contact_email); ?></span></a>
                <?php endif; ?>
            </div>

        </div>
        <hr>

        <?php echo do_shortcode('[wpforms id="23" title="true"]'); ?>
    </div>
</section>