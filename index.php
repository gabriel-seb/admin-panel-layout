<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Karizmi - Inicio</title>
  <?php
  require('codes/head_config.php');
  ?>
  <link href="css/Home.css" type="text/css" rel="stylesheet" />
  <script type="text/javascript" src="js/HomeSlider.js"></script>
  <?php
    //ESTABLECE CONEXION MYSQL
  require('codes/bd_con.php');
  if (!$con){
    die('Could not connect: ' . mysql_error());
  }else{
        //SELECCIONA BD
    require('codes/bd_selection.php');
    ?>
  </head>
  <body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <?php
    require('codes/header.php');
    ?>
    <div class="content">
     <div class="content_center">
       <div class="content_promo">
         <div class="content_promo_title">
           <h1>Se acerca el d&iacutea del bioanalista! Abril 25</h1>
         </div>
         <div class="content_promo_phone">
           <p>Desea Asistencia telef&oacutenica? Llame al: +58 (241) 822.05.80</p>
           <p id="promo_phone_img"><img src="img/telefono.gif" alt="Llame al: +58 (241) 822.05.80" title="Llame al: +58 (241) 822.05.80"/></p>
         </div>
         <div class="content_promo_select" id="BlueText">
           Te recomendamos estos arreglos o &nbsp;
           <select>
            <option>ver m&aacutes fechas pr&oacuteximas</option>
            <option>San Valentin</option>
            <option>D&iacutea de la madre</option>
          </select>
        </div>
      </div>
      <div class="HomeSlider">
       <div class="OcasionesSlider">
        <?php
            //Muestra elementos de Slider de Banners
        $result=null;
        $result = mysql_query("SELECT kw_banners.id as id, kw_banners.name as name, url, css
          FROM `kw_banners`,  `kw_banners_colors`,
          (SELECT kw_banners.id AS id, DATEDIFF(kw_banners.date, CURDATE()) AS days FROM `kw_banners` , `kw_banners_colors` WHERE kw_banners.id_kw_banners_colors=kw_banners_colors.id and kw_banners.status=0 ORDER BY days) as days
          WHERE
          kw_banners.id = days.id and
          kw_banners.id_kw_banners_colors = kw_banners_colors.id and
          days.days>=0
          ORDER BY days.days ASC
          LIMIT 5");
        $numeration=0;
        while($row = mysql_fetch_array($result)){
          echo ('<p class="btn_slr_'.$numeration.' '.$row['css'].'" id="'.$numeration.'">'.$row['name'].'</p>');
          $numeration++;
        }
        ?>
        <div class="TwitterSection">
          <p>Karizmi en Twitter</p>
          <a href="https://twitter.com/Karizmi" class="twitter-follow-button" data-show-count="false" data-lang="es" data-size="medium">Follow @Karizmi</a>
          <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
      </div>
      <div class="SliderContent">
        <?php
        $result=null;
        $numeration=0;
        $result = mysql_query("SELECT kw_banners.id as id, name, url FROM `kw_banners`, (SELECT kw_banners.id AS id, DATEDIFF(kw_banners.date, CURDATE()) AS days FROM `kw_banners` , `kw_banners_colors` WHERE kw_banners.id_kw_banners_colors=kw_banners_colors.id and kw_banners.status=0 ORDER BY days) as days WHERE kw_banners.id = days.id and days.days>=0 ORDER BY days.days asc limit 5");
        while($row = mysql_fetch_array($result)){
          echo ('<div class="itm_slr itm_slr_'.$numeration.'" id="'.$numeration.'"><a href="#"><img src="banners/'.$row['id'].'.jpg" alt="'.$row['name'].'" title="'.$row['name'].'" height="290" width="690"/></a></div>');
          $numeration++;
        }
        ?>
      </div>
    </div>
    <div class="UrgentService">
     <a href="#">
       <img src="mini_banner/0.jpg" height="290" width="170" alt="Entregas Urgentes antes de las 3pm" title="Entregas Urgentes antes de las 3pm"/>
     </a>
   </div>
   <div class="InformacionContent">
     <div class="ContentNews">
       <a href="#"><p class="ContentNewsItem">17/02/2012 - (Curiosidades) Que regalar a la madre en su d&iacutea! - Ideas</p></a>
       <a href="#"><p class="ContentNewsMore">Mas Noticias</p></a>
     </div>
     <div class="ContentInfoLateral">
      <h1>Env&iacuteos <br/>Internacionales</h1>
      <p>Enviamos flores a las principales ciudades del mundo. Donde sea que se encuentren sus seres queridos Ud. puede enviarles ese detalle especial desde Karizmi.com</p>
      <a href="#">Ver ubicaciones</a>
    </div>
    <div class="ContentInfoCentral">
        <?php
        $result=null;
        $count=0;
        $result = mysql_query("SELECT count(kw_banners_central.id) as quantity FROM `kw_banners_central`, (SELECT kw_banners_central.id AS id, DATEDIFF( kw_banners_central.date, CURDATE( ) ) AS days FROM  `kw_banners_central` WHERE kw_banners_central.status=0 ORDER BY days) AS days WHERE kw_banners_central.id=days.id AND days<=60");
        while($row = mysql_fetch_array($result)){
           $count=$row['quantity'];
        }
        if($count>0){
          $result=null;
          $bns_ctrl_pos=0;
          $result = mysql_query("SELECT kw_banners_central.id AS id, url, name, DATE_FORMAT(kw_banners_central.date,'%d/%m/%Y ') as date FROM `kw_banners_central`, (SELECT kw_banners_central.id AS id, DATEDIFF( kw_banners_central.date, CURDATE( ) ) AS days FROM  `kw_banners_central` WHERE kw_banners_central.status=0 ORDER BY days) AS days WHERE kw_banners_central.id=days.id AND days<=60");
          while($row = mysql_fetch_array($result)){
            echo '<div class="slr_central slr_ctrl_'.$bns_ctrl_pos.'"><a href="'.$row['url'].'"><img src="banner_central/'.$row['id'].'.jpg" alt="'.$row['name'].' '.$row['date'].'" title="'.$row['name'].' '.$row['date'].'"/></a></div>';
            $bns_ctrl_pos++;
          }
        }
        if($count<=0){
          echo('No hay banners disponibles');
        }
        ?>
    </div>
    <div class="ContentInfoLateral">
      <div class="fb-like-box" data-href="http://www.facebook.com/karizmi" data-width="280" data-height="171" data-show-faces="true" data-stream="false" data-border-color="#EFF3F3" data-header="false"></div>
    </div>
  </div>
  <div class="ProductosTop">
    <?php
    $result=null;
    $result = mysql_query("SELECT kw_products.id as id, kw_products.name as name, price FROM `kw_products`,`kw_top_products`,`kw_product_size_price` WHERE kw_products.id=kw_top_products.id_kw_products and kw_products.id=kw_product_size_price.id_kw_products and availability=0 and status=0 group by kw_top_products.id_kw_products order by kw_top_products.order asc");
    while($row = mysql_fetch_array($result)){
      echo (' <div class="ProductSingle">
        <div class="ProductImg"><a href="Product.php?productid='.$row['id'].'"><img src="productos/'.$row['id'].'/med.jpg" alt="'.$row['name'].'" title="'.$row['name'].'" height="232" width="189"/></a></div>
        <h1 id="ProductoTitulo">
        <a href="Product.php?productid='.$row['id'].'">'.$row['name'].'</a>
        </h1>
        <p id="ProductoPrecio">Desde: <strong>Bs. '.$row['price'].'</strong></p>
        <p id="AgregarBoton"><a href="Product.php?productid='.$row['id'].'">Agregar</a></p>
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
        </div>');
}
mysql_close($con);
}
?>
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