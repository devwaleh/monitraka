<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function create ()
    {
        return view('expense');
    }
    public function update (Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'category' => 'required|int',
            'description' => 'required|min:5|max:200',
        ]);

        $expense = new Expenses();

        $id = auth()->id();

        $expense->user_id = $id;
        $expense->category_id = $request->category;
        $expense->amount = $request->amount;
        $expense->description = $request->description;

        $saved = $expense->save();

        if ($saved) {
            return redirect()->route('dashboard')->with("success","Expense added successfully");
        } else {
            return redirect()->route('dashboard')->with("error","Expense couldn't be added");
        }


    }
}
