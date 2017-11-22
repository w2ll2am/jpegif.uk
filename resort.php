<?php
setcookie("sortMode", $_GET["mode"], time() + (86400 * 60), "/"); // 86400 = 1 day
header("Location: index.php")
?>