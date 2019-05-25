<?php /* Template Name: SINGLE, 通常の投稿 */
get_header(); ?>
    <article>
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <div id="post">
                    <div class="post-header">
                        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    </div>
                    <div class="post-content">
                        <?php the_content(); ?>
                        <span class="post-meta text-right">最終更新日: <?php echo get_the_date(); ?></span>
                        <?php edit_post_link('このページを編集', '<p>', '</p>'); ?>
                    </div>
                </div><!-- /post -->
                <?php
            endwhile;
        else:
            ?>

            <p>この記事は見つかりません．</p>

            <?php
        endif;
        ?>
    </article>
<?php get_footer(); ?>