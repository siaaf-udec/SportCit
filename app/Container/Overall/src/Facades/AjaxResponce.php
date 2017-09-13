<?php

namespace App\Container\Overall\Src\Facades;

use Illuminate\Support\Facades\Facade;

class AjaxResponse extends Facade
{
    /**
     * Store a newly created resource in storage.
     *
     * @param null $title
     * @param $message
     * @param $data
     * @param null $state
     * @return \Illuminate\Http\Response
     * @internal param $success
     */
    public static function make($title = null, $message = null, $data = null, $state = null)
    {
        return response()->json([
            'title' => $title,
            'message' => $message,
            'data' => $data,
        ], $state);
    }

    public static function success($title = '', $message = '', $data = null)
    {
        return self::make($title, $message, $data, 200);
    }

    public static function fail($title = '', $message = null, $data = null)
    {
        return self::make($title, $message, $data, 422);
    }
}