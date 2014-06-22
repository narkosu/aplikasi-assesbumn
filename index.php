<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
// change the following paths if necessary
define('REALHOMEPATH',dirname(__FILE__));
$yii=dirname(__FILE__).'../../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following line when in production mode
// defined('YII_DEBUG') or define('YII_DEBUG',true);

require_once($yii);
Yii::createWebApplication($config)->run();
