<?php
if (!session_id()) {
    session_start();
}

include '../app/core/php.ini';
require_once '../app/init.php';

$app = new App;