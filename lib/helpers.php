<?php
//TODO check if connection is secure or not  https vs http
function getBaseUrl(){
return "http://".$_SERVER['SERVER_NAME'].'/';
}
function asset($path)
{
    // Return full URL to asset

    return getBaseUrl() . $path;
}