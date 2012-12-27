jQuery(document).ready(function(){	
	//INICIALIZAR PRODUCTO
	jQuery(".imgproduct").hide();
	
	jQuery('#SizePriceSelection option[selected="selected"]').each(
		function() {
			jQuery(this).removeAttr('selected');
		}
	);
	
	jQuery("#SizePriceSelection option:first").attr('selected','selected');
	jQuery("#img"+jQuery("option:selected", this).attr("rel")).fadeIn('slow').show();

	//SELECCION DE IMAGEN A MOSTRAR
	jQuery("#SizePriceSelection").change(function(){
		jQuery("#content_product_price_price").empty().fadeOut('fast');
    	jQuery("#content_product_price_price").append(jQuery("#SizePriceSelection").val()+' Bs.').fadeIn('slow');
		jQuery(".imgproduct").hide();
		jQuery("#img"+jQuery("option:selected", this).attr("rel")).fadeIn('slow').show();
	});
	
	//SELECCION DE ZONA DE ENVIO
	jQuery("#DeliveryZone").focus(function(){
		jQuery(".content_product_config_lightbox").fadeIn('slow').show();	
	});
	
	//SELECCION DE FECHA DE ENVIO
	jQuery("#DeliveryDate").focus(function(){
		jQuery(".content_product_config_lightbox").fadeIn('slow').show();
	});
	
	//SUBMIT Y VALIDACION DE PRODUCTO
	jQuery("#content_product_price_button").click(function(){
		alert ('Agregar Producto a carrito');
	});
	
	//CONFIGURACION LIGHTBOX
	jQuery(".content_product_config_lightbox").click(function(){
		jQuery(this).fadeOut('slow').hide();
	});
	
	
	jQuery("#ProductForm").submit(function(){
		var input = jQuery("<input>").attr("type", "hidden").attr("name", "productid").val("3");
		var input2 = jQuery("<input>").attr("type", "hidden").attr("name", "productsize").val(jQuery("option:selected", this).attr("rel"));
		jQuery('#ProductForm').append(jQuery(input),jQuery(input2));;
		
		
		
		alert ('procesando');
		return true;
	});
	
	
})
