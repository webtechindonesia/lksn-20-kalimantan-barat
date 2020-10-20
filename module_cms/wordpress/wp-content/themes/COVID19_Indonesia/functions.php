<?php

define('DIR', get_stylesheet_directory_uri());

add_action('init', function () {
    register_post_type('news', [
        'label' => 'News',
        'public' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'taxonomies' => ['category'],
        'rewrite' => ['slug' => '/news/%cat%']
    ]);

    register_post_type('events', [
        'label' => 'Events',
        'public' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
    ]);

    add_rewrite_rule('^news/(.*)/(.*)', 'index.php?post_type=news&name=$matches[2]', 'top');
});

add_action('wp_dashboard_setup', function () {
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('wpseo-dashboard-overview', 'dashboard', 'side');
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
});

add_action('login_head', function () { ?>
    <style>
        #login p {
            background: white;
        }

        #login h1 a {
            background-image: url('<?= DIR ?>/images/Group 1.png') !important;
            background-size: 100% !important;
            width: 100% !important;
        }
    </style>
<?php  });

add_filter('excerpt_length', function ($length) {
    return 15;
});

add_action('post_type_link', function ($link, $id = 0) {
    $post = get_post($id);
    if (is_object($post)) {
        $term = wp_get_post_terms($post->ID, 'category');
        return str_replace('%cat%', $term[0]->slug, $link);
    }

    return $link;
});
