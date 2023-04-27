<?php
session_start();
session_unset();
session_destroy();
setcookie('login_cookie', '', time() - 1, '/');
header("Location: index.php");
exit;
