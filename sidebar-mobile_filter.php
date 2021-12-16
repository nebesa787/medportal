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
		<h4 class="title1">ПОДОБРАТЬ ПО ПАРАМЕТРАМ</h4>
		<div class="filter">
			<form action="<?php echo home_url( '/meduchrezhdeniya/' ) ?>">
				<?php $filter_list = getfilter_list_medcentr_select_city(); ?>
				<?php foreach ($filter_list as $filter) { ?>
					<fieldset>
						<legend><?php echo $filter['label']; ?></legend>
						<select name="<?php echo $filter['name']; ?>" id="<?php echo $filter['name']; ?>">
						<?php
							$filter_link = $filter['name'];
							$flink = $_GET[$filter_link];
							if ($flink == '') {
								$flink = 'Минск';
							}
							foreach ($filter["choices"] as $variant) {
								if ($flink == $variant) { 
									$selected = 'selected="selected"'; 
								} else { 
									$selected = ''; 
								}
								echo '<option value="'.$variant.'" '.$selected.'>'.$variant.'</option>';
							}
						?>
						</select>
					</fieldset>
					<?php }	?>		
				<?php $filter_list = getfilter_list_med_select(); ?>
				<?php foreach ($filter_list as $filter) { ?>
					<fieldset>
						<legend><?php echo $filter['label']; ?></legend>
						<select name="<?php echo $filter['name']; ?>" id="<?php echo $filter['name']; ?>">
							<option value="" selected="selected">Все</option>
							<?php $filter_link = $filter['name'];
								foreach ($filter["choices"] as $variant) {
									if ($_GET[$filter_link] == $variant) { $selected = 'selected="selected"'; } else { $selected = ''; }
									echo '<option value="'.$variant.'" '.$selected.'>'.$variant.'</option>';
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
										if ($_GET[$filter_link] != '') {
											if (in_array($variant, $_GET[$filter_link])) { $selected = 'checked="checked"'; }
											else { $selected = ''; }
										}
										if ($count_to_hide == 5) { echo '</ul><ul class="block_hide">'; }
										echo '<li><input type="checkbox" name="'.$filter["name"].'[]" id="'.$filter["name"].'-'.$count_to_hide.'" value="'.$variant.'" '.$selected.'><label for="'.$filter["name"].'-'.$count_to_hide.'">'.$variant.'</label></li>';
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
					
						<h4 class="title1">Подобрать врача</h4>
						<div class="filter">
							<form action="<?php echo home_url( '/vrachi/' ) ?>">
								<?php
								
								$filter_list = getfilter_list_medcentr_select_city();
								foreach ($filter_list as $filter) {
									?>
									<fieldset>
										<legend><?php echo $filter['label']; ?></legend>
										<select name="<?php echo $filter['name']; ?>" id="<?php echo $filter['name']; ?>">
											<?php
											$filter_link = $filter['name'];
											$flink = $_GET[$filter_link];
											if ($flink == '') {
												$flink = 'Минск';
											}
											foreach ($filter["choices"] as $variant) {
												if ($flink == $variant) { 
													$selected = 'selected="selected"'; 
												} else { 
													$selected = ''; 
												}
												echo '<option value="'.$variant.'" '.$selected.'>'.$variant.'</option>';
											}
											?>
										</select>
									</fieldset>
									<?php
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
												if ($_GET[$filter_link] != '') {
													if (in_array($variant, $_GET[$filter_link])) { $selected = 'checked="checked"'; }
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
					
						<?php } ?>
						
						
						