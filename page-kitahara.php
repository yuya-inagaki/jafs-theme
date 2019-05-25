<?php /* Template Name: FP, kitahara */
if (!is_user_logged_in()) {
    header('Location: http://e-kagaku.com/mypage');
    exit;
}
get_header('kitahara'); ?>
    <article>
        <div class="row">
            <div class="col-sm-9">
                <div id="post">
                    <h1 style="text-align:center;">kitahara blog</h1>
                    <!-- all -->
                    <ul style="list-style:none; margin: 0; padding: 0;">
                        <?php
                        $articles_archive_post_args = [
                            'post_type' => 'kitahara-cafe',
                            'orderby' => 'post_date',
                            'order' => 'DESC',
                            'posts_per_page' => 30,
                        ];
                        $articles_archive_post = get_posts($articles_archive_post_args);
                        foreach ($articles_archive_post as $post) : setup_postdata($post); ?>
                            <li style="border-bottom: 1px solid"><h2
                                        style="border: none;　text-decoration:none; padding: 0px;"><a
                                            class="text-decoration:none;"
                                            href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2><?php the_excerpt(); ?>【<?php the_time('Y年m月d日'); ?>】
                            </li>
                        <?php endforeach;
                        wp_reset_postdata(); ?>
                    </ul>
                    <!-- endall -->
                </div><!-- /post -->
            </div>
            <div class="col-sm-3" style="background-color: white;">
                <?php get_sidebar('kitahara') ?>
            </div>
        </div>
    </article>
<?php get_footer(); ?>