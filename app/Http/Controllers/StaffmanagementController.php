<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffmanagementController extends Controller
{
    /**
     * スタッフ管理
     */
    public function Staffmanagement()
    {
        return view('staffmanagement');
    }
}
