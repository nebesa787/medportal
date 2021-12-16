<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
 global $post;
?>

<div>
	<h2>
		
		<?php if ( is_single() ) : ?>
			<?php the_title(); ?>
		<?php else : ?>
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		<?php endif; ?>

		
	</h2>

	<?php if ( is_search() ) :  ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
	<?php else : ?>
		
		<!--noindex-->
		<?php
				
				preg_match ('~(.*)<!--more-->~s', $post->post_content, $match );
				
				$text = trim( $match[0] );
				if ($text){
					$text = str_replace("\r", '', $text );
					$text = preg_replace( "~\n\n+~s", "</p><p>", $text );
					$text = '<p>'. str_replace( "\n", '<br />', $text ) .'</p>';

					echo $text;
				}else{
					the_content();
				}
			
			

           
			wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
		?>
		<!--/noindex-->
	
	<?php endif; ?>
  
</div>
