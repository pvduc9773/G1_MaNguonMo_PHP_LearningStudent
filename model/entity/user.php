<?php 
    class User {
        var $userName;
        var $password;
        var $fullName;

        function User($_userName, $_pass, $_fullName) {
            $this->userName = $_userName;
            $this->password = $_pass;
            $this->fullName = $_fullName;
        }

        public static function authentication($_userName, $_pass) {
            if ($_userName=="admin@gmail.com" && $_pass=="123") {
                return new User($_userName, $_pass, "pvduc9773");
            }
            return null;
        }
    }
?>