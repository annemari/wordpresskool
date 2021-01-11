<!--Halloween Falls Settings -->
		<div id="halloween_weather_effect" class="tab-content">
			<!-- Halloween Effect Falls Settings -->
			<div id="halloween_effect_sh"><br>
				<p class="bg-title"><?php _e('Halloween Effect Settings', WE_TXTD); ?></p>
				<!-- icons Start -->
					<div>
						<div class="checkbox">
							<label style="font-size: 1.2em">
								<?php if(isset($weather_effect_settings['ghost'])) $ghost = $weather_effect_settings['ghost']; else $ghost = ""; ?>
								<input type="checkbox" id="ghost" name="ghost" value="ghost" <?php if($ghost == "ghost") echo "checked"; ?>>
								<span class="cr"><i class="cr-icon fa fa-check"></i></span>
									<?php _e('1. Halloween Ghost', WE_TXTD); ?>
							</label>
						</div>
						<div class="halloween_ghost_sh">
							<div>
								<label class="lower_label"> <?php _e('Select Halloween Falling Ghost', WE_TXTD); ?></label>
								<?php if(isset($weather_effect_settings['halloween_ghost'])) $halloween_ghost = $weather_effect_settings['halloween_ghost']; else $halloween_ghost = "ghost1"; ?>
								<select id="halloween_ghost" name="halloween_ghost" class="form-control" style="margin-left: 25px; width: 300px;">
									<option value="ghost1" <?php if($halloween_ghost == "ghost1") echo "selected=selected"; ?>> <?php _e('Ghost 1', WE_TXTD); ?></option>
								</select>
							</div>
						</div>
					</div>
					<div>	
						<div class="checkbox">
							<label style="font-size: 1.2em">
								<?php if(isset($weather_effect_settings['bats'])) $bats = $weather_effect_settings['bats']; else $bats = ""; ?>
								<input type="checkbox" id="bats" name="bats" value="bats" <?php if($bats == "bats") echo "checked"; ?>>
								<span class="cr"><i class="cr-icon fa fa-check"></i></span>
									<?php _e('2. Halloween Bats', WE_TXTD); ?>
							</label>
						</div>
						<div class="halloween_bats_sh">
							<label class="lower_label"> <?php _e('Select Halloween Falling Bats', WE_TXTD); ?></label>
							<?php if(isset($weather_effect_settings['halloween_bats'])) $halloween_bats = $weather_effect_settings['halloween_bats']; else $halloween_bats = "bats1"; ?>
							<select id="halloween_bats" name="halloween_bats" class="form-control" style="margin-left: 25px; width: 300px;">
								<option value="bats1" <?php if($halloween_bats == "bats1") echo "selected=selected"; ?>> <?php _e('Bats 1', WE_TXTD); ?></option>
							</select>
						</div>
					</div>
					<div>	
						<div class="checkbox">
							<label style="font-size: 1.2em">
								<?php if(isset($weather_effect_settings['moon'])) $moon = $weather_effect_settings['moon']; else $moon = ""; ?>
								<input type="checkbox" id="moon" name="moon" value="moon" <?php if($moon == "moon") echo "checked"; ?>>
								<span class="cr"><i class="cr-icon fa fa-check"></i></span>
									<?php _e('3. Halloween Moon', WE_TXTD); ?> 
							</label>
						</div>
						<div class="halloween_moon_sh">
							<label class="lower_label"> <?php _e('Select Halloween Falling Moon', WE_TXTD); ?></label>
							<?php if(isset($weather_effect_settings['halloween_moon'])) $halloween_moon = $weather_effect_settings['halloween_moon']; else $halloween_moon = "moon1"; ?>
							<select id="halloween_moon" name="halloween_moon" class="form-control" style="margin-left: 25px; width: 300px;">
								<option value="moon1" <?php if($halloween_moon == "moon1") echo "selected=selected"; ?>> <?php _e('Moon 1', WE_TXTD); ?></option>
							</select>
						</div>
					</div>	
					<div>	
						<div class="checkbox">
							<label style="font-size: 1.2em">
								<?php if(isset($weather_effect_settings['pumpkin'])) $pumpkin = $weather_effect_settings['pumpkin']; else $pumpkin = ""; ?>
								<input type="checkbox" id="pumpkin" name="pumpkin" value="pumpkin" <?php if($pumpkin == "pumpkin") echo "checked"; ?>>
								<span class="cr"><i class="cr-icon fa fa-check"></i></span>
									<?php _e('4. Halloween Pumpkin', WE_TXTD); ?>
							</label>
						</div>
						<div class="halloween_pumpkin_sh">
							<label class="lower_label"> <?php _e('Select Halloween Falling Pumpkin', WE_TXTD); ?></label>
							<?php if(isset($weather_effect_settings['halloween_pumpkin'])) $halloween_pumpkin = $weather_effect_settings['halloween_pumpkin']; else $halloween_pumpkin = "pumpkin1"; ?>
							<select id="halloween_pumpkin" name="halloween_pumpkin" class="form-control" style="margin-left: 25px; width: 300px;">
								<option value="pumpkin1" <?php if($halloween_pumpkin == "pumpkin1") echo "selected=selected"; ?>> <?php _e('Pumpkin 1', WE_TXTD); ?></option>
							</select>
						</div>
					</div>	
					<div>	
						<div class="checkbox">
							<label style="font-size: 1.2em">
								<?php if(isset($weather_effect_settings['web'])) $web = $weather_effect_settings['web']; else $web = ""; ?>
								<input type="checkbox" id="web" name="web" value="web" <?php if($web == "web") echo "checked"; ?>>
								<span class="cr"><i class="cr-icon fa fa-check"></i></span>
									<?php _e('5. Halloween Web', WE_TXTD); ?>
							</label>
						</div>
						<div class="halloween_web_sh">
							<label class="lower_label"> <?php _e('Select Halloween Falling Web', WE_TXTD); ?></label>
							<?php if(isset($weather_effect_settings['halloween_web'])) $halloween_web = $weather_effect_settings['halloween_web']; else $halloween_web = "web1"; ?>
							<select id="halloween_web" name="halloween_web" class="form-control" style="margin-left: 25px; width: 300px;">
								<option value="web1" <?php if($halloween_web == "web1") echo "selected=selected"; ?>> <?php _e('Web 1', WE_TXTD); ?></option>
							</select>
						</div>
					</div>	
					<div>	
						<div class="checkbox">
							<label style="font-size: 1.2em">
								<?php if(isset($weather_effect_settings['witch'])) $witch = $weather_effect_settings['witch']; else $witch = ""; ?>
								<input type="checkbox" id="witch" name="witch" value="witch" <?php if($witch == "witch") echo "checked"; ?>>
								<span class="cr"><i class="cr-icon fa fa-check"></i></span>
									<?php _e('6. Halloween Witch', WE_TXTD); ?>
							</label>
						</div>
						<div class="halloween_witch_sh">
							<label class="lower_label"> <?php _e('Select Halloween Falling Witch', WE_TXTD); ?></label>
							<?php if(isset($weather_effect_settings['halloween_witch'])) $halloween_witch = $weather_effect_settings['halloween_witch']; else $halloween_witch = "witch1"; ?>
							<select id="halloween_witch" name="halloween_witch" class="form-control" style="margin-left: 25px; width: 300px;">
								<option value="witch1" <?php if($halloween_witch == "witch1") echo "selected=selected"; ?>> <?php _e('Witch 1', WE_TXTD); ?></option>
							</select>
						</div>
					</div>	
				</div><br>
				<!-- icons  End-->	
				
				<div class="row" style="padding-left: 10px;">&nbsp;&nbsp;&nbsp;
					<label class="bg_lower_label"><?php _e('2. Minimum Fall Size On page', WE_TXTD); ?></label>
					<?php if(isset($weather_effect_settings['halloween_min_size_leaf'])) $halloween_min_size_leaf = $weather_effect_settings['halloween_min_size_leaf']; else $halloween_min_size_leaf = "20"; ?>			
					<p class="range-slider padding_settings">
						<input id="halloween_min_size_leaf" name="halloween_min_size_leaf" class="range-slider__range" type="range" value="<?php echo $halloween_min_size_leaf; ?>" min="1" step="1" max="30">
						<span class="range-slider__value">0</span>
					</p>
				</div>	
				<div class="row" style="padding-left: 10px;">&nbsp;&nbsp;&nbsp;
					<label class="bg_lower_label"><?php _e('3. Maximum Fall Size On page', WE_TXTD); ?></label>
					<?php if(isset($weather_effect_settings['halloween_max_size_leaf'])) $halloween_max_size_leaf = $weather_effect_settings['halloween_max_size_leaf']; else $halloween_max_size_leaf = "50"; ?>			
					<p class="range-slider padding_settings">
						<input id="halloween_max_size_leaf" name="halloween_max_size_leaf" class="range-slider__range" type="range" value="<?php echo $halloween_max_size_leaf; ?>" min="10" step="1" max="200">
						<span class="range-slider__value">0</span>
					</p>
				</div>
				<div class="row" style="padding-left: 10px;">&nbsp;&nbsp;&nbsp;
					<label class="bg_lower_label"><?php _e('4. Falls On page', WE_TXTD); ?></label>
					<?php if(isset($weather_effect_settings['halloween_flakes_leaf'])) $halloween_flakes_leaf = $weather_effect_settings['halloween_flakes_leaf']; else $halloween_flakes_leaf = "5"; ?>			
					<p class="range-slider padding_settings">
						<input id="halloween_flakes_leaf" name="halloween_flakes_leaf" class="range-slider__range" type="range" value="<?php echo $halloween_flakes_leaf; ?>" min="1" step="1" max="100">
						<span class="range-slider__value">0</span>
					</p>
				</div>
				<div class="row" style="padding-left: 10px;">&nbsp;&nbsp;&nbsp;
					<label class="bg_lower_label"><?php _e('5. Falls Speed On page', WE_TXTD); ?></label>
					<?php if(isset($weather_effect_settings['halloween_speed'])) $halloween_speed = $weather_effect_settings['halloween_speed']; else $halloween_speed = "5"; ?>			
					<p class="range-slider padding_settings">
						<input id="halloween_speed" name="halloween_speed" class="range-slider__range" type="range" value="<?php echo $halloween_speed; ?>" min="1" step="1" max="10">
						<span class="range-slider__value">0</span>
					</p>
				</div>
			</div>
	<!-- Halloween Falls Settings End -->
