<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
//$cat_name =single_cat_title( '', false );
//$cat_id = get_cat_ID( $cat_name );
//
$cat = get_the_category($post->ID);
$stat_cat_id = $cat[0]->cat_ID;
$cato = get_category($stat_cat_id,false);
$cat_parent = $cato->parent; // ID родительской категории
global $parcat;
global $catpar;
global $parcatpar;
global $medcat;
$parcat = $cat[2]->cat_ID;
$catpar = $cat[0]->parent;
$parcatpar = $cat[1]->cat_ID;

//var_dump($cato->cat_ID); exit;
$medcat = $cat[0]->cat_ID;



$third_lvl = get_category($cat_parent,false);
$third_lvl_cat = $third_lvl->parent;

global $cat_root_id;

$cat_post = get_the_category($post->ID);
$cat_post_temp = $cat_post[0]->cat_ID;
$cat_root_id = root_category_id($cat_post_temp);


get_header(); ?>
<?php require_once 'Mobile_Detect.php'; ?>
<?php $detect = new Mobile_Detect; ?>
    <!--main-->
	<div id="main">
		<div class="content_wr">

			<div class="content">
			
			
	            <?php wp_reset_query(); ?>
				<?php /* The loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					
					<?php get_template_part( 'content', get_post_format() ); ?>
<!--
		<script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
			<script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
			<div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,gplus" data-counter=""></div>
-->
					<br>
					
					<?php/* twentythirteen_post_nav(); */?>
					<?php if ($catpar != 49) { ?>

						<?php/* function_exists('vkComments') ? vkComments() : '' */?>
						<?php if  ($cat_root_id == 19)   { ?>
						<?php comments_template(); ?>
						<?php }else{?>
						<?php comments_template(); ?>
						<?php } ?>
					<?php } ?>

				<?php endwhile; ?>
        	</div><!-- #content -->

        	<div class="sidebar">
        		<?php if ($stat_cat_id == 8) { ?>
        			<div class="b_add">
						<a href="#zak1" class="btn">Добавить новость</a>
					</div>

					
					<h4 class="title1">Другие новости</h4>
					<div class="b_info11 v1">
						<?php
						wp_reset_query(); // сброс query_posts
						query_posts('cat=8&posts_per_page=8');
						?>
						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<div><a href="<?php the_permalink(); ?>" rel="nofollow"><?php the_title(); ?></a></div>
							<?php endwhile; ?>
						<?php else : ?>
							
						<?php endif; ?>
					</div>
        		<?php } elseif ($cat_root_id == 19 )  { ?>
        			<?php if ( $detect->isMobile() ) { ?>
						<?php get_sidebar('mobile_filter2'); ?>
						<?php }?>
					<h4 class="title1">Услуги</h4>
        			<div class="uslugi th">
							<?php
							$service = get_field( "service" );
							if (!empty($service)) {
								$tc = count($service);
								$iii = 0;
								foreach ($service as $service) {
									$iii++;
									?><?
										echo $service;
									if($tc != $iii){	
									?>, <?}
								}
							}
							?>
							
	        			<?php
	        			//$service = get_field( "service" );
	        			//echo $service;
	        			?>
        			</div>
					
					<h4 class="title1">Врачи</h4>
        			<div class="vrachi th">
						<?php
							$doctors = get_field( "doctors" );
							if (!empty($doctors)) {
								$td = count($doctors);
								$iii = 0;
								foreach ($doctors as $doc) {
									$iii++;
									?><?
										echo $doc;
										
										if ($doc == 'Стоматолог'){
											?>
												Ортодонтия,	Отбеливание и чистка, Пародонтология, Протезирование, Рентген, Терапия, Хирургия, Прочие услуги
											<?
										}
									if($td != $iii){	
									?>, <?}
								}
							}
							?>
	        			
        			</div>
        			<h4 class="title1">Виды диагностики</h4>
        			<div class="vrachi">
						<?php
							$diagnostics_types = get_field( "diagnostics_types" );
							if (!empty($diagnostics_types)) {
								$td = count($diagnostics_types);
								$iii = 0;
								foreach ($diagnostics_types as $tt) {
									$iii++;
									?><?
										echo $tt;
									if($td != $iii){	
									?>, <?}
								}
							}
							?>
        			</div>
        		<?php } else { ?>
					<?php if (($medcat != 49)&&($parcat != 20)&&($catpar != 20)&&($parcatpar != 20)&&($medcat != 20)) { ?>
						<?php if (($parcat == 7)||($catpar == 7)||($parcatpar == 7)||($medcat == 7)) { ?>
							<div class="b_add sb">
								<a href="#zak1" class="btn">Задать вопрос</a>
							</div>
							
							<h4 class="title1">Категории</h4>
							<?php $category = get_the_category();
							if (is_category()) {
							  $this_category = get_category($cat);
							  if($this_category->category_parent) {
								$this_category = wp_list_categories(
								  array(
									'orderby' => 'name',
									'show_count' => '0',
									'hide_empty' => '0',
									'current_category' => ''.$parcatpar.'',
									'title_li' => '',
									'use_desc_for_title' => '0',
									'child_of' => ''.$this_category->category_parent.'',
									'echo' => '0',
									'walker' => new Subcategory_Walker_Category
								  )
								);
							  } else {
								$this_category = wp_list_categories(
								  array(
									'orderby' => 'name',
									'depth' => '1',
									'show_count' => '0',
									'hide_empty' => '0',
									'current_category' => ''.$parcatpar.'',
									'title_li' => '',
									'use_desc_for_title' => '0',
									'child_of' => ''.$this_category->cat_ID.'',
									'echo' => '0',
									'walker' => new Subcategory_Walker_Category
								  )
								);
							  }
							} elseif ( is_single()) {
							  if($category[0]->category_parent) {
								$this_category = wp_list_categories(
								  array(
									'orderby' => 'name',
									'show_count' => '0',
									'hide_empty' => '0',
									'current_category' => ''.$parcatpar.'',
									'title_li' => '',
									'use_desc_for_title' => '0',
									'child_of' => ''.$category[0]->category_parent.'',
									'echo' => '0',
									'walker' => new Subcategory_Walker_Category
								  )
								);
							  } else {
								$this_category = wp_list_categories(
								  array(
									'orderby' => 'name',
									'show_count' => '0',
									'hide_empty' => '0',
									'current_category' => ''.$parcatpar.'',
									'title_li' => '',
									'use_desc_for_title' => '0',
									'child_of' => ''.$category[0]->cat_ID.'',
									'echo' => '0',
									'walker' => new Subcategory_Walker_Category
								  )
								);
							  }
							} ?>

							<?php if(is_category() || is_single()) { ?> 
								<ul class="sb_menu">
								  <?php echo $this_category; ?>
								</ul>
							<?php } ?>
							
						<?php } elseif ($cat_root_id==9) { ?>
							<div class="b_add">
								<a href="#zak1" class="btn">Добавить статью</a>
							</div>
							
							
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
						<?php } else { ?>
                        	<div class="b_add">
								<a href="#zak1" class="btn">Добавить клинику</a>
							</div>
							
							<h4 class="title1">Категории</h4>
							<?php $category = get_the_category();
							if (is_category()) {
							  $this_category = get_category($cat);
							  if($this_category->category_parent) {
								$this_category = wp_list_categories(
								  array(
									'orderby' => 'name',
									'show_count' => '0',
									'current_category' => ''.$parcatpar.'',
									'title_li' => '',
									'use_desc_for_title' => '0',
									'child_of' => ''.$this_category->category_parent.'',
									'echo' => '0',
									'walker' => new Subcategory_Walker_Category
								  )
								);
							  } else {
								$this_category = wp_list_categories(
								  array(
									'orderby' => 'name',
									'depth' => '1',
									'show_count' => '0',
									'current_category' => ''.$parcatpar.'',
									'title_li' => '',
									'use_desc_for_title' => '0',
									'child_of' => ''.$this_category->cat_ID.'',
									'echo' => '0',
									'walker' => new Subcategory_Walker_Category
								  )
								);
							  }
							} elseif ( is_single()) {
							  if($category[0]->category_parent) {
								$this_category = wp_list_categories(
								  array(
									'orderby' => 'name',
									'show_count' => '0',
									'current_category' => ''.$parcatpar.'',
									'title_li' => '',
									'use_desc_for_title' => '0',
									'child_of' => ''.$category[0]->category_parent.'',
									'echo' => '0',
									'walker' => new Subcategory_Walker_Category
								  )
								);
							  } else {
								$this_category = wp_list_categories(
								  array(
									'orderby' => 'name',
									'show_count' => '0',
									'current_category' => ''.$parcatpar.'',
									'title_li' => '',
									'use_desc_for_title' => '0',
									'child_of' => ''.$category[0]->cat_ID.'',
									'echo' => '0',
									'walker' => new Subcategory_Walker_Category
								  )
								);
							  }
							} ?>

							<?php if(is_category() || is_single()) { ?>
								<ul class="sb_menu">
								  <?php echo $this_category; /*Вывод подкатегорий*/ ?>
								</ul>
							<?php } ?>
                        <?php } ?>
                        <?php if ($parcatpar == 7) { $parcatpar = $cato->cat_ID; } ?>
						
						<?php if ($parcatpar != 49) { ?>
						
						<?php if ($cat_root_id == 7) { ?>
							<h4 class="title1">Другие вопросы</h4>
							<div class="b_info11 v1">
								<?php
									$excl=$post->ID;
									global $wp_query, $post, $wpdb, $id ;
									$temp_query = $wp_query; $temp_post = $post; $temp_wpdb = $wpdb; $temp_id = $id; $wp_query= null;
									$wp_query = new WP_Query( array( 'post__not_in' => array( $excl ), 'posts_per_page' => 5, 'cat' => $stat_cat_id ));
									//$wp_query = new WP_Query( array( 'post__not_in' => array( $excl ), 'posts_per_page' => 5, 'cat' => 7 ));
								?>
								<?php if (have_posts()) : ?>
									<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>	
										<div><a href="<?php the_permalink(); ?>" rel="nofollow"><?php the_title(); ?></a></div>
									<?php endwhile; ?>
								<?php endif; ?>
								<?php $wp_query = null; $wp_query = $temp_query;	$post = null; $post = $temp_post;	$wpdb = null; $wpdb = $temp_wpdb;	$id = null; $id = $temp_id;	?>
								
							</div>
						
						<?php }else{ ?>
						
						<h4 class="title1">Другие статьи</h4>
						<div class="b_info11 v1">
						
							<?php if($stat_cat_id){?>
							<?php
								$excl=$post->ID;
								global $wp_query, $post, $wpdb, $id ;
								$temp_query = $wp_query; $temp_post = $post; $temp_wpdb = $wpdb; $temp_id = $id; $wp_query= null;
								$wp_query = new WP_Query();
								$wp_query = new WP_Query( array( 'post__not_in' => array( $excl ), 'posts_per_page' => 5, 'cat' => $stat_cat_id ));
								
							?>
							<?php if (have_posts()) : ?>
								
								<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>	
									<div><a href="<?php the_permalink(); ?>" rel="nofollow"><?php the_title(); ?></a></div>
								<?php endwhile; ?>
							<?php endif; ?>
							<?php $wp_query = null; $wp_query = $temp_query;	$post = null; $post = $temp_post;	$wpdb = null; $wpdb = $temp_wpdb;	$id = null; $id = $temp_id;	?>
							<?php }?>
						</div>
						
						<?php }?>

						
							
						<?php } ?>
						
					<?php } elseif($cat_root_id == 20) { ?>
						<?php if ( $detect->isMobile() ) { ?>
						<?php get_sidebar('mobile_filter2'); ?>
						<?php }?>
						<div class="b_add">
							<a href="#zak1" class="btn">Добавить врача</a>
						</div>
						<h4 class="title1">Врачи</h4>
						<?php $category = get_the_category();
						if (is_category()) {
						  $this_category = get_category($cat);
						  if($this_category->category_parent) {
						    $this_category = wp_list_categories(
						      array(
						        'orderby' => 'name',
						        'show_count' => '0',
						        'current_category' => ''.$category[0]->cat_ID.'',
						        'title_li' => '',
						        'use_desc_for_title' => '0',
						        'child_of' => ''.$this_category->category_parent.'',
						        'echo' => '0',
						        'walker' => new Subcategory_Walker_Category
						      )
						    );
						  } else {
						    $this_category = wp_list_categories(
						      array(
						        'orderby' => 'name',
						        'depth' => '1',
						        'show_count' => '0',
						        'current_category' => ''.$category[0]->cat_ID.'',
						        'title_li' => '',
						        'use_desc_for_title' => '0',
						        'child_of' => ''.$this_category->cat_ID.'',
						        'echo' => '0',
						        'walker' => new Subcategory_Walker_Category
						      )
						    );
						  }
						} elseif ( is_single()) {
						  if($category[0]->category_parent) {
						    $this_category = wp_list_categories(
						      array(
						        'orderby' => 'name',
						        'show_count' => '0',
						        'current_category' => ''.$category[0]->cat_ID.'',
						        'title_li' => '',
						        'use_desc_for_title' => '0',
						        'child_of' => ''.$category[0]->category_parent.'',
						        'echo' => '0',
						        'walker' => new Subcategory_Walker_Category
						      )
						    );
						  } else {
						    $this_category = wp_list_categories(
						      array(
						        'orderby' => 'name',
						        'show_count' => '0',
						        'current_category' => ''.$category[0]->cat_ID.'',
						        'title_li' => '',
						        'use_desc_for_title' => '0',
						        'child_of' => ''.$category[0]->cat_ID.'',
						        'echo' => '0',
						        'walker' => new Subcategory_Walker_Category
						      )
						    );
						  }
						} ?>

						<?php if(is_category() || is_single()) { ?> <!-- Показываем наши подкатегории сугубо в категориях и записях -->
						    <ul class="sb_menu">
						      <?php echo $this_category; /*Вывод подкатегорий*/ ?>
						    </ul>
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
					<?php } ?>
				<?php } ?>
				
				<?php if ($cat_root_id == 8) { ?>
				<?php dynamic_sidebar( 'main-page-banner-right' ); ?>
				<?php } elseif ($cat_root_id == 7) { ?>
				<?php dynamic_sidebar( 'main-page-banner-right' ); ?>
				<?php } elseif ($cat_root_id == 20) { ?>
				<?php dynamic_sidebar( 'main-page-banner-right' ); ?>
				<?php } else { ?>
				<?php dynamic_sidebar( 'single-banner' ); ?>
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
				
				<?php if ($cat_root_id == 19) { ?>

					<h4 class="title1">Новости</h4>
					<div class="b_info4">
						<?php
						wp_reset_query(); // сброс query_posts
						query_posts('cat=8&posts_per_page=3');
						?>
						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'content-news', get_post_format() ); ?>
							<?php endwhile; ?>
						<?php else : ?>
							<?php get_template_part( 'content', 'none' ); ?>
						<?php endif; ?>
					</div>

				<?php } ?>
				<!--/noindex-->

			</div>
			<div class="clear"></div>

		</div><!-- #content_wr -->
	</div><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>