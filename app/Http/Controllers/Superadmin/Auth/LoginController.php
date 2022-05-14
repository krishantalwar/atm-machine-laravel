<?php

namespace App\Http\Controllers\Superadmin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\SuperAdminLoginRequest;



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
            return view('superadmin.login');
        } catch (Exception $ex) {
            return redirect()->route('superadmin.login')->with('error', $ex->getMessage());
        }
    }

    public function login(SuperAdminLoginRequest $request)
    {

        // Retrieve the validated input data...
        $validated = $request->validated();


        $validated = $request->safe()->only(['email', 'password']);
        // dd($validated['password']);
        $user_type = "admin";

        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password'],  "user_type" => $user_type])) {
            return redirect()->route('dashboard');
        }

        return back()->with([
            'error' => 'The adsasdasdasd credentials do not match our records.',
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