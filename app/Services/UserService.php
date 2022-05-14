<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\UserBalance;


/**
 * Class UserService
 * @package App\Services
 */
class UserService
{

    public function updateUserBalance($decrementAmount, $atm_id)
    {
        $UserBalance = UserBalance::find(Auth::id());
        return UserBalance::where("users_id", Auth::id())->decrement('balanced_amount', $decrementAmount);
    }
}