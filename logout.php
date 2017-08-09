<?php
setcookie("IDCookie","", time() - 3600);
header('Location: index.php');
?>