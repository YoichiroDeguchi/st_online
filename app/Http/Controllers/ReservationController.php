<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * オンライン同行申し込み画面
     */
    public function Reservation()
    {
        return view('reservation');
    }
}