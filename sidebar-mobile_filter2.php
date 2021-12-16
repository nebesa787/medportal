<?php 

	

	$cat_name = single_cat_title( '', false );
	$cat_id = get_cat_ID( $cat_name );

	$cat = get_category(get_query_var('cat'),false);
	
	$cat_parent = $cat->parent;
	
	
	
	$cat_root_id = root_category_id($cat);
	if (empty($cat_root_id)){
		$cat_post = get_the_category($post->ID);
		$cat_post_temp = $cat_post[0]->cat_ID;
		$cat_root_id = root_category_id($cat_post_temp);
	}
		
	
	
?>

	<?php if ($cat_root_id == 19) { ?>
		<div class="btn_fil">
			<button>ПОДОБРАТЬ ПО ПАРАМЕТРАМ</button>
		</div>
		<div class="filter mobile">
			<form id="med_s_m" method="post">
			
				<?php
					$filter_list = getfilter_list_medcentr_select_city();
						foreach ($filter_list as $filter) {
							if ($filter['name']){
				?>
					<fieldset>
						<legend><? echo $filter['label']; ?></legend>
							<select name="<? echo $filter['name']; ?>" id="<? echo $filter['name']; ?>_m">
										
							
										<?php
										$filter_link = $filter['name'];
										$flink = $filter['slug'];
										$fmain = $filter['main'];
										foreach ($filter["choices"] as $key=>$variant) {
											if($variant){
												if ($flink == get_category_link( $key )) { 											
													$selected = 'selected="selected"'; 
												//} elseif ($fmain &&($variant == 'Минск')){ 
	//												$selected = 'selected="selected"'; 
												} else { 
													$selected = ''; 
												}
												echo '<option data-city_name="'.$variant.'" value="'.get_category_link( $key ).'" '.$selected.'>'.$variant.'</option>';
											}
									    }
						?>
							</select>
					</fieldset>
					<?php } } ?>		
				<?php $filter_list = getfilter_list_med_select(); ?>
				<?php foreach ($filter_list as $filter) { ?>
					<fieldset>
						<legend><?php echo $filter['label']; ?></legend>
						<select name="<?php echo $filter['name']; ?>" id="<?php echo $filter['name']; ?>_m">
							<option value="" selected="selected">Все</option>
							<?php $filter_link = $filter['name'];
								foreach ($filter["choices"] as $variant) {
									
									if ($_POST[$filter_link] == $variant) { $selected = 'selected="selected"'; } else { $selected = ''; }
									if($variant){	
										echo '<option value="'.$variant.'" '.$selected.'>'.$variant.'</option>';
									}
								}
							?>
						</select>
					</fieldset>
				<?php }?>	
				<?php $filter_list = getfilter_list_medcentr_checkbox();?>
				<?php foreach ($filter_list as $filter) { ?>
						<fieldset>
							<legend><?php echo $filter['label']; ?></legend>
							<ul>
								<?php
									$filter_link = $filter['name'];
									$count_to_hide = 0;
									foreach ($filter["choices"] as $variant) {
										$count_to_hide++;
										if ($_POST[$filter_link] != '') {
											if (in_array($variant, $_POST[$filter_link])) { $selected = 'checked="checked"'; }
											else { $selected = ''; }
										}
										if ($count_to_hide == 5) { echo '</ul><ul class="block_hide">'; }
											echo '<li><input type="checkbox" name="'.$filter["name"].'[]" id="'.$filter["name"].'-'.$count_to_hide.'_m" value="'.$variant.'" '.$selected.'><label for="'.$filter["name"].'-'.$count_to_hide.'_m">'.$variant.'</label></li>';
										if (($count_to_hide == sizeof($filter["choices"]))&&($count_to_hide > 5)) { echo '</ul><span class="show_more"><a style="cursor: pointer;">Еще</a></span>'; }
									}
								if ($count_to_hide < 5){ ?></ul><?php } ?>
						</fieldset>
				<?php } ?>
				<input type="submit" value="показать" class="btn">
				</form>
				</div>
			<?php } ?>
					
					
					<?php //if(($cat_id == 20)||($cat_parent == 20)) { ?>
					<?php if ($cat_root_id == 20) { ?>
					
						<div class="btn_fil">
							<button>Подобрать врача</button>
						</div>
						<div class="filter mobile">
							<form id="vr_s_m" method="post">
								<?php
									$filter_list = getfilter_list_vrachi_select_city();
									foreach ($filter_list as $filter) {
									if ($filter['name']){
								?>
									<fieldset>
										<legend><? echo $filter['label']; ?></legend>
										<select name="<? echo $filter['name']; ?>" id="<? echo $filter['name']; ?>_m">
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
										<legend><?php echo $filter['label']; ?></legend>
										<ul>
											<?php
											$filter_link = $filter['name'];
											$count_to_hide = 0;
											foreach ($filter["choices"] as $variant) {
												$count_to_hide++;
												if ($_POST[$filter_link] != '') {
													if (in_array($variant, $_POST[$filter_link])) { $selected = 'checked="checked"'; }
													else { $selected = ''; }
												}
                                                if ($count_to_hide == 5) { echo '</ul><ul class="block_hide">'; }
												echo '<li><input type="checkbox" name="'.$filter["name"].'[]" id="'.$filter["name"].'-'.$count_to_hide.'_m" value="'.$variant.'" '.$selected.'><label for="'.$filter["name"].'-'.$count_to_hide.'_m">'.$variant.'</label></li>';
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
					
						<?php } ?>
						
						
						