<?php

function plz_script_registro(){
    // Registrar el script y el estilo
    wp_register_script("plz-registro", plugins_url("../assets/js/registro.js", __FILE__));
    wp_register_style("plz-login-styles", plugins_url("../assets/css/styles.css", __FILE__));
    
    // Encolar el script y el estilo
    wp_enqueue_script("plz-registro");
    wp_enqueue_style("plz-login-styles");

    // Encolar Google Fonts
    wp_enqueue_style('plz-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap', false);

    // Pasar datos desde PHP a JavaScript
    wp_localize_script("plz-registro", "plz", array(
        "rest_url" => rest_url("plz")  
    ));
}

add_action("wp_enqueue_scripts", "plz_script_registro"); //Hook para encolar scripts y estilos

function plz_add_register_form(){
    // Generar el formulario de registro
    $response = ' 
     <main class="signup">
        <div class="signup__container">
            <h1 class="signup__titulo">Registro</h1>
            <form class="signup__form" id="signup">
                <div class="signup__name name--campo">
                    <label for="Name">Name</label>
                    <input name="name" type="text" id="Name" required>
                </div>
                <div class="signup__email name--campo">
                    <label for="email">Email</label>
                    <input name="email" type="email" id="email" required>
                </div>
                <div class="signup__pass name--campo">
                    <label for="password">Password</label>
                    <input name="password" type="password" id="password" required>
                </div>
                <div class="signup__submit">
                    <input type="submit" value="Crear">
                </div>
                <div class="msg"></div>
            </form>
        </div>
    </main>';

    return $response;
}

add_shortcode('plz_registro', 'plz_add_register_form');
