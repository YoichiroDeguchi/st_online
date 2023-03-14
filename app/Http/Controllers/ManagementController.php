<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementController extends Controller
{
    /**
     * 管理画面
     */
    public function Management()
    {
        return view('management');
    }
}