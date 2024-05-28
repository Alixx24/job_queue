<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Cookie{

    public function setCookie()
    {
        $minutes = 60;
        $response = new Response('Set Cookie');
        $response->withCookie(cookie('name'));
        return $response;
    }

    public function getCookie(Request $request)
    {
        $value = $request->cookie('name');
        echo $value;
    }

   
}