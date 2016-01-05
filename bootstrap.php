<?php

$_ENV = array(
  'DB_HOST' => '127.0.0.1',
  'DB_NAME' => 'adlister_db',
  'DB_USER' => 'adlister_admin',
  'DB_PASS' => 'password'
);

require 'database/db_connect.php';
require_once 'models/BaseModel.php';
require_once 'models/Ad.php';
require_once 'models/User.php';
require_once 'models/Keyword.php';
require_once 'utils/Auth.php';
require_once 'utils/Input.php';
require_once 'utils/Logger.php';

session_start();
