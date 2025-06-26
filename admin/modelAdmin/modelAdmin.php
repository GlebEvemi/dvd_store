<?php
class modelAdmin {
    // ВЫХОД ИЗ АДМИНКИ
    public static function userLogout() {
        session_unset();
        session_destroy();
    }
}
