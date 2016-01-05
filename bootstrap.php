<?php

// session_start();
// $sessionId = session_id();
// $isLoggedIn = false;

$_ENV = require '.env.php';

require 'database/db_connect.php';
require_once 'models/BaseModel.php';
require_once 'models/Ad.php';
require_once 'models/User.php';
require_once 'models/Keyword.php';
require_once 'utils/Auth.php';
require_once 'utils/Input.php';
require_once 'utils/Logger.php';

session_start();
