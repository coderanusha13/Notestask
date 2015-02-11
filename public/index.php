<?php
namespace notes\Model;

require_once '../vendor/autoload.php';
use notes\Model\User as User;

echo "index";
$user = new User();
print_r($user);