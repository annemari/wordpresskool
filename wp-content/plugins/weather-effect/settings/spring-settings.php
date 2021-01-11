<!--Spring Falls Settings -->
		<div id="spring_weather_effect" class="tab-content">
			<!-- Spring Effect Falls Settings -->
			<div id="spring_effect_sh"><br>
				<p class="bg-title"><?php _e('Spring Effect Settings', WE_TXTD); ?></p>
				<!-- icons Start -->
				<div>
					<div class="checkbox">
						<label style="font-size: 1.2em">
							<?php if(isset($weather_effect_settings['leaf_spring'])) $leaf_spring = $weather_effect_settings['leaf_spring']; else $leaf_spring = ""; ?>
							<input type="checkbox" id="leaf_spring" name="leaf_spring" value="leaf_spring" <?php if($leaf_spring == "leaf_spring") echo "checked"; ?>>
							<span class="cr"><i class="cr-icon fa fa-check"></i></span>
								<?php _e('1. Spring Leaves', WE_TXTD); ?>
						</label>
					</div>
					<div class="spring_leaf_sh">
						<label class="lower_label"> <?php _e('Select spring Falling Leaf', WE_TXTD); ?></label>
						<?php if(isset($weather_effect_settings['spring_leaf'])) $spring_leaf = $weather_effect_settings['spring_leaf']; else $spring_leaf = "spring-leaf1"; ?>
						<select id="spring_leaf" name="spring_leaf" class="form-control" style="margin-left: 25px; width: 300px;">
							<option value="spring-leaf1" <?php if($spring_leaf == "spring-leaf1") echo "selected=selected"; ?>> <?php _e('Spring Leaf 1', WE_TXTD); ?></option>
						</select>
						<p class="lower_label"><a href="https://awplife.com/account/signup/weather-effect-premium" target="_blank"><?php _e('For More Spring Leaves Buy Now', WE_TXTD); ?></a></p>
					</div>
				</div><br>
				<!-- icons  End-->
				
				<div class="row" style="padding-left: 10px;">&nbsp;&nbsp;&nbsp;
					<label class="bg_lower_label"><?php _e('2. Minimum Fall Size On page', WE_TXTD); ?></label>
					<?php if(isset($weather_effect_settings['spring_min_size_leaf'])) $spring_min_size_leaf = $weather_effect_settings['spring_min_size_leaf']; else $spring_min_size_leaf = "20"; ?>			
					<p class="range-slider padding_settings">
						<input id="spring_min_size_leaf" name="spring_min_size_leaf" class="range-slider__range" type="range" value="<?php echo $spring_min_size_leaf; ?>" min="1" step="1" max="30">
						<span class="range-slider__value">0</span>
					</p>
				</div>
				<div class="row" style="padding-left: 10px;">&nbsp;&nbsp;&nbsp;
					<label class="bg_lower_label"><?php _e('3. Maximum Fall Size On page', WE_TXTD); ?></label>
					<?php if(isset($weather_effect_settings['spring_max_size_leaf'])) $spring_max_size_leaf = $weather_effect_settings['spring_max_size_leaf']; else $spring_max_size_leaf = "30"; ?>			
					<p class="range-slider padding_settings">
						<input id="spring_max_size_leaf" name="spring_max_size_leaf" class="range-slider__range" type="range" value="<?php echo $spring_max_size_leaf; ?>" min="10" step="1" max="200">
						<span class="range-slider__value">0</span>
					</p>
				</div>
				<div class="row" style="padding-left: 10px;">&nbsp;&nbsp;&nbsp;
					<label class="bg_lower_label"><?php _e('4. Falls On page', WE_TXTD); ?></label>
					<?php if(isset($weather_effect_settings['spring_flakes_leaf'])) $spring_flakes_leaf = $weather_effect_settings['spring_flakes_leaf']; else $spring_flakes_leaf = "5"; ?>			
					<p class="range-slider padding_settings">
						<input id="spring_flakes_leaf" name="spring_flakes_leaf" class="range-slider__range" type="range" value="<?php echo $spring_flakes_leaf; ?>" min="1" step="1" max="100">
						<span class="range-slider__value">0</span>
					</p>
				</div>
				<div class="row" style="padding-left: 10px;">&nbsp;&nbsp;&nbsp;
					<label class="bg_lower_label"><?php _e('5. Falls Speed On page', WE_TXTD); ?></label>
					<?php if(isset($weather_effect_settings['spring_speed'])) $spring_speed = $weather_effect_settings['spring_speed']; else $spring_speed = "5"; ?>			
					<p class="range-slider padding_settings">
						<input id="spring_speed" name="spring_speed" class="range-slider__range" type="range" value="<?php echo $spring_speed; ?>" min="1" step="1" max="10">
						<span class="range-slider__value">0</span>
					</p>
				</div>
			</div>
		</div>	
	<!-- spring Falls Settings End -->
<script>
<?php if($weather_occasion == "spring_check") { ?>
// spring Effect Start
jQuery(document).ready(function(){
	<?php if($leaf_spring == "leaf_spring") { ?>
		snowFall.snow(document.body, {
			image : "<?php echo WE_PLUGIN_PATH ?>assets/images/spring/<?php echo $spring_leaf; ?>.png",
			minSize: <?php echo $spring_min_size_leaf; ?>, 
			maxSize: <?php echo $spring_max_size_leaf; ?>,
			flakeCount: <?php echo $spring_flakes_leaf; ?>,
			maxSpeed: <?php echo $spring_speed; ?>
		});
	<?php } ?>
}); 
// spring Effect End
<?php } ?> 

// Checkbox Show And Hide Settings Start
var leaf_spring = jQuery('input[name="leaf_spring"]:checked').val();
if(jQuery('#leaf_spring').is(":checked")) {
	jQuery('.spring_leaf_sh').show();
} else {
	jQuery('.spring_leaf_sh').hide();
}

jQuery(document).ready(function() {
	jQuery('input[name="leaf_spring"]').change(function(){
		var leaf_spring = jQuery('input[name="leaf_spring"]:checked').val();
		if(jQuery(this).is(":checked")) {
			jQuery('.spring_leaf_sh').show();
		}else{
			jQuery('.spring_leaf_sh').hide();
		}
	});
});
// Checkbox Show And Hide Settings	End
</script>