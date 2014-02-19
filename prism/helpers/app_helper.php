<?php

/**
 * 转义字符串
 * @param mixed
 * @return mixed
 */
function s( $str, $db = NULL ) {
    is_null( $db ) && $db = db();
    return mysql_real_escape_string( $str );
//    return mysql_real_escape_string( $str, $db );
}

/**
 * 格式化sql
 *
 * @param $str
 * @return string
 */
function prepare( $sql, $array, $db = NULL ) {
	if( !is_array( $array ) ) {
		$array = func_get_args();
		$sql   = array_shift( $args );
	}

	$sql = str_replace( array( '?i', '?s' ), array( '%d', '"%s"' ), $sql );
	foreach( $array as $k => $v ) {
		$array[$k] = s( $v, $db );
	}

	return vsprintf( $sql, $array );
}

/**
 * 静态资源链接
 *
 * @param string $uri
 * @return string
 */
function src_url( $uri='' )
{
    if ( isset($GLOBALS['app']['src_url']) && !empty($GLOBALS['app']['src_url']) )
    {
        return $GLOBALS['app']['src_url'].$uri;
    }
    else
    {
        return 'http://ask.7808.com/static/'.$uri;
    }
}