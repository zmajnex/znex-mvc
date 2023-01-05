<?php

/** Check if connection is secured or not
 * @return bool
 */
function isSecure()
{
    if ($_SERVER["REQUEST_SCHEME"] === 'https') {
        return true;
    }
    return false;
}

/**Get base URL
 * @return string
 */
function getBaseUrl()
{
    if (isSecure()) {
        return "https://" . $_SERVER['SERVER_NAME'] . '/';
    }
    return "http://" . $_SERVER['SERVER_NAME'] . '/';
}

/** Get asset path for loading css, js and images paths
 * @param $path
 * @return string
 */
function asset($path)
{
    return getBaseUrl() . $path;
}