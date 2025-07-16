<?php

use Core\Authenticator;
use Core\App;
$auth = new Authenticator(App::container()->resolve(\Core\Database::class));

$auth->logout();

header("location:/");
exit;