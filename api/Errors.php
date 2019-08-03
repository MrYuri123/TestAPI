<?php
namespace api;

/**
 * Shows errors description.
 */
class Errors
{
    public static function accessDenied()
    {
        return json_encode(['Error' => 'Access denied']);
    }

    public static function wrongRequest()
    {
        return json_encode(['Error' => 'Wrong request']);
    }

    public static function emptyResult()
    {
        return json_encode(['Error' => 'Empty result']);
    }
}
