<?php

namespace App\Http\Controllers\invokes\purchase;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class GetUserPurchasesController extends Controller
{
    public function __invoke()
    {
        $purchases = Purchase::where('client_id', Auth::user()->id)->get();
        return response()->json($purchases, 200);
    }
}
