<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
		require('codes/head_config.php');
	?>
    <title>Karizmi - Mi Carrito</title>
    <link href="css/MyCart.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<?php
		require('codes/header.php');
	?>
    <div class="content">
    	<div class="content_center">
        	<div class="content_promo">
            	<div class="content_promo_title">
                	<h1>Se acerca el día del bioanalista! Abril 25</h1>
                </div>
                <div class="content_promo_phone">
                	<p>¿Desea Asistencia telefónica? Llame al: +58 (241) 822.05.80</p>
                	<p id="promo_phone_img"><img src="img/telefono.gif" alt="Llame al: +58 (241) 822.05.80" title="Llame al: +58 (241) 822.05.80"/></p>
                </div>   
            	<div class="content_promo_select" id="BlueText">
                	Te recomendamos estos arreglos o &nbsp;
                    <select>
                    <option>ver más fechas próximas</option>
                    <option>San Valentin</option>
                    <option>Día de la madre</option>
                    </select>
                </div>
        	</div>
            <div class="ContentCarritoTitulo">	
            	<h1>Carrito</h1>
                <a href="MyCart.php"><p id="ActualizarCarrito">Actualizar</p></a>
                <p>Este es tu carrito de compras, donde puedes ver el arreglo que deseas enviar y agregar los accesorios que quieras antes de realizar el pedido.</p>
            </div>
            <div class="ContentCarritoItemsCont">
            <div class="ContentCarritoTitulos">
                    <p id="CarritoTitulo">Nombre del producto</p>
                    <p id="CarritoPrecio">Precio</p>
                    <p id="CarritoSubtotal">Subtotal</p>
               	</div>
            	<div class="ContentCarritoItem">
            		<div class="CarritoItemImg">
                    	<a href="Product.php"><img src="productos/324vgjv124kdfasf/00000001.jpg" alt="Nombre del producto" title="Nombre del producto" rel="image_src" /&gt; height="103" width="84"/></a>
                    </div>
                    <div class="CarritoItemTitulo">
                    	<a href="Product.php"><p id="BlueText">Bouquet Primaveral en base de vidrio Bouquet Primaveral</p></a>
                    </div>
                    <div class="CarritoItemPrecio">
                    	<p>Bs. 499,99</p>
                    </div>
                    <div class="CarritoItemSubtotal">
                    	<p>Bs. 4.999,99</p>
                    </div>
                    <div class="CarritoItemEliminar">
                    	<a href="MyCart.php"><img src="img/eliminar.gif" alt="Eliminar" title="Eliminar"/></a>
                    </div>
            	</div>
               
                
            </div>
            <div class="ContentCarritoTotal">
            	<h1>Resumen de su Pedido</h1>
                <p>Subtotal</p><p>Bs. 1.249.888,99</p>
                <p>Impuesto (12%)</p><p>Bs. 9.888,99</p>
                <p>Servicio Urgente</p><p>Bs. 888,99</p>
                <p>Otros Cargos</p><p>Bs. 49.888,99</p>
                <p>Envío</p><p>Bs. 49.888,99</p>
                <p id="CarritoTotal">Bs. 2.249.888,99</p><p id="CarritoTotal">Total:</p>
            	
                <p id="Checkout">Checkout</p>
            
            
            </div>
    	</div>
    </div>
	<?php
		require('codes/footer.php');
	?>
</body>
</html>