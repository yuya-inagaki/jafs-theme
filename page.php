<?php
/*
Template Name: FP, TOP以外の共通|
*/
get_header(); ?>
    <article>
      <div class="container">
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        ?>
                        <div id="post">
                            <div class="post-header">
                                <?php if (function_exists('rdfa_breadcrumb')) {
                                    rdfa_breadcrumb();
                                } ?>
                                <h1><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            </div>
                            <div class="post-content">
                                <?php the_content(); ?>
                                <?php edit_post_link('このページを編集', '<p>', '</p>'); ?>
                            </div>
                            <div class="row">
                              <div class="col-md-6">aaaaa</div>
                            </div>
                        </div><!-- /post -->
                        <?php
                    endwhile;
                else:?>
                    <p>no page</p>
                    <?php
                endif; ?>
      </div>
    </article>
<?php get_footer(); ?>