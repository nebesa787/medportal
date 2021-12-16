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
$cat = get_the_category($post->ID);
$stat_cat_id = $cat[0]->cat_ID;
$parcat = $cat[2]->cat_ID;
$catpar = $cat[0]->parent;
$parcatpar = $cat[1]->cat_ID;
//var_dump($cat); exit;
$medcat = $cat[0]->cat_ID;
$post_id = $post->ID;
//var_dump($cat); exit;
?>

<? if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

<?php if ( is_single() ) : ?>
	<h1><?php the_title(); ?></h1>
<?php else : ?>
	<h1>
		<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h1>
<?php endif; /* is_single() */ ?>

<?php if ($stat_cat_id == 8) { ?>
	<div class="date"><?php echo get_the_date(); ?></div>
<? } ?>

<?php
$term_list = wp_get_post_terms($post->ID, 'adv', array("fields" => "all"));
//print_r($term_list[0]->slug);
?>

<?php //if (($parcat == 19)||($catpar == 19)||($parcatpar == 19)||($parcat == 20)||($catpar == 20)||($parcatpar == 20)||($stat_cat_id == 20)) { ?>
<?php if (($parcat == 20)||($catpar == 20)||($parcatpar == 20)||($stat_cat_id == 20)||($parcat == 19)||($catpar == 19)||($parcatpar == 19)||($medcat == 19)||($term_list[0]->slug == 'vip')||($term_list[0]->slug == 'reklama')) { ?>
<?php //if (($term_list[0]->slug == 'vip')||($term_list[0]->slug == 'reklama')) { ?>

	<?php
	if (($parcat == 19)||($catpar == 19)||($parcatpar == 19)||($medcat == 19)) {
		
		$location1 = get_field('adress_1');
		$address_1 = $location1['address'];
		
		$location2 = get_field('adress_2');
		$address_2 = $location2['address'];
		
		$location3 = get_field('adress_3');
		$address_3 = $location3['address'];
		
		$location4 = get_field('adress_4');
		$address_4 = $location4['address'];
		
		$location5 = get_field('adress_5');
		$address_5 = $location5['address'];
		
		$location6 = get_field('adress_6');
		$address_6 = $location6['address'];
		
		$location7 = get_field('adress_7');
		$address_7 = $location7['address'];
		
		$location8 = get_field('adress_8');
		$address_8 = $location8['address'];
		
		$location9 = get_field('adress_9');
		$address_9 = $location9['address'];
		
		$location10 = get_field('adress_10');
		$address_10 = $location10['address'];
		
		
		$work_time_1 = get_field( "work_time_1" );
		$phone_number_1 = get_field( "phone_number_1" );
						
		$work_time_2 = get_field( "work_time_2" );
		$phone_number_2 = get_field( "phone_number_2" );
						
		$work_time_3 = get_field( "work_time_3" );
		$phone_number_3 = get_field( "phone_number_3" );
						
		$work_time_4 = get_field( "work_time_4" );
		$phone_number_4 = get_field( "phone_number_4" );
						
		$work_time_5 = get_field( "work_time_5" );
		$phone_number_5 = get_field( "phone_number_5" );
		
		$work_time_6 = get_field( "work_time_6" );
		$phone_number_6 = get_field( "phone_number_6" );
						
		$work_time_7 = get_field( "work_time_7" );
		$phone_number_7 = get_field( "phone_number_7" );
				
		$work_time_8 = get_field( "work_time_8" );
		$phone_number_8 = get_field( "phone_number_8" );
					
		$work_time_9 = get_field( "work_time_9" );
		$phone_number_9 = get_field( "phone_number_9" );
						
		$work_time_10 = get_field( "work_time_10" );
		$phone_number_10 = get_field( "phone_number_10" );
		

		$big_img = get_field( "big_img" );
		$big_img = wp_get_attachment_image_src( $big_img, 'full');
		$big_img = $big_img[0];
		$big_img_p = array();
		for ($i = 1; $i < 20; $i++) {
			$big_img_p_el = get_field( "big_img_p".$i );
			if (!empty($big_img_p_el)) {
            	$big_img_p[] = $big_img_p_el;
			}
		}
		
		$its_gift = get_field( "its_gift" );
		
		$medpr_mail = get_field( "medpr_mail" );
		
	}
	else {
		$doc_qualif = get_field( "doc_qualif" );
		$doc_lvl = get_field( "doc_lvl" );

		$doc_spc_arr = get_field( "doc_spc" );

		for ($i = 0; $i < sizeof($doc_spc_arr); $i++) {
			if ($i == 0) { $doc_spc = $doc_spc_arr[$i]; }
			else { $doc_spc .= ', '.$doc_spc_arr[$i]; }
		}
		$doc_mail = get_field( "doc_mail" );
	}
	?>

	<div class="b_info9">
		<div class="preview">
			<?php if (
						//( (($parcat == 19)||($catpar == 19)||($parcatpar == 19)||($medcat == 19)) && (($term_list[0]->slug == 'vip')||($term_list[0]->slug == 'reklama')) )
						( (($parcat == 19)||($catpar == 19)||($parcatpar == 19)||($medcat == 19)) )
						||
						( ($parcat == 20)||($catpar == 20)||($parcatpar == 20)||($stat_cat_id == 20) )
				) { ?>
				<?php if( has_post_thumbnail() ) { ?>
					<div class="thumb"><?php echo get_the_post_thumbnail( $post->ID ); ?></div>
				<?php }else{?>
					<div class="thumb"><img src="<?php bloginfo('template_url'); ?>/im/thumb_1.png" alt=""></div>
				<?php }?>
			<?php }?>
			
			<div class="p_descr">
				<?php if (($parcat == 19)||($catpar == 19)||($parcatpar == 19)||($medcat == 19)) { ?>
					<p><?php echo $address_1; ?><br><span><?php echo $work_time_1; ?></span></p>
					<p><strong><?php echo $phone_number_1; ?></strong></p>
					<?php $rr=1;?>
					<?php if($address_2){?>
						<?php $rr++;?>
						<div class="all_adr_list">
						<?php if ($address_2){?>
							<p>
								<?php echo $address_2; ?><br>
								<span><?php echo $work_time_2; ?></span><br>
								<strong><?php echo $phone_number_2; ?></strong>
							</p>
						<?php }?>
						
						<?php if ($address_3){?>
						<?php $rr++;?>
							<p>
								<?php echo $address_3; ?><br>
								<span><?php echo $work_time_3; ?></span><br>
								<strong><?php echo $phone_number_3; ?></strong>
							</p>
						<?php }?>
						
						<?php if ($address_4){?>
						<?php $rr++;?>
							<p>
								<?php echo $address_4; ?><br>
								<span><?php echo $work_time_4; ?></span><br>
								<strong><?php echo $phone_number_4; ?></strong>
							</p>
						<?php }?>
						
						<?php if ($address_5){?>
						<?php $rr++;?>
							<p>
								<?php echo $address_5; ?><br>
								<span><?php echo $work_time_5; ?></span><br>
								<strong><?php echo $phone_number_5; ?></strong>
							</p>
						<?php }?>
						
						<?php if ($address_6){?>
						<?php $rr++;?>
							<p>
								<?php echo $address_6; ?><br>
								<span><?php echo $work_time_6; ?></span><br>
								<strong><?php echo $phone_number_6; ?></strong>
							</p>
						<?php }?>
						
						<?php if ($address_7){?>
						<?php $rr++;?>
							<p>
								<?php echo $address_7; ?><br>
								<span><?php echo $work_time_7; ?></span><br>
								<strong><?php echo $phone_number_7; ?></strong>
							</p>
						<?php }?>
						
						<?php if ($address_8){?>
						<?php $rr++;?>
							<p>
								<?php echo $address_8; ?><br>
								<span><?php echo $work_time_8; ?></span><br>
								<strong><?php echo $phone_number_8; ?></strong>
							</p>
						<?php }?>
						
						<?php if ($address_9){?>
						<?php $rr++;?>
							<p>
								<?php echo $address_9; ?><br>
								<span><?php echo $work_time_9; ?></span><br>
								<strong><?php echo $phone_number_9; ?></strong>
							</p>
						<?php }?>
						
						<?php if ($address_10){?>
						<?php $rr++;?>
							<p>
								<?php echo $address_10; ?><br>
								<span><?php echo $work_time_10; ?></span><br>
								<strong><?php echo $phone_number_10; ?></strong>
							</p>
						<?php }?>
						
						</div>
						<p><span class="all_adress">Все адреса (<?php echo $rr;?>)</span></p>
					<?php }?>
					
					
					<?php if( $medpr_mail ){ ?><a href="#zak2" class="btn doc_call" data-redir="<? echo $medpr_mail;?>">отправить заявку</a><?php } ?>
				<?php } else { ?>
					<p>
						<strong><?php echo $doc_spc; ?></strong><br>
						<?php echo $doc_lvl; ?>. <?php echo $doc_qualif; ?>.
					</p>

					<?php $doc_job = get_field( "doc_job" ); ?>
					<?php foreach($doc_job as $item1){?>
					<?php 
						$medpr_mail = get_field_object('medpr_mail', $item1->ID); 
						$medpr_mail = $medpr_mail['value'];
						$term_list = wp_get_post_terms($item1->ID, 'adv', array("fields" => "all"));
					?>
						<?php if (($term_list[0]->slug == 'vip')||($term_list[0]->slug == 'reklama')) { ?>
						
							<?php $url11 = get_post_permalink($item1->ID); ?>
							<?php if( $medpr_mail ) { ?><a href="#zak2" class="btn doc_call" data-redir="<? echo $medpr_mail;?>">отправить заявку</a><?php } ?>
							<?php $medpr_mail = '';?>
						
						<?php } ?>
					<?php } ?>
				<?php } ?>
				
				
				<div class="b_rate">
					<div style="display:none;">
					<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
					</div>
				
					<span class="v1"><span class="count"><?php echo get_post_rates_like($post_id); ?></span><i class="ico" id="post-ratings-<? echo $post->ID; ?>_2" style="cursor: pointer;" onkeypress="rate_post();" onclick="rate_post();" title="2 Stars"  onmouseout="ratings_off(0, 0, 0);" onmouseover="current_rating(<? echo $post->ID; ?>, 2, '2 Stars');"></i></span>
					<span class="v2"><span class="count"><?php echo get_post_rates_dislike($post_id); ?></span><i class="ico" id="post-ratings-<? echo $post->ID; ?>_1" style="cursor: pointer;" onkeypress="rate_post();" onclick="rate_post();" title="1 Star" onmouseout="ratings_off(0, 0, 0);" onmouseover="current_rating(<? echo $post->ID; ?>, 1, '1 Star');"></i></span>
					<script type="text/javascript">
					(function($) {
						$(document).ready(function() {
					
							var plus = 'rating_' + <? echo $post->ID; ?> + '_2';
							var minus = 'rating_' + <? echo $post->ID; ?> + '_1';

							$('.b_rate span i.ico').click( function() {
								if ($(this).parent('span').attr('class') == 'v1') {
					
									$(this).parent('span').children('.count').html(parseInt($(this).parent('span').children('.count').html()) + 1);
									$('.count').removeClass();
								}
								else {
					
									$(this).parent('span').children('.count').html(parseInt($(this).parent('span').children('.count').html()) + 1);
									$('.count').removeClass();
								}
								alert('Спасибо, Ваш голос учтен.');
							});

						});
					})(jQuery);
					</script>
				</div>
				
				
				
			</div>
		</div>
	</div>

	<?php if ( ( ($term_list[0]->slug == 'vip')||($term_list[0]->slug == 'reklama') ) && ( $its_gift )) { ?>
		<div class="b_info10">
			<div class="title"><span>акция</span> Мы Вам обязательно поможем!</div>
			<p><? echo $its_gift; ?></p>
		</div>
	<?php } ?>

	<?php if  (($parcat == 19)||($catpar == 19)||($parcatpar == 19)||($medcat == 19))   { ?>
		<h2>Информация</h2>
	<?php } else { ?>
		<h2>Подробная информация</h2>
	<?php } ?>
	<?php wp_reset_query(); ?>
	<?php if ( is_search() ) : /* Only display Excerpts for Search */ ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'twentythirteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
		?>
	<?php endif; ?>
    
    <?php if  (($parcat == 19)||($catpar == 19)||($parcatpar == 19)||($medcat == 19))   { ?>
		<?php if (($term_list[0]->slug == 'vip')||($term_list[0]->slug == 'reklama')) { ?>
		<div class="b_gal">
			<?php
			if ($big_img) { ?>
				<div class="thumb_b">
					<img src="<? echo $big_img; ?>" alt="">
				</div>
			<? } ?>
			<div class="thumbs">
				<div class="thumb">
					<a href="javascript:void(0);">
						<?php
						if ($big_img) {
							$stage1 = explode('uploads/', $big_img);
							$stage2 = explode('.', $stage1[1]);
							$sborka = $stage1[0].'uploads/'.$stage2[0].'-150x150.'.$stage2[1];

							
							?>
							<img src="<? echo $sborka; ?>" alt="" data-org="<? echo $big_img; ?>">
						<? } ?>
					</a>
				</div>
				<?php foreach ($big_img_p as $img_path) { ?>
					<div class="thumb">
						<a href="javascript:void(0);">
							<?php
							$stage1 = explode('uploads/', $img_path);
							$stage2 = explode('.', $stage1[1]);
							$sborka = $stage1[0].'uploads/'.$stage2[0].'-150x150.'.$stage2[1];

							?>
							<img src="<? echo $sborka; ?>" alt="" data-org="<? echo $img_path; ?>">
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php } ?>


		<?php get_sidebar('map');?>			
		
		
		
		
	<?php } ?>

<?php } else {?>
	
	<?php get_sidebar('top_content');?>
	<br>
	<script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
	<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,gplus" data-counter=""></div>
	<br>
	<?php wp_reset_query(); ?>
	<?php if ( is_search() ) : /* Only display Excerpts for Search */ ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>
	
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'twentythirteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
		?>
	<?php endif; ?>

	
	
<?php } ?>
