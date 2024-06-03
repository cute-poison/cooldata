<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminFinanceController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        return view('admin.finance.index', compact('transactions'));
    }

    // Other methods for managing finances...
}
