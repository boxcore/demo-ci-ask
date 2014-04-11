<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on"){$ssl_set = "s";} else{$ssl_set = "";}
//$config['base_url'] = 'http'.$ssl_set.'://'.$_SERVER['HTTP_HOST'];
$config['base_url'] = 'http://ask.966069.com/';
$config['index_page'] = '';
$config['uri_protocol']	= 'AUTO'; //PATH_INFO
$config['url_suffix'] = '';
$config['language']	= 'english';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = FALSE;
$config['subclass_prefix'] = 'HM_';
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';
$config['allow_get_array']		= TRUE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger']	= 'c';
$config['function_trigger']		= 'm';
$config['directory_trigger']	= 'd'; // experimental not currently in use
$config['log_threshold'] = 0;
$config['log_path'] = '';
$config['log_date_format'] = 'Y-m-d H:i:s';
$config['cache_path'] = '';
$config['encryption_key'] = '966069';

$config['sess_cookie_name']		= '966069_session';
$config['sess_expiration']		= 7200;
$config['sess_expire_on_close']	= FALSE;
$config['sess_encrypt_cookie']	= FALSE;
$config['sess_use_database']	= TRUE;
$config['sess_table_name']		= 'xwd_sessions';
$config['sess_match_ip']		= FALSE;
$config['sess_match_useragent']	= TRUE;
$config['sess_time_to_update']	= 300;
$config['cookie_prefix']	= "";
$config['cookie_domain']	= "";
$config['cookie_path']		= "/";
$config['cookie_secure']	= FALSE;
$config['global_xss_filtering'] = FALSE;
$config['csrf_protection'] = FALSE;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200;
$config['compress_output'] = FALSE;
$config['time_reference'] = 'local';
$config['rewrite_short_tags'] = FALSE;
$config['proxy_ips'] = '';

/* 全局变量 */
$GLOBALS['app']['src_url'] = 'http://ask.966069.com/static/';
$GLOBALS['app']['version'] = '0.2';
$GLOBALS['app']['avatar_url'] = "http://ask.966069.com/data/avatar/";
