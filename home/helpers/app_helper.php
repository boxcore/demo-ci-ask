<?php

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
        return base_url().'static/'.$uri;
    }
}

/**
 * 组装分类链接
 *
 * @param string $type      类型：ask|item|zixun
 * @param string $value
 * @return string
 */
function built_cat_url( $type = '', $value=''){
    $url = '';
    $type = trim($type);
    $value = trim($value);

    if( $type && $value){
        $url = 'http://'.$type.'.7808.com/'.$value.'/';
    }
    return $url;
}

/**
 * 组装详情链接
 *
 * @param string $type      类型：ask|item|zixun
 * @param int    $value
 * @return string
 */
function built_detail_url( $type = '', $value=0){
    $url = '';
    $type = trim($type);
    $value = intval($value);

    if( $type && $value){
        $url = 'http://'.$type.'.7808.com/detail-'.$value.'.html';
    }
    return $url;
}