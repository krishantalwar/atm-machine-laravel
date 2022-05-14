<?php

namespace App\Services;

use App\Services\UserService;
use App\Models\AtmsBalance;
use App\Models\AtmsCurreny;
use App\Models\AtmsWithdraws;
use Illuminate\Support\Facades\Auth;

/**
 * Class AtmService
 * @package App\Services
 */
class AtmService
{
    public function  __construct()
    {
        $this->UserService = new UserService();
    }

    function checkNoteAvliableAndCount(int $amount, $notes)
    {
        $arr = [];
        $arra = [];
        $withdrawAmont = $amount;
        // dd($notes);
        // echo "<pre>";
        foreach ($notes as $note => $name) {
            $c = (int) ($amount / $name['amount']);
            if ($c <= $name['qutanty_avliable']) {
                $amount -= $name['amount'] * $count = (int) ($amount / $name['amount']);
                if ($count) {
                    $arr[] = "$count times $name[amount_in_words]";
                    $arra[] = array(
                        "count" => $count,
                        "id" => $name['id'],
                        "amount" => $name['amount'],
                        "amount_in_words" => $name['amount_in_words'],
                    );
                }
            }
        }

        if (!empty($arr)) {
            $atm = AtmsCurreny::where('id', $arra[0]['id'])->first();
            $this->UserService->updateUserBalance($withdrawAmont, $atm->atms_id);
            $this->createWithdrawHistory($withdrawAmont, $atm->atms_id);
            $this->updateAtmBalance($withdrawAmont, $atm->atms_id);
            $this->updateAtmCurrency($arra, $atm->atms_id);
            return $arr;
        } else {
            return "unsufficient baance";
        }
        return false;
    }

    function updateAtmBalance($decrementAmount, $atm_id)
    {
        return AtmsBalance::where("id", $atm_id)->decrement('balanced', $decrementAmount);
    }

    function createWithdrawHistory($withdrawAmont, $atm_id)
    {
        $flight = new AtmsWithdraws;
        $flight->withdraw_amount = $withdrawAmont;
        $flight->users_id = Auth::id();
        $flight->save();

        return true;
    }

    function updateAtmCurrency($notes, $atm_id)
    {
        foreach ($notes as $note) {
            AtmsCurreny::where('id', $note['id'])->decrement('qutanty_avliable', $note['count']);
        }
    }
}