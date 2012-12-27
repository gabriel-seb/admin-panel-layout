<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
		require('codes/head_config.php');
	?>
    <title>Karizmi - Lista</title>
    <link href="css/OcasionList.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="js/CatalogFilter.js"></script>
</head>
<body>
	<?php
		require('codes/header.php');
		
		//ESTABLECE CONEXION MYSQL
		require('codes/bd_con.php');
		if (!$con){
			die('Could not connect: ' . mysql_error());
		}else{
			//SELECCIONA BD
			require('codes/bd_selection.php');
	?>
    <div class="content">
    	<div class="content_center">
        	<div class="content_promo">
            	<div class="content_promo_title">
                	<h1>Se acerca el d&iacute;a del bioanalista! Abril 25</h1>
                </div>
                <div class="content_promo_phone">
                	<p>Ordenar v&iacute;a telef&oacute;nica  +58 (241) 822.05.80</p>
                </div>   
            	<div class="content_promo_select" id="BlueText">
                	Te recomendamos estos arreglos o &nbsp;
                    <select>
                    <option>ver m&aacute;s fechas pr&oacute;ximas</option>
                    <option>San Valentin</option>
                    <option>D&iacute;a de la madre</option>
                    </select>
                </div>
        	</div>
        	<div class="content_columna_1">
            	<p class="FilterTitle" id="FilterOccasion">Arreglos por Ocasi&oacute;n</p>
            	<ul id="SelectionOccasion">
                <?php
				//VALIDA CANTIDAD DE RESULTADOS DE LA BUSQUEDA
					$resultqty=null;
					$result = mysql_query("SELECT id, name FROM `kw_occasion` WHERE 1 order by name asc");
					while($row = mysql_fetch_array($result)){
						echo ('<li>'.$row['name'].'</li>');
					}
				?>
                </ul>
                <p class="FilterTitle">Tipos de Arreglos</p> 
                <p class="FilterTitle" id="FilterFlower">por Flor</p>
                <ul id="SelectionFlower">
                <?php
				//VALIDA CANTIDAD DE RESULTADOS DE LA BUSQUEDA
					$resultqty=null;
					$result = mysql_query("SELECT id, name FROM `kw_flowers` WHERE 1 order by name asc");
					while($row = mysql_fetch_array($result)){
						echo ('<li>'.$row['name'].'</li>');
					}
				?>
                </ul>
                <p class="FilterTitle" id="FilterColor">por Colores</p>
                <ul id="SelectionColor">
				<?php
				//VALIDA CANTIDAD DE RESULTADOS DE LA BUSQUEDA
					$resultqty=null;
					$result = mysql_query("SELECT id, name FROM `kw_colors` WHERE 1 order by name asc");
					while($row = mysql_fetch_array($result)){
						echo ('<li>'.$row['name'].'</li>');
					}
				}
				mysql_close($con);
				?>
                </ul>
                <p class="FilterTitle">Rango de Precios</p>          
            </div>
            <div class="content_columna_2">
            	<div class="content_product_location">
                    	<ul>
                        	<li><a href="#" id="BlueText">Inicio</a></li>
                            <li>/</li>
                            <li><a href="#" id="BlueText">Ocasi&oacute;n</a></li>
                            <li>/</li>
                            <li id="Bolder">Amor y romance</li>
                        </ul>
                </div>
                <h1>Amor y romance</h1>
                    <div class="ProductSingle">
                        <div class="ProductImg"><a href="Product.php"><img src="productos/324vgjv124kdfasf/00000001.jpg" alt="#" title="#" height="232" width="189"/></a></div>
                        <p><a href="Product.php" id="ProductoTitulo">Bouquet Primaveral en base de vidrio</a></p>
                        <p id="ProductoPrecio">Desde: <strong>Bs. 499,99</strong></p>
                        <p id="AgregarBoton"><a href="#">Agregar</a></p>
                        <div class="social">
                            <!-- AddThis Button BEGIN -->
                            <div class="addthis_toolbox addthis_default_style ">
                            <a class="addthis_button_preferred_1"></a>
                            <a class="addthis_button_preferred_2"></a>
                            <a class="addthis_button_preferred_3"></a>
                            <a class="addthis_button_preferred_4"></a>
                            <a class="addthis_button_compact"></a>
                            <a class="addthis_counter addthis_bubble_style"></a>
                            </div>
                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50ca1909157e3cbd"></script>
                            <!-- AddThis Button END -->
                        </div>
                    </div>
          
              
                <div class="productos_ordenar">
                	Ordenar por&nbsp;
                	<select>
                    	<option>Precio</option>
                    	<option>Flores</option>
                        <option>Color</option>
                	</select>
                </div>
            </div>
        </div>
    </div>
	<?php
		require('codes/footer.php');
	?>
</body>
</html>