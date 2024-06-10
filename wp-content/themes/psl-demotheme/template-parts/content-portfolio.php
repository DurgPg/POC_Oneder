<section id="portfolio" class="portfolio-section">
    <h2 class="section-title">Portfolio</h2>
    <div id="filters" class="filters text-center button-group col-md-7">
        <button class="btn btn-primary active" id="filter-button" data-filter="*">All</button>
        <?php
        $categories = get_terms('portfolio_type');
        if (!is_wp_error($categories) && !empty($categories)) {
            foreach ($categories as $category) {
                echo '<button class="btn btn-primary" id="filter-button" data-filter="type-' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</button>';
            }
        } else {
            echo '<p>No categories found.</p>';
        }
        ?>
    </div>
    <div class="portfolio-items">
        <?php
        $args = array(
            'post_type' => 'portfolio',
            'posts_per_page' => -1,
        );
        $portfolio_query = new WP_Query($args);
        if ($portfolio_query->have_posts()) :
            while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                $portfolio_type = get_the_terms(get_the_ID(), 'portfolio_type');
                $portfolio_classes = '';
                if (!is_wp_error($portfolio_type) && !empty($portfolio_type)) {
                    foreach ($portfolio_type as $type) {
                        $portfolio_classes .= 'type-' . esc_attr($type->slug) . '';
                    }
                }
        ?>
                <div class="portfolio-item <?php echo trim($portfolio_classes); ?>">
                    <img class="portfolio-image" src="<?php
                                                        the_post_thumbnail_url('full');
                                                        ?>" alt="<?php the_title(); ?>" id="portfolio-image" />
                    <div class="portfolio-overlay">
                        <a href="#" target="_blank" class="portfolio-icon" data-index="<?php echo $portfolio_query->current_post; ?>">
                            <i class="fa-solid fa-magnifying-glass" id="portfolio-overlay-icon"></i>
                        </a>
                    </div>

                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No portfolio items found.</p>';
        endif;
        ?>
    </div>

    <div class="modal" id="portfolio-modal">
        <span class="close">&times;</span>
        <div class="modal-content">
            <img class="modal-image" src="" alt="" id="modal-image" />
            <a class="prev">&#10094;</a>
            <a class="next">&#10095;</a>
        </div>
    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.filters .btn');
        const portfolioItems = document.querySelectorAll('.portfolio-item');

        const modal = document.getElementById('portfolio-modal');
        const modalImage = document.getElementById('modal-image');
        const closeModal = document.querySelector('.close');
        const nextButton = document.querySelector('.next');
        const prevButton = document.querySelector('.prev');
        let currentIndex = 0;

        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');

                filterButtons.forEach(btn =>
                    btn.classList.remove('active'));
                this.classList.add('active');

                portfolioItems.forEach(item => {
                    if (filter === '*') {
                        item.style.display = 'block';
                    } else {
                        if (item.classList.contains(filter)) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    }
                });
            });
        });

        const portfolioIcons = document.querySelectorAll('.portfolio-icon');
        portfolioIcons.forEach((icon, index) => {
            icon.addEventListener('click', function(event) {
                event.preventDefault();
                currentIndex = index;
                showModalImage(currentIndex);
            });
        });

        closeModal.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        nextButton.addEventListener('click', function() {
            currentIndex = (currentIndex + 1) % portfolioItems.length;
            showModalImage(currentIndex);
        });

        prevButton.addEventListener('click', function() {
            currentIndex = (currentIndex - 1 + portfolioItems.length) % portfolioItems.length;
            showModalImage(currentIndex);
        });

        window.addEventListener('click', function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        });

        function showModalImage(index) {
            modalImage.src = portfolioItems[index].querySelector('.portfolio-image').src;
            modal.style.display = 'block';
        }
    });
</script>