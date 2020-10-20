<?php get_header() ?>
<main>
    <div class="banner" style="background-image: url('<?= DIR ?>/images/banner.jpg')">
        <div class="overlay">
            <div class="container">
                <div class="text">
                    <h1>Lorem ipsum dolor sit amet.</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus ratione vel molestias unde dolore expedita!</p>
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
                    <article class="news">
                        <div class="news-text">
                            <h3><a href="#">Lorem, ipsum dolor.</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque dolorem temporibus amet, mollitia eos totam?</p>
                        </div>
                        <div class="news-cover">
                            <img src="<?= DIR ?>/images/banner.jpg" alt="banner">
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer() ?>