<?php get_header(); ?>
<div id="main">
		<div class="content_wr">
			<div class="content">
	            <h1>Страница не найдена.</h1>
					<p>
						Неправильно набран адрес, или такой страницы на сайте больше не существует.</br></br>
						<a href="/">Перейти на главную.</a>
					</p>
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