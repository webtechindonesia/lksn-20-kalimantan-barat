<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo bloginfo('title') ?></title>
    <link rel="stylesheet" href="<?= DIR ?>/style.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/style.css">
</head>

<body <?php body_class() ?>>

    <?php wp_head() ?>

    <header>
        <div class="container">
            <nav>
                <div class="logo"></div>
                <ul class="menu">
                    <li><a href="<?= get_home_url() ?>">Home</a></li>
                    <?php
                    $cats = get_term('category');
                    print_r($cats);
                    // foreach ($cats as $cat) :
                    //     if ($cat->name == 'Uncategorized') continue;
                    ?>
                    <li><a href="#"><?php $cat->name ?></a></li>
                    <?php //endforeach 
                    ?>
                </ul>
            </nav>
        </div>
    </header>