<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . '/Database/db_sett.php';
 unset($_SESSION['logged_user']);

 header('Location: /');