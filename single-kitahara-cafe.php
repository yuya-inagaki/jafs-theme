<?php /* Template Name: SINGLE, Kitahara cafe */
if (!is_user_logged_in()) {
    header('Location: http://e-kagaku.com/mypage');
    exit;
}
get_header('kitahara'); ?>
    <article>
        <div class="row">
            <div class="col-sm-9">
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
                else: ?>
                    <p>この記事は見つかりません．</p>
                <?php endif; ?>
            </div>
            <div class="col-sm-3" style="background-color: white;">
                <?php get_sidebar('kitahara') ?>
            </div>
        </div>
    </article>
<?php get_footer(); ?>