<script>
<?php if($weather_occasion == "halloween_check") { ?>
// Halloween Effect Start
jQuery(document).ready(function(){
	<?php if($ghost == "ghost") { ?>
		snowFall.snow(document.body, {
			image : "<?php echo WE_PLUGIN_PATH ?>assets/images/halloween/<?php echo $halloween_ghost; ?>.png",
			minSize: <?php echo $halloween_min_size_leaf; ?>, 
			maxSize: <?php echo $halloween_max_size_leaf; ?>,
			flakeCount: <?php echo $halloween_flakes_leaf; ?>,
			maxSpeed: <?php echo $halloween_speed; ?>
		});
	<?php } ?>
	<?php if($bats == "bats") { ?>
		snowFall.snow(document.body, {
			image : "<?php echo WE_PLUGIN_PATH ?>assets/images/halloween/<?php echo $halloween_bats; ?>.png",
			minSize: <?php echo $halloween_min_size_leaf; ?>, 
			maxSize: <?php echo $halloween_max_size_leaf; ?>,
			flakeCount: <?php echo $halloween_flakes_leaf; ?>,
			maxSpeed: <?php echo $halloween_speed; ?>
		});
	<?php } ?>
	<?php if($moon == "moon") { ?>
		snowFall.snow(document.body, {
			image : "<?php echo WE_PLUGIN_PATH ?>assets/images/halloween/<?php echo $halloween_moon; ?>.png",
			minSize: <?php echo $halloween_min_size_leaf; ?>, 
			maxSize: <?php echo $halloween_max_size_leaf; ?>,
			flakeCount: <?php echo $halloween_flakes_leaf; ?>,
			maxSpeed: <?php echo $halloween_speed; ?>
		});
	<?php } ?>
	<?php if($pumpkin == "pumpkin") { ?>
		snowFall.snow(document.body, {
			image : "<?php echo WE_PLUGIN_PATH ?>assets/images/halloween/<?php echo $halloween_pumpkin; ?>.png",
			minSize: <?php echo $halloween_min_size_leaf; ?>, 
			maxSize: <?php echo $halloween_max_size_leaf; ?>,
			flakeCount: <?php echo $halloween_flakes_leaf; ?>,
			maxSpeed: <?php echo $halloween_speed; ?>
		});
	<?php } ?>
	<?php if($web == "web") { ?>
		snowFall.snow(document.body, {
			image : "<?php echo WE_PLUGIN_PATH ?>assets/images/halloween/<?php echo $halloween_web; ?>.png",
			minSize: <?php echo $halloween_min_size_leaf; ?>, 
			maxSize: <?php echo $halloween_max_size_leaf; ?>,
			flakeCount: <?php echo $halloween_flakes_leaf; ?>,
			maxSpeed: <?php echo $halloween_speed; ?>
		});
	<?php } ?>
	<?php if($witch == "witch") { ?>
		snowFall.snow(document.body, {
			image : "<?php echo WE_PLUGIN_PATH ?>assets/images/halloween/<?php echo $halloween_witch; ?>.png",
			minSize: <?php echo $halloween_min_size_leaf; ?>, 
			maxSize: <?php echo $halloween_max_size_leaf; ?>,
			flakeCount: <?php echo $halloween_flakes_leaf; ?>,
			maxSpeed: <?php echo $halloween_speed; ?>
		});
	<?php } ?>
}); 
// Halloween Effect End
<?php } ?> 
	
