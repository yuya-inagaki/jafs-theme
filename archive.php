<?php
/*
Template Name: Archives-kitahara
*/
get_header(); ?>

    <div id="container">
        <div id="content" role="main">

            <?php the_post(); ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>

            <h2>月別アーカイブ:</h2>
            <ul>
                <?php wp_get_archives('type=monthly'); ?>
            </ul>

        </div><!-- #content -->
    </div><!-- #container -->

<?php get_footer(); ?>