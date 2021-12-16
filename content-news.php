
<div class="preview">
	<?php
	if ( has_post_thumbnail() ) {?>
		<div class="thumb"><a href="<?php the_permalink(); ?>"><?php wlcenter_post_thumbnail(); ?></a></div>
<?php } else { ?>
		<div class="thumb"><a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url'); ?>/im/thumb_1.png" alt="<?php the_title(); ?>"></a></div>
<?php } ?>
	<div class="p_descr">

		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		<?php //the_content( false, false, true ); ?>
		<?php
				
				preg_match ('~(.*)<!--more-->~s', $post->post_content, $match );
				
				$text = trim( $match[0] );
				if ($text){
					$text = str_replace("\r", '', $text );
					$text = preg_replace( "~\n\n+~s", "</p><p>", $text );
					$text = '<p>'. str_replace( "\n", '<br />', $text ) .'</p>';
					$text = preg_replace("/<img[^>]+\>/i", " ", $text); 
					echo $text;
				}else{
					the_content();
				}
		?>
		
		


	</div>
</div>
