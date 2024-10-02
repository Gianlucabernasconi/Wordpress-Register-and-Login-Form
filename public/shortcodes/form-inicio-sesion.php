<?php

function plz_script_login(){
    // Registrar el script y el estilo
    wp_register_script("plz-login", plugins_url("../assets/js/login.js", __FILE__));
    wp_register_style("plz-login-styles", plugins_url("../assets/css/styles.css", __FILE__));
    
    // Encolar Google Fonts
    wp_enqueue_style('plz-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap', false);
    
    // Encolar el script y el estilo
    wp_enqueue_script("plz-login");
    wp_enqueue_style("plz-login-styles");

    // Pasar datos desde PHP a JavaScript
    wp_localize_script("plz-login", "plz", array(
        "rest_url" => rest_url("plz")
    ));
}

add_action("wp_enqueue_scripts", "plz_script_login"); //Hook para encolar scripts y estilos

function plz_add_signin_form(){
    // Generar un nonce para la seguridad
    $nonce = wp_create_nonce('plz_signin_nonce');

    $response = '
     <main class="signin">
        <div class="signin__container">
            <h1 class="signin__titulo">Iniciar sesión</h1>
            <form class="signin__form" id="signin" method="POST" action="">
                <div class="signin__email field--container">
                    <label for="email">Email</label>
                    <input name="email" type="email" id="email" required>
                </div>
                <div class="signin__password field--container">
                    <label for="password">Password</label>
                    <input name="password" type="password" id="password" required>
                </div>
                <div class="signin__submit">
                    <input type="hidden" name="plz_nonce" value="'.esc_attr($nonce).'">
                    <input type="submit" value="Acceder">
                </div>
            </form>
        </div>
    </main>';

    return $response;
}

add_shortcode('plz_signin', 'plz_add_signin_form'); // Shortcode para mostrar el formulario
