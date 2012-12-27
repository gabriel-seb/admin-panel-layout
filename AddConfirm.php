<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
		require('codes/head_config.php');
	?>
    <title>Karizmi - Se ha agregado 1 item al carrito</title>
    <link href="css/AddConfirm.css" type="text/css" rel="stylesheet" />
    <?php
		$productid=null;
		$productsize=null;
		$deliverydate=null;
		$deliveryzone=null;
		;
		if(isset($_REQUEST['productid']) and isset($_REQUEST['productsize'])){
			$productid=$_REQUEST['productid'];
			$productsize=$_REQUEST['productsize'];
			//ESTABLECE CONEXION MYSQL
			require('codes/bd_con.php');
			if (!$con){
				die('Could not connect: ' . mysql_error());
			}else{
				//SELECCIONA BD
				require('codes/bd_selection.php');

				//CARGA INFORMACION PRODUCTO AGREGADO
				$result = mysql_query("SELECT kw_products.id as id, kw_products.name as name, id_kw_size as size, price,  kw_size.name as size_name
FROM `kw_products`, `kw_product_size_price`,  `kw_size`
WHERE 
kw_products.id=kw_product_size_price.id_kw_products
and kw_product_size_price.id_kw_size=kw_size.id
and kw_products.availability=0
and kw_products.status=0 and kw_products.id=".$productid." and kw_product_size_price.id_kw_size=".$productsize."");
				
				while($row = mysql_fetch_array($result)){
					$RId=$row['id'];
					$RName=$row['name'];
					$RSize=$row['size'];
					$RPrice=$row['price'];
					$RSizeName=$row['size_name'];
				}
				mysql_close($con);
			}
			
			
		}
	
	
	
	
	?>
</head>
<body>
	<?php
		require('codes/header.php');
	?>
    <div class="content">
    	<div class="content_center">
			<div class="content_product_added">
                <h1>Se ha agregado 1 item al carrito.</h1>
                <div class="content_product_added_info">
                    <div class="content_product_added_img">
                    	<a href="Product.php?productid=<?php echo $RId; ?>"><img src="productos/<?php echo $RId; ?>/med.jpg" alt="#" title="#" height="231" width="189"/></a>
                    </div>
                    <h2><a href="Product.php?productid=<?php echo $RId; ?>"><?php echo $RName; ?></a></h2>
                    <ul>
                    	<li>Fecha de entrega: <strong>Viernes, 15 de diciembre de 2012 (Servicio Express)</strong></li>
                        <li>Zona de env&iacuteo: <strong>Av. Bol&iacutevar, Valencia. Carabobo - Venezuela</strong></li>
                        <li>Tama&ntildeo: <strong><?php echo $RSizeName; ?></strong></li>
                    	<li id="content_product_added_price">Precio: Bs. <?php echo $RPrice; ?></li>
                    </ul>
                </div>
                <div class="content_added_continue">
                	<p><a href="index.php">Continuar comprando</a></p>
                    <p><a href="MyCart.php">Ir a mi Carrito</a></p>
                    <p><a href="#">Ir al Checkout</a></p>
                </div>
                <div class="content_recommended">
                <h3>Te recomendamos los siguientes accesorios para tu arreglo:</h3>
                
                	<div class="ItemRecomendado">
                        <div class="content_product_added_img">
                            <a href="Product.php"><img src="productos/324vgjv124kdfasf/00000001.jpg" alt="#" title="#" height="231" width="189"/></a>
                        </div>
                    	<h2>Bouquet Primaveral en base de vidrio</h2>
                    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris cursus, metus nec tempus blandit, enim enim porta purus, at fermentum sapien nisl ut leo. Praesent id porta augue. Sed non diam mauris. Curabitur venenatis sagittis interdum. </p>
                        <p id="SelectSize">Tama&ntildeo:&nbsp;<select>
                        	<option value="0">Peque&ntildeo</option>
                            <option value="1">Mediano</option>
                            <option value="2">Grande</option>
                            <option value="3">&Uacutenico</option>
                        </select>
                         </p>
                    	<p id="content_accesorio_precio">Precio: Bs. 499,99</p>
                        <a href="MyCart.php"><p id="content_accesorio_agregar">Agregar</p></a>
                    </div>
                    
               
                </div>
            </div>
        </div>
    </div>
	<?php
		require('codes/footer.php');
	?>
</body>
</html>