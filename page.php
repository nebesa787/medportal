<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<div id="main">
		<div class="content_wr">

			<div class="content">
			
	            <?php wp_reset_query(); ?>
				
				<?php while ( have_posts() ) : the_post(); ?>
					<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
					<h1><?php the_title(); ?></h1>
					<?php //get_template_part( 'content', get_post_format() ); ?>
					<?php the_content(); ?>
					<br>
<!-- <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
			<script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
			<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,gplus" data-counter=""></div>
-->
				<?php endwhile; ?>
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
	</div><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>