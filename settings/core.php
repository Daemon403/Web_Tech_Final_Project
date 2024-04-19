<?php

session_start();

function check_login() {
    if (!isset($_SESSION['user_id'])) {
        return true;
    }
    return false;
}

function get_user_role_id() {
    if(isset($_SESSION['rid'])) {
        return $_SESSION['rid'];
    } else {
        return false;
    }
}

function check_admin(){
    if (isset($_SESSION['rid'])) {
        if ($_SESSION['rid'] == 1 || $_SESSION['rid'] == 2) {
            return true;
        } else {
            return false;
        }
    }
    return false;
}

?>
