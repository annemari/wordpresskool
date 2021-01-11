<?php 
	$weather_effect_settings = get_option('weather_effect_settings');
	
	$weather_occasion = $weather_effect_settings['weather_occasion'];	


	//Falls extra settings for every falls Start

	//spring falls
	$spring_min_size_leaf = $weather_effect_settings['spring_min_size_leaf'];
	$spring_max_size_leaf = $weather_effect_settings['spring_max_size_leaf'];
	$spring_flakes_leaf = $weather_effect_settings['spring_flakes_leaf']; 
	$spring_speed = $weather_effect_settings['spring_speed']; 
	//summer falls
	$summer_min_size_leaf = $weather_effect_settings['summer_min_size_leaf'];
	$summer_max_size_leaf = $weather_effect_settings['summer_max_size_leaf'];
	$summer_flakes_leaf = $weather_effect_settings['summer_flakes_leaf']; 
	$summer_speed = $weather_effect_settings['summer_speed']; 
	//Halloween falls
	$halloween_min_size_leaf = $weather_effect_settings['halloween_min_size_leaf'];
	$halloween_max_size_leaf = $weather_effect_settings['halloween_max_size_leaf'];
	$halloween_flakes_leaf = $weather_effect_settings['halloween_flakes_leaf']; 
	$halloween_speed = $weather_effect_settings['halloween_speed']; 
	//rain falls
	$rain_min_size_leaf = $weather_effect_settings['rain_min_size_leaf'];
	$rain_max_size_leaf = $weather_effect_settings['rain_max_size_leaf'];
	$rain_flakes_leaf = $weather_effect_settings['rain_flakes_leaf']; 
	$rain_speed = $weather_effect_settings['rain_speed']; 
	//thanksgiving falls
	$thanksgiving_min_size_leaf = $weather_effect_settings['thanksgiving_min_size_leaf'];
	$thanksgiving_max_size_leaf = $weather_effect_settings['thanksgiving_max_size_leaf'];
	$thanksgiving_flakes_leaf = $weather_effect_settings['thanksgiving_flakes_leaf']; 
	$thanksgiving_speed = $weather_effect_settings['thanksgiving_speed']; 
	//valentine falls
	$valentine_min_size_leaf = $weather_effect_settings['valentine_min_size_leaf'];
	$valentine_max_size_leaf = $weather_effect_settings['valentine_max_size_leaf'];
	$valentine_flakes_leaf = $weather_effect_settings['valentine_flakes_leaf']; 
	$valentine_speed = $weather_effect_settings['valentine_speed']; 
	//new year falls
	$newyear_min_size_leaf = $weather_effect_settings['newyear_min_size_leaf'];
	$newyear_max_size_leaf = $weather_effect_settings['newyear_max_size_leaf'];
	$newyear_flakes_leaf = $weather_effect_settings['newyear_flakes_leaf']; 
	$newyear_speed = $weather_effect_settings['newyear_speed']; 
	
	//Falls extra settings for every falls End
	//christmas_check Start
	if($weather_occasion == "christmas_check"){
		$christmas_types = $weather_effect_settings['christmas_types'];
			// 1. snow effect start
			if($christmas_types == "snow_effect") { 
				//Christmas falls
					$christmas_min_size_leaf = $weather_effect_settings['christmas_min_size_leaf'];
					$christmas_max_size_leaf = $weather_effect_settings['christmas_max_size_leaf'];
					$christmas_flakes_leaf = $weather_effect_settings['christmas_flakes_leaf']; 
					$christmas_speed = $weather_effect_settings['christmas_speed']; 
				//sub variable
					$christmas_ball = $weather_effect_settings['christmas_ball'];
					$christmas_bell = $weather_effect_settings['christmas_bell'];
					$christmas_candy = $weather_effect_settings['christmas_candy'];
					$christmas_gift = $weather_effect_settings['christmas_gift'];
					$christmas_snowman = $weather_effect_settings['christmas_snowman'];
					$christmas_snow_flake = $weather_effect_settings['christmas_snow_flake'];
				?>
				<script>
					jQuery(document).ready(function(){
						<?php if(isset($weather_effect_settings['ball'])) { ?>
							snowFall.snow(document.body, {
								image : "<?php echo WE_PLUGIN_PATH ?>assets/images/christmas/<?php echo $christmas_ball; ?>.png",
								minSize: <?php echo $christmas_min_size_leaf; ?>, 
								maxSize: <?php echo $christmas_max_size_leaf; ?>,
								flakeCount: <?php echo $christmas_flakes_leaf; ?>,
								maxSpeed: <?php echo $christmas_speed; ?>
							});
						<?php } ?>
						<?php if(isset($weather_effect_settings['bell'])) { ?>
							snowFall.snow(document.body, {
								image : "<?php echo WE_PLUGIN_PATH ?>assets/images/christmas/<?php echo $christmas_bell; ?>.png",
								minSize: <?php echo $christmas_min_size_leaf; ?>, 
								maxSize: <?php echo $christmas_max_size_leaf; ?>,
								flakeCount: <?php echo $christmas_flakes_leaf; ?>,
								maxSpeed: <?php echo $christmas_speed; ?>
							});
						<?php } ?>
						<?php if(isset($weather_effect_settings['candy'])) { ?>
							snowFall.snow(document.body, {
								image : "<?php echo WE_PLUGIN_PATH ?>assets/images/christmas/<?php echo $christmas_candy; ?>.png",
								minSize: <?php echo $christmas_min_size_leaf; ?>, 
								maxSize: <?php echo $christmas_max_size_leaf; ?>,
								flakeCount: <?php echo $christmas_flakes_leaf; ?>,
								maxSpeed: <?php echo $christmas_speed; ?>
							});
						<?php } ?>
						<?php if(isset($weather_effect_settings['gift'])) { ?>
							snowFall.snow(document.body, {
								image : "<?php echo WE_PLUGIN_PATH ?>assets/images/christmas/<?php echo $christmas_gift; ?>.png",
								minSize: <?php echo $christmas_min_size_leaf; ?>, 
								maxSize: <?php echo $christmas_max_size_leaf; ?>,
								flakeCount: <?php echo $christmas_flakes_leaf; ?>,
								maxSpeed: <?php echo $christmas_speed; ?>
							});
						<?php } ?>
						<?php if(isset($weather_effect_settings['snowman'])) { ?>
							snowFall.snow(document.body, {
								image : "<?php echo WE_PLUGIN_PATH ?>assets/images/christmas/<?php echo $christmas_snowman; ?>.png",
								minSize: <?php echo $christmas_min_size_leaf; ?>, 
								maxSize: <?php echo $christmas_max_size_leaf; ?>,
								flakeCount: <?php echo $christmas_flakes_leaf; ?>,
								maxSpeed: <?php echo $christmas_speed; ?>
							});
						<?php } ?>	
						<?php if(isset($weather_effect_settings['socks'])) { ?>
							snowFall.snow(document.body, {
								image : "<?php echo WE_PLUGIN_PATH ?>assets/images/christmas/<?php echo $christmas_socks; ?>.png",
								minSize: <?php echo $christmas_min_size_leaf; ?>, 
								maxSize: <?php echo $christmas_max_size_leaf; ?>,
								flakeCount: <?php echo $christmas_flakes_leaf; ?>,
								maxSpeed: <?php echo $christmas_speed; ?>
							});
						<?php } ?>
						<?php if(isset($weather_effect_settings['snow_flake'])) { ?>
							snowFall.snow(document.body, {
								image : "<?php echo WE_PLUGIN_PATH ?>assets/images/christmas/<?php echo $christmas_snow_flake; ?>.png",
								minSize: <?php echo $christmas_min_size_leaf; ?>, 
								maxSize: <?php echo $christmas_max_size_leaf; ?>,
								flakeCount: <?php echo $christmas_flakes_leaf; ?>,
								maxSpeed: <?php echo $christmas_speed; ?>
							});
						<?php } ?>	
					});
				</script>
	<?php   } 	//1. snow effect start End
		// 2. snowfall_master effect start
		 if($christmas_types == "snowfall_master") { 
			//A. round type Start
			$master_round = $weather_effect_settings['master_round'];
			$round_type = $weather_effect_settings['round_type'];
			$min_size_round = $weather_effect_settings['min_size_round'];
			$max_size_round = $weather_effect_settings['max_size_round'];
			// B. shdow type start
			$master_shadows = $weather_effect_settings['master_shadows'];
			$shadow_type = $weather_effect_settings['shadow_type'];
			$flakes_shadow = $weather_effect_settings['flakes_shadow'];
			?>
			<script>
				// A. round type Start
				<?php if($master_round == "true") { ?>
					jQuery(document).ready(function(){
						jQuery(document).snowfall({
							round : <?php echo $round_type; ?>, 
							minSize: <?php echo $min_size_round; ?>, 
							maxSize:<?php echo $max_size_round; ?>
						}); // add rounded
					});
				<?php } ?> 
				//round type End
			// B. shadow type start
				<?php if($master_shadows == "true") { ?>
					jQuery(document).ready(function(){
						snowFall.snow(document.body, {
							shadow : <?php echo $shadow_type; ?>,
							flakeCount:<?php echo $flakes_shadow; ?>
						});
					});
				<?php } ?> 
			// shadow type end
			</script>
		<?php } // 2. snowfall_master effect End
	}// christmas_check End 
	?>
	<script>
		//Autumn_check Weather effect Start
		<?php if($weather_occasion == "autumn_check") { 
			//autumn falls
			$autumn_min_size_leaf = $weather_effect_settings['autumn_min_size_leaf'];
			$autumn_max_size_leaf = $weather_effect_settings['autumn_max_size_leaf'];
			$autumn_flakes_leaf = $weather_effect_settings['autumn_flakes_leaf']; 
			$autumn_speed = $weather_effect_settings['autumn_speed']; 
			
			$autumn_leaf = $weather_effect_settings['autumn_leaf'];
		?>
			// Autumn Effect Start
				jQuery(document).ready(function(){
					<?php if(isset($weather_effect_settings['leaf'])) { ?>
						snowFall.snow(document.body, {
							image : "<?php echo WE_PLUGIN_PATH ?>assets/images/autumn/<?php echo $autumn_leaf; ?>.png",
							minSize: <?php echo $autumn_min_size_leaf; ?>, 
							maxSize: <?php echo $autumn_max_size_leaf; ?>,
							flakeCount: <?php echo $autumn_flakes_leaf; ?>,
							maxSpeed: <?php echo $autumn_speed; ?>
						});
					<?php } ?>
				}); 
			// Autumn Effect End
		<?php } ?> 
		//Autumn_check Weather effect End
	</script>
	<script>
		//winter_check Start
			//Winter snow Falling Start
			<?php if($weather_occasion == "winter_check") {
					$snow_types = $weather_effect_settings['snow_types'];
					//winter_snow 
					$ice_cube = $weather_effect_settings['ice_cube'];
					$min_size_christmas = $weather_effect_settings['min_size_christmas'];
					$max_size_christmas = $weather_effect_settings['max_size_christmas'];
					$flake_christmas = $weather_effect_settings['flake_christmas'];
					//falling_snow
					$min_size_falling = $weather_effect_settings['min_size_falling'];
					$max_size_falling = $weather_effect_settings['max_size_falling'];
					$snow_falling_time = $weather_effect_settings['snow_falling_time'];
					$snow_falling_color = $weather_effect_settings['snow_falling_color']; 
					//1. Winter Snow start
					if($snow_types == "winter_snow") { ?>
						jQuery(document).ready(function(){
							jQuery(document).snowfall({deviceorientation : false,
								round : <?php echo $ice_cube; ?>, //snow structure Round or Cube
								minSize: <?php echo $min_size_christmas; ?>, // snow size
								maxSize: <?php echo $max_size_christmas; ?>,  // snow cube size
								flakeCount : <?php echo $flake_christmas; ?> // snow cube quantity
							}); 
						});
					<?php } ?>
					//Winter Snow End
					//2. falling snow Start	
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
		<?php   } ?> 
			//Winter Falling End
		//winter_check end
	</script>
	<style>
		.we-flake{
			color: <?php echo $snow_falling_color; ?> !important;
		}
	</style>
	<script>
		// spring_check Effect End
		<?php if($weather_occasion == "spring_check") { 
				$spring_leaf = $weather_effect_settings['spring_leaf'];
				?>
				// spring Effect Start
					jQuery(document).ready(function(){
						<?php if(isset($weather_effect_settings['leaf_spring'])) { ?>
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
	</script>
	<script>
		// summer_check Effect Start
		<?php if($weather_occasion == "summer_check") { 
			$summer_drink = $weather_effect_settings['summer_drink'];
			$summer_sun = $weather_effect_settings['summer_sun'];
			?>
			// Summer Effect Start
				jQuery(document).ready(function(){
					<?php if(isset($weather_effect_settings['drink'])) { ?>
						snowFall.snow(document.body, {
							image : "<?php echo WE_PLUGIN_PATH ?>assets/images/summer/<?php echo $summer_drink; ?>.png",
							minSize: <?php echo $summer_min_size_leaf; ?>, 
							maxSize: <?php echo $summer_max_size_leaf; ?>,
							flakeCount: <?php echo $summer_flakes_leaf; ?>,
							maxSpeed: <?php echo $summer_speed; ?>
						});
					<?php } ?>
					<?php if(isset($weather_effect_settings['sun'])) { ?>
						snowFall.snow(document.body, {
							image : "<?php echo WE_PLUGIN_PATH ?>assets/images/summer/<?php echo $summer_sun; ?>.png",
							minSize: <?php echo $summer_min_size_leaf; ?>, 
							maxSize: <?php echo $summer_max_size_leaf; ?>,
							flakeCount: <?php echo $summer_flakes_leaf; ?>,
							maxSpeed: <?php echo $summer_speed; ?>
						});
					<?php } ?>
				}); 
			// Summer Effect End
		<?php } ?>  //summer_check Effect End
	</script>
	<script>
		//halloween_check  Start
		<?php if($weather_occasion == "halloween_check") { 
					$halloween_ghost = $weather_effect_settings['halloween_ghost'];
					$halloween_bats = $weather_effect_settings['halloween_bats'];
					$halloween_moon = $weather_effect_settings['halloween_moon'];
					$halloween_pumpkin = $weather_effect_settings['halloween_pumpkin'];
					$halloween_web = $weather_effect_settings['halloween_web'];
					$halloween_witch = $weather_effect_settings['halloween_witch'];
					?>
					// Halloween Effect Start
					jQuery(document).ready(function(){
						<?php if(isset($weather_effect_settings['ghost'])) { ?>
							snowFall.snow(document.body, {
								image : "<?php echo WE_PLUGIN_PATH ?>assets/images/halloween/<?php echo $halloween_ghost; ?>.png",
								minSize: <?php echo $halloween_min_size_leaf; ?>, 
								maxSize: <?php echo $halloween_max_size_leaf; ?>,
								flakeCount: <?php echo $halloween_flakes_leaf; ?>,
								maxSpeed: <?php echo $halloween_speed; ?>
							});
						<?php } ?>
						<?php if(isset($weather_effect_settings['bats'])) { ?>
							snowFall.snow(document.body, {
								image : "<?php echo WE_PLUGIN_PATH ?>assets/images/halloween/<?php echo $halloween_bats; ?>.png",
								minSize: <?php echo $halloween_min_size_leaf; ?>, 
								maxSize: <?php echo $halloween_max_size_leaf; ?>,
								flakeCount: <?php echo $halloween_flakes_leaf; ?>,
								maxSpeed: <?php echo $halloween_speed; ?>
							});
						<?php } ?>
						<?php if(isset($weather_effect_settings['moon'])) { ?>
							snowFall.snow(document.body, {
								image : "<?php echo WE_PLUGIN_PATH ?>assets/images/halloween/<?php echo $halloween_moon; ?>.png",
								minSize: <?php echo $halloween_min_size_leaf; ?>, 
								maxSize: <?php echo $halloween_max_size_leaf; ?>,
								flakeCount: <?php echo $halloween_flakes_leaf; ?>,
								maxSpeed: <?php echo $halloween_speed; ?>
							});
						<?php } ?>
						<?php if(isset($weather_effect_settings['pumpkin'])) { ?>
							snowFall.snow(document.body, {
								image : "<?php echo WE_PLUGIN_PATH ?>assets/images/halloween/<?php echo $halloween_pumpkin; ?>.png",
								minSize: <?php echo $halloween_min_size_leaf; ?>, 
								maxSize: <?php echo $halloween_max_size_leaf; ?>,
								flakeCount: <?php echo $halloween_flakes_leaf; ?>,
								maxSpeed: <?php echo $halloween_speed; ?>
							});
						<?php } ?>
						<?php if(isset($weather_effect_settings['web'])) { ?>
							snowFall.snow(document.body, {
								image : "<?php echo WE_PLUGIN_PATH ?>assets/images/halloween/<?php echo $halloween_web; ?>.png",
								minSize: <?php echo $halloween_min_size_leaf; ?>, 
								maxSize: <?php echo $halloween_max_size_leaf; ?>,
								flakeCount: <?php echo $halloween_flakes_leaf; ?>,
								maxSpeed: <?php echo $halloween_speed; ?>
							});
						<?php } ?>
						<?php if(isset($weather_effect_settings['witch'])) { ?>
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
	  //halloween_check End
	</script>
	<script>
		//rainy_check Start
			<?php if($weather_occasion == "rainy_check") { 
				$rain_umbrella = $weather_effect_settings['rain_umbrella'];
				$rain_drops = $weather_effect_settings['rain_drops'];
				$rain_cloud = $weather_effect_settings['rain_cloud'];
				?>
					// Rain Effect Start
					jQuery(document).ready(function(){
						<?php if(isset($weather_effect_settings['umbrella'])) { ?>
							snowFall.snow(document.body, {
								image : "<?php echo WE_PLUGIN_PATH ?>assets/images/rain/<?php echo $rain_umbrella; ?>.png",
								minSize: <?php echo $rain_min_size_leaf; ?>, 
								maxSize: <?php echo $rain_max_size_leaf; ?>,
								flakeCount: <?php echo $rain_flakes_leaf; ?>,
								maxSpeed: <?php echo $rain_speed; ?>
							});
						<?php } ?>
						<?php if(isset($weather_effect_settings['drop'])) { ?>
							snowFall.snow(document.body, {
								image : "<?php echo WE_PLUGIN_PATH ?>assets/images/rain/<?php echo $rain_drops; ?>.png",
								minSize: <?php echo $rain_min_size_leaf; ?>, 
								maxSize: <?php echo $rain_max_size_leaf; ?>,
								flakeCount: <?php echo $rain_flakes_leaf; ?>,
								maxSpeed: <?php echo $rain_speed; ?>
							});
						<?php } ?>
						<?php if(isset($weather_effect_settings['cloud'])) { ?>
							snowFall.snow(document.body, {
								image : "<?php echo WE_PLUGIN_PATH ?>assets/images/rain/<?php echo $rain_cloud; ?>.png",
								minSize: <?php echo $rain_min_size_leaf; ?>, 
								maxSize: <?php echo $rain_max_size_leaf; ?>,
								flakeCount: <?php echo $rain_flakes_leaf; ?>,
								maxSpeed: <?php echo $rain_speed; ?>
							});
						<?php } ?>
					}); 
					// Rain Effect End
		  <?php } ?> 
	  //rainy_check end
	</script>
	<script>
		//thanks_giving_check start
			<?php if($weather_occasion == "thanks_giving_check") { 
				$thanksgiving_turkey = $weather_effect_settings['thanksgiving_turkey'];
				?>
				// thanksgiving Effect Start
					jQuery(document).ready(function(){
						<?php if(isset($weather_effect_settings['turkey'])) { ?>
							snowFall.snow(document.body, {
								image : "<?php echo WE_PLUGIN_PATH ?>assets/images/thanksgiving/<?php echo $thanksgiving_turkey; ?>.png",
								minSize: <?php echo $thanksgiving_min_size_leaf; ?>, 
								maxSize: <?php echo $thanksgiving_max_size_leaf; ?>,
								flakeCount: <?php echo $thanksgiving_flakes_leaf; ?>,
								maxSpeed: <?php echo $thanksgiving_speed; ?>
							});
						<?php } ?>
					}); 
				// thanksgiving Effect End
			<?php } ?> 
		//thanks_giving_check end
	</script>
	<script>
		//valentine_check start
			<?php if($weather_occasion == "valentine_check") { 
				$valentine_rose = $weather_effect_settings['valentine_rose'];
				$valentine_balloon = $weather_effect_settings['valentine_balloon'];
				$valentine_heart = $weather_effect_settings['valentine_heart'];
				?>
					// valentine Effect Start
					jQuery(document).ready(function(){
						<?php if(isset($weather_effect_settings['rose'])) { ?>
							snowFall.snow(document.body, {
								image : "<?php echo WE_PLUGIN_PATH ?>assets/images/valentine/<?php echo $valentine_rose; ?>.png",
								minSize: <?php echo $valentine_min_size_leaf; ?>, 
								maxSize: <?php echo $valentine_max_size_leaf; ?>,
								flakeCount: <?php echo $valentine_flakes_leaf; ?>,
								maxSpeed: <?php echo $valentine_speed; ?>
							});
						<?php } ?>
						<?php if(isset($weather_effect_settings['balloon'])) { ?>
							snowFall.snow(document.body, {
								image : "<?php echo WE_PLUGIN_PATH ?>assets/images/valentine/<?php echo $valentine_balloon; ?>.png",
								minSize: <?php echo $valentine_min_size_leaf; ?>, 
								maxSize: <?php echo $valentine_max_size_leaf; ?>,
								flakeCount: <?php echo $valentine_flakes_leaf; ?>,
								maxSpeed: <?php echo $valentine_speed; ?>
							});
						<?php } ?>
						<?php if(isset($weather_effect_settings['heart'])) { ?>
							snowFall.snow(document.body, {
								image : "<?php echo WE_PLUGIN_PATH ?>assets/images/valentine/<?php echo $valentine_heart; ?>.png",
								minSize: <?php echo $valentine_min_size_leaf; ?>, 
								maxSize: <?php echo $valentine_max_size_leaf; ?>,
								flakeCount: <?php echo $valentine_flakes_leaf; ?>,
								maxSpeed: <?php echo $valentine_speed; ?>
							});
						<?php } ?>
					}); 
					// valentine Effect End
		<?php   } ?> 
		//valentine_check End
	</script>
	<script>
		//new_year_check start
			<?php if($weather_occasion == "new_year_check") { 
					$newyear_balloon = $weather_effect_settings['newyear_balloon'];
					$new_year_sticker = $weather_effect_settings['new_year_sticker'];
					?>
					// new_year Effect Start
						jQuery(document).ready(function(){
							<?php if(isset($weather_effect_settings['balloon_new'])) { ?>
								snowFall.snow(document.body, {
									image : "<?php echo WE_PLUGIN_PATH ?>assets/images/newyear/<?php echo $newyear_balloon; ?>.png",
									minSize: <?php echo $newyear_min_size_leaf; ?>, 
									maxSize: <?php echo $newyear_max_size_leaf; ?>,
									flakeCount: <?php echo $newyear_flakes_leaf; ?>,
									maxSpeed: <?php echo $newyear_speed; ?>
								});
							<?php } ?>
							<?php if(isset($weather_effect_settings['sticker'])) { ?>
								snowFall.snow(document.body, {
									image : "<?php echo WE_PLUGIN_PATH ?>assets/images/newyear/<?php echo $new_year_sticker; ?>.png",
									minSize: <?php echo $newyear_min_size_leaf; ?>, 
									maxSize: <?php echo $newyear_max_size_leaf; ?>,
									flakeCount: <?php echo $newyear_flakes_leaf; ?>,
									maxSpeed: <?php echo $newyear_speed; ?>
								});
							<?php } ?>
						}); 
					// new_year Effect End
		<?php } ?> 
		//new_year_check end
	</script>