<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Log;

class PaypalController extends Controller
{
    public function webhook(Request $request)
    {
        Log::info($request->all());
        $transaction = Transaction::where('tst_code', $request['resource']['id'])->first();
        $transaction->tst_status = 1;
        $transaction->update();
    }
}
