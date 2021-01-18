<?php
/*
Plugin Name: Valentine's Day Hearts
Plugin URI: http://graphicedit.com/blog/plugin/xmas-heart/
Description: Simple plugin that makes hearts "fall from the sky".
Version: 2.0
Author: Digitally Cultured
Author URI: https://digitallycultured.com/


	Credit to GraphicEdit (<a href="http://graphicedit.com" />GraphicEdit</a>)	
	Copyright 2016  Digitally Cultured  (email : info@digitallycultured.com)

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define( 'DC_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

//functions for plugin administration
include( 'includes/developer.php' );

//create & manage plugin settings
include( 'includes/settings.php' );

//holds the "heart" of the plugin (sorry!)
include( 'includes/valentines-hearts.php' );
