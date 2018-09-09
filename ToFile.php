<?php

set_time_limit(0);
ignore_user_abort(true);

require 'config.php';
require 'classSAVEME.php';

$time = -microtime(true);

$dump = new classSAVEME(new mysqli($host, $user, $password , $database));
$dump->save('backup/saveme ' . date('Y-m-d H-i') . '.sql');

$time += microtime(true);
