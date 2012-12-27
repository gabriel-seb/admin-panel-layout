jQuery(document).ready(function(){	
	jQuery(".content_columna_1 ul").hide();
	


	jQuery("#FilterOccasion").toggle(function(){
		jQuery("#SelectionOccasion").fadeIn('fast').show();
	}, function() {
		jQuery("#SelectionOccasion").fadeOut('fast').show();
	});	
	
	jQuery("#FilterFlower").toggle(function(){
		jQuery("#SelectionFlower").fadeIn('fast').show();
	}, function() {
		jQuery("#SelectionFlower").fadeOut('fast').show();
	});	
	
	jQuery("#FilterColor").toggle(function(){
		jQuery("#SelectionColor").fadeIn('fast').show();
	}, function() {
		jQuery("#SelectionColor").fadeOut('fast').show();
	});	


	
	
})
