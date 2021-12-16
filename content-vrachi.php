<?php
$cat_name =single_cat_title( '', false );
$cat_id = get_cat_ID( $cat_name );

$cat = get_category(get_query_var('cat'),false);
$cat_parent = $cat->parent;
$third_lvl = get_category($cat_parent,false);
$third_lvl_cat = $third_lvl->parent;


$post_id = $post->ID; 
?>
<?php
$doc_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'small-thumb');
$doc_img = $doc_img[0];
?>
<?php


$doc_famname = get_field( "doc_famname" );
$doc_name = get_field( "doc_name" );
$doc_midname = get_field( "doc_midname" );

$doc_qualif = get_field( "doc_qualif" );
$doc_lvl = get_field( "doc_lvl" );

$doc_spc_arr = get_field( "doc_spc" );
$doc_job = get_field( "doc_job" );

for ($i = 0; $i < sizeof($doc_spc_arr); $i++) {
	if ($i == 0) { $doc_spc = $doc_spc_arr[$i]; }
	else { $doc_spc .= ', '.$doc_spc_arr[$i]; }
}
?>
<div class="preview">
	<?php
	if ( has_post_thumbnail() ) {?>
		<div class="thumb"><a href="<?php the_permalink(); ?>"><img src="<?=$doc_img; ?>" alt="<?php the_title(); ?>"> </a></div>
<?php } else { ?>
		<div class="thumb"><a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url'); ?>/im/thumb_1.png" alt="<?php the_title();?>"></a></div>
<?php } ?>
	<div class="p_descr">
		<h5><a href="<?php the_permalink(); ?>"><?php echo $doc_famname.' '.$doc_name.' '.$doc_midname; ?></a></h5>
		<p>
			<strong><?php echo $doc_spc; ?></strong><br>
			<?php echo $doc_lvl; ?>. <?php echo $doc_qualif; ?>.
		</p>
		
		
		<div class="foot">
			<div class="b_rate">
				<span class="v3"><?php comments_number(0, 1, '%'); ?><i class="ico"></i></span>
				<span class="v1"><?php echo get_post_rates_like($post_id); ?><i class="ico"></i></span>
				<span class="v2"><?php echo get_post_rates_dislike($post_id); ?><i class="ico"></i></span>
			</div>
		</div>
		
	</div>
	
		<?php foreach($doc_job as $item1){?>
				<?php 
					$medpr_mail = get_field_object('medpr_mail', $item1->ID); 
					$medpr_mail = $medpr_mail['value'];
					$term_list = wp_get_post_terms($item1->ID, 'adv', array("fields" => "all"));
				?>
					<?php if (($term_list[0]->slug == 'vip')||($term_list[0]->slug == 'reklama')) { ?>
					<div class="med_list b_info7">
						<?php $url11 = get_post_permalink($item1->ID); ?>
						<span><?php if( $medpr_mail ) { ?><a href="#zak2" class="btn doc_call" data-redir="<? echo $medpr_mail;?>">отправить заявку</a><?php } ?></span>
						<?/*<a href="<?php print_R($url11); ?>" >
							<?php print_R($item1->post_title); ?>
						</a>
						*/?>
						<?php $medpr_mail = '';?>
					</div>	
					<?php } ?>
				<?php } ?>
		
	
</div>
