<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Karizmi - Inicio</title>
	<?php
		require('codes/head_config.php');
	?>
    <link href="css/Reminders.css" type="text/css" rel="stylesheet" />
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
            <div class="content_reminders">
            	<h1>Recordatorios</h1>
                <p>Le invitamos a agregar aquí sus fechas importantes, y nosotros nos encargaremos de recordarselas vía correo electrónico</p>
                <div class="content_reminders_form">
                	<div class="content_reminders_form_items">
                    	<p>Ocasión:</p>
                        <input type="text" name="ocasion" maxlength="50" />
                    </div>
                    <div class="content_reminders_form_items">
                   		<p>Fecha:</p>
                        <input type="text" name="fecha" maxlength="50" />
                    </div>
                    <div class="content_reminders_form_items">
                    	<p>Correo:</p>
                        <input type="text" name="correo" maxlength="50" />
                    </div>
                    <div class="content_reminders_form_items">
                    	<p>Notificación:</p>
                        <select>
                        	<option>Una semana antes</option>
                            <option>Dos semana antes</option>
                            <option>Un día antes</option>                      
                        </select>
                    </div>
                    <div class="content_reminders_form_descripcion">
                    	<p>Descripción:</p><br/>
                        <textarea></textarea>
                    </div>
              	</div>
            	<p>Si deseas editar las fechas que has agregado con nosotros, debes estar registrado como cliente. <strong>Click aquí para registrarse</strong> de lo contrario, continue la creacion de su nuevo recordatorio sin registrarse.</p>
                <p id="remindersbutton">Crear Recordatorio</p>
            </div>
        </div>
    </div>
	<?php
		require('codes/footer.php');
	?>
</body>
</html>