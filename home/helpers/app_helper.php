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