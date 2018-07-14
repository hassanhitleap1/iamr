// --------------------------------------------------
// demo.js by ThemeModern 2016
// --------------------------------------------------

jQuery(document).ready(function($){
	
	
	jQuery(".color1").click(function(){
		jQuery("#colors").attr("href", "switcher/colors/set1.css");
	});
	
	jQuery(".color2").click(function(){
		jQuery("#colors").attr("href", "switcher/colors/set2.css");
	});
	
	jQuery(".color3").click(function(){
		jQuery("#colors").attr("href", "switcher/colors/set3.css");
	});
	
	jQuery(".color4").click(function(){
		jQuery("#colors").attr("href", "switcher/colors/set4.css");
	});
	
	jQuery(".color5").click(function(){
		jQuery("#colors").attr("href", "switcher/colors/set5.css");
	});
	
	jQuery(".color6").click(function(){
		jQuery("#colors").attr("href", "switcher/colors/set6.css");
	});

	
	jQuery(".color7").click(function(){
		jQuery("#colors").attr("href", "switcher/colors/set7.css");
	});

	jQuery(".color8").click(function(){
		jQuery("#colors").attr("href", "switcher/colors/set8.css");
	});

	jQuery(".color9").click(function(){
		jQuery("#colors").attr("href", "switcher/colors/set9.css");
	});

	jQuery(".color10").click(function(){
		jQuery("#colors").attr("href", "switcher/colors/set10.css");
	});

	jQuery(".color11").click(function(){
		jQuery("#colors").attr("href", "switcher/colors/set11.css");
	});
	
	jQuery(".color12").click(function(){
		jQuery("#colors").attr("href", "switcher/colors/set12.css");
	});

	jQuery(".reset").click(function(){
		jQuery("#colors").attr("href", "switcher/colors/");
	});

	jQuery(".custom-show").hide();
	
	jQuery(".custom-close").click(function(){
		jQuery(this).hide();
		jQuery(".custom-show").show();
		jQuery('#switcher').animate({'margin-left': '0px'},'fast');
	});
  	
	jQuery(".custom-show").click(function(){
		jQuery(this).hide();
		jQuery(".custom-close").show();
		jQuery('#switcher').animate({'margin-left': '-300px'},'fast');
	});





});

