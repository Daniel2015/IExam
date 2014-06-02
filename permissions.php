<?php
require_once 'Authentication.php';
class Permissions
{
    public static function OnlyAdmins() {
        if (!Authentication::IsAdmin()) {
            MessagePage::show("", "Нямата достъм до тази страница!", "danger", "administration/admin_login");
            exit();
        }
    }
    
    public static function OnlyAuthenticated() {
        if (!Authentication::IsAuthenticated()) {
            MessagePage::show("", "Моля, влезте в системата!", "danger", "login");
            exit();
        }
    }
}
?>