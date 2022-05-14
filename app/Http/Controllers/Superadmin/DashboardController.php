<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\AtmsBalance;
use Illuminate\Http\Request;
use App\Models\AtmsWithdraws;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allwithdraws = AtmsWithdraws::with(['user'])->get();
        $atmbalance = AtmsBalance::first();
        // dd($atmbalance);
        return view('superadmin.dashboard', [
            'active' => "dashboard",
            "allwithdraws" => $allwithdraws,
            "atm_balance" => $atmbalance->balanced
        ]);
    }
}