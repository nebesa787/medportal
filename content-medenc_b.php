<?php
$big_img = get_field( "big_img" );
if($big_img){
	$big_img = wp_get_attachment_image_src( $big_img, 'large-thumb');
}else{	
	$big_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large-thumb');
}
$big_img = $big_img[0];
?>

<div class="preview">
	<a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) {?><img src="<?=$big_img; ?>" alt="<?php the_title(); ?>"><?php } else { ?><img src="<?php bloginfo('template_url'); ?>/im/thumb_11.png" alt="<?php the_title(); ?>"><?php } ?>
		<h5>
			<span>
				<?php $category = get_the_category(); ?>
				<?php echo $category[0]->cat_name; ?>
			</span>
			<?php the_title(); ?>
		</h5>
	</a>
</div>