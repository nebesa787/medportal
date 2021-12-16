<?php
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

?>

<div class="preview">
	<div class="thumb"><a href="<?php the_permalink(); ?>" rel="nofollow">
		<?php if ( has_post_thumbnail() ){ the_post_thumbnail(); }else{ ?>
			<div class="thumb"><img src="<?php bloginfo('template_url'); ?>/im/thumb_1.png" alt="<?php the_title(); ?>"></div>
			<?php }?>
		</a></div>
	<div class="p_descr">
		<div class="head_five"><a href="<?php the_permalink(); ?>" rel="nofollow"><?php the_title(); ?></a></div>
		<p><?php echo $address_1; ?></p>
		<p><strong><?php echo $phone_number_1; ?></strong></p>
	</div>
</div>