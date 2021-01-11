<div id="winter_weather_effect">
	<div class="row">&nbsp;&nbsp;&nbsp;
		<p class="bg-title"><?php _e('Winter Falls Types', WE_TXTD); ?> </p>
		<?php if(isset($weather_effect_settings['snow_types'])) $snow_types = $weather_effect_settings['snow_types']; else $snow_types = "winter_snow"; ?>
		<p class="col-xs-6 switch-field em_size_field padding_settings">
			<input class="widefat" id="snow_types1" name="snow_types" type="radio" value="winter_snow" <?php if($snow_types == "winter_snow") echo "checked=checked"; ?>>
			<label for="snow_types1"><?php _e('Snows', WE_TXTD); ?></label>
			<input class="widefat" id="snow_types2" name="snow_types" type="radio" value="falling_snow" <?php if($snow_types == "falling_snow") echo "checked=checked"; ?>>
			<label for="snow_types2"><?php _e('Snows Flacks', WE_TXTD); ?></label>
		</p>
	</div>
	
	<!-- Christmas Snow Falls Settings -->
	<div id="snow_winter" class="tab-content">
		<p class="bg-title"><?php _e('1. Snow Falls Settings', WE_TXTD); ?></p>
		<div class="row" style="padding-left: 20px;">&nbsp;&nbsp;&nbsp;
			<label for=""><?php _e('A. Ice Cube Settings', WE_TXTD); ?></label><br>
			<?php if(isset($weather_effect_settings['ice_cube'])) $ice_cube = $weather_effect_settings['ice_cube']; else $ice_cube = "true"; ?>			
			<p class="col-xs-6 switch-field em_size_field padding_settings">
				<input class="widefat" id="ice_cube1" name="ice_cube" type="radio" value="true" <?php if($ice_cube == "true") echo "checked=checked"; ?>>
				<label for="ice_cube1"><?php _e('Round', WE_TXTD); ?></label>
				<input class="widefat" id="ice_cube2" name="ice_cube" type="radio" value="false" <?php if($ice_cube == "false") echo "checked=checked"; ?>>
				<label for="ice_cube2"><?php _e('Square', WE_TXTD); ?></label>
			</p>
		</div><br>
		<div class="row" style="padding-left: 20px;">&nbsp;&nbsp;&nbsp;
			<label for=""><?php _e('B. Minimum Snow Size On page', WE_TXTD); ?></label>
			<?php if(isset($weather_effect_settings['min_size_christmas'])) $min_size_christmas = $weather_effect_settings['min_size_christmas']; else $min_size_christmas = "1"; ?>			
			<p class="range-slider padding_settings">
				<input id="min_size_christmas" name="min_size_christmas" class="range-slider__range" type="range" value="<?php echo $min_size_christmas; ?>" min="1" step="1" max="5">
				<span class="range-slider__value">0</span>
			</p>
		</div>	
		<div class="row" style="padding-left: 20px;">&nbsp;&nbsp;&nbsp;
			<label for=""><?php _e('C. Maximum Snow Size On page', WE_TXTD); ?></label>
			<?php if(isset($weather_effect_settings['max_size_christmas'])) $max_size_christmas = $weather_effect_settings['max_size_christmas']; else $max_size_christmas = "5"; ?>			
			<p class="range-slider padding_settings">
				<input id="max_size_christmas" name="max_size_christmas" class="range-slider__range" type="range" value="<?php echo $max_size_christmas; ?>" min="10" step="1" max="100">
				<span class="range-slider__value">0</span>
			</p>
		</div>
		<div class="row" style="padding-left: 20px;">&nbsp;&nbsp;&nbsp;
			<label for=""><?php _e('D. Snow Flakes Count', WE_TXTD); ?></label>
			<?php if(isset($weather_effect_settings['flake_christmas'])) $flake_christmas = $weather_effect_settings['flake_christmas']; else $flake_christmas = "5"; ?>			
			<p class="range-slider padding_settings">
				<input id="flake_christmas" name="flake_christmas" class="range-slider__range" type="range" value="<?php echo $flake_christmas; ?>" min="1" step="1" max="100">
				<span class="range-slider__value">0</span>
			</p>
		</div>
	</div>
	<!--  Christmas Snow Falls Settings End -->

	<!--Winter Falling Settings -->
	<div id="snow_falling" class="tab-content">
		<p class="bg-title"><?php _e('2. Falling Snows Flacks Settings', WE_TXTD); ?> </p>
		<div class="row" style="padding-left: 20px;">&nbsp;&nbsp;&nbsp;
			<label for=""><?php _e('A. Minimum Snows Flacks Size On page', WE_TXTD); ?></label>
			<?php if(isset($weather_effect_settings['min_size_falling'])) $min_size_falling = $weather_effect_settings['min_size_falling']; else $min_size_falling = "3"; ?>			
			<p class="range-slider padding_settings">
				<input id="min_size_falling" name="min_size_falling" class="range-slider__range" type="range" value="<?php echo $min_size_falling; ?>" min="1" step="1" max="5">
				<span class="range-slider__value">0</span>
			</p>
		</div>
		<div class="row" style="padding-left: 20px;">&nbsp;&nbsp;&nbsp;
			<label for=""><?php _e('B. Maximum Snows Flacks Size On page', WE_TXTD); ?></label>
			<?php if(isset($weather_effect_settings['max_size_falling'])) $max_size_falling = $weather_effect_settings['max_size_falling']; else $max_size_falling = "30"; ?>			
			<p class="range-slider padding_settings">
				<input id="max_size_falling" name="max_size_falling" class="range-slider__range" type="range" value="<?php echo $max_size_falling; ?>" min="10" step="1" max="50">
				<span class="range-slider__value">0</span>
			</p>
		</div>
		<div class="row" style="padding-left: 20px;">&nbsp;&nbsp;&nbsp;
			<label for=""><?php _e('C. Snows Flacks Falls Time Duration', WE_TXTD); ?></label>
			<?php if(isset($weather_effect_settings['snow_falling_time'])) $snow_falling_time = $weather_effect_settings['snow_falling_time']; else $snow_falling_time = "500"; ?>			
			<p class="range-slider padding_settings">
				<input id="snow_falling_time" name="snow_falling_time" class="range-slider__range" type="range" value="<?php echo $snow_falling_time; ?>" min="300" step="10" max="1000">
				<span class="range-slider__value">0</span>
			</p>
		</div>	
		<div class="row" style="padding-left: 20px;">&nbsp;&nbsp;&nbsp;
			<label for=""><?php _e('D. Select Flacks Color', WE_TXTD); ?></label><br><br>&nbsp;&nbsp;&nbsp;&nbsp;
			<?php if(isset($weather_effect_settings['snow_falling_color'])) $snow_falling_color = $weather_effect_settings['snow_falling_color']; else $snow_falling_color = "FFFFFF"; ?>			
			<input type="text" class="form-control" id="snow_falling_color" name="snow_falling_color" placeholder="chose form color" value="<?php echo $snow_falling_color; ?>"></br></br>
		</div><br>
	</div>
	<!--  Snow Falling Settings End -->
