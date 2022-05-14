<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            return view('login');
        } catch (Exception $ex) {
            return redirect()->route('login')->with('error', $ex->getMessage());
        }
    }

    public function login(LoginRequest $request)
    {

        // Retrieve a portion of the validated input data...
        $validated = $request->safe()->only(['acc_no', 'password']);
        // dd($validated);

        if (Auth::attempt(['account_no' => $validated['acc_no'], 'password' => $validated['password']])) {
            return redirect()->route('withdaw');
        }

        return back()->with([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}