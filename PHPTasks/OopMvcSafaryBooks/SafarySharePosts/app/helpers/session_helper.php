<?php
session_start();

//flash message helper
//EXAMPLE - flash('register_success', ' You are registered')
//DISPLAY IN VIEW - <?=echo flash('register_success')
//WTF BRAD??
function flash($name = '', $message = '', $class = 'alert alert-success')
{
    if (!empty($name)) {
        if (!empty($message) && empty($_SESSION[$name])) {
            if(!empty($_SESSION[$name])){
                unset($_SESSION[$name]);
            }
            if(!empty($_SESSION[$name.'_class'])){
                unset($_SESSION[$name.'_class']);
            }

            $_SESSION[$name]=$message;
            $_SESSION[$name. '_class']=$class;
        }elseif (empty($message) && !empty($_SESSION[$name])){
            $class = !empty( $_SESSION[$name. '_class'])? $_SESSION[$name. '_class'] :'';
            echo '<div class="'. $class .'" id="msg-flash">'. $_SESSION[$name] .'</div>';
            unset($_SESSION[$name],$_SESSION[$name.'_class']);
        }
    }
}

function isLoggedIn(): bool
{
    return isset($_SESSION['user_id']);
}