</div>
<style>
	.we-flake {
		color: <?php echo $snow_falling_color; ?> !important;
	}
</style>
<script>
	//1. Winter Snow Start
	<?php if($weather_occasion == "winter_check") { ?>
		<?php if($snow_types == "winter_snow") { ?>
			jQuery(document).ready(function(){
				jQuery(document).snowfall({deviceorientation : false,
					round : <?php echo $ice_cube; ?>, //snow structure Round or Cube
					minSize: <?php echo $min_size_christmas ; ?>, // snow size
					maxSize: <?php echo $max_size_christmas ; ?>,  // snow cube size
					flakeCount : <?php echo $flake_christmas ; ?> // snow cube quantity
				}); 
			});
		<?php } ?>
		//Winter Snow End
		
		//2. Winter Falling Effect Start
		<?php if($snow_types == "falling_snow") { ?>
			jQuery(document).ready( function(){
				jQuery.fn.snow({
					minSize:<?php echo $min_size_falling; ?>,
					maxSize:<?php echo $max_size_falling; ?>,
					newOn:<?php echo $snow_falling_time; ?>,
					flakeColor:'<?php echo $snow_falling_color; ?>'
				});
			});
		<?php } ?> 
		
	<?php } ?> 
	//Winter Falling End
	
	//color-picker
	(function( jQuery ) {
		jQuery(function() {
			// Add Color Picker to all inputs that have 'color-field' class
			jQuery('#snow_falling_color').wpColorPicker();
		});
	})( jQuery );
			
	//snow effet hide and show 
	var snow_types = jQuery('input[name="snow_types"]:checked').val();
	if(snow_types == "winter_snow") {
		jQuery('#snow_winter').show();	
		jQuery('#snow_falling').hide();	
	}
	if(snow_types == "falling_snow") {
		jQuery('#snow_winter').hide();	
		jQuery('#snow_falling').show();	
	}
	
	//on change effect
	jQuery(document).ready(function() {
		// snow effet hide and show 
		jQuery('input[name="snow_types"]').change(function(){
			var snow_types = jQuery('input[name="snow_types"]:checked').val();
			if(snow_types == "winter_snow") {
				jQuery('#snow_winter').show();
				jQuery('#snow_falling').hide();
			}
			if(snow_types == "falling_snow") {
				jQuery('#snow_winter').hide();
				jQuery('#snow_falling').show();
			}
		})
	});
</script>