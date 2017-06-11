<?php

function setval($key, $value)
{
    setcookie($key, $value, time()+(365*24*60*60), "/");
}

function getval($key, $def)
{
    if (!isset($_COOKIE[$key])) {
        return $def;
    } else {
        return $_COOKIE[$key];
    }
}

function getarray($key)
{
    return explode(",", getval($key, ""));
}

function setarray($key, $arr)
{
    return setval($key, implode(",", $arr));
}
