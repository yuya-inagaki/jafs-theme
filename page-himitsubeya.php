<?php
/*
Template Name: FP, 秘密部屋|
*/
get_header("himitsubeya"); ?>		
		<section id="main" class="container">
			<?php get_sidebar('himitsubeya'); ?>
			<div id="posts-top">
				<?php
				if (have_posts()) :
					while (have_posts()) :
						the_post();?>		
				<div id="post">
					<div class="post-header">
						<h1><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h1>
					</div>
					<div class="post-content">
						<?php the_content(); ?>
						<?php edit_post_link('このページを編集', '<p>', '</p>'); ?>
					</div>
				</div><!-- /post -->
				<?php
					endwhile;
				else:?>
				<p>no page</p>
				<?php
				endif;
				?>
			</div>
		</section>
		<?php //get_footer(); ?>