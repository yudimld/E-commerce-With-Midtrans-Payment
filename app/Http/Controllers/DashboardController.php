<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\TransactionDetail;
use App\Models\User;


class DashboardController extends Controller
{
    public function index()
    {
        // return dd(Auth::user()->id);
        $transactions = TransactionDetail::with(['transaction.users','product.galleries'])
                            ->whereHas('product', function($product){
                                $product->where('users_id', Auth::user()->id);
                            });
        // dd($transactions->get());


        $revenue = $transactions->get()->reduce(function ($carry, $item) {
            return $carry + $item->price;
        });

        // return dd(Auth::user()->id);

        // return $revenue;

        $customer = User::count();

        
        return view('pages.dashboard',[
            'transaction_count' => $transactions->count(),
            'transaction_data' => $transactions->get(),
            'revenue' => $revenue,
            'customer' => $customer,
        ]);
        
    }
}
