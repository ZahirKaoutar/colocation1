<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class DashbordController extends Controller{


// public function dashbordmembre()
// {
//     $user = Auth::user();
//    $scoreReputation = $user->reputation ?? 0;

//     $month = Carbon::now()->month;
//     $year = Carbon::now()->year;


//     $colocationIds = $user->colocations()->pluck('colocations.id');
// $ExpenseGlobale = 0;
// if ($colocationIds->isNotEmpty()) {
//     $ExpenseGlobale = Expense::whereIn('colocation_id', $colocationIds)
//        ->whereMonth('date', $month)
//         ->sum('amount');
// }


//     $recentExpense = Expense::whereIn('colocation_id', $colocationIds)
//         ->latest()
//         ->get();

//     return view('membre.dashboard', compact('ExpenseGlobale', 'recentExpenses', 'scoreReputation'));
// }










public function dashbordmembre()
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login');
    }

    $scoreReputation = $user->reputation ?? 0;
    $month = Carbon::now()->month;
    $year = Carbon::now()->year;

    $colocationIds = $user->colocations()->pluck('colocations.id');

    $ExpenseGlobale = 0;
    $recentExpense = null;

    if ($colocationIds->isNotEmpty()) {

        $ExpenseGlobale = Expense::whereIn('colocation_id', $colocationIds)
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->sum('amount');

        $recentExpense = Expense::with('payer')
            ->whereIn('colocation_id', $colocationIds)
            ->latest()
            ->first();
    }

    // ✅ RETURN TOUJOURS LA VUE
    return view('membre.dashboard', compact(
        'ExpenseGlobale',
        'recentExpense',
        'scoreReputation'
    ));
}




}
