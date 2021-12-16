<?php
$big_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium-thumb');
$big_img = $big_img[0];
?>

<div class="preview">
	<div class="thumb">
		<a href="<?php the_permalink(); ?>"> <?php if ( has_post_thumbnail() ) {?> <img src="<?=$big_img; ?>" alt="<?php the_title(); ?>"> <?php } else { ?> <img src="<?php bloginfo('template_url'); ?>/im/thumb_1.png" alt="<?php the_title(); ?>"> <?php } ?>
			<span>
				<?php $category = get_the_category();?>
				<?php echo $category[0]->cat_name; ?>
			</span>
		</a>
	</div>
	<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
	<?php the_content( false, false, true ); ?>
</div>

