/*
 * WPtouch 1.9.x -The WPtouch Core JS File
 * This file holds all the default jQuery & Ajax functions for the theme
 * Copyright (c) 2008 - 2010 Duane Storey & Dale Mugford (BraveNewCode Inc.)
 * Licensed under GPL.
 *
 * Last Updated: February 20th, 2010
 */

/////// -- Let's setup a unique namspace in jQuery -- ///////
$wptouch = jQuery.noConflict();

// Make images and captions centered if they're bigger than 150 pixels
jQuery(document).ready( function() {

var tsize = $wptouch.cookies.get('textsize');
	if (tsize == 12) {
		$wptouch("#singlentry").css("font-size","12px");
	}
    if (tsize == 14) {
		$wptouch("#singlentry").css("font-size","14px");
	}
	if (tsize == 16) {
		$wptouch("#singlentry").css("font-size","16px");
	}
	
	var imgWidth = $wptouch(".post img").width();
	var captionWidth = $wptouch(".post .wp-caption").width();
	if (imgWidth && captionWidth > 150) {
		$wptouch('.pageentry img').removeClass('alignleft').addClass('aligncenter');
		$wptouch('.pageentry img').removeClass('alignright').addClass('aligncenter');
		$wptouch('.post img').removeClass('alignleft').addClass('aligncenter');
		$wptouch('.post img').removeClass('alignright').addClass('aligncenter');
		$wptouch('.post .wp-caption').removeClass('alignleft').addClass('aligncenter');
		$wptouch('.post .wp-caption').removeClass('alignright').addClass('aligncenter');
	}

//Remove Blip.tv vids
$wptouch('.vvqbliptv').replaceWith('<div class="flash">&nbsp;</div>');

}); //End onReady

/////// -- Get out of frames! -- ///////
if (top.location!= self.location) {top.location = self.location.href}

/////// -- New function removeClass().addCLass() -- ///////
jQuery.fn.replaceClass = function(toReplace,replaceWith){
 return $wptouch(this).each(function(){
   return $wptouch(this).removeClass(toReplace).addClass(replaceWith);
 });
}

/////// --New function fadeToggle() -- ///////
jQuery.fn.fadeToggle = function(speed, easing, callback) { 
	return this.animate({opacity: 'toggle'}, speed, easing, callback); 
};

/////// --New Text-Size Settings -- ///////
function wptouch_set_text_12() {
	$wptouch.cookies.set('textsize', 12, {expiresAt: new Date( 2012, 1, 1 )});
	$wptouch("#singlentry").css("font-size","12px");
}

function wptouch_set_text_14() {
	$wptouch.cookies.set('textsize', 14, {expiresAt: new Date( 2012, 1, 1 )});
	$wptouch("#singlentry").css("font-size","14px");
}

function wptouch_set_text_16() {
	$wptouch.cookies.set('textsize', 16, {expiresAt: new Date( 2012, 1, 1 )});
//	$wptouch("#singlentry").css("font-size","16px");
}

/////// -- Switch Magic -- ///////
function wptouch_switch_confirmation() {
if (document.cookie && document.cookie.indexOf("wptouch_switch_cookie") > -1) {
// just switch
	$wptouch("a#switch-link").toggleClass("offimg");
	setTimeout('switch_delayer()', 1250); 
} else {
// ask first
	var answer = confirm("Switch to regular view? \n \n You can switch back to mobile view again in the footer.");
	if (answer){
	$wptouch("a#switch-link").toggleClass("offimg");
	setTimeout('switch_delayer()', 1350); 
		}
	}
}

/////// -- Prowl Results -- ///////
setTimeout(function() { $wptouch('#prowl-success').fadeOut(400); }, 5250);
setTimeout(function() { $wptouch('#prowl-fail').fadeOut(400); }, 5250);

/////// -- Menu Toggles, Effects -- ///////
function bnc_jquery_menu_drop() {
	$wptouch('#wptouch-menu').fadeToggle(400);
	$wptouch("#headerbar-menu a").toggleClass("open");
}

function bnc_jquery_login_toggle() { $wptouch('#wptouch-login').fadeToggle(400); }

function bnc_jquery_search_toggle() { $wptouch('#wptouch-search').fadeToggle(400); }

function bnc_jquery_gigpress_toggle() { $wptouch('#wptouch-gigpress').fadeToggle(400); }

function bnc_jquery_prowl_open() { $wptouch('#prowl-message').fadeToggle(400); }

function bnc_jquery_wordtwit_open() { $wptouch('#wptouch-wordtwit').fadeToggle(400); }

/////// -- Ajax comments -- ///////
function bnc_showhide_coms_toggle() {
	$wptouch('#commentlist').fadeToggle(400);
	$wptouch("img#com-arrow").toggleClass("com-arrow-down");
	$wptouch("h3#com-head").toggleClass("comhead-open");
}

function commentAdded() {
    if ($wptouch('#errors')) {
        $wptouch('#errors').hide();
	}
        
    if ($wptouch('#nocomment')) {
        $wptouch('#nocomment').hide();
    }
    
    if($wptouch('#hidelist')) {
        $wptouch('#hidelist').hide();
    }

    $wptouch("#commentform").hide();
    $wptouch("#the-new-comment").fadeIn(400);
    $wptouch("#refresher").fadeIn(400);
}


/////// --Single Post Page -- ///////
function wptouch_toggle_twitter() {
	$wptouch('#twitter-box').fadeToggle(400);
}

function wptouch_toggle_bookmarks() {
	$wptouch('#bookmark-box').fadeToggle(400);
}

/////// --jQuery Tabs-- ///////
$wptouch(function () {
    var tabContainers = $wptouch('#menu-head > ul');
    
    $wptouch('#tabnav a').click(function () {
        tabContainers.hide().filter(this.hash).show();
        
        $wptouch('#tabnav a').removeClass('selected');
        $wptouch(this).addClass('selected');
        
        return false;
    }).filter(':first').click();
});

/////// -- Tweak jQuery Timer -- ///////
$wptouch.timerId = setInterval(function(){
	var timers = jQuery.timers;
	for (var i = 0; i < timers.length; i++) {
		if (!timers[i]()) {
			timers.splice(i--, 1);
		}
	}
	if (!timers.length) {
		clearInterval(jQuery.timerId);
		jQuery.timerId = null;
	}
}, 83);

// End WPtouch jS