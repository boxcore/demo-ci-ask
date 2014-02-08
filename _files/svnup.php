<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Core
 * Date: 14-2-8
 * Time: 上午10:23
 * To change this template use File | Settings | File Templates.
 */
$username = 'hcz';
$password = 'hcz_2014@';

$name = isset($_GET['name']) ? $_GET['name'] : '';
if($name){
    $dir = '/home/www/'.$name;
    system("svn update {$dir} --username {$username} --password {$password}");
    echo 'ok';
}else{
    $dir = '';
    echo 'false!';
}



//
//system("svn up --username $username --password $password");
//
//svn update /home/www/xinwenda --username boxcore --password hcz654321