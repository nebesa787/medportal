<?php
/*
* Template Name: API
*/
get_header();


global $all;
	$all = file_get_contents('http://tabletka.by/api.2.0/tab.api.php?tablist.download={}');
	$all = json_decode($all);
?>
	<div id="main">
		<div class="content_wr">
			<div class="content">
	            <h4>Поиск по аптекам</h4>
					<p>
						<?php
							$ls = $_GET['ls'];
							$regnum = $_GET['regnum'];
							$inn = $_GET['inn'];
							
							if( !$regnum){$regnum = 1000;}
							
							$lsnum = $_GET['lsnum'];
							$p_name = $_GET['p_name'];
							$p_tare = $_GET['p_tare'];
							$p_nlec = '('.$_GET['p_nlec'].')';
							$p_firm = '('.$_GET['p_firm'].')';
							
							
							$apt = $_GET['apt'];
							
							
							
							
							
							//$url_page = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REDIRECT_URL'];
							$url_page = home_url( '/result/' );
							
							
							//print_r('Response: '.$main->response[0].'<hr>');
							if($ls){
								if($inn){
									$main = file_get_contents('http://tabletka.by/api.2.0/tab.api.php?search.drugs={"ls":"'.$ls.'","regnum":'.$regnum.',"inn":1}');
								}else{
									$main = file_get_contents('http://tabletka.by/api.2.0/tab.api.php?search.drugs={"ls":"'.$ls.'","regnum":'.$regnum.'}');
								}
								
								$main = json_decode($main);
								
								if ($main->response){
									echo '<div class="table-responsive">  
											<table class="table table-bordered table-hover table-striped" style="font-size:11px;">
											<tr class="success">
												<td>Наименование</td>
												<td>Форма выпуска</td>
												<td class="hm">Производитель / Страна</td>
												<td>МНН / Состав</td>
												<td class="hm">Рецепт</td>
												<td>Мин.</td>
												<td class="hm">Макс.</td>
												<td>Апт.</td>
											</tr>';
									$i=0;
									foreach($main->response as $key=>$val){
										$i++;
										if ($i > 1) { 
									
											echo '<tr class="trdata">';
											echo '	<td><a href="'.$url_page.'?lsnum='.$val->ls_num.'&regnum='.$regnum.'&p_name='.$val->ls_name.'&p_tare='.$val->tar_name.'&p_nlec='.$val->nlec_name.'&p_firm='.$val->firm_name.'">'.$val->ls_name.'</a></td>
													<td><a href="'.$url_page.'?lsnum='.$val->ls_num.'&regnum='.$regnum.'&p_name='.$val->ls_name.'&p_tare='.$val->tar_name.'&p_nlec='.$val->nlec_name.'&p_firm='.$val->firm_name.'">'.$val->tar_name.'</a></td>
													<td class="hm">'.$val->firm_name .'</td>';
											if($val->nlec_name=='~'){
												echo '  <td></td>';
											}else{
												echo '  <td><a href="'.$url_page.'?ls='.$val->nlec_name.'&regnum='.$regnum.'&inn=1">'.$val->nlec_name .'</a></td>';
											}		

											if ($val->otc_rx == 'rx'){
												echo '<td class="hm">Да</td>';
											}else{
												echo '<td class="hm">Без/р.</td>';
											}
												
											echo'	<td>'.$val->price_min.'</td>
													<td class="hm">'.$val->price_max.'</td>
													<td>'.$val->apt_cnt.'</td>';
											echo '</tr>';
										}
									}
									echo '</table></div>';
								}
							}elseif($lsnum){
								
								$main = file_get_contents('http://tab.by/api.2.0/tab.api.php?search.aptsearch={"lsnum":'.$lsnum.',"regnum":'.$regnum.',"bmp":1}');
								$main = json_decode($main);
								echo '<pre><b>'.$p_name.'</b><br>'.$p_nlec.' '.$p_tare.' '.$p_firm.'<br>Уважаемые пользователи! Уточняйте <b>наличие и цену</b> звонком в аптеку.</pre>';
								if ($main->response){
									echo '<div class="table-responsive">  
											<table class="table table-bordered table-hover table-striped" style="font-size:11px;">
											<tr class="success">
												<td style="text-align:center;">Список аптек</td>
												<td style="text-align:center;">Цена </td>
												<td style="text-align:center;" class="hm">Кол-во</td>
												<td style="text-align:center;" class="hm">Обновление</td>
												<td style="text-align:center;">Адрес</td>
												<td style="text-align:center;" width="100px;">Телефон</td>
											</tr>';
									
									foreach($main->response as $key=>$val){
											$tell = '';
											$col = '';
											if($val->PHONES){$tell = explode(";",$val->PHONES);}
											if($val->LS_CNT ==0){$col = 'уточн.';}else{$col =  round($val->LS_CNT, 0);}
											
											echo '<tr class="trdata">';
											echo '	<td ><a href="'.$url_page.'?apt='.$val->USR_NUM.'">'.$val->USR_NAME.'</a></td>
													<td ><a href="'.$url_page.'?apt='.$val->USR_NUM.'">'.$val->LS_PRICE .'</a></td>
													<td style="text-align:center;" class="hm">'.$col .'</td>
													<td class="hm">'.$val->LS_DATE .'</td>
													<td ><a href="'.$url_page.'?apt='.$val->USR_NUM.'">'.$val->TOWN_NAME.', '.$val->USR_ADR.'</a></td>
													<td style="text-align:center;">'.$tell[0].'</td>
													';
											echo '</tr>';
									}
									echo '</table></div>';
								}
							
							}elseif($apt){
								
								foreach($all->response[0]->aptlist as $key=>$val){
									if($val->USR_NUM == $apt){
										
												$apt_name 	= $val->USR_NAME;
												$apt_adr 	= $val->USR_ADR;
												$apt_phones = $val->PHONES;
													if($val->PHONES){$apt_phones = explode(";",$val->PHONES);}
												
												$apt_geo_x 	= $val->geo_x;
												$apt_geo_y 	= $val->geo_y;
												
												$apt_mon 	= $val->mon;
												$apt_tue 	= $val->tue;
												$apt_wed 	= $val->wed;
												$apt_thu 	= $val->thu;
												$apt_fri 	= $val->fri;
												$apt_sat 	= $val->sat;
												$apt_san 	= $val->san;
													if($apt_sat =='1000-1000'){$apt_sat = 'Выходной';}
													if($apt_san =='1000-1000'){$apt_san = 'Выходной';}
												$apt_r_num 	= $val->REG_NUM;
												$apt_r_name = $val->REG_NAME;
									}
								}
								?>
								<div class="aptinfo">
									<div class="aptinfoindex">
										<h3><?php echo $apt_name; ?></h3>
										<div class="p_descr">
											<p><?php echo $apt_r_name.', '.$apt_adr; ?></p>
											<p><strong><?php echo $apt_phones[0]; ?></strong></p>
										</div>
									</div>
									<div class="grafik">
										<table class="table table-bordered table-hover" style="font-size:11px;">
											<tr><td>Понедельник</td><td style="text-align:center;"><?php echo $apt_mon; ?></td></tr>
											<tr><td>Вторник</td><td style="text-align:center;"><?php echo $apt_tue; ?></td></tr>
											<tr><td>Среда</td><td style="text-align:center;"><?php echo $apt_wed; ?></td></tr>
											<tr><td>Четверг</td><td style="text-align:center;"><?php echo $apt_thu; ?></td></tr>
											<tr><td>Пятница</td><td style="text-align:center;"><?php echo $apt_fri; ?></td></tr>
											<tr><td>Суббота</td><td style="text-align:center;"><?php echo $apt_sat; ?></td></tr>
											<tr><td>Воскресенье</td><td style="text-align:center;"><?php echo $apt_san; ?></td></tr>
										</table>
									</div>
								</div>
								
								<div id="map" style="width: 100%; height: 350px;"></div>
									
									<script src='http://maps.googleapis.com/maps/api/js?sensor=false' type='text/javascript'></script>
									<script type="text/javascript">
									  //<![CDATA[
										var markersPool = {};
										function load() {
											var lat = <?php echo $apt_geo_y; ?>;
											var lng = <?php echo $apt_geo_x; ?>;
											var icon1 = "<?php echo get_template_directory_uri(); ?>/im/marker12.png";
											var icon2 = "<?php echo get_template_directory_uri(); ?>/im/marker11.png";
											
										
											var latlng = new google.maps.LatLng(lat, lng);
										
											var myOptions = {
												zoom: 17,
												center: latlng,
												mapTypeId: google.maps.MapTypeId.ROADMAP
											};
										
											var map = new google.maps.Map(document.getElementById("map"), myOptions);
											
											var marker1 = new google.maps.Marker({
												map: map,
												icon: icon1,
												position: {lat: <?php echo $apt_geo_y; ?>, lng: <?php echo $apt_geo_x; ?>}
											});
											
											///****************************************///
											var contentString1 = '<div class="popup" >'+
																	'<div class="p_descr">'+
																	'<h5><?php echo $apt_name; ?></h5>'+
																	'<p><?php echo $apt_r_name.', '.$apt_adr; ?></p>'+
																	'<p><strong><?php echo $apt_phones; ?></strong></p>'+
																'</div>'+
																 '</div>';
											var infowindow1 = new google.maps.InfoWindow({
															content: contentString1
														});
											google.maps.event.addListener(marker1, 'click', function() {
												infowindow1.open(map,marker1);
											});
											
											google.maps.event.addListener(marker1, 'mouseover', function() {
												marker1.setIcon(icon2);
											});
											google.maps.event.addListener(marker1, 'mouseout', function() {
												marker1.setIcon(icon1);
											});
											//infowindow1.open(map,marker1);
										}
									   load();
									//]]>
									</script>
								
								
						<?php
							}
						?>
					
        	</div><!-- #content -->

        	<div class="sidebar">
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
			</div>
		

		</div><!-- #content_wr -->
	</div><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>