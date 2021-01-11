<?php
// Setting Page
add_action( 'admin_menu', 'weather_effect' );
function weather_effect () {
	add_menu_page ( 'Weather Effect Setting', __( 'Weather Effect', WE_TXTD ), 'administrator', 'weather-effects-setting', 'weather_effect_setting_page', 'dashicons-cloud' );
	add_submenu_page( 'weather-effects-setting', __( 'More Free Plugins', WE_TXTD ), __( 'More Free Plugins', WE_TXTD ),'administrator','we-featured-plugins','we_featured_plugins_page_body');   
}

function weather_effect_setting_page() {
	//js
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'awplife-we-snow-bootstrap-js',  WE_PLUGIN_PATH .'assets/js/bootstrap.js', array( 'jquery' ), '', true  );
	wp_enqueue_script( 'awplife-we-snow-christmas-snow-js',  WE_PLUGIN_PATH .'assets/js/christmas-snow/christmas-snow.js');
	wp_enqueue_script( 'awplife-we-snow-snow-falling-js',  WE_PLUGIN_PATH .'assets/js/snow-falling/snow-falling.js');
	wp_enqueue_script( 'awplife-we-snow-snowfall-master-js',  WE_PLUGIN_PATH .'assets/js/snowfall-master/snowfall-master.min.js', array( 'jquery' ), '', true  );
	wp_enqueue_script( 'awplife-we-snow-color-picker-js',  WE_PLUGIN_PATH .'assets/js/color-picker.js', array( 'jquery', 'wp-color-picker' ), '', true  );

	//toggle button CSS
	wp_enqueue_style('awplife-we--bootstrap-css', WE_PLUGIN_PATH . 'assets/css/bootstrap.css');
	wp_enqueue_style('awplife-we--toogle-button-css', WE_PLUGIN_PATH . 'assets/css/toogle-button.css');
	wp_enqueue_style( 'awplife-we-snow-bootstrap-css',WE_PLUGIN_PATH.'assets/css/sf-buttons-bootstrap.css' );
	wp_enqueue_style( 'awplife-we-snow-font-awesome-css',WE_PLUGIN_PATH.'assets/css/font-awesome.css' );
	wp_enqueue_style( 'wp-color-picker' ); 

	//get values from database
	$weather_effect_settings = get_option('weather_effect_settings');
	//print_r($weather_effect_settings);