// Checkbox Show And Hide Settings Start
//1. ghost
var ghost = jQuery('input[name="ghost"]:checked').val();
if(jQuery('#ghost').is(":checked")) {
	jQuery('.halloween_ghost_sh').show();
}else{
	jQuery('.halloween_ghost_sh').hide();
}

jQuery(document).ready(function() {
jQuery('input[name="ghost"]').change(function(){
	var ghost = jQuery('input[name="ghost"]:checked').val();
	if(jQuery(this).is(":checked")) {
		jQuery('.halloween_ghost_sh').show();
	}else{
		jQuery('.halloween_ghost_sh').hide();
	}
});
});
//2. bets
var bats = jQuery('input[name="bats"]:checked').val();
if(jQuery('#bats').is(":checked")) {
	jQuery('.halloween_bats_sh').show();
}else{
	jQuery('.halloween_bats_sh').hide();
}

jQuery(document).ready(function() {
jQuery('input[name="bats"]').change(function(){
	var bats = jQuery('input[name="bats"]:checked').val();
	if(jQuery(this).is(":checked")) {
		jQuery('.halloween_bats_sh').show();
	}else{
		jQuery('.halloween_bats_sh').hide();
	}
});
});
//3. moon
var moon = jQuery('input[name="moon"]:checked').val();
if(jQuery('#moon').is(":checked")) {
	jQuery('.halloween_moon_sh').show();
}else{
	jQuery('.halloween_moon_sh').hide();
}

