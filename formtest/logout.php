<?php
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
header('LOCATION: index.php');
?>