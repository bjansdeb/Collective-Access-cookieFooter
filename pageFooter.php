<?php
/* ----------------------------------------------------------------------
 * views/pageFormat/pageFooter.php : 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2015-2021 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 *
 * This source code is free and modifiable under the terms of 
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 *
 * ----------------------------------------------------------------------
 */

// include CookieOptionsManager.php
// use __CA_LIB_DIR__.'/CookieOptionsManager.php';

?>
		<div style="clear:both; height:1px;"><!-- empty --></div>
		</div><!-- end pageArea --></div><!-- end col --></div><!-- end row --></div><!-- end container -->
		<footer id="footer">
			<ul class="list-inline pull-right social">
				<li><i class="fa fa-twitter"></i></li>
				<li><i class="fa fa-facebook-square"></i></li>
				<li><i class="fa fa-youtube-play"></i></li>
			</ul>
			<div>
				Footer text here
			</div>
			<ul class="list-inline">
				<li><a href="#">Link 1</a></li>
				<li><a href="#">Link 2</a></li>
				<li><a href="#">Link 3</a></li>
			</ul>
			<div><small>&copy; <a href="https://www.collectiveaccess.org">CollectiveAccess 2022</a></small></div>
		</footer><!-- end footer -->
<?php
	//
	// Output HTML for debug bar
	//
	if(Debug::isEnabled()) {
		print Debug::$bar->getJavascriptRenderer()->render();
	}
?>
	
		<?php print TooltipManager::getLoadHTML(); ?>
		<div id="caMediaPanel"> 
			<div id="caMediaPanelContentArea">
			
			</div>
		</div>
		<script type="text/javascript">

			/*
				Set up the "caMediaPanel" panel that will be triggered by links in object detail
				Note that the actual <div>'s implementing the panel are located here in views/pageFormat/pageFooter.php
			*/
			var caMediaPanel;
			jQuery(document).ready(function() {
				if (caUI.initPanel) {
					caMediaPanel = caUI.initPanel({ 
						panelID: 'caMediaPanel',										/* DOM ID of the <div> enclosing the panel */
						panelContentID: 'caMediaPanelContentArea',		/* DOM ID of the content area <div> in the panel */
						exposeBackgroundColor: '#FFFFFF',						/* color (in hex notation) of background masking out page content; include the leading '#' in the color spec */
						exposeBackgroundOpacity: 0.7,							/* opacity of background color masking out page content; 1.0 is opaque */
						panelTransitionSpeed: 400, 									/* time it takes the panel to fade in/out in milliseconds */
						allowMobileSafariZooming: true,
						mobileSafariViewportTagID: '_msafari_viewport',
						closeButtonSelector: '.close'					/* anything with the CSS classname "close" will trigger the panel to close */
					});
				}

				// if (sessionStorage.length>0) {
				// 	const ck = sessionStorage.getItem("1");
				// 	if(ck == "noCookies"){
				// 		console.log("before erasing", document.cookie);
				// 		eraseCookies();
				// 		console.log("after erasing", document.cookie);
				// 	}
				// }
			});
			/*(function(e,d,b){var a=0;var f=null;var c={x:0,y:0};e("[data-toggle]").closest("li").on("mouseenter",function(g){if(f){f.removeClass("open")}d.clearTimeout(a);f=e(this);a=d.setTimeout(function(){f.addClass("open")},b)}).on("mousemove",function(g){if(Math.abs(c.x-g.ScreenX)>4||Math.abs(c.y-g.ScreenY)>4){c.x=g.ScreenX;c.y=g.ScreenY;return}if(f.hasClass("open")){return}d.clearTimeout(a);a=d.setTimeout(function(){f.addClass("open")},b)}).on("mouseleave",function(g){d.clearTimeout(a);f=e(this);a=d.setTimeout(function(){f.removeClass("open")},b)})})(jQuery,window,200);*/


		</script>
 
 	<div id="cookies-banner" aria-hidden="true">
 		<h3 style="color:white">Ils sont bons mes cookies</h3>
 		<p>Notre site web utilise uniquement des cookies nécessaires à son bon fonctionnement.</p>
 		<p>Vous pouvez en savoir plus sur ceux-ci en cliquant <a href="/Cookies/Disclaimer">ici </a> ou via le lien Cookies en bas de la page.</p>
 		<p><strong>Ces cookies ne collectent pas vos données personnelles.</strong></p>
 		<!-- <button type="button" onclick="removeCookies()">Accepter les cookies essentiels</button> -->
 		<!-- <button type="button" onclick="showBanner()">Ok j'ai compris</button> -->
 		<a id="cookie-button" role="button" class="btn btn-link" onclick="showBanner()">Ok j'ai compris</a>
 	</div>

 	<script type="text/javascript">
			/*cookies pop up */ 

			function cookieApproval(){
	  			const d = new Date();
  				d.setTime(d.getTime() + (180 * 24 * 60 * 60 * 1000));
  				let expires = "expires="+ d.toUTCString();
  				document.cookie = "coBanner= cookieLike;" + expires + "domain=carhif.lescollections.be;path=/";
			}
                  
 			function showBanner(){
 				cookieApproval();
 				// localStorage.setItem("1", "Welcome");
				document.getElementById("cookies-banner").setAttribute("aria-hidden", true);
			}

			function removeCookies(){
				eraseCookies();
 				localStorage.setItem("1", "noCookies");
 				document.getElementById("cookies-banner").setAttribute("aria-hidden", true);				
				// showBanner();
			}

			//si choix cookie vide, ouvre la fenêtre pop up
			const cookiesChoice = $.cookie("coBanner");
			console.log(cookiesChoice);
			// const cookiesChoice = localStorage.getItem("1", "Welcome");
			if (cookiesChoice == null) {
				document.getElementById("cookies-banner").setAttribute("aria-hidden", false);
			}

			function eraseCookies(){
				const cookies = document.cookie.split(";");
				for (var i = cookies.length - 1; i >= 0; i--) {
					name = cookies[i].trim();
					eqIndex = name.indexOf("=");
					name = name.slice(0, eqIndex);
					document.cookie = name +'=; expires=Thu, 01 Jan 1970 00:00:00 UTC; domain=localhost; path=/providence/pawtucket';
				}
			}
                    
 	</script>
		
		<!-- <?= $this->render("Cookies/banner_html.php"); ?> -->
	</body>

	<style type="text/css">
		[aria-hidden='true'] {
  			display: none;
		}

		#cookie-button{
			color: rgb(255, 255, 255); 
			background-color: rgb(97, 162, 41);
		}

		#cookies-banner{
/*			display: none;*/
		    padding: 20px;
    		position: fixed;
    		bottom: 0;
    		left: 0;
    		right: 0;
    		background: rgba(0, 0, 0, 0.7);
    		color: rgba(255, 255, 255, 0.9);
    		z-index: 1;
		}
	</style>
</html>
