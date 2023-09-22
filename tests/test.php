<?php

use itd\EnvReader;

require dirname(__DIR__).'/vendor/autoload.php';
var_dump(EnvReader::get('APP_DEBUG'));

var_dump(iEnv('DATABASE.HOSTNAME'));

