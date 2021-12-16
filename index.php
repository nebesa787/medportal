<?php get_header(); ?>
	<!--main-->
	<div id="main">
		<div class="content_wr">
			<div class="content">
				<?php
				wp_reset_query();
				query_posts('cat=9&posts_per_page=7');
				?>
				<?php if ( have_posts() ) : ?>
					<?php $count = 0; ?>
					<div class="b_info2">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php if ($count == 0) { ?>
							<?php get_template_part( 'content-medenc_b', get_post_format() ); ?>
							</div>
							<div class="b_info3 ib_wr">
							<?php }else{ ?>
								<?php get_template_part( 'content-medenc', get_post_format() ); ?>
							<?php } ?>
						<?php $count++; ?>
					<?php endwhile; ?>
					</div>
				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif; ?>
			</div>
			<div class="sidebar">
				<!--noindex-->
				<h4 class="title1">Новое в каталоге</h4>
                <div class="b_info">
                 	<?php
					wp_reset_query(); // сброс query_posts
					query_posts('cat=19&posts_per_page=3');
					?>
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content-catal', get_post_format() ); ?>
						<?php endwhile; ?>
					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>

					<a href="/meduchrezhdeniya/" class="btn">Перейти в каталог</a>
                </div>
                <!--/noindex-->
				<?php dynamic_sidebar( 'main-page-banner-right' ); ?>
				<!--noindex-->
				<h4 class="title1">Вопросы / ответы</h4>
				<div class="b_info1">
					<?php
					wp_reset_query(); // сброс query_posts
					query_posts('cat=7&posts_per_page=3');
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
		</div>

		
		<!--noindex-->
		<div class="map">
			<div class="title">Медицинские центры на карте</div>
				<?php
					global $wp_query, $post, $wpdb, $id ;
					$temp_query = $wp_query; $temp_post = $post; $temp_wpdb = $wpdb; $temp_id = $id; $wp_query= null;
					$wp_query = new WP_Query();
					//$wp_query->query('post_per_page=-1&cat=19');
					$wp_query->query('post_per_page=30&cat=26');
				?>
				<?php if (have_posts()) : ?>
					<?php $i=0;?>
					<?php $ii=0;?>
					<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>	
						<?php $i++;?>
						<?php $location_temp = get_field('adress_1');?>
						<?php if ( $location_temp && ($ii == 0) ){ ?>
							<?php $ii++;?>
							<?php $location0 = $location_temp; ?>
						<?php }?>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php $wp_query = null; $wp_query = $temp_query;	$post = null; $post = $temp_post;	$wpdb = null; $wpdb = $temp_wpdb;	$id = null; $id = $temp_id;	?>
			
				
				<div id="map" style="width: 100%; height: 500px;"></div>
						
						<script src='https://maps.googleapis.com/maps/api/js?sensor=false' type='text/javascript'></script>
						<script type="text/javascript">
						  //<![CDATA[
							var markersPool = {};
							function load() {
								var lat = <?php echo $location0['lat']; ?>;
								var lng = <?php echo $location0['lng']; ?>;
								var icon1 = "<?php echo get_template_directory_uri(); ?>/im/marker12.png";
								var icon2 = "<?php echo get_template_directory_uri(); ?>/im/marker11.png";
								
							
								var latlng = new google.maps.LatLng(lat, lng);
							
								var myOptions = {
									zoom: 11,
									center: latlng,
									mapTypeId: google.maps.MapTypeId.ROADMAP
								};
							
								var map = new google.maps.Map(document.getElementById("map"), myOptions);
								
								<?php
									global $wp_query, $post, $wpdb, $id ;
									$temp_query = $wp_query; $temp_post = $post; $temp_wpdb = $wpdb; $temp_id = $id; $wp_query= null;
									$wp_query = new WP_Query();
									$wp_query->query('posts_per_page=30&cat=26');
									
									
								?>
								<?php if (have_posts()) : ?>
									<?php $i=0;?>
									<?php $ii=0;?>
									<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>	
										
										<?php $location1 = get_field('adress_1');?>
										<?php if ( $location1){ ?>
										<?php $i++;?>
										<?php
											$location1 = get_field('adress_1');
											$location2 = get_field('adress_2');
											$location3 = get_field('adress_3');
											$location4 = get_field('adress_4');
											$location5 = get_field('adress_5');
											
											$location6 = get_field('adress_6');
											$location7 = get_field('adress_7');
											$location8 = get_field('adress_8');
											$location9 = get_field('adress_9');
											$location10 = get_field('adress_10');
											
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
										?>
											var infowindow;
										
											var marker_<?php echo $i;?>_1 = new google.maps.Marker({
												map: map,
												icon: icon1,
												position: {lat: <?php echo $location1['lat']; ?>, lng: <?php echo $location1['lng']; ?>}
											});
											
											///****************************************///
											var contentString_<?php echo $i;?>_1 = '<div class="popup" >'+
																	'<div class="thumb">'+
																			'<a href="<?php echo get_permalink(); ?>">'+
																			'<?php echo get_the_post_thumbnail( $post->ID ); ?>'+
																			'</a>'+
																		'</div>'+
																	'<div class="p_descr">'+
																	'<h5><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>'+
																	'<p><?php echo $location1['address']; ?></p>'+
																	'<p><?php echo $work_time_1 ; ?></p>'+
																	'<p><strong><?php echo $phone_number_1 ; ?></strong></p>'+
																'</div>'+
																 '</div>';
											google.maps.event.addListener(marker_<?php echo $i;?>_1, 'click', function() {
												if (infowindow) {infowindow.close();}
												infowindow = new google.maps.InfoWindow({
															content: contentString_<?php echo $i;?>_1
														});
												infowindow.open(map, marker_<?php echo $i;?>_1);
											});
											
											<?php if($i==1){?>
												infowindow = new google.maps.InfoWindow({
															content: contentString_<?php echo $i;?>_1
														});
												infowindow.open(map, marker_<?php echo $i;?>_1);
											<?php }?>
											
											
											google.maps.event.addListener(marker_<?php echo $i;?>_1, 'mouseover', function() {
												marker_<?php echo $i;?>_1.setIcon(icon2);
											});
											google.maps.event.addListener(marker_<?php echo $i;?>_1, 'mouseout', function() {
												marker_<?php echo $i;?>_1.setIcon(icon1);
											});
											
											
											<?php if( $location2 ) {?>
											
												var marker_<?php echo $i;?>_2 = new google.maps.Marker({
													map: map,
													icon: icon1,
													position: {lat: <?php echo $location2['lat']; ?>, lng: <?php echo $location2['lng']; ?>}
												});
												
												///****************************************///
												var contentString_<?php echo $i;?>_2 = '<div class="popup" >'+
																		'<div class="thumb">'+
																			'<a href="<?php echo get_permalink(); ?>">'+
																			'<?php echo get_the_post_thumbnail( $post->ID ); ?>'+
																			'</a>'+
																		'</div>'+
																		'<div class="p_descr">'+
																		'<h5><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>'+
																		'<p><?php echo $location2['address']; ?></p>'+
																		'<p><?php echo $work_time_2 ; ?></p>'+
																		'<p><strong><?php echo $phone_number_2 ; ?></strong></p>'+
																	'</div>'+
																	 '</div>';
												google.maps.event.addListener(marker_<?php echo $i;?>_2, 'click', function() {
													if (infowindow) {infowindow.close();}
													infowindow = new google.maps.InfoWindow({
																content: contentString_<?php echo $i;?>_2
															});
													infowindow.open(map, marker_<?php echo $i;?>_2);
												});
												
												google.maps.event.addListener(marker_<?php echo $i;?>_2, 'mouseover', function() {
													marker_<?php echo $i;?>_2.setIcon(icon2);
												});
												google.maps.event.addListener(marker_<?php echo $i;?>_2, 'mouseout', function() {
													marker_<?php echo $i;?>_2.setIcon(icon1);
												});
											
											<?php }?>
											
											
											<?php if( $location3 ) {?>
											
												var marker_<?php echo $i;?>_3 = new google.maps.Marker({
													map: map,
													icon: icon1,
													position: {lat: <?php echo $location3['lat']; ?>, lng: <?php echo $location3['lng']; ?>}
												});
												
												///****************************************///
												var contentString_<?php echo $i;?>_3 = '<div class="popup" >'+
																		'<div class="thumb">'+
																			'<a href="<?php echo get_permalink(); ?>">'+
																			'<?php echo get_the_post_thumbnail( $post->ID ); ?>'+
																			'</a>'+
																		'</div>'+
																		'<div class="p_descr">'+
																		'<h5><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>'+
																		'<p><?php echo $location3['address']; ?></p>'+
																		'<p><?php echo $work_time_3 ; ?></p>'+
																		'<p><strong><?php echo $phone_number_3 ; ?></strong></p>'+
																	'</div>'+
																	 '</div>';
												google.maps.event.addListener(marker_<?php echo $i;?>_3, 'click', function() {
													if (infowindow) {infowindow.close();}
													infowindow = new google.maps.InfoWindow({
																content: contentString_<?php echo $i;?>_3
															});
													infowindow.open(map, marker_<?php echo $i;?>_3);
												});
												
												google.maps.event.addListener(marker_<?php echo $i;?>_3, 'mouseover', function() {
													marker_<?php echo $i;?>_3.setIcon(icon2);
												});
												google.maps.event.addListener(marker_<?php echo $i;?>_3, 'mouseout', function() {
													marker_<?php echo $i;?>_3.setIcon(icon1);
												});
											
											<?php }?>
											
											<?php if( $location4 ) {?>
											
												var marker_<?php echo $i;?>_4 = new google.maps.Marker({
													map: map,
													icon: icon1,
													position: {lat: <?php echo $location4['lat']; ?>, lng: <?php echo $location4['lng']; ?>}
												});
												
												///****************************************///
												var contentString_<?php echo $i;?>_4 = '<div class="popup" >'+
																		'<div class="thumb">'+
																			'<a href="<?php echo get_permalink(); ?>">'+
																			'<?php echo get_the_post_thumbnail( $post->ID ); ?>'+
																			'</a>'+
																		'</div>'+
																		'<div class="p_descr">'+
																		'<h5><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>'+
																		'<p><?php echo $location4['address']; ?></p>'+
																		'<p><?php echo $work_time_4 ; ?></p>'+
																		'<p><strong><?php echo $phone_number_4 ; ?></strong></p>'+
																	'</div>'+
																	 '</div>';
												
												google.maps.event.addListener(marker_<?php echo $i;?>_4, 'click', function() {
													if (infowindow) {infowindow.close();}
													infowindow = new google.maps.InfoWindow({
																content: contentString_<?php echo $i;?>_4
															});
													infowindow.open(map, marker_<?php echo $i;?>_4);
													
												});
												
												google.maps.event.addListener(marker_<?php echo $i;?>_4, 'mouseover', function() {
													marker_<?php echo $i;?>_4.setIcon(icon2);
												});
												google.maps.event.addListener(marker_<?php echo $i;?>_4, 'mouseout', function() {
													marker_<?php echo $i;?>_4.setIcon(icon1);
												});
											
											<?php }?>
											
											<?php if( $location5 ) {?>
											
												var marker_<?php echo $i;?>_5 = new google.maps.Marker({
													map: map,
													icon: icon1,
													position: {lat: <?php echo $location5['lat']; ?>, lng: <?php echo $location5['lng']; ?>}
												});
												
												///****************************************///
												var contentString_<?php echo $i;?>_5 = '<div class="popup" >'+
																		'<div class="thumb">'+
																			'<a href="<?php echo get_permalink(); ?>">'+
																			'<?php echo get_the_post_thumbnail( $post->ID ); ?>'+
																			'</a>'+
																		'</div>'+
																		'<div class="p_descr">'+
																		'<h5><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>'+
																		'<p><?php echo $location5['address']; ?></p>'+
																		'<p><?php echo $work_time_5 ; ?></p>'+
																		'<p><strong><?php echo $phone_number_5 ; ?></strong></p>'+
																	'</div>'+
																	 '</div>';
												google.maps.event.addListener(marker_<?php echo $i;?>_5, 'click', function() {
													if (infowindow) {infowindow.close();}
													infowindow = new google.maps.InfoWindow({
																content: contentString_<?php echo $i;?>_5
															});
													infowindow.open(map, marker_<?php echo $i;?>_5);
												});
												
												google.maps.event.addListener(marker_<?php echo $i;?>_5, 'mouseover', function() {
													marker_<?php echo $i;?>_5.setIcon(icon2);
												});
												google.maps.event.addListener(marker_<?php echo $i;?>_5, 'mouseout', function() {
													marker_<?php echo $i;?>_5.setIcon(icon1);
												});
											
											<?php }?>
											
											
											<?php if( $location6 ) {?>
											
												var marker_<?php echo $i;?>_6 = new google.maps.Marker({
													map: map,
													icon: icon1,
													position: {lat: <?php echo $location6['lat']; ?>, lng: <?php echo $location6['lng']; ?>}
												});
												
												///****************************************///
												var contentString_<?php echo $i;?>_6 = '<div class="popup" >'+
																		'<div class="thumb">'+
																			'<a href="<?php echo get_permalink(); ?>">'+
																			'<?php echo get_the_post_thumbnail( $post->ID ); ?>'+
																			'</a>'+
																		'</div>'+
																		'<div class="p_descr">'+
																		'<h5><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>'+
																		'<p><?php echo $location6['address']; ?></p>'+
																		'<p><?php echo $work_time_6 ; ?></p>'+
																		'<p><strong><?php echo $phone_number_6 ; ?></strong></p>'+
																	'</div>'+
																	 '</div>';
												google.maps.event.addListener(marker_<?php echo $i;?>_6, 'click', function() {
													if (infowindow) {infowindow.close();}
													infowindow = new google.maps.InfoWindow({
																content: contentString_<?php echo $i;?>_6
															});
													infowindow.open(map, marker_<?php echo $i;?>_6);
												});
												
												google.maps.event.addListener(marker_<?php echo $i;?>_6, 'mouseover', function() {
													marker_<?php echo $i;?>_6.setIcon(icon2);
												});
												google.maps.event.addListener(marker_<?php echo $i;?>_6, 'mouseout', function() {
													marker_<?php echo $i;?>_6.setIcon(icon1);
												});
											
											<?php }?>
											
											
											
											<?php if( $location7 ) {?>
											
												var marker_<?php echo $i;?>_7 = new google.maps.Marker({
													map: map,
													icon: icon1,
													position: {lat: <?php echo $location7['lat']; ?>, lng: <?php echo $location7['lng']; ?>}
												});
												
												///****************************************///
												var contentString_<?php echo $i;?>_7 = '<div class="popup" >'+
																		'<div class="thumb">'+
																			'<a href="<?php echo get_permalink(); ?>">'+
																			'<?php echo get_the_post_thumbnail( $post->ID ); ?>'+
																			'</a>'+
																		'</div>'+
																		'<div class="p_descr">'+
																		'<h5><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>'+
																		'<p><?php echo $location7['address']; ?></p>'+
																		'<p><?php echo $work_time_7 ; ?></p>'+
																		'<p><strong><?php echo $phone_number_7 ; ?></strong></p>'+
																	'</div>'+
																	 '</div>';
												google.maps.event.addListener(marker_<?php echo $i;?>_7, 'click', function() {
													if (infowindow) {infowindow.close();}
													infowindow = new google.maps.InfoWindow({
																content: contentString_<?php echo $i;?>_7
															});
													infowindow.open(map, marker_<?php echo $i;?>_7);
												});
												
												google.maps.event.addListener(marker_<?php echo $i;?>_7, 'mouseover', function() {
													marker_<?php echo $i;?>_7.setIcon(icon2);
												});
												google.maps.event.addListener(marker_<?php echo $i;?>_7, 'mouseout', function() {
													marker_<?php echo $i;?>_7.setIcon(icon1);
												});
											
											<?php }?>
											
											
											
											
											<?php if( $location8 ) {?>
											
												var marker_<?php echo $i;?>_8 = new google.maps.Marker({
													map: map,
													icon: icon1,
													position: {lat: <?php echo $location8['lat']; ?>, lng: <?php echo $location8['lng']; ?>}
												});
												
												///****************************************///
												var contentString_<?php echo $i;?>_8 = '<div class="popup" >'+
																		'<div class="thumb">'+
																			'<a href="<?php echo get_permalink(); ?>">'+
																			'<?php echo get_the_post_thumbnail( $post->ID ); ?>'+
																			'</a>'+
																		'</div>'+
																		'<div class="p_descr">'+
																		'<h5><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>'+
																		'<p><?php echo $location8['address']; ?></p>'+
																		'<p><?php echo $work_time_8 ; ?></p>'+
																		'<p><strong><?php echo $phone_number_8 ; ?></strong></p>'+
																	'</div>'+
																	 '</div>';
												google.maps.event.addListener(marker_<?php echo $i;?>_8, 'click', function() {
													if (infowindow) {infowindow.close();}
													infowindow = new google.maps.InfoWindow({
																content: contentString_<?php echo $i;?>_8
															});
													infowindow.open(map, marker_<?php echo $i;?>_8);
												});
												
												google.maps.event.addListener(marker_<?php echo $i;?>_8, 'mouseover', function() {
													marker_<?php echo $i;?>_8.setIcon(icon2);
												});
												google.maps.event.addListener(marker_<?php echo $i;?>_8, 'mouseout', function() {
													marker_<?php echo $i;?>_8.setIcon(icon1);
												});
											
											<?php }?>
											
											
											<?php if( $location9 ) {?>
											
												var marker_<?php echo $i;?>_9 = new google.maps.Marker({
													map: map,
													icon: icon1,
													position: {lat: <?php echo $location9['lat']; ?>, lng: <?php echo $location9['lng']; ?>}
												});
												
												///****************************************///
												var contentString_<?php echo $i;?>_9 = '<div class="popup" >'+
																		'<div class="thumb">'+
																			'<a href="<?php echo get_permalink(); ?>">'+
																			'<?php echo get_the_post_thumbnail( $post->ID ); ?>'+
																			'</a>'+
																		'</div>'+
																		'<div class="p_descr">'+
																		'<h5><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>'+
																		'<p><?php echo $location9['address']; ?></p>'+
																		'<p><?php echo $work_time_9 ; ?></p>'+
																		'<p><strong><?php echo $phone_number_9 ; ?></strong></p>'+
																	'</div>'+
																	 '</div>';
												google.maps.event.addListener(marker_<?php echo $i;?>_9, 'click', function() {
													if (infowindow) {infowindow.close();}
													infowindow = new google.maps.InfoWindow({
																content: contentString_<?php echo $i;?>_9
															});
													infowindow.open(map, marker_<?php echo $i;?>_9);
												});
												
												google.maps.event.addListener(marker_<?php echo $i;?>_9, 'mouseover', function() {
													marker_<?php echo $i;?>_9.setIcon(icon2);
												});
												google.maps.event.addListener(marker_<?php echo $i;?>_9, 'mouseout', function() {
													marker_<?php echo $i;?>_9.setIcon(icon1);
												});
											
											<?php }?>
											
											
												<?php if( $location10 ) {?>
											
												var marker_<?php echo $i;?>_10 = new google.maps.Marker({
													map: map,
													icon: icon1,
													position: {lat: <?php echo $location10['lat']; ?>, lng: <?php echo $location10['lng']; ?>}
												});
												
												///****************************************///
												var contentString_<?php echo $i;?>_10 = '<div class="popup" >'+
																		'<div class="thumb">'+
																			'<a href="<?php echo get_permalink(); ?>">'+
																			'<?php echo get_the_post_thumbnail( $post->ID ); ?>'+
																			'</a>'+
																		'</div>'+
																		'<div class="p_descr">'+
																		'<h5><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h5>'+
																		'<p><?php echo $location10['address']; ?></p>'+
																		'<p><?php echo $work_time_10 ; ?></p>'+
																		'<p><strong><?php echo $phone_number_10 ; ?></strong></p>'+
																	'</div>'+
																	 '</div>';
												google.maps.event.addListener(marker_<?php echo $i;?>_10, 'click', function() {
													if (infowindow) {infowindow.close();}
													infowindow = new google.maps.InfoWindow({
																content: contentString_<?php echo $i;?>_10
															});
													infowindow.open(map, marker_<?php echo $i;?>_10);
												});
												
												google.maps.event.addListener(marker_<?php echo $i;?>_10, 'mouseover', function() {
													marker_<?php echo $i;?>_10.setIcon(icon2);
												});
												google.maps.event.addListener(marker_<?php echo $i;?>_10, 'mouseout', function() {
													marker_<?php echo $i;?>_10.setIcon(icon1);
												});
											
											<?php }?>
											
											
										<?php }?>
									<?php endwhile; ?>
								<?php endif; ?>
								<?php $wp_query = null; $wp_query = $temp_query;	$post = null; $post = $temp_post;	$wpdb = null; $wpdb = $temp_wpdb;	$id = null; $id = $temp_id;	?>
								
								
								}
						   load();
						//]]>
						</script>
						
			
		</div>		
		<!--/noindex-->
		
		

		<div class="abc">
			<div class="in">
				Медпрепараты ПО АЛФАВИТУ:
				<ul>
					<?php
	/*				foreach (range(chr(0xC0), chr(0xDF)) as $b) {
						$abc_rus[] = iconv('CP1251', 'UTF-8', $b);
					}
					foreach ($abc_rus as $lette_rus) {
						if (($lette_rus != 'Ь')&&($lette_rus != 'Ъ')&&($lette_rus != 'Ы')&&($lette_rus != 'Й')) {
							echo '<li><a href="/medpriparaty/'.$lette_rus.'">'.$lette_rus.'</a></li>';
						}
					}
					*/
					?>
					<li><a href="/medpriparaty/a">А</a></li>
					<li><a href="/medpriparaty/b">Б</a></li>
					<li><a href="/medpriparaty/v">В</a></li>
					<li><a href="/medpriparaty/g">Г</a></li>
					<li><a href="/medpriparaty/d">Д</a></li>
					<li><a href="/medpriparaty/e">Е</a></li>
					<li><a href="/medpriparaty/zh">Ж</a></li>
					<li><a href="/medpriparaty/z">З</a></li>
					<li><a href="/medpriparaty/i">И</a></li>
					<li><a href="/medpriparaty/k">К</a></li>
					<li><a href="/medpriparaty/l">Л</a></li>
					<li><a href="/medpriparaty/m">М</a></li>
					<li><a href="/medpriparaty/n">Н</a></li>
					<li><a href="/medpriparaty/o">О</a></li>
					<li><a href="/medpriparaty/p">П</a></li>
					<li><a href="/medpriparaty/r">Р</a></li>
					<li><a href="/medpriparaty/c">С</a></li>
					<li><a href="/medpriparaty/t">Т</a></li>
					<li><a href="/medpriparaty/u">У</a></li>
					<li><a href="/medpriparaty/f">Ф</a></li>
					<li><a href="/medpriparaty/h">Х</a></li>
					<li><a href="/medpriparaty/ts">Ц</a></li>
					<li><a href="/medpriparaty/ch">Ч</a></li>
					<li><a href="/medpriparaty/sh">Ш</a></li>
					<li><a href="/medpriparaty/shh">Щ</a></li>
					<li><a href="/medpriparaty/ee">Э</a></li>
					<li><a href="/medpriparaty/yu">Ю</a></li>
					<li><a href="/medpriparaty/ya">Я</a></li>
								
					
				</ul>
			</div>
		</div>

		<div class="c_wr">
			<div class="in">
				<div class="ib_wr">
					<div class="col col1">
						<h4 class="title1">Новости</h4>
						<div class="b_info4">
                        	<?php
							wp_reset_query(); // сброс query_posts
							query_posts('cat=8&posts_per_page=4');
							?>
							<?php if ( have_posts() ) : ?>
								<?php while ( have_posts() ) : the_post(); ?>
									<?php get_template_part( 'content-news', get_post_format() ); ?>
								<?php endwhile; ?>
							<?php else : ?>
								<?php get_template_part( 'content', 'none' ); ?>
							<?php endif; ?>

							<a href="/novosti/" class="btn">Читать все новости</a>
						</div>
					</div>
					<div class="col col2">
						<h4 class="title1">Последние отзывы</h4>
						<div class="b_info5"><!--noindex-->
                            <?php kama_recent_comments("limit=4&ex=100&term=19"); ?><!--/noindex-->
							<a href="/meduchrezhdeniya/" class="btn">Все клиники</a>
						</div>
					</div>
					<div class="col col3">
						<?php dynamic_sidebar( 'footer-banner' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>