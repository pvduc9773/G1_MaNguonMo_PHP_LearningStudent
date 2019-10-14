<?php
session_start();
include_once("../model/entity/user.php");
include_once("header.php");
include_once("nav.php");
?>
<?php
    $user = unserialize($_SESSION["user"]);
    if ($user != null) {
        echo "Xin chào, tôi là " . $user->fullName;
    } else {
        var_dump($user);
        header("location:login.php");
    }
?>

<?php
include_once("footer.php"); 
?>

