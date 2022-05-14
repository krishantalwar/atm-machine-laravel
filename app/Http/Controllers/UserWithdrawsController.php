<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AtmsCurreny;
use Illuminate\Support\Facades\Validator;
use App\Services\UserService;

use App\Services\AtmService;

class UserWithdrawsController extends Controller
{
    public $notes;
    public $amount;
    public $qutanty_avliable;
    public $atmservice;

    public function __construct()
    {
        $this->UserService = new UserService();
        $query = "CAST(atms_currenies.amount AS SIGNED) desc";
        $this->notes = AtmsCurreny::orderByRaw($query)->get()->toArray();
        $this->amount = array_column($this->notes, 'amount');
        $this->qutanty_avliable = array_column($this->notes, 'qutanty_avliable');
        $this->atmservice = new AtmService();
    }
    //
    public function index()
    {
        try {
            return view('withdaw');
        } catch (Exception $ex) {
            return redirect()->route('login')->with('error', $ex->getMessage());
        }
    }

    public function amountWithrdaw(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|integer|numeric',
        ]);

        if ($validator->fails()) {
            return back()->withError($validator)
                ->withInput();
        }

        $amount = $request->amount;
        $notes = array_combine($this->amount, $this->qutanty_avliable);
        if ($amount <= 0 || $amount % array_key_last($notes))
            return back()->withError("Amount cannot be withdraw. " . array_key_last($notes) . " is the smallest notes or please enter round figure")
                ->withInput();

        $result = $this->atmservice->checkNoteAvliableAndCount($amount, $this->notes);
        if (!empty($result) && is_array($result)) {
            $result = (1 === count($result) ? $result[0] : implode(', ', array_splice($result, 0, -1)) . ' and ' . $result[0]);
        }
        return back()->with([
            'success' => $result,
        ]);
    }
}