<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * オンライン同行申し込み画面
     */
    public function Application()
    {
        return view('application');
    }
}