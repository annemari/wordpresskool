<?php

$dc_fh_options = get_option( 'dc_fh_options' );
$display_hearts = $dc_fh_options['dc_fh_display'];

/**** actions/hooks/filters ****/
if ( $display_hearts == 'on' ) {

    wp_enqueue_style('font-awesome', plugins_url( 'assets/css/font-awesome.min.css', dirname(__FILE__) ));
    add_action('wp_footer','dc_valentines_heart'); 
}

/**** end actions/hooks/filters ****/

function dc_valentines_heart() {
	?>

	<!-- xmas_heart [ start ] -->
	<script type="text/javascript">
	// Set the number of heart (more than 30 - 40 not recommended)
	var heartmax=20
	// Set the colors for the heart. Add as many colors as you like
	var heartcolor=new Array("#c6041b", "#e10027", "#E1001c", "#C10227", "#Ea002d", "#ed1c38")
	// Set the fonts, that create the heartflakes. Add as many fonts as you like
	var hearttype=new Array("Times","Arial","Times","Verdana")
	// Set the letter that creates your heartflake (recommended: * )
	var heartletter="<i class='dcfa dcfa-heart' style='color:"+heartcolor[randommaker(heartcolor.length)]+" !important;' ></i>"
	// Set the speed of sinking (recommended values range from 0.3 to 2)
	var sinkspeed=0.6
	// Set the maximum-size of your heartflakes
	var heartmaxsize=30
	// Set the minimal-size of your heartflakes
	var heartminsize=8
	// Set the hearting-zone
	// Set 1 for all-over-hearting, set 2 for left-side-hearting
	// Set 3 for center-hearting, set 4 for right-side-hearting
	var heartingzone=1
	///////////////////////////////////////////////////////////////////////////
	var heart=new Array()
	var marginbottom
	var marginright
	var timer
	var i_heart=0
	var x_mv=new Array();
	var crds=new Array();
	var lftrght=new Array();
	var browserinfos=navigator.userAgent
	var ie5=document.all&&document.getElementById&&!browserinfos.match(/Opera/)
	var ns6=document.getElementById&&!document.all
	var opera=browserinfos.match(/Opera/)
	var browserok=ie5||ns6||opera

	function randommaker(range) {
			rand=Math.floor(range*Math.random())
		return rand
	}

	function initheart() {
			if (ie5 || opera) {
					marginbottom = document.body.scrollHeight
					marginright = document.body.clientWidth-15
			}
			else if (ns6) {
					marginbottom = document.body.scrollHeight
					marginright = window.innerWidth-15
			}
			var heartsizerange=heartmaxsize-heartminsize
			for (i=0;i<=heartmax;i++) {
					crds[i] = 0;
				lftrght[i] = Math.random()*15;
				x_mv[i] = 0.03 + Math.random()/10;
					heart[i]=document.getElementById("s"+i)
					heart[i].style.fontFamily=hearttype[randommaker(hearttype.length)]
					heart[i].size=randommaker(heartsizerange)+heartminsize
					heart[i].style.fontSize=heart[i].size+'px';
					heart[i].style.color=heartcolor[randommaker(heartcolor.length)]
					heart[i].style.zIndex=1000
					heart[i].sink=sinkspeed*heart[i].size/5
					if (heartingzone==1) {heart[i].posx=randommaker(marginright-heart[i].size)}
					if (heartingzone==2) {heart[i].posx=randommaker(marginright/2-heart[i].size)}
					if (heartingzone==3) {heart[i].posx=randommaker(marginright/2-heart[i].size)+marginright/4}
					if (heartingzone==4) {heart[i].posx=randommaker(marginright/2-heart[i].size)+marginright/2}
					heart[i].posy=randommaker(2*marginbottom-marginbottom-2*heart[i].size)
					heart[i].style.left=heart[i].posx+'px';
					heart[i].style.top=heart[i].posy+'px';
			}
			moveheart()
	}

	function moveheart() {
			for (i=0;i<=heartmax;i++) {
					crds[i] += x_mv[i];
					heart[i].posy+=heart[i].sink
					heart[i].style.left=heart[i].posx+lftrght[i]*Math.sin(crds[i])+'px';
					heart[i].style.top=heart[i].posy+'px';

					if (heart[i].posy>=marginbottom-2*heart[i].size || parseInt(heart[i].style.left)>(marginright-3*lftrght[i])){
							if (heartingzone==1) {heart[i].posx=randommaker(marginright-heart[i].size)}
							if (heartingzone==2) {heart[i].posx=randommaker(marginright/2-heart[i].size)}
							if (heartingzone==3) {heart[i].posx=randommaker(marginright/2-heart[i].size)+marginright/4}
							if (heartingzone==4) {heart[i].posx=randommaker(marginright/2-heart[i].size)+marginright/2}
							heart[i].posy=0
					}
			}
			var timer=setTimeout("moveheart()",50)
	}

	for (i=0;i<=heartmax;i++) {
			document.write("<span id='s"+i+"' style='position:absolute;top:-"+heartmaxsize+"'>"+heartletter+"</span>")
	}
	if (browserok) {
			window.onload=initheart
	}
	</script>

	<!-- valentines_heart [ end ] -->
	<?php   
}