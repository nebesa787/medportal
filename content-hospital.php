<?php
$cat_name =single_cat_title( '', false );
$cat_id = get_cat_ID( $cat_name );


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
$big_img = wp_get_attachment_image_src( $big_img, 'large-thumb');
$big_img = $big_img[0];

$post_id = $post->ID;
$medpr_mail = get_field( "medpr_mail" );
//var_dump($test); exit;
?>

	<div class="preview">
		<div class="descr">
			<div class="thumb_wr">
				<?php if( $medpr_mail ){ ?><a href="#zak2" class="btn doc_call" data-redir="<? echo $medpr_mail;?>">отправить заявку</a><?php } ?>
				<div class="thumb">
				<?php if ( has_post_thumbnail() ) {?>
					<?php wlcenter_post_thumbnail(); ?>
				<?php } else { ?>
					<img src="<?php bloginfo('template_url'); ?>/im/thumb_1.png" alt="<?php the_title(); ?>">
				<?php } ?>
					<?php //wlcenter_post_thumbnail(); ?>
				</div>
			</div>
			<h5><a href="<?php the_permalink(); ?>" style="color:#FFFFFF; text-decoration:none;"><?php the_title(); ?></a></h5>
			<?php
				//$city_search = $_POST['city_name'];
				$city_search = $cat_name;
				
				$pos = strripos($address_1, $city_search);
				if ($pos === false) {
				} else {
					$address = $address_1;
					$work_time = $work_time_1;
					$phone_number = $phone_number_1;
				}
				
				$pos = strripos($address_2, $city_search);
				if ($pos === false) {
				} else {
					$address = $address_2;
					$work_time = $work_time_2;
					$phone_number = $phone_number_2;
				}
				
				$pos = strripos($address_3, $city_search);
				if ($pos === false) {
				} else {
					$address = $address_3;
					$work_time = $work_time_3;
					$phone_number = $phone_number_3;
				}
				
				$pos = strripos($address_4, $city_search);
				if ($pos === false) {
				} else {
					$address = $address_4;
					$work_time = $work_time_4;
					$phone_number = $phone_number_4;
				}
				
				$pos = strripos($address_5, $city_search);
				if ($pos === false) {
				} else {
					$address = $address_5;
					$work_time = $work_time_5;
					$phone_number = $phone_number_5;
				}
				
				$pos = strripos($address_6, $city_search);
				if ($pos === false) {
				} else {
					$address = $address_6;
					$work_time = $work_time_6;
					$phone_number = $phone_number_6;
				}
				
				$pos = strripos($address_7, $city_search);
				if ($pos === false) {
				} else {
					$address = $address_7;
					$work_time = $work_time_7;
					$phone_number = $phone_number_7;
				}
				
				$pos = strripos($address_8, $city_search);
				if ($pos === false) {
				} else {
					$address = $address_8;
					$work_time = $work_time_8;
					$phone_number = $phone_number_8;
				}
				
				$pos = strripos($address_9, $city_search);
				if ($pos === false) {
				} else {
					$address = $address_9;
					$work_time = $work_time_9;
					$phone_number = $phone_number_9;
				}
				
				$pos = strripos($address_10, $city_search);
				if ($pos === false) {
				} else {
					$address = $address_10;
					$work_time = $work_time_10;
					$phone_number = $phone_number_10;
				}
				
				
				if (!$address){
					$address = $address_1;
					$work_time = $work_time_1;
					$phone_number = $phone_number_1;
				}
				
			?>
			<span class="adr"><?php echo $address; ?></span>
					
						<?php if ($address_2){?>
							<?php $rr=2;?>
						<?php }?>
						
						<?php if ($address_3){?>
							<?php $rr=3;?>
						<?php }?>
						
						<?php if ($address_4){?>
							<?php $rr=4;?>
						<?php }?>
						
						<?php if ($address_5){?>
							<?php $rr=5;?>
						<?php }?>
						
						<?php if ($address_6){?>
							<?php $rr=6;?>
						<?php }?>
						
						<?php if ($address_7){?>
							<?php $rr=7;?>
						<?php }?>
						
						<?php if ($address_8){?>
							<?php $rr=8;?>
						<?php }?>
						
						<?php if ($address_9){?>
							<?php $rr=9;?>
						<?php }?>
						
						<?php if ($address_10){?>
							<?php $rr=10;?>
						<?php }?>
			
					<?php if($address_2){?>
					<span class="all_adress_listing">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Все адреса (<?php echo $rr;?>)</span>
						<?php $rr++;?>
						<div class="all_adr_listing">
							<span class="close"></span>
						<?php if ($address_1){?>
								<p><span class="adr_s"><?php echo $address_1; ?></span><br>
								<span><?php echo $work_time_1; ?></span><br>
								<span class="tel_s"><?php echo $phone_number_1; ?></span>
								</p>
						<?php }?>
						
						<?php if ($address_2){?>
								<p><span class="adr_s"><?php echo $address_2; ?></span><br>
								<span><?php echo $work_time_2; ?></span><br>
								<span class="tel_s"><?php echo $phone_number_2; ?></span>
								</p>
						<?php }?>
						
						<?php if ($address_3){?>
								<p><span class="adr_s"><?php echo $address_3; ?></span><br>
								<span><?php echo $work_time_3; ?></span><br>
								<span class="tel_s"><?php echo $phone_number_3; ?></span>
								</p>
						<?php }?>
						
						<?php if ($address_4){?>
								<p><span class="adr_s"><?php echo $address_4; ?></span><br>
								<span><?php echo $work_time_4; ?></span><br>
								<span class="tel_s"><?php echo $phone_number_4; ?></span>
								</p>
						<?php }?>
						
						<?php if ($address_5){?>
								<p><span class="adr_s"><?php echo $address_5; ?></span><br>
								<span><?php echo $work_time_5; ?></span><br>
								<span class="tel_s"><?php echo $phone_number_5; ?></span>
								</p>
						<?php }?>
						
						<?php if ($address_6){?>
								<p><span class="adr_s"><?php echo $address_6; ?></span><br>
								<span><?php echo $work_time_6; ?></span><br>
								<span class="tel_s"><?php echo $phone_number_6; ?></span>
								</p>
						<?php }?>
						
						<?php if ($address_7){?>
								<p><span class="adr_s"><?php echo $address_7; ?></span><br>
								<span><?php echo $work_time_7; ?></span><br>
								<span class="tel_s"><?php echo $phone_number_7; ?></span>
								</p>
						<?php }?>
						
						<?php if ($address_8){?>
								<p><span class="adr_s"><?php echo $address_8; ?></span><br>
								<span><?php echo $work_time_8; ?></span><br>
								<span class="tel_s"><?php echo $phone_number_8; ?></span>
								</p>
						<?php }?>
						
						<?php if ($address_9){?>
								<p><span class="adr_s"><?php echo $address_9; ?></span><br>
								<span><?php echo $work_time_9; ?></span><br>
								<span class="tel_s"><?php echo $phone_number_9; ?></span>
								</p>
						<?php }?>
						
						<?php if ($address_10){?>
								<p><span class="adr_s"><?php echo $address_10; ?></span><br>
								<span><?php echo $work_time_10; ?></span><br>
								<span class="tel_s"><?php echo $phone_number_10; ?></span>
								</p>
						<?php }?>
						
						</div>
						
					<?php }?>
			
			
			<p><span><?php echo $work_time; ?></span><br><strong><?php echo $phone_number; ?></strong></p>
			
			
					
			
			
			
			
			<div class="b_rate">
				<span class="v3"><?php comments_number(0, 1, '%'); ?><i class="ico"></i></span>
				<span class="v1"><?php echo get_post_rates_like($post_id); ?><i class="ico"></i></span>
				<span class="v2"><?php echo get_post_rates_dislike($post_id); ?><i class="ico"></i></span>
			</div>
		</div>
		<img src="<? echo $big_img; ?>" alt="<?php the_title(); ?>" class="vip_img">
	</div>