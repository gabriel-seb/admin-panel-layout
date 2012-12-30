<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	require('codes/head_config.php');

		//VALIDA GET DEL PRODUCTID
	$id=null;
	$name=null;
	$availability=null;
	$description=null;
	$size=null;
	$price=null;
	$img=null;

	function ValidProduct($productid){
		if(is_numeric($productid)) {
			$productid_conversion = intval($productid);
			if ("$productid_conversion" == "$productid") {
				if (is_int($productid_conversion)){

					//ESTABLECE CONEXION MYSQL
					require('codes/bd_con.php');
					if (!$con){
						die('Could not connect: ' . mysql_error());
					}else{
						//SELECCIONA BD
						require('codes/bd_selection.php');

						//VALIDA CANTIDAD DE RESULTADOS DE LA BUSQUEDA
						$resultqty=null;
						$result = mysql_query("SELECT count(id) as cuenta FROM `kw_products` WHERE status='0' and type='0' and id='".$productid_conversion."'");
						while($row = mysql_fetch_array($result)){
							$resultqty=$row['cuenta'];
						}
						if($resultqty!=1){
							//REDIRIGE A PAGINA DE PRODUCTO NO ENCONTRADO
							header ("Location: index.php");
						}

						//CARGA INFORMACION DE ID, NOMBRE, DISPONIBILIDAD Y DESCRIPCION
						$result = mysql_query("SELECT id, name, availability, description FROM `kw_products` WHERE status='0' and type='0' and id='".$productid_conversion."'");
						while($row = mysql_fetch_array($result)){
							global  $id, $name, $availability, $description;
							$id=$row['id'];
							$name=$row['name'];
							$availability=$row['availability'];
							$description=$row['description'];
						}

						//CARGA ARRAY CON PRECIOS Y TAMAÑOS
						$result = mysql_query("SELECT kw_size.name as size, price, kw_size.id as img FROM `kw_products`, `kw_product_size_price`, `kw_size` WHERE kw_products.status=0 and kw_products.type=0 and kw_size.id=kw_product_size_price.id_kw_size and kw_products.id=kw_product_size_price.id_kw_products and kw_products.id='".$productid_conversion."'");
						$i=0;
						while($row = mysql_fetch_array($result)){
							global  $size, $price, $img;
							$size[$i]=$row['size'];
							$price[$i]=$row['price'];
							$img[$i]=$row['img'];
							$i++;
						}
						mysql_close($con);
					}
				} else {
					header ("Location: index.php");
				}
			}else{
				header ("Location: index.php");
			}
		}
		else {
			header ("Location: index.php");
		}
	}

	if(isset($_GET['productid'])){
		ValidProduct($productid_get=$_GET['productid']);
	}else{
		//redirigir a un 404
		header ("Location: index.php");
	}
	?>
	<script type="text/javascript" src="js/ProductAdd.js"></script>
	<title>Karizmi - <?php if(isset($name) and isset($price)){echo $name.' desde Bs. '.$price[0];}else{global  $errorqty; echo $error0; $errorqty++;};?></title>
	<link href="css/Product.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<?php
	require('codes/header.php');
	?>
	<div class="content">
		<div class="content_center">
			<div class="content_product_single">
				<div class="content_product_pic">
					<?php
					if(isset($img)){
						for ($i=0; $i<=count($img)-1; $i++){
							if($i==0){
								echo ('<img src="productos/'.$id.'/'.$img[$i].'.jpg" alt="'.$name.'" title="" id="img'.$img[$i].'" class="imgproduct" rel="'.$img[$i].'" /&gt; height="550" width="450"/>');
							}else{
								echo ('<img src="productos/'.$id.'/'.$img[$i].'.jpg" alt="'.$name.'" title="" id="img'.$img[$i].'" class="imgproduct" rel="'.$img[$i].'" height="550" width="450"/>');
							}
						}
					}else{
						global  $errorqty;
						echo $error0;
						$errorqty++;
					}
					?>
				</div>
				<div class="content_product_information">
					<div class="content_product_location">
						<ul>
							<li><a href="#" id="BlueText">Inicio</a></li>
							<li>/</li>
							<li><a href="#" id="BlueText">Productos</a></li>
							<li>/</li>
							<li id="Bolder"><?php if(isset($name)){echo $name;}else{global  $errorqty; echo $error0; $errorqty++;};?></li>
						</ul>
					</div>
					<div class="content_product_title">
						<h1><?php if(isset($name)){echo $name;}else{global  $errorqty; echo $error0; $errorqty++;};?>.</h1>
					</div>
					<div class="content_product_availability">
						<ul>
							<li>Disponibilidad:</li>
							<li><?php
							if(isset($availability)){
								if($availability==0){
									echo ('En Inventario');
								}
								elseif($availability==1){
									echo ('No Disponible');
								}else{
									echo $error0;
									$errorqty++;
								}
							}else{
								global  $errorqty;
								echo $error0;
								$errorqty++;
							}
							?></li>
						</ul>
					</div>
					<div class="content_product_price_add">
						<ul>
							<li>
								<p id="content_product_price_price">
									<?php
									if(isset($price)){
										echo $price[0].' '.$currency;
									}else{
										global  $errorqty;
										echo $error0;
										$errorqty++;
									};
									?>
								</p>
							</li>
							<?php
							if(isset($availability)){
								if($availability==0){
									echo ('<li><p id="content_product_price_button">AGREGAR</p></li>');
								}
								elseif($availability==1){
									echo ('<li><p id="content_product_price_button_red">AGREGAR</p></li>');
								}else{
									global  $errorqty;
									echo $error0;
									$errorqty++;
								}
							}else{
								global  $errorqty;
								echo $error0;
								$errorqty++;
							}
							?>
						</ul>
					</div>
					<div class="content_product_social">
						<!-- AddThis Button BEGIN -->
						<div class="addthis_toolbox addthis_default_style ">
							<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
							<a class="addthis_button_tweet"></a>
							<a class="addthis_button_pinterest_pinit"></a>
							<a class="addthis_counter addthis_pill_style"></a>
						</div>
						<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50c931754ef7768c"></script>
						<!-- AddThis Button END -->
					</div>
					<div class="content_product_config"><form action="AddConfirm.php" enctype="text/plain" method="get" name="ProductForm" id="ProductForm">
						<p class="product_config_title">Tama&ntilde;o:</p>
						<p id="SelectSize"><select id="SizePriceSelection" name="SizePriceSelection">
							<?php
							if(isset($size) and isset($price) and isset($img)){
								for ($i=0; $i<=count($size)-1; $i++){
									if($i==0){
										echo '<option value="'.$price[$i].'" selected="selected" rel="'.$img[$i].'">'.$size[$i].'</option>';
									}else{
										echo '<option value="'.$price[$i].'" rel="'.$img[$i].'">'.$size[$i].'</option>';
									}
								}
							}else{
								global  $errorqty;
								echo $error0;
								$errorqty++;
							}
							?>
						</select>
					</p>
					<br/>
					<p class="product_config_title">Zona de entrega:</p>
					<p id="SelectZone">
						<?php
						if(isset($availability)){
							if($availability==0){
								echo ('<input type="text" name="DeliveryZone" id="DeliveryZone"/>');
							}
							elseif($availability==1){
								echo ('<input type="text" name="DeliveryZone" id="DeliveryZone" disabled="disabled" class="InputDisabled"/>');
							}else{
								echo $error0;
								$errorqty++;
							}
						}else{
							global  $errorqty;
							echo $error0;
							$errorqty++;
						}
						?>
					</p>
					<br/>
					<p class="product_config_title">Fecha de entrega:</p>
					<p id="SelectSize">
						<?php
						if(isset($availability)){
							if($availability==0){
								echo ('<input type="text" name="DeliveryDate" id="DeliveryDate"/>');
							}
							elseif($availability==1){
								echo ('<input type="text" name="DeliveryDate" id="DeliveryDate" disabled="disabled" class="InputDisabled"/>');
							}else{
								echo $error0;
								$errorqty++;
							}
						}else{
							global  $errorqty;
							echo $error0;
							$errorqty++;
						}
						?>
					</p>
				</div>
				<p class="InformacionImportante">Los arreglos no incluyen impuestos ni env&iacute;o.</p>
				<div class="content_product_description">
					<p><?php if(isset($description)){echo $description;}else{global  $errorqty; echo $error0;$errorqty++;};?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<input type="submit" value="Consulta"/>
</form>
<?php
require('codes/footer.php');
?>
</body>
</html>