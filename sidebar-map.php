<h2>клиника на карте</h2>
		
					<?php $adress_1 = get_field( "adress_1" ); ?>
					<?php if( $adress_1 ) {?>
					
					
					<div id="YMapsID">
						
						
						<div id="view1">
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
						
						
						if( ! empty($location1) ):
						?>
						<div id="map" style="width: 100%; height: 500px;"></div>
						
						<script src='https://maps.googleapis.com/maps/api/js?sensor=false' type='text/javascript'></script>
						<script type="text/javascript">
						 	var markersPool = {};
							function load() {
								var lat = <?php echo $location1['lat']; ?>;
								var lng = <?php echo $location1['lng']; ?>;
								var icon1 = "<?php echo get_template_directory_uri(); ?>/im/marker12.png";
								var icon2 = "<?php echo get_template_directory_uri(); ?>/im/marker11.png";
								
							
								var latlng = new google.maps.LatLng(lat, lng);
							
								var myOptions = {
									zoom: 11,
									center: latlng,
									mapTypeId: google.maps.MapTypeId.ROADMAP
								};
							
								var map = new google.maps.Map(document.getElementById("map"), myOptions);
								
								var marker1 = new google.maps.Marker({
									map: map,
									icon: icon1,
									position: {lat: <?php echo $location1['lat']; ?>, lng: <?php echo $location1['lng']; ?>}
								});
								
								<?php if( $location2 ) {?>
								var marker2 = new google.maps.Marker({
									map: map,
									icon: icon1,
									position: {lat: <?php echo $location2['lat']; ?>, lng: <?php echo $location2['lng']; ?>}
								});
								<?php }?>
								
								<?php if( $location3 ) {?>
								var marker3 = new google.maps.Marker({
									map: map,
									icon: icon1,
									position: {lat: <?php echo $location3['lat']; ?>, lng: <?php echo $location3['lng']; ?>}
								});
								<?php }?>
								
								<?php if( $location4 ) {?>
								var marker4 = new google.maps.Marker({
									map: map,
									icon: icon1,
									position: {lat: <?php echo $location4['lat']; ?>, lng: <?php echo $location4['lng']; ?>}
								});
								<?php }?>
								
								<?php if( $location5 ) {?>
								var marker5 = new google.maps.Marker({
									map: map,
									icon: icon1,
									position: {lat: <?php echo $location5['lat']; ?>, lng: <?php echo $location5['lng']; ?>}
								});
								<?php }?>
								
								
								<?php if( $location6 ) {?>
								var marker6 = new google.maps.Marker({
									map: map,
									icon: icon1,
									position: {lat: <?php echo $location6['lat']; ?>, lng: <?php echo $location6['lng']; ?>}
								});
								<?php }?>
								<?php if( $location7 ) {?>
								var marker7 = new google.maps.Marker({
									map: map,
									icon: icon1,
									position: {lat: <?php echo $location7['lat']; ?>, lng: <?php echo $location7['lng']; ?>}
								});
								<?php }?>
								<?php if( $location8 ) {?>
								var marker8 = new google.maps.Marker({
									map: map,
									icon: icon1,
									position: {lat: <?php echo $location8['lat']; ?>, lng: <?php echo $location8['lng']; ?>}
								});
								<?php }?>
								<?php if( $location9 ) {?>
								var marker9 = new google.maps.Marker({
									map: map,
									icon: icon1,
									position: {lat: <?php echo $location9['lat']; ?>, lng: <?php echo $location9['lng']; ?>}
								});
								<?php }?>
								
								<?php if( $location10 ) {?>
								var marker10 = new google.maps.Marker({
									map: map,
									icon: icon1,
									position: {lat: <?php echo $location10['lat']; ?>, lng: <?php echo $location10['lng']; ?>}
								});
								<?php }?>
								
								
								///****************************************///
								var contentString1 = '<div class="popup" >'+
														'<div class="thumb">'+
															'<?php echo get_the_post_thumbnail( $post->ID ); ?>'+
														'</div>'+
														'<div class="p_descr">'+
														'<h5><?php the_title(); ?></h5>'+
														'<p><?php echo $location1['address']; ?></p>'+
														'<p><?php echo $work_time_1 ; ?></p>'+
														'<p><strong><?php echo $phone_number_1 ; ?></strong></p>'+
													'</div>'+
													 '</div>';
								var infowindow1 = new google.maps.InfoWindow({
												content: contentString1
											});
								google.maps.event.addListener(marker1, 'click', function() {
									infowindow1.open(map,marker1);
									infowindow2.close(map,marker2);
									infowindow3.close(map,marker3);
									infowindow4.close(map,marker4);
									infowindow5.close(map,marker5);
									infowindow6.close(map,marker6);
									infowindow7.close(map,marker7);
									infowindow8.close(map,marker8);
									infowindow9.close(map,marker9);
									infowindow10.close(map,marker10);
								});
								
								google.maps.event.addListener(marker1, 'mouseover', function() {
									marker1.setIcon(icon2);
								});
								google.maps.event.addListener(marker1, 'mouseout', function() {
									marker1.setIcon(icon1);
								});
								
								
								
								infowindow1.open(map,marker1);
								
								///****************************************///
								var contentString2 = '<div class="popup" >'+
														'<div class="thumb">'+
															'<?php echo get_the_post_thumbnail( $post->ID ); ?>'+
														'</div>'+
														'<div class="p_descr">'+
														'<h5><?php the_title(); ?></h5>'+
														'<p><?php echo $location2['address']; ?></p>'+
														'<p><?php echo $work_time_2 ; ?></p>'+
														'<p><strong><?php echo $phone_number_2 ; ?></strong></p>'+
													'</div>'+
													 '</div>';
								var infowindow2 = new google.maps.InfoWindow({
												content: contentString2
											});
								google.maps.event.addListener(marker2, 'click', function() {
									infowindow2.open(map,marker2);
									infowindow1.close(map,marker1);
									infowindow3.close(map,marker3);
									infowindow4.close(map,marker4);
									infowindow5.close(map,marker5);
									infowindow6.close(map,marker6);
									infowindow7.close(map,marker7);
									infowindow8.close(map,marker8);
									infowindow9.close(map,marker9);
									infowindow10.close(map,marker10);
								});
								
								google.maps.event.addListener(marker2, 'mouseover', function() {
									marker2.setIcon(icon2);
								});
								google.maps.event.addListener(marker2, 'mouseout', function() {
									marker2.setIcon(icon1);
								});
								
								
								
								///****************************************///
								var contentString3 = '<div class="popup" >'+
														'<div class="thumb">'+
															'<?php echo get_the_post_thumbnail( $post->ID ); ?>'+
														'</div>'+
														'<div class="p_descr">'+
														'<h5><?php the_title(); ?></h5>'+
														'<p><?php echo $location3['address']; ?></p>'+
														'<p><?php echo $work_time_3 ; ?></p>'+
														'<p><strong><?php echo $phone_number_3 ; ?></strong></p>'+
													'</div>'+
													 '</div>';
								var infowindow3 = new google.maps.InfoWindow({
												content: contentString3
											});
								google.maps.event.addListener(marker3, 'click', function() {
									infowindow3.open(map,marker3);
									infowindow2.close(map,marker2);
									infowindow1.close(map,marker1);
									infowindow4.close(map,marker4);
									infowindow5.close(map,marker5);
									infowindow6.close(map,marker6);
									infowindow7.close(map,marker7);
									infowindow8.close(map,marker8);
									infowindow9.close(map,marker9);
									infowindow10.close(map,marker10);
								});
								
								google.maps.event.addListener(marker3, 'mouseover', function() {
									marker3.setIcon(icon2);
								});
								google.maps.event.addListener(marker3, 'mouseout', function() {
									marker3.setIcon(icon1);
								});
								
								///****************************************///
								var contentString4 = '<div class="popup" >'+
														'<div class="thumb">'+
															'<?php echo get_the_post_thumbnail( $post->ID ); ?>'+
														'</div>'+
														'<div class="p_descr">'+
														'<h5><?php the_title(); ?></h5>'+
														'<p><?php echo $location4['address']; ?></p>'+
														'<p><?php echo $work_time_4 ; ?></p>'+
														'<p><strong><?php echo $phone_number_4 ; ?></strong></p>'+
													'</div>'+
													 '</div>';
								var infowindow4 = new google.maps.InfoWindow({
												content: contentString4
											});
								google.maps.event.addListener(marker4, 'click', function() {
									infowindow4.open(map,marker4);
									infowindow2.close(map,marker2);
									infowindow3.close(map,marker3);
									infowindow1.close(map,marker1);
									infowindow5.close(map,marker5);
									infowindow6.close(map,marker6);
									infowindow7.close(map,marker7);
									infowindow8.close(map,marker8);
									infowindow9.close(map,marker9);
									infowindow10.close(map,marker10);
								});
								google.maps.event.addListener(marker4, 'mouseover', function() {
									marker4.setIcon(icon2);
								});
								google.maps.event.addListener(marker4, 'mouseout', function() {
									marker4.setIcon(icon1);
								});
								
								///****************************************///
								var contentString5 = '<div class="popup" >'+
														'<div class="thumb">'+
															'<?php echo get_the_post_thumbnail( $post->ID ); ?>'+
														'</div>'+
														'<div class="p_descr">'+
														'<h5><?php the_title(); ?></h5>'+
														'<p><?php echo $location5['address']; ?></p>'+
														'<p><?php echo $work_time_5 ; ?></p>'+
														'<p><strong><?php echo $phone_number_5 ; ?></strong></p>'+
													'</div>'+
													 '</div>';
								var infowindow5 = new google.maps.InfoWindow({
												content: contentString5
											});
								google.maps.event.addListener(marker5, 'click', function() {
									infowindow5.open(map,marker5);
									infowindow2.close(map,marker2);
									infowindow3.close(map,marker3);
									infowindow4.close(map,marker4);
									infowindow1.close(map,marker1);
									infowindow6.close(map,marker6);
									infowindow7.close(map,marker7);
									infowindow8.close(map,marker8);
									infowindow9.close(map,marker9);
									infowindow10.close(map,marker10);
								});
								
								
								google.maps.event.addListener(marker5, 'mouseover', function() {
									marker5.setIcon(icon2);
								});
								google.maps.event.addListener(marker5, 'mouseout', function() {
									marker5.setIcon(icon1);
								});
								
								
								///****************************************///
								var contentString6 = '<div class="popup" >'+
														'<div class="thumb">'+
															'<?php echo get_the_post_thumbnail( $post->ID ); ?>'+
														'</div>'+
														'<div class="p_descr">'+
														'<h5><?php the_title(); ?></h5>'+
														'<p><?php echo $location6['address']; ?></p>'+
														'<p><?php echo $work_time_6 ; ?></p>'+
														'<p><strong><?php echo $phone_number_6 ; ?></strong></p>'+
													'</div>'+
													 '</div>';
								var infowindow6 = new google.maps.InfoWindow({
												content: contentString6
											});
								google.maps.event.addListener(marker6, 'click', function() {
									infowindow1.close(map,marker1);
									infowindow2.close(map,marker2);
									infowindow3.close(map,marker3);
									infowindow4.close(map,marker1);
									infowindow5.close(map,marker5);
									infowindow6.open(map,marker6);
									infowindow7.close(map,marker7);
									infowindow8.close(map,marker8);
									infowindow9.close(map,marker9);
									infowindow10.close(map,marker10);
								});
								google.maps.event.addListener(marker6, 'mouseover', function() {
									marker6.setIcon(icon2);
								});
								google.maps.event.addListener(marker6, 'mouseout', function() {
									marker6.setIcon(icon1);
								});
								
								
								///****************************************///
								var contentString7 = '<div class="popup" >'+
														'<div class="thumb">'+
															'<?php echo get_the_post_thumbnail( $post->ID ); ?>'+
														'</div>'+
														'<div class="p_descr">'+
														'<h5><?php the_title(); ?></h5>'+
														'<p><?php echo $location7['address']; ?></p>'+
														'<p><?php echo $work_time_7 ; ?></p>'+
														'<p><strong><?php echo $phone_number_7 ; ?></strong></p>'+
													'</div>'+
													 '</div>';
								var infowindow7 = new google.maps.InfoWindow({
												content: contentString7
											});
								google.maps.event.addListener(marker7, 'click', function() {
									infowindow1.close(map,marker1);
									infowindow2.close(map,marker2);
									infowindow3.close(map,marker3);
									infowindow4.close(map,marker1);
									infowindow5.close(map,marker5);
									infowindow6.close(map,marker6);
									infowindow7.open (map,marker7);
									infowindow8.close(map,marker8);
									infowindow9.close(map,marker9);
									infowindow10.close(map,marker10);
								});
								google.maps.event.addListener(marker7, 'mouseover', function() {
									marker7.setIcon(icon2);
								});
								google.maps.event.addListener(marker7, 'mouseout', function() {
									marker7.setIcon(icon1);
								});
								
								
																
								///****************************************///
								var contentString8 = '<div class="popup" >'+
														'<div class="thumb">'+
															'<?php echo get_the_post_thumbnail( $post->ID ); ?>'+
														'</div>'+
														'<div class="p_descr">'+
														'<h5><?php the_title(); ?></h5>'+
														'<p><?php echo $location8['address']; ?></p>'+
														'<p><?php echo $work_time_8 ; ?></p>'+
														'<p><strong><?php echo $phone_number_8 ; ?></strong></p>'+
													'</div>'+
													 '</div>';
								var infowindow8 = new google.maps.InfoWindow({
												content: contentString8
											});
								google.maps.event.addListener(marker8, 'click', function() {
									infowindow1.close(map,marker1);
									infowindow2.close(map,marker2);
									infowindow3.close(map,marker3);
									infowindow4.close(map,marker1);
									infowindow5.close(map,marker5);
									infowindow6.close(map,marker6);
									infowindow7.close(map,marker7);
									infowindow8.open (map,marker8);
									infowindow9.close(map,marker9);
									infowindow10.close(map,marker10);
								});
								google.maps.event.addListener(marker8, 'mouseover', function() {
									marker8.setIcon(icon2);
								});
								google.maps.event.addListener(marker8, 'mouseout', function() {
									marker8.setIcon(icon1);
								});
								
								
								///****************************************///
								var contentString9 = '<div class="popup" >'+
														'<div class="thumb">'+
															'<?php echo get_the_post_thumbnail( $post->ID ); ?>'+
														'</div>'+
														'<div class="p_descr">'+
														'<h5><?php the_title(); ?></h5>'+
														'<p><?php echo $location9['address']; ?></p>'+
														'<p><?php echo $work_time_9 ; ?></p>'+
														'<p><strong><?php echo $phone_number_9 ; ?></strong></p>'+
													'</div>'+
													 '</div>';
								var infowindow9 = new google.maps.InfoWindow({
												content: contentString9
											});
								google.maps.event.addListener(marker9, 'click', function() {
									infowindow1.close(map,marker1);
									infowindow2.close(map,marker2);
									infowindow3.close(map,marker3);
									infowindow4.close(map,marker1);
									infowindow5.close(map,marker5);
									infowindow6.close(map,marker6);
									infowindow7.close(map,marker7);
									infowindow8.close(map,marker8);
									infowindow9.open (map,marker9);
									infowindow10.close(map,marker10);
								});
								google.maps.event.addListener(marker9, 'mouseover', function() {
									marker9.setIcon(icon2);
								});
								google.maps.event.addListener(marker9, 'mouseout', function() {
									marker9.setIcon(icon1);
								});
								
								
								///****************************************///
								var contentString10 = '<div class="popup" >'+
														'<div class="thumb">'+
															'<?php echo get_the_post_thumbnail( $post->ID ); ?>'+
														'</div>'+
														'<div class="p_descr">'+
														'<h5><?php the_title(); ?></h5>'+
														'<p><?php echo $location10['address']; ?></p>'+
														'<p><?php echo $work_time_10 ; ?></p>'+
														'<p><strong><?php echo $phone_number_10 ; ?></strong></p>'+
													'</div>'+
													 '</div>';
								var infowindow10 = new google.maps.InfoWindow({
												content: contentString10
											});
								google.maps.event.addListener(marker9, 'click', function() {
									infowindow1.close(map,marker1);
									infowindow2.close(map,marker2);
									infowindow3.close(map,marker3);
									infowindow4.close(map,marker1);
									infowindow5.close(map,marker5);
									infowindow6.close(map,marker6);
									infowindow7.close(map,marker7);
									infowindow8.close(map,marker8);
									infowindow9.close(map,marker9);
									infowindow10.open(map,marker10);
								});
								google.maps.event.addListener(marker10, 'mouseover', function() {
									marker10.setIcon(icon2);
								});
								google.maps.event.addListener(marker10, 'mouseout', function() {
									marker10.setIcon(icon1);
								});
								
								
							}
						   load();
					
						</script>
						<?php endif; ?> 
						
						</div>
						
					</div><br>
					<?php }?>