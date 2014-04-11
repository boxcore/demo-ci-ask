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
 * 头像资源链接
 *
 * @param string $uri
 * @return string
 */
function avatar_url( $uri='' )
{
    $uri = $uri ? trim($uri) : 'default-avatar.jpg';
    if ( isset($GLOBALS['app']['avatar_url']) && !empty($GLOBALS['app']['avatar_url']) )
    {
        return $GLOBALS['app']['avatar_url'].$uri;
    }
    else
    {
        return base_url().'data/avatar/'.$uri;
    }
}

/**
 * 二级域名链接生成
 *
 * @param string $uri
 * @return string
 */
function app_url( $uri='' )
{
    $url = '';
    $params = explode('/',$uri);
    $dm = array('ask','item','zixun');
    if(in_array($params[0],$dm)){
        $ex = array_shift($params);
        $url = 'http://' . $ex . '.966069.com/' . implode('/',$params);
    } else {
        $url = base_url($uri);
    }

    return $url;
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
        $url = 'http://'.$type.'.966069.com/'.$value.'/';
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
        $url = 'http://'.$type.'.966069.com/detail-'.$value.'.html';
    }
    return $url;
}
