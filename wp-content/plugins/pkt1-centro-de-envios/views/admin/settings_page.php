<?php
/*
* @package WooCommerce PKT1 Centro de Envíos
*/
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit si se accesa directamente
}
function pkt1_settings_page_callback(){
	$url_success = urldecode($_GET['success']);
	$url_error = urldecode($_GET['error']);  
  ?>
  <div id="wpbody" role="main">
    <div id="wpbody-content" aria-label="Main content" tabindex="0">
      <div class="wrap">
        <h1><?php _e('Configuraciones PKT1','pkt1'); ?></h1>
        <?php
          if(isset($_GET['success']))
            echo '<div class="notice is-dismissible notice-success">
                    <p><strong>'.$url_success.'</strong>.</p>
                    <button type="button" class="notice-dismiss"><span class="screen-reader-text">Descartar este aviso.</span></button>
                  </div>';
            if(isset($_GET['error']))
              echo '<div class="notice is-dismissible notice-error">
                      <p><strong>'.$url_error.'</strong>.</p>
                      <button type="button" class="notice-dismiss"><span class="screen-reader-text">Descartar este aviso.</span></button>
                    </div>';
        ?>
        <table class="form-table">
          <tbody>
            <form method="POST" action="admin-post.php" novalidate="novalidate">
              <input type="hidden" name="action" value="pkt1_save_settings_field">
              <?php wp_nonce_field( 'pkt1_save_settings_field_verify'); 
                $settings = get_option( 'pkt1_settings');
              ?>
              <tr>
                <th>
                  <label for="pkt1_idcliente"><?php _e('Id Cliente','pkt1'); ?> <br><small>Asignado por PKT1</small></label>
                </th>
                <td>
                  <input type="number" name="pkt1_idcliente" id="pkt1_idcliente" style="min-width: 350px;" value="<?php echo esc_attr( $settings['pkt1_idcliente'] );?>" required>
                </td>
              </tr>

              <tr>
                <th>
                  <label for="pkt1_username"><?php _e('Nombre de Usuario','pkt1'); ?> <br><small>Asignado por PKT1</small></label>
                </th>
                <td>
                  <input type="text" name="pkt1_username" id="pkt1_username" style="min-width: 350px;" value="<?php echo esc_attr( $settings['pkt1_username'] );?>" required>
                </td>
              </tr>

              <tr>
                <th>
                  <label for="pkt1_secret"><?php _e('Secret','pkt1'); ?> <br><small>Asignado por PKT1</small></label>
                </th>
                <td>
                  <input type="text" name="pkt1_secret" id="pkt1_secret" style="min-width: 350px;" value="<?php  echo esc_attr( $settings['pkt1_secret'] );?>" required>
                </td>
              </tr>

              <tr>
                <th>
                  <label for="pkt1_token"><?php _e('API Key','pkt1'); ?> <br><small>Asignado por PKT1</small></label>
                </th>
                <td>
                  <input type="text" name="pkt1_token" id="pkt1_token" style="min-width: 350px;" value="<?php echo esc_attr( $settings['pkt1_token'] );?>" required>
                </td>
              </tr>

              <tr>
                <th>
                  <label for="pkt1_contenido"><?php _e('Mercancia','pkt1'); ?> <br><small>Tipo de Mercacia</small></label>
                </th>
                <td>
                  <input type="text" name="pkt1_contenido" id="pkt1_contenido" maxlength="30" style="min-width: 350px;" value="<?php echo esc_attr( $settings['pkt1_contenido'] );?>" required>
                </td>
              </tr>

              <tr>
                <th>
                  <label for="pkt1_resultados"><?php _e('Resultados','pkt1'); ?></label>
                </th>
                <td>
                  <select name="pkt1_resultados">
                    <option value="0" <?php if(isset($settings['pkt1_resultados'])) if($settings['pkt1_resultados'] == "0") echo 'selected';?>>Todos los resultados</option>
                    <option value="1" <?php if(isset($settings['pkt1_resultados'])) if($settings['pkt1_resultados'] == "1") echo 'selected';?>>El más barato y el más rápido</option>
                    <option value="2" <?php if(isset($settings['pkt1_resultados'])) if($settings['pkt1_resultados'] == "2") echo 'selected';?>>Solo el más barato</option>
                  </select>
                </td>
              </tr>


              <tr>
                <th>
                  <label for="pkt1_existesucursal"><?php _e('Existe sucursal','pkt1'); ?></label>
                </th>
                <td>
                  <input type="checkbox" name="pkt1_existesucursal" id="pkt1_existesucursal"  value="enabled" <?php if(isset($settings['pkt1_existesucursal'])) if($settings['pkt1_existesucursal'] == "enabled") echo 'checked';?> >
                </td>
              </tr>

              <tr id="pkt1_tridsucursal" <?php if(!isset($settings['pkt1_existesucursal'])){
                echo 'style="display:none"';
              } else {
                if($settings['pkt1_existesucursal'] != "enabled") echo 'style="display:none"';
              }?> >
                <th>
                  <label for="pkt1_idsucursal"><?php _e('# Sucursal','pkt1'); ?> <br><small>Asignado por PKT1</small></label>
                </th>
                <td>
                  <input type="number" name="pkt1_idsucursal" id="pkt1_idsucursal" style="min-width: 350px;" value="<?php echo esc_attr( $settings['pkt1_idsucursal'] );?>" required>
                </td>
              </tr>

              <tr>
                <th>
                  <label for="pkt1_visualizacion"><?php _e('Resultados','pkt1'); ?></label>
                </th>
                <td>
                  <select name="pkt1_visualizacion">
                    <option value="renglon" <?php if(isset($settings['pkt1_visualizacion'])) if($settings['pkt1_visualizacion'] == "renglon") echo 'selected';?>>Renglones</option>
                    <option value="tarjeta" <?php if(isset($settings['pkt1_visualizacion'])) if($settings['pkt1_visualizacion'] == "tarjeta") echo 'selected';?>>Tarjetas</option>
                  </select>
                </td>
              </tr>

              <tr>
                <th>
                  <label for="pkt1_modooscuro"><?php _e('Modo Oscuro','pkt1'); ?></label>
                </th>
                <td>
                  <input type="checkbox" name="pkt1_modooscuro" id="pkt1_modooscuro" value="enabled" <?php if(isset($settings['pkt1_modooscuro'])) if($settings['pkt1_modooscuro'] == "enabled") echo 'checked';?> >
                </td>
              </tr>

              <tr>
                <th>
                  <label for="pkt1_tiempos"><?php _e('Tiempos','pkt1'); ?><br><small>Ocultar Tiempos de entrega</small></label>
                </th>
                <td>
                  <input type="checkbox" name="pkt1_tiempos" id="pkt1_tiempos" value="enabled" <?php if(isset($settings['pkt1_tiempos'])) if($settings['pkt1_tiempos'] == "enabled") echo 'checked';?> >
                </td>
              </tr>
			  
			  <tr>
                <th>
                  <label for="pkt1_onelabel"><?php _e('Etiqueta Unica','pkt1'); ?><br><small>1 sola etiqueta para todo mi envio(no compatible con "Dimensiones y peso Unicos")</small></label>
                </th>
                <td>
                  <input type="checkbox" name="pkt1_onelabel" id="pkt1_onelabel" value="enabled" <?php if(isset($settings['pkt1_onelabel'])) if($settings['pkt1_onelabel'] == "enabled") echo 'checked';?> >
                </td>
              </tr>
			  
			  <tr>
                <th>
                  <label for="pkt1_dimunique"><?php _e('Dimensiones y peso Unicos','pkt1'); ?><br><small>*Todos los envios se cotizaran y despacharan con estos datos</small></label>
                </th>
                <td>
                  <input type="checkbox" name="pkt1_dimunique" id="pkt1_dimunique"  value="enabled" <?php if(isset($settings['pkt1_dimunique'])) if($settings['pkt1_dimunique'] == "enabled") echo 'checked';?> >
                </td>
              </tr>
			  
			   <tr id="pkt1_tridimunique" <?php if(!isset($settings['pkt1_dimunique'])){
                echo 'style="display:none"';
              } else {
                if($settings['pkt1_dimunique'] != "enabled") echo 'style="display:none"';
              }?> >
                <th>
                  <label for="pkt1_dimunique"><?php _e('Dimensiones, Peso y piezas','pkt1'); ?> <br><small>*Del empaque</small><br><small>*Dimensiones En CM</small><br><small>*Peso En KG</small></label>
                </th>
                <td>	
					<div class="col-sm-2">							  
						<strong>Largo</strong> <small>*Cm</small>
					</div>							
					<div class="col-sm-2">							  
						<input type="number" name="pkt1_cnflargo" id="pkt1_cnflargo" value="<?php echo esc_attr( $settings['pkt1_cnflargo'] );?>" >
					</div>
					<div class="col-sm-2">							  
						<strong>Ancho</strong> <small>*Cm</small>
					</div>							
					<div class="col-sm-2">							  
						<input type="number" name="pkt1_cnfancho" id="pkt1_cnfancho"  value="<?php echo esc_attr( $settings['pkt1_cnfancho'] );?>" >
					</div>
					<div class="col-sm-2">							  
						<strong>Alto</strong> <small>*Cm</small>
					</div>							
					<div class="col-sm-2">							  
						<input type="number" name="pkt1_cnfalto" id="pkt1_cnfalto"  value="<?php echo esc_attr( $settings['pkt1_cnfalto'] );?>" >
					</div>
					<div class="col-sm-2">							  
						<strong>Peso</strong> <small>*KG, Min. 0.5</small>
					</div>							
					<div class="col-sm-2">							  
						<input type="number" name="pkt1_cnfpeso" id="pkt1_cnfpeso"  value="<?php echo esc_attr( $settings['pkt1_cnfpeso'] );?>" >
					</div>
					<div class="col-sm-2">							  
						<strong>Piezas</strong></small>
					</div>							
					<div class="col-sm-2">							  
						<input type="number" name="pkt1_cnfpieza" id="pkt1_cnfpieza"  value="<?php echo esc_attr( $settings['pkt1_cnfpieza'] );?>" >
					</div>
						<small>Maximo de piezas por empaque</small>
						<br>
						<small>Dejar vacio si es empaque unico</small>
				</td>
              </tr>

              <tr>
                <td>
                  <p class="submit">
                    <input type="submit" class="button button-primary" value="<?php _e('Guardar cambios','pkt1'); ?>">
                  </p>
                </td>
              </tr>


            </form>
          </tbody>
        </table>
        
      </div>
      <div class="clear"></div>
    </div>
    <!-- wpbody-content -->
    <div class="clear"></div>
  </div>
  
  <?php
  
}
