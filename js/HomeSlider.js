jQuery(document).ready(function(){
	//INICIALIZAR PRODUCTO
	jQuery(".itm_slr").hide();
	jQuery(".itm_slr").first().show();

	var qty_elm  = jQuery('div.itm_slr').size();
	var active	 = 1;

	if(qty_elm>2){
		jQuery('[class^=btn_slr_]').click(function(){
			jQuery(".itm_slr").hide();
			jQuery(".itm_slr_"+jQuery(this).attr('id')).fadeIn('slow').show();
			active=parseInt(jQuery(this).attr('id'))+1;
			clearInterval(MyWatch);
			MyWatch = setInterval(MySlide, 5000);
		});

		function MySlide() {
			if(active==qty_elm){
				jQuery(".itm_slr").fadeOut('slow').hide();
				jQuery(".itm_slr_"+qty_elm).fadeIn('slow').show();
				active=0;
			}
			if(active<qty_elm){
				jQuery(".itm_slr").fadeOut('slow').hide();
				jQuery(".itm_slr_"+active).fadeIn('slow').show();
				active++;
			}
		}

		var MyWatch = setInterval(MySlide, 5000);


		jQuery(".slr_central").hide();
		jQuery(".slr_central").first().show();
		var qty_elm_ctl_bnr  = jQuery('div.slr_central').size();
		var activeCentral	 = 1;

		function MySlideCentral() {
			if(activeCentral==qty_elm_ctl_bnr){
				jQuery(".slr_central").fadeOut('slow').hide();
				jQuery(".slr_ctrl_"+qty_elm_ctl_bnr).fadeIn('slow').show();
				activeCentral=0;
			}
			if(activeCentral<qty_elm_ctl_bnr){
				jQuery(".slr_central").fadeOut('slow').hide();
				jQuery(".slr_ctrl_"+activeCentral).fadeIn('slow').show();
				activeCentral++;
			}
		}

		var MyWatch2 = setInterval(MySlideCentral, 10000);
	}
})