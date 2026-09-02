<?php

require_once "nmpx_auth.php";

nmpx_logout();

header("Location: index.php");

exit();

?>