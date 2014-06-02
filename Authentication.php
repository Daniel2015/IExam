<?php

require_once 'models/UsersModel.php';

class Authentication {

    public static function Login($user, $password) {
        if (Authentication::IsAuthenticated()) {
            return false;
        }

        $userEntity = new UsersModel;
        $query = $userEntity->getItems("WHERE username='$user' AND password='" . md5($password) . "'");

        if (empty($query)) {
            return false;
        }

        $loggedInUser = $query[0];

        if ($loggedInUser === null) {
            return false;
        }
        date_default_timezone_set('Europe/Sofia');

        $_SESSION['log'] = 'in';
        $_SESSION['SESS_ID'] = $loggedInUser->id;
        $_SESSION['SESS_FIRST_NAME'] = $loggedInUser->firstName;
        $_SESSION['SESS_LAST_NAME'] = $loggedInUser->lastName;
        $_SESSION['SESS_USERNAME'] = $loggedInUser->username;
        $_SESSION['SESS_TIME'] = date("Y-m-d H:i:s");

        mysql_query("INSERT INTO logged_in_users (firstname, lastname, ID, username, loggedInTime )VALUES('" . $_SESSION['SESS_FIRST_NAME'] . "', '" . $_SESSION['SESS_LAST_NAME'] . "', '" . $_SESSION['SESS_ID'] . "', '" . $_SESSION['SESS_USERNAME'] . "', '" . $_SESSION['SESS_TIME'] . "')") or die("Login failed: " . mysql_error());

        return true;
    }

    public static function Logout() {
        
    }

    public static function IsAuthenticated() {
        return isset($_SESSION['SESS_FIRST_NAME']);
    }

    public static function IsAdmin() {
        return isset($_SESSION['SESS_ADMIN_USERNAME']);
    }

    public static function AllowOnlyAdmins() {
        if (!$this->IsAdmin()) {
            new MessagePage("You aren't admin");
            exit();
        }
    }

}

?>