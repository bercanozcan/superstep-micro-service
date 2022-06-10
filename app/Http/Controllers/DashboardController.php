<?php

namespace App\Http\Controllers;

use App\Models\Raffle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Raffle::all();
        return view('dashboard', ["raffles" => $data ? $data : []]);
    }
}
