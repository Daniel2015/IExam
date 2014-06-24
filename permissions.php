<?php
require_once 'Authentication.php';
require_once('utilities/MessagePage.php');
class Permissions
{
    public static function OnlyAdmins() {
        if (!Authentication::IsAdmin()) {
            MessagePage::show("", "Нямате достъп до тази страница!", "danger", "../index");
            exit();
        }
    }
    
    public static function OnlyAuthenticated() {
        if (!Authentication::IsAuthenticated()) {
            MessagePage::show("", "Моля, влезте в системата!", "danger", "../login");
            exit();
        }
    }
}
?>