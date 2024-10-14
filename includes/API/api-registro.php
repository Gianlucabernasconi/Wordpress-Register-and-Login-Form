<?php


function plz_api_registro(){
    register_rest_route(
        "plz",
        "registro",
        array(
            "methods" => "POST",
            "callback" => "plz_registro_callback"
        )
    );
}

function plz_registro_callback($request){
    $name = $request->get_param('name');
    $email = $request->get_param('email');
    $password = $request->get_param('password');

    $is_user_exist = get_user_by("login", $name);
    $is_email_exist = get_user_by("email", $email);

    if($is_user_exist){
        return array('msg' => "Ese usuario ya existe");
    } elseif($is_email_exist){
        return array('msg' => "Ya existe un usuario con ese email");
    }

    $args = array(
        "user_login" => $name,
        "user_pass"  => $password,
        "user_email" => $email,
        "role"       => "editor"
    );

    $user = wp_insert_user($args);

    if (is_wp_error($user)) {
        return array("msg" => "Hubo un error al registrar el usuario");
    }

    return array("msg" => "El usuario se registró correctamente");
}

add_action("rest_api_init", "plz_api_registro");

//Done