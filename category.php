<?php
/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header();


wp_reset_query();
$cat_name = single_cat_title( '', false );
$cat_id = get_cat_ID( $cat_name );

global $cat_parent;
global $third_lvl_cat;
global $wp_query;

$cat = get_category(get_query_var('cat'),false);
$cat_parent = $cat->parent; 


$third_lvl = get_category($cat_parent,false);
$third_lvl_cat = $third_lvl->parent;

global $cat_root_id;

$cat_root_id = root_category_id($cat);

?>
<?php require_once 'Mobile_Detect.php'; ?>
<?php $detect = new Mobile_Detect; ?>

     <div id="main">
		<div class="content_wr">
			<div class="content">
				<? if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
				<h1><?php printf( __( '%s', 'twentythirteen' ), single_cat_title( '', false ) ); ?></h1>
				
				<?php if ( have_posts() ) : ?>

					<?php if(($cat_id == 19)||($cat_parent == 19)||($third_lvl_cat == 19) ||($cat_root_id == 19)) { ?>
						<?php get_sidebar('top_content');?>
						
						<?php 
							
							if ($_POST && !empty($_POST)) {
									$args_f['meta_query'] = array('relation' => 'AND');
								
									if ($_POST['city_search'] != '') {
										/*	
										$args_f['meta_query'][] = array( 
											'key' => 'city_search',
											'value' => $_POST['city_search'],
											'type' => 'text',
											'compare' => 'LIKE' 
										);
										*/
									}
									
									if ($_POST['subway'] != '') {
										$args_f['meta_query'][] = array( 
											'relation' => 'OR',
											array( 
												'key' => 'subway_1',
												'value' => $_POST['subway'],
												'type' => 'text'
											),
											array( 
												'key' => 'subway_2',
												'value' => $_POST['subway'],
												'type' => 'text'
											),
											array( 
												'key' => 'subway_3',
												'value' => $_POST['subway'],
												'type' => 'text'
											),
											array( 
												'key' => 'subway_4',
												'value' => $_POST['subway'],
												'type' => 'text'
											),
											array( 
												'key' => 'subway_5',
												'value' => $_POST['subway'],
												'type' => 'text'
											),
											array( 
												'key' => 'subway_6',
												'value' => $_POST['subway'],
												'type' => 'text'
											),
											array( 
												'key' => 'subway_7',
												'value' => $_POST['subway'],
												'type' => 'text'
											),
											array( 
												'key' => 'subway_8',
												'value' => $_POST['subway'],
												'type' => 'text'
											),
											array( 
												'key' => 'subway_9',
												'value' => $_POST['subway'],
												'type' => 'text'
											),
											array( 
												'key' => 'subway_10',
												'value' => $_POST['subway'],
												'type' => 'text'
											),
										);
									}
									

									if ($_POST['district'] != '') {
										
										$args_f['meta_query'][] = array( 
											'relation' => 'OR',
											array( 
												'key' => 'district_1',
												'value' => $_POST['district'],
												'type' => 'text'
											),
											array( 
												'key' => 'district_2',
												'value' => $_POST['district'],
												'type' => 'text'
											),
											array( 
												'key' => 'district_3',
												'value' => $_POST['district'],
												'type' => 'text'
											),
											array( 
												'key' => 'district_4',
												'value' => $_POST['district'],
												'type' => 'text'
											),
											array( 
												'key' => 'district_5',
												'value' => $_POST['district'],
												'type' => 'text'
											),
											array( 
												'key' => 'district_6',
												'value' => $_POST['district'],
												'type' => 'text'
											),
											array( 
												'key' => 'district_7',
												'value' => $_POST['district'],
												'type' => 'text'
											),
											array( 
												'key' => 'district_8',
												'value' => $_POST['district'],
												'type' => 'text'
											),
											array( 
												'key' => 'district_9',
												'value' => $_POST['district'],
												'type' => 'text'
											),
											array( 
												'key' => 'district_10',
												'value' => $_POST['district'],
												'type' => 'text'
											),
										);
										
										
									}
									
									if ($_POST['service'] != '') {
										foreach ($_POST['service'] as $service) {
											if ($service != '') { 
												$args_f['meta_query'][] = array( 
													'key' => 'service', 
													'value' => '"'.$service.'"', 
													'type' => 'text', 
													'compare' => 'LIKE' 
												);
											}
										}
									}
									

									if ($_POST['doctors'] != '') {
										foreach ($_POST['doctors'] as $doctors) {
											if ($doctors != '') { 
												$args_f['meta_query'][] = array( 
													'key' => 'doctors', 
													'value' => '"'.$doctors.'"', 
													'type' => 'text', 
													'compare' => 'LIKE' 
												);
											}
										}
									}

									if ($_POST['diagnostics_types'] != '') {
										foreach ($_POST['diagnostics_types'] as $diagnostics_types) {
											if ($diagnostics_types != '') { 
												$args_f['meta_query'][] = array( 
													'key' => 'diagnostics_types',
													'value' => '"'.$diagnostics_types.'"', 
													'type' => 'text', 
													'compare' => 'LIKE' 
												);
											}
										}
									}
								}
						?>
						
						
						
						<?php
							///Other
							global $query_string;
							
							
							
								
								
							
							if ( get_query_var('paged') ) { 
								$paged = get_query_var('paged'); 
								$catid = $cat->term_id;
							}elseif ( get_query_var('page') ) { 
								$paged = get_query_var('page'); 
							}else { 
								$paged = 1; 
								$catid = $cat; 
								$catid = $cat->term_id;
							}
							
							
							
							
							global $pager;
							$pager = $paged;
							
							$args = '';
						
							$args=array(
								'tax_query' => array(
									array(
										'taxonomy' => 'adv',
										'field'    => 'slug',
										'terms'    => 'vip',
										'operator' => 'NOT IN',
									),
									array(
										'taxonomy' => 'adv',
										'field'    => 'slug',
										'terms'    => 'reklama',
										'operator' => 'NOT IN',
									),
									
									array(
										'taxonomy' => 'category',
										'terms' => $catid,
										'field' => 'id',
										'operator' => 'IN',
									),
									'relation' => 'AND'
									
								),
								'posts_per_page'=>10,
								'paged'=>$paged
								
							);	 
							
						
							if ($_POST && !empty($_POST)) {
								$result_args = array_merge($args_f,$args);
								$wp_query = new wp_query( $result_args );
							}else{
								$wp_query = new wp_query( $args );
							}
							//print_R($wp_query->request);
						?>

						<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
						
						
						<?php
							
							global $query_string;
							if ( get_query_var('paged') ) { 
								$paged = get_query_var('paged'); 
							}elseif ( get_query_var('page') ) { 
								$paged = get_query_var('page'); 
							}else { 
								$paged = 1; 
							}
						?>
							
						<?php
						if($paged ==1){

							$cat = get_query_var('cat');
							$cat_slug = get_category ($cat);
							
							///VIP
							$args=array(
								'tax_query' => array(
									array(
										'taxonomy' => 'adv',
										'field'    => 'slug',
										'terms'    => 'vip',
									),
									array(
										'taxonomy' => 'category',
										'terms' => $cat,
										'field' => 'id',
									),
									'relation' => 'AND'
								),
								'posts_per_page'=>-1
							);	 
							
							if ($_POST && !empty($_POST)) {
								$result_args = array_merge($args_f,$args);
								$my_query = new wp_query( $result_args );
							}else{
								$my_query = new wp_query( $args );
							}
							
														
							if($my_query->have_posts()): ?>
								<div class="b_info6">
								<?php while( $my_query->have_posts() ) {?>
									<?php $ii++;?>
									<?php $my_query->the_post(); ?>
									<?php get_template_part( 'content-hospital', get_post_format() ); ?>
									<?php if($ii>0){?><div style="margin-bottom:20px;"></div><?php }?>
								<?php }?>
								</div>
								
							<?php endif; ?>
							
							
							<?php
							
							///Reklama
							$args=array(
								'tax_query' => array(
									array(
										'taxonomy' => 'adv',
										'field'    => 'slug',
										'terms'    => 'reklama',
									),
									array(
										'taxonomy' => 'category',
										'terms' => $cat,
										'field' => 'id',
									),
									'relation' => 'AND'
								),
								'posts_per_page'=>-1
							);	 
							
							if ($_POST && !empty($_POST)) {
								$result_args = array_merge($args_f,$args);
								$my_query = new wp_query( $result_args );
							}else{
								$my_query = new wp_query( $args );
							}
							
							if($my_query->have_posts()): ?>
								<div class="b_info7">
								<?php while( $my_query->have_posts() ) {?>
									<?php $my_query->the_post(); ?>
									<?php get_template_part( 'content-hospital2', get_post_format() ); ?>
								<?php }?>
								</div>
							<?php endif; ?>
							
						<?php } ?>	
							
							<?php
							
							//print_R($wp_query->request);
							
							if($wp_query->have_posts()): ?>
								<div class="b_info8">
								<?php while( $wp_query->have_posts() ) {?>
									<?php $wp_query->the_post(); ?>
									<?php get_template_part( 'content-hospital3', get_post_format() ); ?>
								<?php }?>
								</div>
							<?php endif; ?>
						
							
						
						
						<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
						<?php if ($cat_root_id == 19) { ?>
							<?php 
							$text_block_bottom = get_field('text_block_bottom', 'category_' . $catid);
							if( ($pager==1)&&(!empty($text_block_bottom)) ){
								echo $text_block_bottom;
							}
							?>
						<?php }?>

					<?php } else { ?>

	                    <?php if(($cat_id == 9)||($cat_parent == 9)) { ?>

	                    <?php } else { ?>
	                    	<?php get_sidebar('top_content');?>
						<?php } ?>

						

	                    <?php if(($cat_id == 7)||($cat_parent == 7)) { ?>

	                    	<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>

							<div class="b_info12">
								<?php
								// The loop
								?>
								<?php
								global $more;
								?>
								<?php while ( have_posts() ) : the_post(); ?>
									<?php $more = 1; ?>
									<?php get_template_part( 'content-q-a', get_post_format() ); ?>
								<?php endwhile; ?>
			                </div>

							<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>


						<?php } elseif($cat_root_id == 9) { ?>
						
						
							
							<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
							
							<?php if ( have_posts() ) : ?>
								<?php $count = 0; ?>
								<div class="b_info3 ib_wr">
								<?php while ( have_posts() ) : the_post(); ?>
									<?php get_template_part( 'content-medenc', get_post_format() ); ?>
									<?php $count++; ?>
								<?php endwhile; ?>
								</div>
							<?php else : ?>
								<?php get_template_part( 'content', 'none' ); ?>
							<?php endif; ?>

							<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
	                    <?php } else { ?>
	                        
							<?php if($cat_root_id == 20) { ?>
								<div class="b_info13">
							<?php } else { ?>
								<div class="b_info4">
							<?php } ?>
							
							<?php if($cat_root_id == 49) { ?>
								<?php //get_sidebar('abc');?>
								<div class="list-medicaments">
									<ul>
									<?php
										global $query_string;
										query_posts($query_string . "&orderby=title&order=asc");
									?>
									<?php while ( have_posts() ) : the_post(); ?>
										<?php get_template_part( 'content-medicament', get_post_format() ); ?>
									<?php endwhile; ?>
									</ul>
								</div>
							<?php }elseif($cat_root_id == 49) { ?>
								<?php //get_sidebar('abc');?>
								<div class="list-medicaments">
									<ul>
									<?php
										global $query_string;
										query_posts($query_string . "&orderby=title&order=asc");
									?>
									<?php while ( have_posts() ) : the_post(); ?>
										<?php get_template_part( 'content-medicament', get_post_format() ); ?>
									<?php endwhile; ?>
									</ul>
								</div>
							<?php } else { ?>
                                <?php if ($_POST && !empty($_POST)) { go_doc_prof_filter(); } ?>
								<?php global $more; ?>
								
								<?php if($cat_root_id == 20) { ?>
									<?php while ( have_posts() ) : the_post(); ?>
										<?php $more = 1; ?>
											<?php get_template_part( 'content-vrachi', get_post_format() ); ?>
									<?php endwhile; ?>
									
								<?php }else{ ?>
									<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
									<?php while ( have_posts() ) : the_post(); ?>
										<?php $more = 1; ?>
											<?php get_template_part( 'content-news', get_post_format() ); ?>
									<?php endwhile; ?>
								
								<?php }?>
								
							<?php } ?>
			                </div>
                            
								<?php if (function_exists('wp_corenavi')) wp_corenavi(); ?>
								
								<?php if ($cat_root_id == 20) { ?>
								
									<?php
											if ( get_query_var('paged') ) { 
												$paged = get_query_var('paged'); 
												$catid = $cat->term_id;
											}elseif ( get_query_var('page') ) { 
												$paged = get_query_var('page'); 
											}else { 
												$paged = 1; 
												$catid = $cat; 
												$catid = $cat->term_id;
											}
									?>
								
									<?php 
									$text_block_bottom = get_field('text_block_bottom', 'category_' . $catid);
									
									if( ($paged==1)&&(!empty($text_block_bottom)) ){
										echo $text_block_bottom;
									}
									?>
								<?php }?>
                            
	                    <?php } ?>
						

                    <?php }?>

				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>
			</div>
			<div class="sidebar">
				<?php if(($cat_root_id == 8)||($cat_root_id == 20)||($cat_root_id == 49)) { ?>
					<?php if($cat_root_id == 20) { ?>
						
						<div class="b_add">
							<a href="#zak1" class="btn">Добавить врача</a>
						</div>
						<h4 class="title1">Врачи</h4>
						
						
						<?php get_sidebar('mobile_filter2'); ?>
						
						
						
						<div id="accordion">
									<?php	
										$nav_args = array(
											'container'       => false, 
											'menu_class'      => 'sb_menu', 
											'container_id'	  => '',
											'depth'           => 4,
											'before'          => '',
											'after'           => '',
											'link_before'     => '',
											'link_after'      => '',
											'theme_location'  => 'vrachi'
											);
										wp_nav_menu($nav_args);
									?>
							</div>

						<?php /* фильтры */ ?>
						<h4 class="title1 podbor">Подобрать врача</h4>
						<div class="filter">
						
							<form id="vr_s" method="post">
							<?php
								$filter_list = getfilter_list_vrachi_select_city();
								foreach ($filter_list as $filter) {
								if ($filter['name']){
							?>
								<fieldset>
									<legend><? echo $filter['label']; ?></legend>
									<select name="<? echo $filter['name']; ?>" id="<? echo $filter['name']; ?>">
										<?php
										$filter_link = $filter['name'];
										$flink = $filter['slug'];
										$fmain = $filter['main'];
										foreach ($filter["choices"] as $key=>$variant) {
											if ($flink == get_category_link( $key )) { 											
												$selected = 'selected="selected"'; 
											//} elseif ($fmain &&($variant == 'Минск')){ 
												//$selected = 'selected="selected"'; 
											} else { 
												$selected = ''; 
											}
											echo '<option value="'.get_category_link( $key ).'" '.$selected.'>'.$variant.'</option>';
									    }
										?>
									</select>
								</fieldset>
								<?php
								}
							}
						
							
								$filter_list = getfilter_list_doc_checkbox();
								$filter_list = getfilter_list();
								
								foreach ($filter_list as $filter) {
									?>
									
									
									<fieldset>
										<legend><? echo $filter['label']; ?></legend>
										<ul>
											<?
											$filter_link = $filter['name'];
											$count_to_hide = 0;
											foreach ($filter["choices"] as $variant) {
												$count_to_hide++;
												if ($_POST[$filter_link] != '') {
													if (in_array($variant, $_POST[$filter_link])) { $selected = 'checked="checked"'; }
													else { $selected = ''; }
												}
												if ($count_to_hide == 5) { echo '</ul><ul class="block_hide">'; }
												echo '<li><input type="checkbox" name="'.$filter["name"].'[]" id="'.$filter["name"].'-'.$count_to_hide.'" value="'.$variant.'" '.$selected.'><label for="'.$filter["name"].'-'.$count_to_hide.'">'.$variant.'</label></li>';
												if (($count_to_hide == sizeof($filter["choices"]))&&($count_to_hide > 5)) { echo '</ul><span class="show_more"><a style="cursor: pointer;">Еще</a></span>'; }
											}
											if ($count_to_hide < 5){echo '</ul>';}
											?>
										
									</fieldset>
									<?php
								}
                                ?>
								<input type="submit" value="показать" class="btn">
							</form>
						
						</div>
						
						
						<?php dynamic_sidebar( 'main-page-banner-right' ); ?>

						<?php /* фильтры */ ?>

					<?php } else { ?>
					
					
						<?php if ($cat_root_id != 49) { ?>
							<?php if ($cat_root_id == 8) { ?>
								<div class="b_add">
									<a href="#zak1" class="btn">Добавить новость</a>
								</div>
								<?php dynamic_sidebar( 'main-page-banner-right' ); ?>
							<?php } elseif (($cat_root_id == 9)||($cat_root_id == 9)) { ?>
								<div class="b_add">
									<a href="#zak1" class="btn">Добавить статью</a>
								</div>
							<?php } elseif ($cat_root_id == 49) { ?>
								<div class="b_add medp">
									<a href="/medpriparaty/" class="btn">Медпрепараты ПО АЛФАВИТУ</a>
								</div>
								
								<?php
									$this_category = get_category($cat);							  
									$this_category = wp_list_categories(
									  array(
										'orderby' => 'id',
										'show_count' => '0',
										'current_category' => ''.$category[0]->cat_ID.'',
										'title_li' => '',
										'use_desc_for_title' => '0',
										'child_of' => ''.$this_category->category_parent.'',
										'echo' => '0',
										'hide_empty' => '0',
										'child_of' => '49',
										'walker' => new Subcategory_Walker_Category
									  )
									);
								?>
								<ul class="sb_menu list_medicaments">
									  <?php echo $this_category; /*Вывод подкатегорий*/ ?>
								</ul>
								
								<?php dynamic_sidebar( 'main-page-banner-right' ); ?>
							<?php } else { ?>
								<div class="b_add">
									<a href="#zak1" class="btn">Добавить клинику</a>
								</div>
							<?php } ?>
						<?php } else { ?>
							<div class="b_add medp">
								<a href="/medpriparaty/" class="btn">Медпрепараты ПО АЛФАВИТУ</a>
							</div>
							
							<?php
								$this_category = get_category($cat);							  
								$this_category = wp_list_categories(
								  array(
									'orderby' => 'id',
									'show_count' => '0',
									'current_category' => ''.$category[0]->cat_ID.'',
									'title_li' => '',
									'use_desc_for_title' => '0',
									'child_of' => ''.$this_category->category_parent.'',
									'echo' => '0',
									'hide_empty' => '0',
									'child_of' => '49',
									'walker' => new Subcategory_Walker_Category
								  )
								);
							?>
							<ul class="sb_menu list_medicaments">
								  <?php echo $this_category; /*Вывод подкатегорий*/ ?>
							</ul>
							<?php dynamic_sidebar( 'main-page-banner-right' ); ?>
						<?php } ?>
					<?php } ?>

                    <?php if($cat_root_id == 9) { ?>
						<h4 class="title1">Категории</h4>
							<?php 
								$this_category = wp_list_categories(
									array(
										'orderby' => 'id',
										'depth' => '3',
										'hide_empty' => '0',
										'show_count' => '0',
										'title_li' => '',
										'use_desc_for_title' => '0',
										'child_of' => 9,
										'echo' => '0',
										'walker' => new Subcategory_Walker_Category
									)
							    );
							?>
						<?php if(is_category() || is_single()) { ?>
						    <div id="accordion">
								<ul class="sb_menu">
								  <?php echo $this_category; /*Вывод подкатегорий*/ ?>
								</ul>
							</div>
						<?php } ?>
                    <?php } ?>
					<!--noindex-->
					<h4 class="title1">Последние отзывы</h4>
					<div class="b_info5">
						<?php kama_recent_comments("limit=3&ex=100&term=19"); ?>
					</div>
					<h4 class="title1">Вопросы / ответы</h4>
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
					<!--noindex-->
				<?php } elseif ($cat_root_id == 19) { ?>
                	<div class="b_add">
						<a href="#zak1" class="btn">Добавить предприятие</a>
					</div>
					
					
						<?php get_sidebar('mobile_filter2'); ?>
					
					
					
					<h4 class="title1">МЕДУЧРЕЖДЕНИЯ</h4>
					
					
					
					<?php if ($cat_root_id == 19) {
						
						  $this_category = get_category($cat_id);
						    $this_category = wp_list_categories(
						      array(
						        'orderby' => 'id',
						        'depth' => '1',
						        'show_count' => '0',
								'hide_empty' => '0',
						        'current_category' => ''.$category[0]->cat_ID.'',
						        'title_li' => '',
						        'use_desc_for_title' => '0',
						        'child_of' => ''.$this_category->cat_ID.'',
						        'echo' => '0',
						        'walker' => new Subcategory_Walker_Category
						      )
						    );
						  
						 ?>

						

						    
								<ul class="sb_menu">
								  <?php //echo $this_category; ?>
								</ul>
							
							
						
						<div id="accordion">
									<?php	
										$nav_args = array(
											'container'       => false, 
											'menu_class'      => 'sb_menu', 
											'container_id'	  => '',
											'depth'           => 4,
											'before'          => '',
											'after'           => '',
											'link_before'     => '',
											'link_after'      => '',
											'theme_location'  => 'meduchregden'
											);
										wp_nav_menu($nav_args);
									?>
							</div>
						
						
					<?php } else { ?>
						<?php $category = get_the_category();
						if (is_category()) {
						  $this_category = get_category($cat);
						  if($this_category->category_parent) {
						    $this_category = wp_list_categories(
						      array(
						        'orderby' => 'id',
						        'show_count' => '0',
						        'current_category' => ''.$category[0]->cat_ID.'',
						        'title_li' => '',
						        'use_desc_for_title' => '0',
						        'child_of' => ''.$this_category->category_parent.'',
						        'echo' => '0',
						        'child_of' => ''.$cat_id.'',
						        'walker' => new Subcategory_Walker_Category
						      )
						    );
						  }
						} ?>
						<?php if(is_category() || is_single()) { ?>
						    
							<div id="accordion">
								<ul class="sb_menu">
								  <?php echo $this_category; ?>
								</ul>
							</div>
						<?php } ?>
					<?php } ?>
					<h4 class="title1 podbor">ПОДОБРАТЬ ПО ПАРАМЕТРАМ</h4>
					<div class="filter">
						
						<form id="med_s" method="post">
							
							<?php
								$filter_list = getfilter_list_medcentr_select_city();
								foreach ($filter_list as $filter) {
								if ($filter['name']){
							?>
								<fieldset>
									<legend><? echo $filter['label']; ?></legend>
									<select name="<? echo $filter['name']; ?>" id="<? echo $filter['name']; ?>">
										<?php
										$filter_link = $filter['name'];
										$flink = $filter['slug'];
										$fmain = $filter['main'];
										foreach ($filter["choices"] as $key=>$variant) {
											if ($flink == get_category_link( $key )) { 											
												$selected = 'selected="selected"'; 
											//} elseif ($fmain &&($variant == 'Минск')){ 
												//$selected = 'selected="selected"'; 
											} else { 
												$selected = ''; 
											}
											echo '<option data-city_name="'.$variant.'" value="'.get_category_link( $key ).'" '.$selected.'>'.$variant.'</option>';
									    }
										?>
									</select>
								</fieldset>
								<?php
								}
							}
							
							$filter_list = getfilter_list_med_select();
							foreach ($filter_list as $filter) {
								?>
								<fieldset>
									<legend><? echo $filter['label']; ?></legend>
									<select name="<? echo $filter['name']; ?>" id="<?php echo $filter['name']; ?>">
										<option value="" selected="selected">Все</option>
										<?php
										$filter_link = $filter['name'];

										foreach ($filter["choices"] as $variant) {
											
											if ($_POST[$filter_link] == $variant) { $selected = 'selected="selected"'; } else { $selected = ''; }
											if($variant){
												echo '<option value="'.$variant.'" '.$selected.'>'.$variant.'</option>';
											}
									    }
										?>
										
									</select>
								</fieldset>
								<?
							}
							
							$filter_list = getfilter_list_medcentr_checkbox();
							
							foreach ($filter_list as $filter) {
								?>
								<fieldset>
									<legend><? echo $filter['label']; ?></legend>
									<ul>
										<?
										$filter_link = $filter['name'];
										$count_to_hide = 0;
										foreach ($filter["choices"] as $variant) {
											$count_to_hide++;
											if ($_POST[$filter_link] != '') {
												if (in_array($variant, $_POST[$filter_link])) { $selected = 'checked="checked"'; }
												else { $selected = ''; }
											}
                                            if ($count_to_hide == 5) { echo '</ul><ul class="block_hide">'; }
											echo '<li><input type="checkbox" name="'.$filter["name"].'[]" id="'.$filter["name"].'-'.$count_to_hide.'" value="'.$variant.'" '.$selected.'><label for="'.$filter["name"].'-'.$count_to_hide.'">'.$variant.'</label></li>';
											if (($count_to_hide == sizeof($filter["choices"]))&&($count_to_hide > 5)) { echo '</ul><span class="show_more"><a style="cursor: pointer;">Еще</a></span>'; }
									    }
										if ($count_to_hide < 5){echo '</ul>';}
										?>
									
								</fieldset>
								<?
							}
                            ?>
							<input id="search_med_button" type="submit" value="показать" class="btn">
						</form>
						
					</div>
					<?php //dynamic_sidebar( 'single-banner' ); ?>
					<?php dynamic_sidebar( 'main-page-banner-right' ); ?>
					<!--noindex-->
					<h4 class="title1">Последние отзывы</h4>
					<div class="b_info5">
						<?php kama_recent_comments("limit=3&ex=100&term=19"); ?>
					</div>
					<h4 class="title1">Вопросы / ответы</h4>
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
					<?php
					$cat_root_id = root_category_id($cat);
					if (empty($cat_root_id)){
						$cat_post = get_the_category($post->ID);
						$cat_post_temp = $cat_post[0]->cat_ID;
						$cat_root_id = root_category_id($cat_post_temp);
					}	
					?>
				
					
				<?php } else { ?>
                    <?php/* var_dump($cat_id, $cat_parent); exit; */?>
                    <?php if ($cat_root_id == 9) { ?>
						<div class="b_add">
							<a href="#zak1" class="btn">Добавить статью</a>
						</div>
					<?php } elseif ($cat_root_id == 7)  { ?>
						<div class="b_add sb">
							<a href="#zak1" class="btn">Задать Вопрос</a>
						</div>
						<?php 
							$this_category7 = wp_list_categories(
							      array(
							        'orderby' => 'title',
							        'depth' => '3',
									'hide_empty' => '0',
							        'show_count' => '0',
							        'title_li' => '',
							        'use_desc_for_title' => '0',
							        'child_of' => 7,
							        'echo' => '0',
							        'walker' => new Subcategory_Walker_Category
							      )
							    );
						?>
					<?php } elseif ($cat_root_id == 49) { ?>
								<div class="b_add">
									<a href="/medpriparaty/" class="btn">Медпрепараты ПО АЛФАВИТУ</a>
								</div>
								<?php
									$this_category = get_category($cat);							  
									$this_category = wp_list_categories(
									  array(
										'orderby' => 'id',
										'show_count' => '0',
										'current_category' => ''.$category[0]->cat_ID.'',
										'title_li' => '',
										'use_desc_for_title' => '0',
										'child_of' => ''.$this_category->category_parent.'',
										'echo' => '0',
										'hide_empty' => '0',
										'child_of' => '49',
										'walker' => new Subcategory_Walker_Category
									  )
									);
								?>
								<ul class="sb_menu list_medicaments">
									  <?php echo $this_category; /*Вывод подкатегорий*/ ?>
								</ul>
						<?php dynamic_sidebar( 'main-page-banner-right' ); ?>
					<?php } else { ?>
						<div class="b_add">
							<a href="#zak1" class="btn">Добавить клинику</a>
						</div>
					<?php } ?>
					
						
						

					
						<?php if ($cat_root_id == 7) { ?>
							<h4 class="title1">Категории</h4>
							<div id="accordion">
								<ul class="sb_menu">
								  <?php echo $this_category7; ?>
								</ul>
							</div>
							<?php dynamic_sidebar( 'main-page-banner-right' ); ?>
							
						<?php }elseif($cat_root_id==9){ ?>
						
							<h4 class="title1">Категории</h4>
							<div id="accordion">
									<?php	
										$nav_args = array(
											'container'       => false, 
											'menu_class'      => 'sb_menu', 
											'container_id'	  => '',
											'depth'           => 4,
											'before'          => '',
											'after'           => '',
											'link_before'     => '',
											'link_after'      => '',
											'theme_location'  => 'medenciklo'
											);
										wp_nav_menu($nav_args);
									?>
							</div>
						<?php dynamic_sidebar( 'main-page-banner-right' ); ?>
						
						<?php }elseif($cat_root_id==49){ ?>
						
						
						<?php }else{ ?>
							<div id="accordion">
								<ul class="sb_menu">
								  <?php echo $this_category; ?>
								</ul>
							</div>
							
							<?php dynamic_sidebar( 'main-page-banner-right' ); ?>
						<?php } ?>
				
					
					
					
					<?php if ($cat_root_id == 7) { ?>
						<!--noindex-->
						<h4 class="title1">Последние отзывы</h4>
						<div class="b_info5">
							<?php kama_recent_comments("limit=3&ex=100&term=19"); ?>
						</div>
						<h4 class="title1">Вопросы / ответы</h4>
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
					<?php } ?>
				<?php } ?>
			</div>
			<div class="clear"></div>
		</div>
	</div><!--/main-->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
