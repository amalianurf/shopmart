<?php 

require_once 'core/Controller.php';
require_once 'core/Router.php';
require_once 'core/Database.php';

require_once 'config/config.php';

require_once 'controllers/Home.php';
require_once 'controllers/Product.php';
require_once 'controllers/Cart.php';
require_once 'controllers/User.php';
require_once 'controllers/Category.php';

require_once 'middleware/Authentication.php';
require_once 'middleware/Authorization.php';