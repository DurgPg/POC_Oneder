<div class="container">
    <div class="post mb-5">

        <div class="card" style="width: 18rem;">
            <img src="<?php
                        the_post_thumbnail_url('thumbnail');
                        ?>" alt="image" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h5>
                <div class="meta mb-1">
                    <span class="author"><?php the_author(); ?></span>
                    <span class="date"><?php the_date(); ?></span>
                </div>
                <p class="card-text"><?php
                                        the_excerpt();
                                        ?></p>
                <a href="<?php the_permalink(); ?>" class="card-link">Continue Reading...</a>
            </div>
        </div>
    </div>

</div>