jQuery(document).ready(function() {
jQuery('input[name="moon"]').change(function(){
	var moon = jQuery('input[name="moon"]:checked').val();
	if(jQuery(this).is(":checked")) {
		jQuery('.halloween_moon_sh').show();
	}else{
		jQuery('.halloween_moon_sh').hide();
	}
});
});
//4. pumpkin
var pumpkin = jQuery('input[name="pumpkin"]:checked').val();
if(jQuery('#pumpkin').is(":checked")) {
	jQuery('.halloween_pumpkin_sh').show();
}else{
	jQuery('.halloween_pumpkin_sh').hide();
}

jQuery(document).ready(function() {
jQuery('input[name="pumpkin"]').change(function(){
	var pumpkin = jQuery('input[name="pumpkin"]:checked').val();
	if(jQuery(this).is(":checked")) {
		jQuery('.halloween_pumpkin_sh').show();
	}else{
		jQuery('.halloween_pumpkin_sh').hide();
	}
});
});
//5. web
var web = jQuery('input[name="web"]:checked').val();
if(jQuery('#web').is(":checked")) {
	jQuery('.halloween_web_sh').show();
}else{
	jQuery('.halloween_web_sh').hide();
}
		
		jQuery(document).ready(function() {
			jQuery('input[name="web"]').change(function(){
				var web = jQuery('input[name="web"]:checked').val();
				if(jQuery(this).is(":checked")) {
					jQuery('.halloween_web_sh').show();
				}else{
					jQuery('.halloween_web_sh').hide();
				}
			});
		});
		//6. witch
		var witch = jQuery('input[name="witch"]:checked').val();
			if(jQuery('#witch').is(":checked")) {
				jQuery('.halloween_witch_sh').show();
			}else{
				jQuery('.halloween_witch_sh').hide();
			}
		
		jQuery(document).ready(function() {
			jQuery('input[name="witch"]').change(function(){
				var witch = jQuery('input[name="witch"]:checked').val();
				if(jQuery(this).is(":checked")) {
					jQuery('.halloween_witch_sh').show();
				}else{
					jQuery('.halloween_witch_sh').hide();
				}
			});
		});
		// Checkbox Show And Hide Settings	End
</script>	