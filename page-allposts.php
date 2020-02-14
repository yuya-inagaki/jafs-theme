<?php
/*
Template Name: FP, 全ての投稿|
*/
get_header(); ?>
    <article>
      <div class="container">
        <div class="row">
            <div class="col-sm-12">
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
                                <?php
                                the_content();
                                edit_post_link('このページを編集', '<p>', '</p>'); ?>

                                <ul>
                                    <?php
                                    $args = array('numberposts' => -1, 'orderby' => 'date');
                                    $postslist = get_posts($args);
                                    foreach ($postslist as $post) :
                                        setup_postdata($post); ?>
                                        <li><a href="<?php the_permalink(); ?>"><?php the_time('Y年m月d日'); ?>
                                                ｜<?php the_title(); ?></a></li>
                                    <?php endforeach; ?>
                                </ul>

                            </div>
                        </div><!-- /post -->
                        <?php
                    endwhile;
                else:?>
                    <p>no page</p>
                    <?php
                endif; ?>
            </div>
        </div>
              </div>
    </article>
<?php get_footer(); ?>