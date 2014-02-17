<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "index";
$route['404_override'] = 'notFound';


//$serverName = explode('.', $_SERVER['HTTP_HOST']);
//$GLOBALS['app']['sub_domain'] = $serverName[0];
//if($GLOBALS['app']['sub_domain'] == 'ask'){
//    $route['cat/([a-z]+)'] = "ask/question/cat/$1";
//}

// 用户中心
$route['login.html'] = "user/login";
$route['register.html'] = "user/register";

$route['ask/detail\-(\d+)\.html'] = "ask/question/detail/$1";
$route['ask/([a-z]+)'] = "ask/question/cat/$1";
$route['ask'] = "ask/question/listAll";
$route['ask/cat/([0-9a-zA-Z_]+)'] = "ask/question/cat/$1";

$route['item/detail\-(\d+)\.html'] = "item/item/detail/$1";
$route['item/([a-z]+)'] = "item/item/cat/$1";
$route['item'] = "item/item/index";

$route['zixun/detail\-(\d+)\.html'] = "zixun/article/detail/$1";
$route['zixun/([a-z]+)'] = "zixun/article/cat/$1";

$route['404.html'] = "notFound";

$route['changecity.html'] = "index/changecity";
$route['city.html'] = "index/city_index";

/* 地区分类 */
require 'routes_category.php';

