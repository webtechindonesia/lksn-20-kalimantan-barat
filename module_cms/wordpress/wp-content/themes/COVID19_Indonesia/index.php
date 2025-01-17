<?php get_header() ?>
<main>
    <div class="banner" style="background-image: url('<?= DIR ?>/images/banner.jpg')">
        <div class="overlay">
            <div class="container">
                <div class="text">
                    <h1>Berantas COVID dari Indonesia</h1>
                    <p>Mari bersama sama lwaan COVID dan jaga kesehatan dengan menggunakan hand sanizter dan mencuci tangan setiap hari</p>
                    <button class="btn">See more</button>
                </div>
            </div>
        </div>
    </div>

    <section class="news-section">
        <div class="container">
            <div class="section-title">
                <p class="small text-white bold">Upcoming Fresh news</p>
                <h2>News</h2>
            </div>
            <div class="section-content">
                <div class="news-group">
                    <?php
                    $query = new WP_Query(['post_type' => 'news']);
                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post()
                    ?>
                            <article class="news">
                                <div class="news-text">
                                    <h3><a href="<?= get_the_permalink() ?>"><?php the_title() ?></a></h3>
                                    <p><?php the_excerpt() ?></p>
                                </div>
                                <div class="news-cover">
                                    <img src="<?= get_the_post_thumbnail_url() ?>" alt="banner">
                                </div>
                            </article>
                    <?php wp_reset_postdata();
                        endwhile;
                    endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="event-section">
        <div class="container">
            <div class="section-title">
                <div class="small text-primary bold">Our newest events</div>
                <h2>Event</h2>
            </div>
            <div class="section-content">
                <div class="card-group">
                    <?php
                    $query = new WP_Query(['post_type' => 'events']);
                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post()
                    ?>
                            <div class="card">
                                <div class="card-img">
                                    <img src="<?= get_the_post_thumbnail_url() ?>" alt="Image">
                                </div>
                                <div class="card-body">
                                    <div class="card-title"><?php the_title() ?></div>
                                    <div class="card-content">
                                        <?php the_excerpt() ?>
                                    </div>
                                </div>
                            </div>
                    <?php wp_reset_postdata();
                        endwhile;
                    endif ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer() ?>