?>
<style>
	.snowfalls-page {
		margin-top:20px;
		background-color:#FFFFFF;
		margin-bottom: 20px;
		min-height: 20px;
		padding: 19px;
		border-radius: 20px !important:
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	.padding_settings {
		padding-left: 30px !important;
	}
	.bg_label {
		font-family: initial;
		font-size: large;
	}
	.bg_lower_label {
		font-family: bold;
		color: midnightblue;
	}
	.lower_label {
		font-family: bold;
		color: #4A7EC9;
		padding-left: 20px;
	}
</style>

<!--effect settings -->
<div class="container text-left">
	<div class="snowfalls-page">
		<h1>Weather Effect - <?php _e('Configure Settings', WE_TXTD); ?></h1>
		<form id="snowfall-setting-form">
			<div class="row">
				<p class="bg-title"><?php _e('Turn ON / OFF Effect', WE_TXTD); ?></p>
				<?php if(isset($weather_effect_settings['enable_weather_effect'])) $enable_weather_effect = $weather_effect_settings['enable_weather_effect']; else $enable_weather_effect = 1; ?>
				<p class="col-xs-6 switch-field em_size_field padding_settings">
					<input class="widefat" id="enable_weather_effect1" name="enable_weather_effect" type="radio" value="1" <?php if($enable_weather_effect == "1") echo "checked=checked"; ?>>
					<label for="enable_weather_effect1"><?php _e('Enable', WE_TXTD); ?></label>
					<input class="widefat" id="enable_weather_effect2" name="enable_weather_effect" type="radio" value="0" <?php if($enable_weather_effect == "0") echo "checked=checked"; ?>>
					<label for="enable_weather_effect2"><?php _e('Disable', WE_TXTD); ?></label>
				</p>
			</div>
			<div class="row">&nbsp;&nbsp;&nbsp;
				<label class="bg_lower_label"> <?php _e('Select A Weather Or Occasion', WE_TXTD); ?></label><br><br>
				<?php if(isset($weather_effect_settings['weather_occasion'])) $weather_occasion = $weather_effect_settings['weather_occasion']; else $weather_occasion = "christmas_check"; ?>
				<select id="weather_occasion" name="weather_occasion" class="form-control" style="margin-left: 20px; width: 300px;">
					<option value="christmas_check" <?php if($weather_occasion == "christmas_check") echo "selected=selected"; ?>><?php _e('Christmas', WE_TXTD); ?></option>
					<option value="winter_check" <?php if($weather_occasion == "winter_check") echo "selected=selected"; ?>><?php _e('Winter', WE_TXTD); ?></option>
					<option value="autumn_check" <?php if($weather_occasion == "autumn_check") echo "selected=selected"; ?>><?php _e('Autumn', WE_TXTD); ?> </option>
					<option value="spring_check" <?php if($weather_occasion == "spring_check") echo "selected=selected"; ?>><?php _e('Spring', WE_TXTD); ?></option>
					<option value="summer_check" <?php if($weather_occasion == "summer_check") echo "selected=selected"; ?>><?php _e('Summer', WE_TXTD); ?></option>
					<option value="rainy_check" <?php if($weather_occasion == "rainy_check") echo "selected=selected"; ?>><?php _e('Rain', WE_TXTD); ?></option>
					<option value="halloween_check" <?php if($weather_occasion == "halloween_check") echo "selected=selected"; ?>><?php _e('Halloween', WE_TXTD); ?></option>
					<option value="thanks_giving_check" <?php if($weather_occasion == "thanks_giving_check") echo "selected=selected"; ?>><?php _e('Thanks Giving', WE_TXTD); ?></option>
					<option value="valentine_check" <?php if($weather_occasion == "valentine_check") echo "selected=selected"; ?>><?php _e('Valentine', WE_TXTD); ?></option>
					<option value="new_year_check" <?php if($weather_occasion == "new_year_check") echo "selected=selected"; ?>><?php _e('New Year', WE_TXTD); ?></option>
				</select>
			</div><br>
			<div>
			<?php 
				require_once('settings/christmas-snow-settings.php');
				require_once('settings/winter-settings.php');
				require_once('settings/autumn-settings.php');
				require_once('settings/spring-settings.php');
				require_once('settings/summer-settings.php');
				require_once('settings/rainy-settings.php');
				require_once('settings/halloween-settings.php');
				require_once('settings/thanks-giving-settings.php');
				require_once('settings/valentine-settings.php');
				require_once('settings/new-year-settings.php');
			?>
			</div>
			<script>
			// on load
				var weather_occasion = jQuery("#weather_occasion option:selected").val();
					//1. Christmas
					if(weather_occasion == "christmas_check") {
						jQuery("#christmas_weather_effect").show();
						jQuery("#winter_weather_effect").hide();
						jQuery("#autumn_weather_effect").hide();
						jQuery("#spring_effect_sh").hide();
						jQuery("#summer_weather_effect").hide();
						jQuery("#halloween_weather_effect").hide();
						jQuery("#rain_weather_effect").hide();
						jQuery("#thanksgiving_weather_effect").hide();
						jQuery("#valentine_weather_effect").hide();
						jQuery("#new_year_weather_effect").hide();
					}
					
					//2. winter
					if(weather_occasion == "winter_check") {
						jQuery("#christmas_weather_effect").hide();
						jQuery("#winter_weather_effect").show();
						jQuery("#autumn_weather_effect").hide();
						jQuery("#spring_effect_sh").hide();
						jQuery("#summer_weather_effect").hide();
						jQuery("#halloween_weather_effect").hide();
						jQuery("#rain_weather_effect").hide();
						jQuery("#thanksgiving_weather_effect").hide();
						jQuery("#valentine_weather_effect").hide();
						jQuery("#new_year_weather_effect").hide();
					}
					//3. autumn
					if(weather_occasion == "autumn_check") {
						jQuery("#christmas_weather_effect").hide();
						jQuery("#winter_weather_effect").hide();
						jQuery("#autumn_weather_effect").show();
						jQuery("#spring_effect_sh").hide();
						jQuery("#summer_weather_effect").hide();
						jQuery("#halloween_weather_effect").hide();
						jQuery("#rain_weather_effect").hide();
						jQuery("#thanksgiving_weather_effect").hide();
						jQuery("#valentine_weather_effect").hide();
						jQuery("#new_year_weather_effect").hide();
					}
					//4. spring
					if(weather_occasion == "spring_check") {
						jQuery("#christmas_weather_effect").hide();
						jQuery("#winter_weather_effect").hide();
						jQuery("#autumn_weather_effect").hide();
						jQuery("#spring_effect_sh").show();
						jQuery("#summer_weather_effect").hide();
						jQuery("#halloween_weather_effect").hide();
						jQuery("#rain_weather_effect").hide();
						jQuery("#thanksgiving_weather_effect").hide();
						jQuery("#valentine_weather_effect").hide();
						jQuery("#new_year_weather_effect").hide();
					}
					//5. summer
					if(weather_occasion == "summer_check") {
						jQuery("#christmas_weather_effect").hide();
						jQuery("#winter_weather_effect").hide();
						jQuery("#autumn_weather_effect").hide();
						jQuery("#spring_effect_sh").hide();
						jQuery("#summer_weather_effect").show();
						jQuery("#halloween_weather_effect").hide();
						jQuery("#rain_weather_effect").hide();
						jQuery("#thanksgiving_weather_effect").hide();
						jQuery("#valentine_weather_effect").hide();
						jQuery("#new_year_weather_effect").hide();
					}
					//6. Halloween
					if(weather_occasion == "halloween_check") {
						jQuery("#christmas_weather_effect").hide();
						jQuery("#winter_weather_effect").hide();
						jQuery("#autumn_weather_effect").hide();
						jQuery("#spring_effect_sh").hide();
						jQuery("#summer_weather_effect").hide();
						jQuery("#halloween_weather_effect").show();
						jQuery("#rain_weather_effect").hide();
						jQuery("#thanksgiving_weather_effect").hide();
						jQuery("#valentine_weather_effect").hide();
						jQuery("#new_year_weather_effect").hide();
					}
					//7. rainy
					if(weather_occasion == "rainy_check") {
						jQuery("#christmas_weather_effect").hide();
						jQuery("#winter_weather_effect").hide();
						jQuery("#autumn_weather_effect").hide();
						jQuery("#spring_effect_sh").hide();
						jQuery("#summer_weather_effect").hide();
						jQuery("#halloween_weather_effect").hide();
						jQuery("#rain_weather_effect").show();
						jQuery("#thanksgiving_weather_effect").hide();
						jQuery("#valentine_weather_effect").hide();
						jQuery("#new_year_weather_effect").hide();
					}
					//8. thanks giving
					if(weather_occasion == "thanks_giving_check") {
						jQuery("#christmas_weather_effect").hide();
						jQuery("#winter_weather_effect").hide();
						jQuery("#autumn_weather_effect").hide();
						jQuery("#spring_effect_sh").hide();
						jQuery("#summer_weather_effect").hide();
						jQuery("#halloween_weather_effect").hide();
						jQuery("#rain_weather_effect").hide();
						jQuery("#thanksgiving_weather_effect").show();
						jQuery("#valentine_weather_effect").hide();
						jQuery("#new_year_weather_effect").hide();
					}
					//9. valentine
					if(weather_occasion == "valentine_check") {
						jQuery("#christmas_weather_effect").hide();
						jQuery("#winter_weather_effect").hide();
						jQuery("#autumn_weather_effect").hide();
						jQuery("#spring_effect_sh").hide();
						jQuery("#summer_weather_effect").hide();
						jQuery("#halloween_weather_effect").hide();
						jQuery("#rain_weather_effect").hide();
						jQuery("#thanksgiving_weather_effect").hide();
						jQuery("#valentine_weather_effect").show();
						jQuery("#new_year_weather_effect").hide();
					}
					if(weather_occasion == "new_year_check") {
						jQuery("#christmas_weather_effect").hide();
						jQuery("#winter_weather_effect").hide();
						jQuery("#autumn_weather_effect").hide();
						jQuery("#spring_effect_sh").hide();
						jQuery("#summer_weather_effect").hide();
						jQuery("#halloween_weather_effect").hide();
						jQuery("#rain_weather_effect").hide();
						jQuery("#thanksgiving_weather_effect").hide();
						jQuery("#valentine_weather_effect").hide();
						jQuery("#new_year_weather_effect").show();
					}
			
				// on change
				jQuery(document).ready(function(){
					jQuery("select").change(function(){
						jQuery(this).find("option:selected").each(function(){
							//1. Christmas
							if(jQuery(this).attr("value")=="christmas_check"){
								jQuery("#christmas_weather_effect").show();
								jQuery("#winter_weather_effect").hide();
								jQuery("#autumn_weather_effect").hide();
								jQuery("#spring_effect_sh").hide();
								jQuery("#summer_weather_effect").hide();
								jQuery("#halloween_weather_effect").hide();
								jQuery("#rain_weather_effect").hide();
								jQuery("#thanksgiving_weather_effect").hide();
								jQuery("#valentine_weather_effect").hide();
								jQuery("#new_year_weather_effect").hide();
							}
							//2. winter
							if(jQuery(this).attr("value")=="winter_check"){
								jQuery("#christmas_weather_effect").hide();
								jQuery("#winter_weather_effect").show();
								jQuery("#autumn_weather_effect").hide();
								jQuery("#spring_effect_sh").hide();
								jQuery("#summer_weather_effect").hide();
								jQuery("#halloween_weather_effect").hide();
								jQuery("#rain_weather_effect").hide();
								jQuery("#thanksgiving_weather_effect").hide();
								jQuery("#valentine_weather_effect").hide();
								jQuery("#new_year_weather_effect").hide();
							}
							//3. autumn
							if(jQuery(this).attr("value")=="autumn_check"){
								jQuery("#christmas_weather_effect").hide();
								jQuery("#winter_weather_effect").hide();
								jQuery("#autumn_weather_effect").show();
								jQuery("#spring_effect_sh").hide();
								jQuery("#summer_weather_effect").hide();
								jQuery("#halloween_weather_effect").hide();
								jQuery("#rain_weather_effect").hide();
								jQuery("#thanksgiving_weather_effect").hide();
								jQuery("#valentine_weather_effect").hide();
								jQuery("#new_year_weather_effect").hide();
							}
							//4. spring
							if(jQuery(this).attr("value")=="spring_check"){
								jQuery("#christmas_weather_effect").hide();
								jQuery("#winter_weather_effect").hide();
								jQuery("#autumn_weather_effect").hide();
								jQuery("#spring_effect_sh").show();
								jQuery("#summer_weather_effect").hide();
								jQuery("#halloween_weather_effect").hide();
								jQuery("#rain_weather_effect").hide();
								jQuery("#thanksgiving_weather_effect").hide();
								jQuery("#valentine_weather_effect").hide();
								jQuery("#new_year_weather_effect").hide();
							}
							//5. summer
							if(jQuery(this).attr("value")=="summer_check"){
								jQuery("#christmas_weather_effect").hide();
								jQuery("#winter_weather_effect").hide();
								jQuery("#autumn_weather_effect").hide();
								jQuery("#spring_effect_sh").hide();
								jQuery("#summer_weather_effect").show();
								jQuery("#halloween_weather_effect").hide();
								jQuery("#rain_weather_effect").hide();
								jQuery("#thanksgiving_weather_effect").hide();
								jQuery("#valentine_weather_effect").hide();
								jQuery("#new_year_weather_effect").hide();
							}
							//6. Halloween
							if(jQuery(this).attr("value")=="halloween_check"){
								jQuery("#christmas_weather_effect").hide();
								jQuery("#winter_weather_effect").hide();
								jQuery("#autumn_weather_effect").hide();
								jQuery("#spring_effect_sh").hide();
								jQuery("#summer_weather_effect").hide();
								jQuery("#halloween_weather_effect").show();
								jQuery("#rain_weather_effect").hide();
								jQuery("#thanksgiving_weather_effect").hide();
								jQuery("#valentine_weather_effect").hide();
								jQuery("#new_year_weather_effect").hide();
							}
							//7. rainy
							if(jQuery(this).attr("value")=="rainy_check"){
								jQuery("#christmas_weather_effect").hide();
								jQuery("#winter_weather_effect").hide();
								jQuery("#autumn_weather_effect").hide();
								jQuery("#spring_effect_sh").hide();
								jQuery("#summer_weather_effect").hide();
								jQuery("#halloween_weather_effect").hide();
								jQuery("#rain_weather_effect").show();
								jQuery("#thanksgiving_weather_effect").hide();
								jQuery("#valentine_weather_effect").hide();
								jQuery("#new_year_weather_effect").hide();
							}
							//8. thanks giving
							if(jQuery(this).attr("value")=="thanks_giving_check"){
								jQuery("#christmas_weather_effect").hide();
								jQuery("#winter_weather_effect").hide();
								jQuery("#autumn_weather_effect").hide();
								jQuery("#spring_effect_sh").hide();
								jQuery("#summer_weather_effect").hide();
								jQuery("#halloween_weather_effect").hide();
								jQuery("#rain_weather_effect").hide();
								jQuery("#thanksgiving_weather_effect").show();
								jQuery("#valentine_weather_effect").hide();
								jQuery("#new_year_weather_effect").hide();
							}
							//9. valentine
							if(jQuery(this).attr("value")=="valentine_check"){
								jQuery("#christmas_weather_effect").hide();
								jQuery("#winter_weather_effect").hide();
								jQuery("#autumn_weather_effect").hide();
								jQuery("#spring_effect_sh").hide();
								jQuery("#summer_weather_effect").hide();
								jQuery("#halloween_weather_effect").hide();
								jQuery("#rain_weather_effect").hide();
								jQuery("#thanksgiving_weather_effect").hide();
								jQuery("#valentine_weather_effect").show();
								jQuery("#new_year_weather_effect").hide();
							}
							//10. New Year
							if(jQuery(this).attr("value")=="new_year_check"){
								jQuery("#christmas_weather_effect").hide();
								jQuery("#winter_weather_effect").hide();
								jQuery("#autumn_weather_effect").hide();
								jQuery("#spring_effect_sh").hide();
								jQuery("#summer_weather_effect").hide();
								jQuery("#halloween_weather_effect").hide();
								jQuery("#rain_weather_effect").hide();
								jQuery("#thanksgiving_weather_effect").hide();
								jQuery("#valentine_weather_effect").hide();
								jQuery("#new_year_weather_effect").show();
							}
						});
					});
				});
			</script>
			<input type="hidden" id="snow_action" name="snow_action" value="save_setting">
			<div id="loading_icon" name="loading_icon" style="display:none;"> 
				<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
				<span class=""><?php _e('Please wait...', WE_TXTD); ?></span>
			</div>
			<button type="button" id="save_setting" class="button button-primary button-hero wep-save-setting" onclick="SnowSaveSettings();"><span class="dashicons dashicons-yes" style="vertical-align: middle;"></span> <?php _e('Save', WE_TXTD); ?></button>
			<button type="button" id="preview" class="button button-primary button-hero wep-preview" onclick="PreviewSettings();"><span class="dashicons dashicons-visibility" style="vertical-align: middle;"></span> <?php _e('Preview', WE_TXTD); ?></button>
			<br>
		</form> 
		<br><br>
	
		<div id="christmas_weather_effect" class="tab-content">
			<div class="row">
				<p class="bg-title"><?php _e('Review Appeal', WE_TXTD); ?></p>
			</div>
			<p>We hope you love the plugin. If you do, would you consider posting an online review? This helps us to continue providing great plugin and support to potential users to make confident decisions.</p>
			<a href="https://wordpress.org/support/plugin/weather-effect/reviews/?filter=5" target="_blank" class="button button-primary button-hero">Post Review</a>
		</div>
		<br><br>
		<hr>
		
		<div style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;
			<h1>&nbsp;&nbsp;Upgrade To Weather Effect Premium Just In Half Price <strike>$30</strike> $15</h1><br>
			<a href="https://awplife.com/wordpress-plugins/weather-effect-wordpress-plugin/" target="_blank" class="button button-primary button-hero">Premium Version Details</a>
			<a href="https://awplife.com/demo/weather-effect/" target="_blank" class="button button-primary button-hero">Check Live Demo</a>
			<a href="https://awplife.com/demo/weather-effect-premium-admin-demo/" target="_blank" class="button button-primary  button-hero">Try Pro Version</a>
			<br><br><br>
		</div>
		<hr /><br /><br />
		<style>
			.awp_bale_offer {
				background-image: url("<?php echo WE_PLUGIN_PATH ?>/assets/images/awp-bale.jpg");
				background-repeat:no-repeat;
				padding:30px;
			}
			.awp_bale_offer h1 {
				font-size:35px;
				color:#FFFFFF;
			}
			.awp_bale_offer h3 {
				font-size:25px;
				color:#FFFFFF;
			}
			.awplife-free-plugins { 
				margin: 5px !important;
			}
		</style>
		<div class="row awp_bale_offer" style="text-align: center;">
			<div class="">
				<h1>Plugin's Bale Offer</h1>
				<h3>Get All Premium Plugin ( Personal License) in just $149 </h3>
				<h3><strike>$399</strike> For $149 Only</h3>
			</div>
			<div class="">
				<a href="https://awplife.com/account/signup/all-premium-plugins" target="_blank" class="button button-primary button-hero">BUY NOW</a>
			</div>
		</div>
		<br><br>
		<hr />
		<div style="text-align: center;">
			<p>
				<h2>Try Out Other Free WordPress Plugins</h2>
				<br>
				<a href="https://wordpress.org/plugins/new-album-gallery/" target="_blank" class="button button-primary awplife-free-plugins">Album Gallery</a>
				<a href="https://wordpress.org/plugins/wp-flickr-gallery/" target="_blank" class="button button-primary awplife-free-plugins">Flickr gallery</a>
				<a href="https://wordpress.org/plugins/animated-live-wall/" target="_blank" class="button button-primary awplife-free-plugins">Animated Live Wall</a>
				<a href="https://wordpress.org/plugins/blog-filter/" target="_blank" class="button button-primary awplife-free-plugins">Blog Filter</a>
				<a href="https://wordpress.org/plugins/new-contact-form-widget/" target="_blank" class="button button-primary awplife-free-plugins">Contact Form Widget</a>
				<a href="https://wordpress.org/plugins/customizer-login-page/" target="_blank" class="button button-primary awplife-free-plugins">Custom Login Page</a>
				<a href="https://wordpress.org/plugins/event-monster/" target="_blank" class="button button-primary awplife-free-plugins">Event Monster</a>
				<a href="https://wordpress.org/plugins/floating-news-headline/" target="_blank" class="button button-primary awplife-free-plugins">Floating News Headline</a>
				<a href="https://wordpress.org/plugins/new-photo-gallery/" target="_blank" class="button button-primary awplife-free-plugins">Photo Gallery</a>
				<a href="https://wordpress.org/plugins/new-grid-gallery/" target="_blank" class="button button-primary awplife-free-plugins">Grid Gallery</a>
				<a href="https://wordpress.org/plugins/hash-converter/" target="_blank" class="button button-primary awplife-free-plugins">Hash Converter</a>
				<a href="https://wordpress.org/plugins/new-image-gallery/" target="_blank" class="button button-primary awplife-free-plugins">Image Gallery</a>
				<a href="https://wordpress.org/plugins/media-slider/" target="_blank" class="button button-primary awplife-free-plugins">Media Slider</a>
				<a href="https://wordpress.org/plugins/modal-popup-box/" target="_blank" class="button button-primary awplife-free-plugins">Modal Popup Box</a>
				<a href="https://wordpress.org/plugins/portfolio-filter-gallery/" target="_blank" class="button button-primary awplife-free-plugins">Portfolio Filter Gallery</a>
				<a href="https://wordpress.org/plugins/abc-pricing-table/" target="_blank" class="button button-primary awplife-free-plugins">Pricing Table</a>
				<a href="https://wordpress.org/plugins/facebook-likebox-widget-and-shortcode/" target="_blank" class="button button-primary awplife-free-plugins">Facebook Likebox</a>
				<a href="https://wordpress.org/plugins/responsive-slider-gallery/" target="_blank" class="button button-primary awplife-free-plugins">Responsive Slider Gallery</a>
				<a href="https://wordpress.org/plugins/right-click-disable-or-ban/" target="_blank" class="button button-primary awplife-free-plugins">Right Click Ban And Disable</a>
				<a href="https://wordpress.org/plugins/slider-responsive-slideshow/" target="_blank" class="button button-primary awplife-free-plugins">Slider Responsive Slideshow</a>
				<a href="https://wordpress.org/plugins/wp-instagram-feed-awplife/" target="_blank" class="button button-primary awplife-free-plugins">Instagram Feed</a>
				<a href="https://wordpress.org/plugins/new-social-media-widget/" target="_blank" class="button button-primary awplife-free-plugins">Social Media Icon Widget</a>
				<a href="https://wordpress.org/plugins/insta-type-gallery/" target="_blank" class="button button-primary awplife-free-plugins">Instagram Type Gallery</a>
				<a href="https://wordpress.org/plugins/testimonial-maker/" target="_blank" class="button button-primary awplife-free-plugins">Testimonial</a>
				<a href="https://wordpress.org/plugins/new-video-gallery/" target="_blank" class="button button-primary awplife-free-plugins">Video Gallery</a>
				<a href="https://wordpress.org/plugins/weather-effect/" target="_blank" class="button button-primary awplife-free-plugins">Weather Effect</a>
			</p>
		</div>
	</div>
	<script>
		function SnowSaveSettings() {
			jQuery("#loading_icon").show();
			jQuery("#save_setting").hide();
			jQuery("#preview").hide();
			jQuery.ajax({
				dataType : 'html',
				type: 'POST',
				url : location.href,
				cache: false,
				data : jQuery('#snowfall-setting-form').serialize() + '&snow_action=save_setting',
				complete : function() {  },
				success: function(data) {
					jQuery("#loading_icon").hide();
					jQuery('#result-msg').html(jQuery(data).find('div#setting-result'));
					jQuery("div#setting-result").fadeOut( 5000, "linear" );
					jQuery("#save_setting").show();
					jQuery("#preview").show();
				}
			});
		}
		//preview button setting
		function PreviewSettings() {
			 location.reload();
		} 

		//range slider
		var rangeSlider = function(){
			var slider = jQuery('.range-slider'),
			range = jQuery('.range-slider__range'),
			value = jQuery('.range-slider__value');

			slider.each(function(){
				value.each(function(){
					var value = jQuery(this).prev().attr('value');
					jQuery(this).html(value);
				});
				range.on('input', function(){
					jQuery(this).next(value).html(this.value);
				});
			});
		};
		rangeSlider();
	</script>
<?php
	//save settings
	if(isset($_POST['snow_action'])){
		//$snownewsettings = array(
		//);
		update_option( 'weather_effect_settings', $_POST );
	} // end of save if
} // end of setting page function

//doc page
function we_featured_plugins_page_body() {
	require_once('featured-plugins/featured-plugins.php');
}
?>