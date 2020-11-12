<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/libs/rb.php';

R::setup( 'mysql:host=localhost;dbname=yakuza2',
    'mysql', 'mysql' );

session_start();

