<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StafflistController extends Controller
{
    /**
     * スタッフ一覧
     */
    public function Stafflist()
    {
        return view('stafflist');
    }
}
