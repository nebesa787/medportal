<?php
	get_header();
	wp_reset_query();
?>

	<div id="main">
		<div class="content_wr">
			<div class="content">
				<?php if ( have_posts() ) : ?>
                    <? if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentythirteen' ), get_search_query() ); ?></h1>

					<?php get_sidebar('top_content');?>

					<div class="b_info4">
	                   	<?php wp_reset_query(); ?>
						<?php /* The loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content-medicine', get_post_format() ); ?>
						<?php endwhile; ?>

						<?php twentythirteen_paging_nav(); ?>
					</div>

				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>
        	</div><!-- #content -->

        	<div class="sidebar">
				<?php dynamic_sidebar( 'single-banner' ); ?>
				<h4 class="title1">Последние отзывы</h4>
				<!--noindex-->
				<div class="b_info5">
					<?php kama_recent_comments("limit=3&ex=100&term=19"); ?>
				</div>
				<!--/noindex-->
				<h4 class="title1">Вопросы / ответы</h4>
				<!--noindex-->
				<div class="b_info1">
					<?php
					wp_reset_query(); // сброс query_posts
					query_posts('cat=7&posts_per_page=5');
					?>
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content-ques', get_post_format() ); ?>
						<?php endwhile; ?>
					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>
				</div>
				<!--/noindex-->
			</div>
			<div class="clear"></div>

		</div><!-- #content_wr -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>