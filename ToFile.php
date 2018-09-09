<?php

set_time_limit(0);
ignore_user_abort(true);

require 'config.php';
require 'classSAVEME.php';

$time = -microtime(true);

$dump = new SAVEME(new mysqli($host, $user, $password , $database));
$dump->save('backup/' . date('Y-m-d H-i') . '.sql');
$dump->saveNewDate(date('Y-m-d H-i'));

$time += microtime(true);
