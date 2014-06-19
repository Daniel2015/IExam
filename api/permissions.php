<?php
require_once('../Authentication.php');

class Permissions
{
    public static function OnlyAdmins() {
        if (!Authentication::IsAdmin()) {
            echo "Нямата достъм до тази страница!";
            exit();
        }
    }
    
    public static function OnlyAuthenticated() {
        if (!Authentication::IsAuthenticated()) {
			echo "Моля, влезте в системата!";
            exit();
        }
    }
}
?>