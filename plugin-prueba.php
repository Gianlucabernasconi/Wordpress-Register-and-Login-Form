<?php

/*
 * Plugin Name:       Formularios de Registro
 * Plugin URI:        https://github.com/Gianlucabernasconi
 * Description:       Crea formularios de registro e inicio de sesión de usuarios en tu sitio web
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Gianluca Bernasconi
 * Author URI:        https://github.com/Gianlucabernasconi
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://github.com/Gianlucabernasconi
 * Text Domain:       Crea formularios de registro e inicio de sesión de usuarios en tu sitio web
 * Domain Path:       /languages
 */

 

 define("PLZ_PATH", plugin_dir_path(__FILE__));

 
 //APIS
 require_once PLZ_PATH."includes/API/api-registro.php";
 require_once PLZ_PATH."includes/API/api-login.php";

 

 //SHORTCODES
 require_once PLZ_PATH."public/shortcodes/form-registro.php";
 require_once PLZ_PATH."public/shortcodes/form-inicio-sesion.php";


 function plz_plugin_activar(){
    add_role('cliente', "Cliente", "read_post");
 }

 register_activation_hook(__FILE__, "plz_plugin_activar");

 function plz_plugin_desactivar(){
    remove_role("cliente");
 }

 register_deactivation_hook(__FILE__, "plz_plugin_desactivar");
